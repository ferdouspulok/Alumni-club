<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\MembershipType;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MembershipApplyController extends Controller
{
    public function index(): View
    {
        $types = MembershipType::active()->get();
        return view('public.membership_info', compact('types'));
    }

    public function create(): View
    {
        $types = MembershipType::active()->get();
        return view('public.membership_apply', compact('types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'membership_type_id' => 'required|exists:membership_types,id',
            'full_name' => 'required|string|max:150',
            'father_name' => 'nullable|string|max:150',
            'mother_name' => 'nullable|string|max:150',
            'spouse_name' => 'nullable|string|max:150',
            'date_of_birth' => 'nullable|date',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'mobile' => 'required|string|max:30',
            'emergency_contact' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'nid_or_passport' => 'nullable|string|max:50',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'district' => 'nullable|string|max:100',
            'upazila' => 'nullable|string|max:100',
            'profession' => 'nullable|string|max:150',
            'organization' => 'nullable|string|max:150',
            'designation' => 'nullable|string|max:150',
            'proposed_by_name' => 'nullable|string|max:150',
            'proposed_by_member_id' => 'nullable|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'is_public_directory' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'member_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/members'), $filename);
            $validated['photo'] = $filename;
        }

        $validated['status'] = 'pending';
        $validated['is_public_directory'] = $request->has('is_public_directory');

        Member::create($validated);

        return redirect()->route('membership.apply')
            ->with('success', 'Thank you! Your membership application has been submitted successfully to Chatkhil Elite Club Limited. Our Membership Scrutiny Committee will review your details.');
    }
}
