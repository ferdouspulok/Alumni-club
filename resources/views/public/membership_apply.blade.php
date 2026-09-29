@extends('layouts.public')

@section('title', 'Membership Application Form | Chatkhil ELITE Club Ltd.')
@section('meta_description', 'Official Membership Application Form of Chatkhil ELITE Club Ltd. (Registered under the Companies Act / Applicable Laws of Bangladesh).')

@section('content')

    <!-- Liquid Glass Hero / Form Header Banner -->
    <div class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 50%, #152643 100%); border-bottom: 2px solid rgba(197, 160, 89, 0.4);">
        <div class="position-absolute top-0 start-50 translate-middle-x" style="width: 600px; height: 300px; background: radial-gradient(circle, rgba(197, 160, 89, 0.18) 0%, transparent 70%); pointer-events: none;"></div>
        <div class="container position-relative py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center small mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('membership.info') }}" class="text-warning text-decoration-none">Membership</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Application Form</li>
                </ol>
            </nav>
            <span class="badge bg-warning text-dark px-3 py-1 fw-bold text-uppercase mb-2" style="letter-spacing: 0.1em; font-size: 0.78rem;">
                “Unity • Excellence • Service • Leadership”
            </span>
            <h1 class="font-serif display-5 fw-bold text-white mb-2">Membership Application Form</h1>
            <p class="lead mb-1 text-light-50" style="color: #cbd5e1; font-weight: 300;">
                <strong class="text-warning">Chatkhil ELITE Club Ltd.</strong>
            </p>
            <p class="small text-muted mb-0" style="color: #94a3b8 !important;">
                (Registered under the Companies Act / Applicable Laws of Bangladesh)
            </p>
        </div>
    </div>

    <!-- Application Form Main Container with Soft Eyepleasing Liquid Glass Background -->
    <div class="py-5" style="background: radial-gradient(at 0% 0%, rgba(223, 196, 136, 0.08) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(16, 28, 49, 0.06) 0px, transparent 50%), #f7f9fc;">
        <div class="container py-3">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-11">

                    @if(session('success'))
                        <div class="card border-0 p-5 rounded-4 shadow-sm text-center mb-5" style="background: rgba(255, 255, 255, 0.92); backdrop-filter: blur(20px); border: 2px solid var(--liquid-gold) !important;">
                            <div class="mb-3">
                                <span class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px; background: rgba(197, 160, 89, 0.15); border: 2px solid var(--liquid-gold);">
                                    <i class="bi bi-patch-check-fill text-warning fs-1"></i>
                                </span>
                            </div>
                            <h3 class="font-serif fw-bold text-navy mb-2">Application Successfully Submitted!</h3>
                            <p class="text-muted lead mb-4" style="max-width: 700px; margin: 0 auto; font-size: 1.05rem;">
                                {{ session('success') }}
                            </p>
                            <div class="p-3 rounded-3 mb-4 mx-auto" style="background: #faf7f2; border: 1px dashed var(--liquid-gold); max-width: 550px;">
                                <div class="row g-2 text-start small">
                                    <div class="col-sm-6"><strong>Organization:</strong> Chatkhil ELITE Club Ltd.</div>
                                    <div class="col-sm-6"><strong>Review Status:</strong> Under Scrutiny</div>
                                    <div class="col-sm-6"><strong>Secretariat:</strong> Sky View Trade Valley, Dhaka</div>
                                    <div class="col-sm-6"><strong>Contact Hotline:</strong> +880 1805 561359</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('home') }}" class="btn btn-club-primary px-4 py-2">Return to Homepage</a>
                                <a href="{{ route('membership.apply') }}" class="btn btn-club-outline px-4 py-2">Submit Another Form</a>
                            </div>
                        </div>
                    @else

                        <!-- Liquid Glass Form Card -->
                        <div class="card border-0 rounded-4 shadow-lg p-4 p-md-5 position-relative overflow-hidden" 
                             style="background: rgba(255, 255, 255, 0.88); backdrop-filter: blur(25px) saturate(180%); -webkit-backdrop-filter: blur(25px) saturate(180%); border: 1.5px solid rgba(223, 196, 136, 0.45) !important; box-shadow: 0 25px 60px -15px rgba(10, 20, 36, 0.09), inset 0 1px 2px rgba(255, 255, 255, 0.95) !important;">
                            
                            <!-- Form Header Crest -->
                            <div class="text-center pb-4 mb-4 border-bottom position-relative">
                                <img src="{{ asset('images/logo.png') }}" alt="Chatkhil ELITE Club Ltd." style="height: 82px; filter: drop-shadow(0 4px 12px rgba(197, 160, 89, 0.45)); margin-bottom: 12px;">
                                <div class="text-uppercase fw-bold text-muted small" style="letter-spacing: 0.15em;">
                                    “Unity • Excellence • Service • Leadership”
                                </div>
                                <h2 class="font-serif fw-bold text-navy mt-1 mb-1" style="letter-spacing: 0.03em;">
                                    Membership Application Form
                                </h2>
                                <h5 class="fw-bold mb-1" style="color: var(--liquid-navy-deep); font-family: 'Plus Jakarta Sans', sans-serif;">
                                    Chatkhil <span class="text-warning">ELITE</span> Club Ltd.
                                </h5>
                                <p class="text-muted small mb-3">
                                    (Registered under the Companies Act / Applicable Laws of Bangladesh)
                                </p>

                                <!-- Official Reference Header Box (Matching PDF Form Header) -->
                                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 rounded-3" style="background: rgba(246, 248, 251, 0.9); border: 1px solid rgba(197, 160, 89, 0.3);">
                                    <div class="text-start">
                                        <span class="text-muted small d-block">Application Ref. No:</span>
                                        <strong class="text-navy font-monospace">CEC-APP-{{ strtoupper(Str::random(5)) }} (Auto)</strong>
                                    </div>
                                    <div class="text-center">
                                        <span class="text-muted small d-block">Membership ID:</span>
                                        <span class="badge bg-light text-secondary border px-3 py-1 font-monospace">For Club Office Use Only</span>
                                    </div>
                                    <div class="text-end">
                                        <span class="text-muted small d-block">Submission Date:</span>
                                        <strong class="text-navy">{{ date('d F, Y') }}</strong>
                                    </div>
                                </div>
                            </div>

                            @if($errors->any())
                                <div class="alert alert-danger p-3 rounded-3 mb-4 shadow-sm">
                                    <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i> Please review and correct the following items:</h6>
                                    <ul class="mb-0 small ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('membership.apply.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- ========================================================
                                     1. PERSONAL INFORMATION (APPLICANT)
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-person-fill me-1"></i> Personal Information (Applicant) :
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">
                                                Full Name : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="full_name" class="form-control liquid-input @error('full_name') is-invalid @enderror" 
                                                   value="{{ old('full_name') }}" placeholder="As per official identification / passport" required>
                                            @error('full_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Father’s Name :</label>
                                            <input type="text" name="father_name" class="form-control liquid-input" value="{{ old('father_name') }}" placeholder="Father's full name">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Mother’s Name :</label>
                                            <input type="text" name="mother_name" class="form-control liquid-input" value="{{ old('mother_name') }}" placeholder="Mother's full name">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Spouse Name :</label>
                                            <input type="text" name="spouse_name" class="form-control liquid-input" value="{{ old('spouse_name') }}" placeholder="Spouse's full name (if applicable)">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Nominee’s Name :</label>
                                            <input type="text" name="nominee_name" class="form-control liquid-input" value="{{ old('nominee_name') }}" placeholder="Nominated successor / emergency nominee">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold text-secondary">Date of Birth :</label>
                                            <input type="date" name="date_of_birth" class="form-control liquid-input @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth') }}">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold text-secondary">Nationality :</label>
                                            <input type="text" name="nationality" class="form-control liquid-input" value="{{ old('nationality', 'Bangladeshi') }}" placeholder="e.g. Bangladeshi">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">
                                                National ID (NID) / Passport No / Birth Certificate / Driving License :
                                            </label>
                                            <input type="text" name="nid_or_passport" class="form-control liquid-input" value="{{ old('nid_or_passport') }}" placeholder="Official ID document number">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Profession / Occupation :</label>
                                            <input type="text" name="profession" class="form-control liquid-input" value="{{ old('profession') }}" placeholder="e.g. Business, Engineer, Doctor, Advocate, Banker">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Company / Organization Name :</label>
                                            <input type="text" name="organization" class="form-control liquid-input" value="{{ old('organization') }}" placeholder="Official workplace or enterprise">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Designation :</label>
                                            <input type="text" name="designation" class="form-control liquid-input" value="{{ old('designation') }}" placeholder="e.g. Managing Director, Partner, General Manager">
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold text-secondary">Gender :</label>
                                            <select name="gender" class="form-select liquid-input">
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label small fw-semibold text-secondary">Blood Group :</label>
                                            <select name="blood_group" class="form-select liquid-input">
                                                <option value="">-- Blood Group --</option>
                                                @foreach(['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $bg)
                                                    <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Recent Photograph (Passport Size) :</label>
                                            <input type="file" name="photo" class="form-control liquid-input @error('photo') is-invalid @enderror" accept="image/jpeg,image/png,image/jpg">
                                            <div class="form-text small" style="font-size: 0.76rem;">Formal recent passport-size photo (JPEG/PNG, max 3MB).</div>
                                            @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     2. CONTACT INFORMATION
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-telephone-inbound-fill me-1"></i> Contact Information :
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Present Address :</label>
                                            <textarea name="present_address" class="form-control liquid-input" rows="2" placeholder="House/Road/Area, City">{{ old('present_address') }}</textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Permanent Address :</label>
                                            <textarea name="permanent_address" class="form-control liquid-input" rows="2" placeholder="Ancestral Village/Post Office/Upazila (Chatkhil / Home)">{{ old('permanent_address') }}</textarea>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold text-secondary">District :</label>
                                            <input type="text" name="district" class="form-control liquid-input" value="{{ old('district', 'Noakhali') }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold text-secondary">Upazila :</label>
                                            <input type="text" name="upazila" class="form-control liquid-input" value="{{ old('upazila', 'Chatkhil') }}">
                                        </div>

                                        <div class="col-md-4">
                                            <label class="form-label small fw-semibold text-secondary">
                                                Mobile Number (WhatsApp) : <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="mobile" class="form-control liquid-input @error('mobile') is-invalid @enderror" 
                                                   value="{{ old('mobile') }}" placeholder="+880 1XXXXXXXXX" required>
                                            @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Alternate Contact / Emergency Contact :</label>
                                            <input type="text" name="emergency_contact" class="form-control liquid-input" value="{{ old('emergency_contact') }}" placeholder="Alternative phone number">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label small fw-semibold text-secondary">Email Address :</label>
                                            <input type="email" name="email" class="form-control liquid-input @error('email') is-invalid @enderror" 
                                                   value="{{ old('email') }}" placeholder="applicant@example.com">
                                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     3. MEMBERSHIP CATEGORY (OFFICIAL 7 CATEGORIES)
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-award-fill me-1"></i> Membership Category :
                                    </div>
                                    <p class="small text-muted mb-3">
                                        Please select your desired club membership category as specified in the Club Constitution:
                                    </p>

                                    <div class="row g-3">
                                        @foreach($types as $type)
                                            <div class="col-md-6 col-lg-4">
                                                <label class="category-selection-card d-block position-relative">
                                                    <div class="d-flex align-items-start gap-2">
                                                        <input class="form-check-input mt-1" type="radio" name="membership_type_id" value="{{ $type->id }}" 
                                                               {{ old('membership_type_id', request('type')) == $type->id ? 'checked' : '' }} required>
                                                        <div>
                                                            <strong class="d-block text-navy font-serif" style="font-size: 1.02rem;">{{ $type->name }}</strong>
                                                            <div class="my-1">
                                                                @if($type->fee > 0)
                                                                    <span class="badge bg-warning text-dark fw-bold">৳{{ number_format($type->fee, 0) }}</span>
                                                                @else
                                                                    <span class="badge bg-success">Conferred</span>
                                                                @endif
                                                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.68rem;">{{ ucfirst($type->validity_type) }}</span>
                                                            </div>
                                                            <p class="text-muted small mb-0" style="font-size: 0.78rem; line-height: 1.4;">
                                                                {{ Str::limit($type->description, 70) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('membership_type_id') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     4. SOCIAL & PROFESSIONAL PROFILE (OPTIONAL)
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-share-fill me-1"></i> Social & Professional Profile (Optional) :
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0 text-primary">
                                                    <i class="bi bi-facebook fs-5"></i>
                                                </span>
                                                <input type="text" name="facebook_profile" class="form-control liquid-input border-start-0" 
                                                       value="{{ old('facebook_profile') }}" placeholder="Facebook ID / URL">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0 text-danger">
                                                    <i class="bi bi-instagram fs-5"></i>
                                                </span>
                                                <input type="text" name="instagram_profile" class="form-control liquid-input border-start-0" 
                                                       value="{{ old('instagram_profile') }}" placeholder="Instagram ID / URL">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white border-end-0 text-info">
                                                    <i class="bi bi-linkedin fs-5"></i>
                                                </span>
                                                <input type="text" name="linkedin_profile" class="form-control liquid-input border-start-0" 
                                                       value="{{ old('linkedin_profile') }}" placeholder="LinkedIn ID / URL">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     5. PROPOSER AND SECONDER RECOMMENDATION
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-people-fill me-1"></i> Proposer and Seconder Recommendation :
                                    </div>
                                    <p class="small text-muted mb-3">
                                        Recommendations facilitate faster verification by the Membership Scrutiny Committee. (If known, enter member names and club IDs):
                                    </p>

                                    <div class="row g-4">
                                        <!-- Proposer -->
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-3" style="background: rgba(250, 247, 242, 0.85); border: 1px solid rgba(197, 160, 89, 0.35);">
                                                <h6 class="fw-bold font-serif text-navy mb-2">
                                                    <i class="bi bi-person-check-fill text-warning me-1"></i> Proposer Recommendation
                                                    <span class="small text-muted fw-normal d-block">(Founder Member)</span>
                                                </h6>
                                                <div class="mb-2">
                                                    <label class="form-label small fw-semibold text-secondary mb-1">Proposer Name :</label>
                                                    <input type="text" name="proposed_by_name" class="form-control liquid-input form-control-sm" 
                                                           value="{{ old('proposed_by_name') }}" placeholder="Name of Founder Member">
                                                </div>
                                                <div>
                                                    <label class="form-label small fw-semibold text-secondary mb-1">Membership ID :</label>
                                                    <input type="text" name="proposed_by_member_id" class="form-control liquid-input form-control-sm" 
                                                           value="{{ old('proposed_by_member_id') }}" placeholder="e.g. CEC-FM-001">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Seconder -->
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-3" style="background: rgba(250, 247, 242, 0.85); border: 1px solid rgba(197, 160, 89, 0.35);">
                                                <h6 class="fw-bold font-serif text-navy mb-2">
                                                    <i class="bi bi-person-check-fill text-warning me-1"></i> Seconder Recommendation
                                                    <span class="small text-muted fw-normal d-block">(Existing Member)</span>
                                                </h6>
                                                <div class="mb-2">
                                                    <label class="form-label small fw-semibold text-secondary mb-1">Seconder Name :</label>
                                                    <input type="text" name="seconder_name" class="form-control liquid-input form-control-sm" 
                                                           value="{{ old('seconder_name') }}" placeholder="Name of Existing Member">
                                                </div>
                                                <div>
                                                    <label class="form-label small fw-semibold text-secondary mb-1">Membership ID :</label>
                                                    <input type="text" name="seconder_member_id" class="form-control liquid-input form-control-sm" 
                                                           value="{{ old('seconder_member_id') }}" placeholder="e.g. CEC-LM-042">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     6. DECLARATION BY APPLICANT
                                     ======================================================== -->
                                <div class="mb-4">
                                    <div class="form-section-header">
                                        <i class="bi bi-shield-check me-1"></i> Declaration by Applicant :
                                    </div>

                                    <div class="declaration-box mb-3">
                                        <p class="mb-2">
                                            <em>“I hereby apply for membership of Chatkhil Elite Club Ltd. I agree to abide by the constitution, 
                                            rules, regulations, code of conduct, and decisions of the Club Authority. I confirm that the 
                                            information provided in this application is true and correct.”</em>
                                        </p>
                                        <p class="mb-0">
                                            <em>“I understand that the Club Authority reserves the right to approve or reject this application 
                                            according to the Club’s policies.”</em>
                                        </p>
                                    </div>

                                    <div class="p-3 rounded-3 mb-4" style="background: rgba(246, 248, 251, 0.9); border: 1px solid #e2e8f0;">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="agree_declaration" id="agree_declaration" required>
                                            <label class="form-check-label small fw-bold text-navy" for="agree_declaration">
                                                I have read, understood, and solemnly agree to the above Declaration and the Constitution of Chatkhil ELITE Club Ltd. <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="is_public_directory" id="is_public_directory" value="1" {{ old('is_public_directory', true) ? 'checked' : '' }}>
                                            <label class="form-check-label small text-muted" for="is_public_directory">
                                                Show my basic member listing (Name, Profession, Member ID) in the club's verified online member directory once approved. (Your phone & email remain confidential unless explicitly shared).
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center py-2">
                                        <button type="submit" class="btn btn-club-gold btn-lg px-5 py-3 fw-bold shadow">
                                            <i class="bi bi-send-check-fill me-2"></i> Submit Application to Club Secretariat
                                        </button>
                                        <p class="small text-muted mt-2 mb-0">
                                            An application tracking token will be generated upon submission.
                                        </p>
                                    </div>
                                </div>

                                <hr class="my-4" style="border-color: rgba(197, 160, 89, 0.25);">

                                <!-- ========================================================
                                     7. FOR CLUB OFFICE USE ONLY (Visual Verification Flow)
                                     ======================================================== -->
                                <div class="p-3 p-md-4 rounded-3" style="background: rgba(241, 245, 249, 0.7); border: 1.5px dashed rgba(148, 163, 184, 0.6);">
                                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                                        <h6 class="font-serif fw-bold text-secondary text-uppercase mb-0" style="letter-spacing: 0.08em; font-size: 0.88rem;">
                                            <i class="bi bi-building-lock me-1"></i> For Club Office Use Only :
                                        </h6>
                                        <span class="badge bg-secondary text-white" style="font-size: 0.72rem;">Administrative Secretariat</span>
                                    </div>

                                    <div class="row g-3 small text-muted">
                                        <div class="col-md-6">
                                            <div class="p-2 bg-white rounded border">
                                                <strong>Membership Category Checked by:</strong>
                                                <div class="text-secondary mt-1">Office Secretary / Scrutiny Panel</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-2 bg-white rounded border">
                                                <strong>Membership Approval Status:</strong>
                                                <div class="text-secondary mt-1">Pending Official Scrutiny & EC Ratification</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-2 bg-white rounded border">
                                                <strong>Approved By (Admin):</strong>
                                                <div class="text-secondary mt-1">Director Membership / Admin</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-2 bg-white rounded border">
                                                <strong>Ratified By (Executive):</strong>
                                                <div class="text-secondary mt-1">President / Executive President</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-3 pt-2 border-top">
                                        <span class="fw-bold text-uppercase" style="letter-spacing: 0.12em; color: var(--liquid-gold-dark); font-size: 0.82rem;">
                                            Official Seal: CHATKHIL ELITE CLUB LTD.
                                        </span>
                                    </div>
                                </div>

                            </form>

                        </div>

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
