<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MembershipType;
use App\Models\User;
use App\Services\MemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MemberAdminController extends Controller
{
    public function index(Request $request): View
    {
        $types = MembershipType::all();
        $query = Member::with(['membershipType', 'user']);

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'LIKE', "%{$search}%")
                  ->orWhere('member_id', 'LIKE', "%{$search}%")
                  ->orWhere('mobile', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($typeId = $request->input('type')) {
            $query->where('membership_type_id', $typeId);
        }

        $members = $query->latest()->paginate(15)->withQueryString();

        return view('admin.members.index', compact('members', 'types'));
    }

    public function pending(): View
    {
        $members = Member::where('status', 'pending')
            ->with(['membershipType'])
            ->latest()
            ->paginate(15);

        return view('admin.members.pending', compact('members'));
    }

    public function show(Member $member): View
    {
        $member->load(['membershipType', 'user', 'approver', 'payments', 'eventRegistrations.event']);
        return view('admin.members.show', compact('member'));
    }

    public function approve(Member $member): RedirectResponse
    {
        if ($member->status === 'approved') {
            return back()->with('info', 'This member is already approved.');
        }

        // Generate Member ID if not already assigned
        if (!$member->member_id) {
            $member->member_id = MemberService::generateMemberId();
        }

        // Create or link User account
        if (!$member->user_id) {
            $email = $member->email ?: 'member.' . strtolower(str_replace(['-', ' '], '', $member->member_id)) . '@chatkhil.club';
            
            $existingUser = User::where('email', $email)->orWhere('phone', $member->mobile)->first();

            if ($existingUser) {
                $user = $existingUser;
            } else {
                $user = User::create([
                    'name' => $member->full_name,
                    'email' => $email,
                    'phone' => $member->mobile,
                    'password' => Hash::make('password123'),
                    'role' => 'member',
                    'status' => 'active',
                ]);
            }
            $member->user_id = $user->id;
        }

        $member->status = 'approved';
        $member->approved_by = Auth::id();
        $member->approved_at = now();
        $member->save();

        return back()->with('success', "Member successfully approved! Assigned Member ID: {$member->member_id}. Member can now log in.");
    }

    public function reject(Request $request, Member $member): RedirectResponse
    {
        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $member->status = 'rejected';
        $member->rejection_reason = $validated['rejection_reason'];
        $member->save();

        return back()->with('success', 'Application marked as rejected.');
    }

    public function create(): View
    {
        $types = MembershipType::active()->get();
        return view('admin.members.create', compact('types'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'membership_type_id' => 'required|exists:membership_types,id',
            'full_name' => 'required|string|max:150',
            'father_name' => 'nullable|string|max:150',
            'mother_name' => 'nullable|string|max:150',
            'spouse_name' => 'nullable|string|max:150',
            'nominee_name' => 'nullable|string|max:150',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'mobile' => 'required|string|max:30',
            'whatsapp_number' => 'nullable|string|max:30',
            'emergency_contact' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'nid_or_passport' => 'nullable|string|max:100',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'district' => 'nullable|string|max:100',
            'upazila' => 'nullable|string|max:100',
            'profession' => 'nullable|string|max:150',
            'organization' => 'nullable|string|max:150',
            'designation' => 'nullable|string|max:150',
            'proposed_by_name' => 'nullable|string|max:150',
            'proposed_by_member_id' => 'nullable|string|max:50',
            'seconder_name' => 'nullable|string|max:150',
            'seconder_member_id' => 'nullable|string|max:50',
            'facebook_profile' => 'nullable|string|max:255',
            'instagram_profile' => 'nullable|string|max:255',
            'linkedin_profile' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'status' => 'required|in:pending,approved,inactive',
            'is_public_directory' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'member_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/members'), $filename);
            $validated['photo'] = $filename;
        }

        $validated['is_public_directory'] = $request->has('is_public_directory');

        if ($validated['status'] === 'approved') {
            $validated['member_id'] = MemberService::generateMemberId();
            $validated['approved_by'] = Auth::id();
            $validated['approved_at'] = now();
        }

        $member = Member::create($validated);

        if ($validated['status'] === 'approved') {
            $email = $member->email ?: 'member.' . strtolower(str_replace(['-', ' '], '', $member->member_id)) . '@chatkhil.club';
            $user = User::create([
                'name' => $member->full_name,
                'email' => $email,
                'phone' => $member->mobile,
                'password' => Hash::make('password123'),
                'role' => 'member',
                'status' => 'active',
            ]);
            $member->update(['user_id' => $user->id]);
        }

        return redirect()->route('admin.members.index')->with('success', 'New member successfully created.');
    }

    public function edit(Member $member): View
    {
        $types = MembershipType::all();
        return view('admin.members.edit', compact('member', 'types'));
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $validated = $request->validate([
            'membership_type_id' => 'required|exists:membership_types,id',
            'full_name' => 'required|string|max:150',
            'father_name' => 'nullable|string|max:150',
            'mother_name' => 'nullable|string|max:150',
            'spouse_name' => 'nullable|string|max:150',
            'nominee_name' => 'nullable|string|max:150',
            'date_of_birth' => 'nullable|date',
            'nationality' => 'nullable|string|max:100',
            'gender' => 'required|in:male,female,other',
            'blood_group' => 'nullable|string|max:10',
            'mobile' => 'required|string|max:30',
            'whatsapp_number' => 'nullable|string|max:30',
            'emergency_contact' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:150',
            'nid_or_passport' => 'nullable|string|max:100',
            'present_address' => 'nullable|string',
            'permanent_address' => 'nullable|string',
            'district' => 'nullable|string|max:100',
            'upazila' => 'nullable|string|max:100',
            'profession' => 'nullable|string|max:150',
            'organization' => 'nullable|string|max:150',
            'designation' => 'nullable|string|max:150',
            'proposed_by_name' => 'nullable|string|max:150',
            'proposed_by_member_id' => 'nullable|string|max:50',
            'seconder_name' => 'nullable|string|max:150',
            'seconder_member_id' => 'nullable|string|max:50',
            'facebook_profile' => 'nullable|string|max:255',
            'instagram_profile' => 'nullable|string|max:255',
            'linkedin_profile' => 'nullable|string|max:255',
            'status' => 'required|in:pending,approved,rejected,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
            'is_public_directory' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = 'member_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/members'), $filename);
            $validated['photo'] = $filename;
        }

        $validated['is_public_directory'] = $request->has('is_public_directory');

        $member->update($validated);

        return redirect()->route('admin.members.show', $member)->with('success', 'Member profile updated successfully.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Member record removed successfully.');
    }

    public function exportCsv(): StreamedResponse
    {
        $members = Member::with('membershipType')->orderBy('member_id', 'asc')->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="chatkhil_elite_club_members_' . date('Y-m-d') . '.csv"',
        ];

        return response()->stream(function () use ($members) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Member ID', 'Full Name', 'Membership Type', 'Mobile', 'Email', 'Profession', 'Organization', 'Blood Group', 'Status', 'Approved Date']);

            foreach ($members as $m) {
                fputcsv($handle, [
                    $m->member_id ?? 'N/A',
                    $m->full_name,
                    $m->membershipType ? $m->membershipType->name : 'N/A',
                    $m->mobile,
                    $m->email,
                    $m->profession,
                    $m->organization,
                    $m->blood_group,
                    ucfirst($m->status),
                    $m->approved_at ? $m->approved_at->format('Y-m-d') : 'N/A',
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }
}
