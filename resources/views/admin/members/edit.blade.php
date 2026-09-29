@extends('layouts.admin')

@section('title', 'Edit Member: ' . $member->full_name)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Edit Member Details</h3>
            <span class="text-muted small">Member ID: {{ $member->member_id ?? 'PENDING' }} &bull; {{ $member->full_name }}</span>
        </div>
        <a href="{{ route('admin.members.show', $member) }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Dossier
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.members.update', $member) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Membership Type <span class="text-danger">*</span></label>
                    <select name="membership_type_id" class="form-select" required>
                        @foreach($types as $t)
                            <option value="{{ $t->id }}" {{ $member->membership_type_id == $t->id ? 'selected' : '' }}>
                                {{ $t->name }} (৳{{ number_format($t->fee, 0) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Membership Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="approved" {{ $member->status === 'approved' ? 'selected' : '' }}>Approved</option>
                        <option value="pending" {{ $member->status === 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="rejected" {{ $member->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                        <option value="inactive" {{ $member->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" required value="{{ old('full_name', $member->full_name) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" required value="{{ old('mobile', $member->mobile) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $member->email) }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Gender</label>
                    <select name="gender" class="form-select">
                        <option value="male" {{ $member->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $member->gender === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $member->gender === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Blood Group</label>
                    <select name="blood_group" class="form-select">
                        <option value="">Select</option>
                        @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                            <option value="{{ $bg }}" {{ $member->blood_group === $bg ? 'selected' : '' }}>{{ $bg }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Profession</label>
                    <input type="text" name="profession" class="form-control" value="{{ old('profession', $member->profession) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Organization</label>
                    <input type="text" name="organization" class="form-control" value="{{ old('organization', $member->organization) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{ old('designation', $member->designation) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Present Address</label>
                    <textarea name="present_address" class="form-control" rows="2">{{ old('present_address', $member->present_address) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Permanent Address</label>
                    <textarea name="permanent_address" class="form-control" rows="2">{{ old('permanent_address', $member->permanent_address) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">District</label>
                    <input type="text" name="district" class="form-control" value="{{ old('district', $member->district) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Upazila</label>
                    <input type="text" name="upazila" class="form-control" value="{{ old('upazila', $member->upazila) }}">
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-semibold">Change Profile Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/*">
                </div>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="is_public_directory" id="is_public_directory" value="1" {{ $member->is_public_directory ? 'checked' : '' }}>
                <label class="form-check-label small" for="is_public_directory">
                    Display profile in public Member Directory.
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-save me-1"></i> Update Member Record
                </button>
            </div>
        </form>
    </div>

@endsection
