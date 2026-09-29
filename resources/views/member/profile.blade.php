@extends('layouts.member')

@section('title', 'My Profile | Chatkhil Elite Club Limited')

@section('content')

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 pb-4 mb-4 border-bottom">
            <div class="d-flex align-items-center gap-3">
                <div style="width: 80px; height: 80px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424;">
                    <img src="{{ $member ? $member->photo_url : asset('images/avatar-placeholder.png') }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div>
                    <h3 class="font-serif text-navy mb-1">{{ $user->name }}</h3>
                    <div class="badge bg-warning text-dark font-monospace">{{ $member ? $member->member_id : 'MEMBER' }}</div>
                    <span class="badge bg-success ms-1">Active Status</span>
                </div>
            </div>
            <div>
                <a href="{{ route('member.profile.edit') }}" class="btn btn-club-primary btn-sm">
                    <i class="bi bi-pencil-square me-1"></i> Edit Profile & Privacy
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Personal Info -->
            <div class="col-md-6">
                <h5 class="font-serif text-navy mb-3"><i class="bi bi-person-fill text-warning me-2"></i> Personal Details</h5>
                <table class="table table-sm text-muted">
                    <tr>
                        <th class="text-navy" style="width: 160px;">Mobile:</th>
                        <td>{{ $member ? $member->mobile : $user->phone }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Email:</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Blood Group:</th>
                        <td><span class="badge bg-danger">{{ $member ? $member->blood_group : 'Not specified' }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-navy">Emergency Contact:</th>
                        <td>{{ $member ? $member->emergency_contact : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Father's Name:</th>
                        <td>{{ $member ? $member->father_name : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Mother's Name:</th>
                        <td>{{ $member ? $member->mother_name : 'N/A' }}</td>
                    </tr>
                </table>
            </div>

            <!-- Professional & Address -->
            <div class="col-md-6">
                <h5 class="font-serif text-navy mb-3"><i class="bi bi-briefcase-fill text-warning me-2"></i> Professional & Address</h5>
                <table class="table table-sm text-muted">
                    <tr>
                        <th class="text-navy" style="width: 160px;">Profession:</th>
                        <td>{{ $member ? $member->profession : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Organization:</th>
                        <td>{{ $member ? $member->organization : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Designation:</th>
                        <td>{{ $member ? $member->designation : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Present Address:</th>
                        <td>{{ $member ? $member->present_address : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Permanent Address:</th>
                        <td>{{ $member ? $member->permanent_address : 'N/A' }}, {{ $member ? $member->upazila : 'Chatkhil' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Privacy Flags Status -->
        <div class="mt-4 p-3 bg-light rounded-3 border">
            <h6 class="font-serif text-navy mb-2"><i class="bi bi-shield-lock text-warning me-2"></i> Directory Privacy Settings:</h6>
            <div class="row g-2 small text-muted">
                <div class="col-sm-4">
                    Public Directory Listing: 
                    @if($member && $member->is_public_directory)
                        <span class="badge bg-success">Visible</span>
                    @else
                        <span class="badge bg-secondary">Hidden</span>
                    @endif
                </div>
                <div class="col-sm-4">
                    Phone in Directory: 
                    @if($member && $member->show_phone_public)
                        <span class="badge bg-success">Public</span>
                    @else
                        <span class="badge bg-secondary">Protected (Private)</span>
                    @endif
                </div>
                <div class="col-sm-4">
                    Email in Directory: 
                    @if($member && $member->show_email_public)
                        <span class="badge bg-success">Public</span>
                    @else
                        <span class="badge bg-secondary">Protected (Private)</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
