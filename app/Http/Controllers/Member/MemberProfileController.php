<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MemberProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        $member = $user->member;
        return view('member.profile', compact('user', 'member'));
    }

    public function edit(): View
    {
        $user = Auth::user();
        $member = $user->member;
        return view('member.profile_edit', compact('user', 'member'));
    }

    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $member = $user->member;

        $validated = $request->validate([
            'full_name' => 'required|string|max:150',
            'mobile' => 'required|string|max:30',
            'emergency_contact' => 'nullable|string|max:30',
            'blood_group' => 'nullable|string|max:10',
            'profession' => 'nullable|string|max:150',
            'organization' => 'nullable|string|max:150',
            'designation' => 'nullable|string|max:150',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'is_public_directory' => 'nullable|boolean',
            'show_phone_public' => 'nullable|boolean',
            'show_email_public' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'member_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/members'), $filename);
            $validated['photo'] = $filename;
        }

        $validated['is_public_directory'] = $request->has('is_public_directory');
        $validated['show_phone_public'] = $request->has('show_phone_public');
        $validated['show_email_public'] = $request->has('show_email_public');

        if ($member) {
            $member->update($validated);
        }

        $user->update([
            'name' => $validated['full_name'],
            'phone' => $validated['mobile'],
        ]);

        return redirect()->route('member.profile')->with('success', 'Your profile details have been updated successfully.');
    }

    public function showChangePassword(): View
    {
        return view('member.change_password');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Your current password does not match our records.');
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Your password has been changed successfully.');
    }
}
