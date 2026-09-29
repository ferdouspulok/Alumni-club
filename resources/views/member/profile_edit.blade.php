@extends('layouts.member')

@section('title', 'Edit Profile & Privacy | Chatkhil Elite Club Limited')

@section('content')

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            <h4 class="font-serif text-navy mb-0">Edit Profile & Directory Privacy</h4>
            <a href="{{ route('member.profile') }}" class="btn btn-sm btn-outline-secondary">Cancel</a>
        </div>

        <form action="{{ route('member.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $member ? $member->full_name : $user->name) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $member ? $member->mobile : $user->phone) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Emergency Contact</label>
                    <input type="text" name="emergency_contact" class="form-control" value="{{ old('emergency_contact', $member ? $member->emergency_contact : '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Blood Group</label>
                    <select name="blood_group" class="form-select">
                        <option value="">-- Select Blood Group --</option>
                        @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                            <option value="{{ $bg }}" {{ old('blood_group', $member ? $member->blood_group : '') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Profession</label>
                    <input type="text" name="profession" class="form-control" value="{{ old('profession', $member ? $member->profession : '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Organization</label>
                    <input type="text" name="organization" class="form-control" value="{{ old('organization', $member ? $member->organization : '') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Designation</label>
                    <input type="text" name="designation" class="form-control" value="{{ old('designation', $member ? $member->designation : '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Present Address</label>
                    <textarea name="present_address" class="form-control" rows="2">{{ old('present_address', $member ? $member->present_address : '') }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Permanent Address</label>
                    <textarea name="permanent_address" class="form-control" rows="2">{{ old('permanent_address', $member ? $member->permanent_address : '') }}</textarea>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-semibold">Update Profile Photo</label>
                    <input type="file" name="photo" class="form-control" accept="image/jpeg,image/png,image/jpg">
                    <div class="form-text small">Upload clear formal photograph (max 3MB).</div>
                </div>
            </div>

            <!-- Privacy Preferences -->
            <div class="bg-light p-3 rounded-3 mb-4 border">
                <h6 class="font-serif text-navy mb-2"><i class="bi bi-shield-check text-warning me-2"></i> Public Directory Privacy Controls</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="is_public_directory" id="is_public_directory" value="1" {{ old('is_public_directory', $member && $member->is_public_directory) ? 'checked' : '' }}>
                    <label class="form-check-label small" for="is_public_directory">
                        Show my profile in the public Member Directory (Name, Photo, Member ID, Profession).
                    </label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="show_phone_public" id="show_phone_public" value="1" {{ old('show_phone_public', $member && $member->show_phone_public) ? 'checked' : '' }}>
                    <label class="form-check-label small" for="show_phone_public">
                        Allow my mobile number to be visible publicly in the directory.
                    </label>
                </div>
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" name="show_email_public" id="show_email_public" value="1" {{ old('show_email_public', $member && $member->show_email_public) ? 'checked' : '' }}>
                    <label class="form-check-label small" for="show_email_public">
                        Allow my email address to be visible publicly in the directory.
                    </label>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-check2-circle me-1"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

@endsection
