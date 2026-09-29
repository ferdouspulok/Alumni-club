<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MembershipTypeAdminController extends Controller
{
    public function index(): View
    {
        $types = MembershipType::withCount('members')->orderBy('order_num', 'asc')->get();
        return view('admin.membership_types.index', compact('types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'fee' => 'required|numeric|min:0',
            'validity_type' => 'required|in:annual,lifetime,custom',
            'description' => 'nullable|string',
            'order_num' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        MembershipType::create($validated);

        return back()->with('success', 'Membership type created successfully.');
    }

    public function update(Request $request, MembershipType $membershipType): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'fee' => 'required|numeric|min:0',
            'validity_type' => 'required|in:annual,lifetime,custom',
            'description' => 'nullable|string',
            'order_num' => 'nullable|integer',
            'status' => 'required|in:active,inactive',
        ]);

        $membershipType->update($validated);

        return back()->with('success', 'Membership type updated successfully.');
    }

    public function destroy(MembershipType $membershipType): RedirectResponse
    {
        if ($membershipType->members()->count() > 0) {
            return back()->with('error', 'Cannot delete this type because members are currently assigned to it.');
        }

        $membershipType->delete();
        return back()->with('success', 'Membership type deleted.');
    }
}
