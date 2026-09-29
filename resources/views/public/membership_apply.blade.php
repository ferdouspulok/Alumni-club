@extends('layouts.public')

@section('title', 'Apply for Membership | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('membership.info') }}" class="text-warning text-decoration-none">Membership</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Apply</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Membership Application Form</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Chatkhil Elite Club Limited, Chatkhil, Noakhali, Bangladesh</p>
        </div>
    </div>

    <!-- Application Form Container -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    @if(session('success'))
                        <div class="alert alert-success p-4 rounded-4 shadow-sm mb-5 text-center">
                            <i class="bi bi-patch-check-fill text-success fs-1 mb-2 d-block"></i>
                            <h4 class="font-serif text-success fw-bold">Application Received!</h4>
                            <p class="mb-3">{{ session('success') }}</p>
                            <a href="{{ route('home') }}" class="btn btn-club-primary btn-sm">Return to Homepage</a>
                        </div>
                    @else

                        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="border-top: 4px solid var(--club-gold) !important;">
                            <div class="text-center mb-4">
                                <img src="{{ asset('images/logo.png') }}" alt="Chatkhil Elite Club" style="height: 70px; filter: drop-shadow(0 2px 6px rgba(197, 155, 39, 0.4));">
                                <h3 class="font-serif mt-2 mb-1">Membership Application</h3>
                                <p class="text-muted small">Please complete all relevant sections truthfully. Fields marked with <span class="text-danger">*</span> are mandatory.</p>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-1"></i> Please resolve the following errors:</h6>
                                    <ul class="mb-0 small ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('membership.apply.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- 1. Membership Type -->
                                <div class="bg-light p-3 rounded-3 mb-4 border">
                                    <h6 class="text-navy fw-bold text-uppercase small mb-2"><i class="bi bi-award-fill text-warning me-1"></i> 1. Desired Membership Category <span class="text-danger">*</span></h6>
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <select name="membership_type_id" class="form-select @error('membership_type_id') is-invalid @enderror" required>
                                                <option value="">-- Choose Category --</option>
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}" {{ old('membership_type_id', request('type')) == $type->id ? 'selected' : '' }}>
                                                        {{ $type->name }} — ৳{{ number_format($type->fee, 0) }} ({{ ucfirst($type->validity_type) }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('membership_type_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- 2. Personal Information -->
                                <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-person-fill text-warning me-2"></i> 2. Personal Information</h5>
                                
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="full_name" class="form-control @error('full_name') is-invalid @enderror" value="{{ old('full_name') }}" placeholder="As per official identification" required>
                                        @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" placeholder="+880 1XXXXXXXXX" required>
                                        @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Email Address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="applicant@example.com">
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label small fw-semibold">Date of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <label class="form-label small fw-semibold">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Blood Group</label>
                                        <select name="blood_group" class="form-select @error('blood_group') is-invalid @enderror">
                                            <option value="">-- Select Blood Group --</option>
                                            @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                                                <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Father's Name</label>
                                        <input type="text" name="father_name" class="form-control" value="{{ old('father_name') }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Mother's Name</label>
                                        <input type="text" name="mother_name" class="form-control" value="{{ old('mother_name') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Spouse's Name (if married)</label>
                                        <input type="text" name="spouse_name" class="form-control" value="{{ old('spouse_name') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Emergency Contact Number</label>
                                        <input type="text" name="emergency_contact" class="form-control" value="{{ old('emergency_contact') }}" placeholder="Family member or contact">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">NID / Passport Number (Optional)</label>
                                        <input type="text" name="nid_or_passport" class="form-control" value="{{ old('nid_or_passport') }}" placeholder="For administrative record">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Applicant Profile Photo</label>
                                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                                        <div class="form-text small">Recent passport-sized photo (JPG/PNG, max 3MB).</div>
                                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Present Address</label>
                                        <textarea name="present_address" class="form-control" rows="2" placeholder="Current residence">{{ old('present_address') }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Permanent Address (Chatkhil / Village)</label>
                                        <textarea name="permanent_address" class="form-control" rows="2" placeholder="Ancestral village or permanent address in Chatkhil">{{ old('permanent_address') }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">District</label>
                                        <input type="text" name="district" class="form-control" value="{{ old('district', 'Noakhali') }}">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Upazila</label>
                                        <input type="text" name="upazila" class="form-control" value="{{ old('upazila', 'Chatkhil') }}">
                                    </div>
                                </div>

                                <!-- 3. Professional Information -->
                                <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-briefcase-fill text-warning me-2"></i> 3. Professional Information</h5>
                                
                                <div class="row g-3 mb-4">
                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Profession / Occupation</label>
                                        <input type="text" name="profession" class="form-control" value="{{ old('profession') }}" placeholder="e.g. Engineer, Doctor, Lawyer, Business">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Organization / Business Name</label>
                                        <input type="text" name="organization" class="form-control" value="{{ old('organization') }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-semibold">Designation / Role</label>
                                        <input type="text" name="designation" class="form-control" value="{{ old('designation') }}">
                                    </div>
                                </div>

                                <!-- 4. Club Reference -->
                                <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-people-fill text-warning me-2"></i> 4. Proposed By / Reference</h5>
                                
                                <div class="row g-3 mb-4">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Proposed By Member Name (if any)</label>
                                        <input type="text" name="proposed_by_name" class="form-control" value="{{ old('proposed_by_name') }}" placeholder="Name of proposing club member">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-semibold">Proposer Member ID (if known)</label>
                                        <input type="text" name="proposed_by_member_id" class="form-control" value="{{ old('proposed_by_member_id') }}" placeholder="e.g. CEC-2026-0001">
                                    </div>
                                </div>

                                <!-- Privacy & Consent -->
                                <div class="bg-light p-3 rounded-3 mb-4 border">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_public_directory" id="is_public_directory" value="1" {{ old('is_public_directory', true) ? 'checked' : '' }}>
                                        <label class="form-check-label small" for="is_public_directory">
                                            Allow my basic profile (Name, Photo, Member ID, Profession) to appear in the public club member directory. <em>(Your personal phone number and email will remain hidden unless you opt-in from your dashboard).</em>
                                        </label>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="agree_terms" id="agree_terms" required>
                                        <label class="form-check-label small fw-bold text-navy" for="agree_terms">
                                            I solemnly affirm that the information provided is correct, and I agree to abide by the Constitution, By-Laws, and decisions of the Executive Committee of Chatkhil Elite Club Limited. <span class="text-danger">*</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-club-gold btn-lg px-5 py-3 fw-bold">
                                        <i class="bi bi-send-fill me-2"></i> Submit Application to Secretariat
                                    </button>
                                </div>
                            </form>
                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
