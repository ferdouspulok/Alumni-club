@extends('layouts.admin')

@section('title', $member->full_name . ' | Member Dossier')

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Member Dossier & Application</h3>
            <span class="text-muted small">Record ID: #{{ $member->id }} &bull; Submitted on {{ $member->created_at->format('M d, Y h:i A') }}</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Members
            </a>
            <a href="{{ route('admin.members.edit', $member) }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-pencil me-1"></i> Edit Details
            </a>

            @if($member->status === 'pending')
                <form action="{{ route('admin.members.approve', $member) }}" method="POST" class="d-inline" onsubmit="return confirm('Approve this member? A unique Member ID and login credentials will be generated.');">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">
                        <i class="bi bi-check-circle me-1"></i> Approve Membership
                    </button>
                </form>

                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#rejectModal">
                    <i class="bi bi-x-circle me-1"></i> Reject
                </button>
            @endif
        </div>
    </div>

    <!-- Status Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div class="d-flex align-items-center gap-3">
                <div style="width: 85px; height: 85px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424; flex-shrink: 0;">
                    <img src="{{ $member->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div>
                    <h3 class="font-serif text-navy mb-1">{{ $member->full_name }}</h3>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <span class="badge bg-warning text-dark font-monospace fs-6">{{ $member->member_id ?? 'PENDING ID' }}</span>
                        <span class="badge bg-light text-navy border">{{ $member->membershipType ? $member->membershipType->name : 'N/A' }}</span>
                        @if($member->status === 'approved')
                            <span class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i> Approved Member</span>
                        @elseif($member->status === 'pending')
                            <span class="badge bg-warning text-dark"><i class="bi bi-clock-history me-1"></i> Pending Verification</span>
                        @elseif($member->status === 'rejected')
                            <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i> Application Rejected</span>
                        @endif
                    </div>
                </div>
            </div>

            @if($member->member_id)
                <div>
                    <a href="{{ route('verify.member', $member->member_id) }}" target="_blank" class="btn btn-outline-dark btn-sm">
                        <i class="bi bi-qr-code me-1"></i> Test Public QR Verification
                    </a>
                </div>
            @endif
        </div>

        @if($member->status === 'rejected' && $member->rejection_reason)
            <div class="alert alert-danger mt-3 mb-0 small">
                <strong>Rejection Reason:</strong> {{ $member->rejection_reason }}
            </div>
        @endif
    </div>

    <!-- Detailed Tabs & Profile Info -->
    <div class="row g-4">
        <!-- Personal Information -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <h5 class="font-serif text-navy mb-3"><i class="bi bi-person-fill text-warning me-2"></i> Personal Information</h5>
                <table class="table table-sm text-muted">
                    <tr>
                        <th class="text-navy" style="width: 170px;">Full Name:</th>
                        <td class="text-dark fw-semibold">{{ $member->full_name }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Mobile Number:</th>
                        <td>{{ $member->mobile }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Email Address:</th>
                        <td>{{ $member->email ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Gender / DOB:</th>
                        <td>{{ ucfirst($member->gender) }} &bull; {{ $member->date_of_birth ? $member->date_of_birth->format('d M, Y') : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Blood Group:</th>
                        <td><span class="badge bg-danger">{{ $member->blood_group ?: 'N/A' }}</span></td>
                    </tr>
                    <tr>
                        <th class="text-navy">Father's Name:</th>
                        <td>{{ $member->father_name ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Mother's Name:</th>
                        <td>{{ $member->mother_name ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Spouse's Name:</th>
                        <td>{{ $member->spouse_name ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Emergency Contact:</th>
                        <td>{{ $member->emergency_contact ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">NID / Passport:</th>
                        <td>{{ $member->nid_or_passport ?: 'N/A' }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Professional & Club Information -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <h5 class="font-serif text-navy mb-3"><i class="bi bi-briefcase-fill text-warning me-2"></i> Professional & Club Data</h5>
                <table class="table table-sm text-muted">
                    <tr>
                        <th class="text-navy" style="width: 170px;">Profession:</th>
                        <td class="text-dark fw-semibold">{{ $member->profession ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Organization:</th>
                        <td>{{ $member->organization ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Designation:</th>
                        <td>{{ $member->designation ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Present Address:</th>
                        <td>{{ $member->present_address ?: 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Permanent Address:</th>
                        <td>{{ $member->permanent_address ?: 'N/A' }}, {{ $member->upazila }}, {{ $member->district }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Proposed By:</th>
                        <td>{{ $member->proposed_by_name ?: 'Direct Application' }} @if($member->proposed_by_member_id) ({{ $member->proposed_by_member_id }}) @endif</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Approved By:</th>
                        <td>{{ $member->approver ? $member->approver->name : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Approval Date:</th>
                        <td>{{ $member->approved_at ? $member->approved_at->format('M d, Y h:i A') : 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="text-navy">Directory Listing:</th>
                        <td>{{ $member->is_public_directory ? 'Visible' : 'Hidden' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- Payments Ledger Record -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mt-4">
        <h5 class="font-serif text-navy mb-3"><i class="bi bi-cash-stack text-warning me-2"></i> Payments & Subscription Ledger</h5>
        @if($member->payments->isEmpty())
            <p class="text-muted small mb-0">No recorded payments for this member.</p>
        @else
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-0">
                    <thead class="bg-light small text-muted">
                        <tr>
                            <th>Date</th>
                            <th>Purpose</th>
                            <th>Method</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member->payments as $pay)
                            <tr>
                                <td class="small">{{ $pay->payment_date ? $pay->payment_date->format('d M, Y') : $pay->created_at->format('d M, Y') }}</td>
                                <td class="text-capitalize">{{ str_replace('_', ' ', $pay->purpose) }}</td>
                                <td class="text-uppercase font-monospace small">{{ $pay->payment_method }}</td>
                                <td class="font-monospace small">{{ $pay->transaction_id ?: 'N/A' }}</td>
                                <td class="fw-bold font-monospace">৳{{ number_format($pay->amount, 0) }}</td>
                                <td>
                                    <span class="badge bg-{{ $pay->status === 'verified' ? 'success' : 'warning' }}">
                                        {{ ucfirst($pay->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <!-- Reject Modal -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.members.reject', $member) }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Decline Application</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label small fw-semibold">Reason for Declining <span class="text-danger">*</span></label>
                        <textarea name="rejection_reason" class="form-control" rows="3" required placeholder="Specify reason for administrative record..."></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-danger">Confirm Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
