<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CommitteeAdminController extends Controller
{
    public function index(): View
    {
        $committees = Committee::withCount('members')->orderBy('term_start_year', 'desc')->get();
        return view('admin.committees.index', compact('committees'));
    }

    public function show(Committee $committee): View
    {
        $committee->load('members');
        $approvedMembers = Member::where('status', 'approved')->orderBy('full_name')->get();
        return view('admin.committees.show', compact('committee', 'approvedMembers'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'term_start_year' => 'required|integer|digits:4',
            'term_end_year' => 'required|integer|digits:4',
            'is_current' => 'nullable|boolean',
            'status' => 'required|in:active,archived',
        ]);

        $isCurrent = $request->has('is_current');

        if ($isCurrent) {
            Committee::where('is_current', true)->update(['is_current' => false]);
        }

        $validated['is_current'] = $isCurrent;
        $committee = Committee::create($validated);

        return redirect()->route('admin.committees.show', $committee)->with('success', 'Committee term created successfully.');
    }

    public function update(Request $request, Committee $committee): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'term_start_year' => 'required|integer|digits:4',
            'term_end_year' => 'required|integer|digits:4',
            'is_current' => 'nullable|boolean',
            'status' => 'required|in:active,archived',
        ]);

        $isCurrent = $request->has('is_current');

        if ($isCurrent) {
            Committee::where('id', '!=', $committee->id)->update(['is_current' => false]);
        }

        $validated['is_current'] = $isCurrent;
        $committee->update($validated);

        return back()->with('success', 'Committee term updated successfully.');
    }

    public function destroy(Committee $committee): RedirectResponse
    {
        $committee->delete();
        return redirect()->route('admin.committees.index')->with('success', 'Committee deleted successfully.');
    }

    public function addMember(Request $request, Committee $committee): RedirectResponse
    {
        $validated = $request->validate([
            'member_id' => 'nullable|exists:members,id',
            'name' => 'required|string|max:150',
            'designation' => 'required|string|max:150',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'bio' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'comm_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/members'), $filename);
            $validated['photo'] = $filename;
        }

        $validated['committee_id'] = $committee->id;
        $validated['display_order'] = $validated['display_order'] ?? 10;

        CommitteeMember::create($validated);

        return back()->with('success', 'Committee member added successfully.');
    }

    public function removeMember(CommitteeMember $committeeMember): RedirectResponse
    {
        $committeeMember->delete();
        return back()->with('success', 'Member removed from committee.');
    }
}
