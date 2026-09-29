@extends('layouts.admin')

@section('title', 'Pending Membership Applications | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Pending Membership Applications</h3>
            <span class="text-muted small">Applications requiring review and decision by Membership Committee</span>
        </div>
        <a href="{{ route('admin.members.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to All Members
        </a>
    </div>

    @if($members->isEmpty())
        <div class="card border-0 shadow-sm rounded-4 p-5 text-center bg-white">
            <i class="bi bi-check-circle-fill text-success fs-1 mb-3"></i>
            <h5 class="font-serif text-navy">All Caught Up!</h5>
            <p class="text-muted small mb-0">There are currently no pending membership applications awaiting review.</p>
        </div>
    @else
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light small text-muted text-uppercase">
                        <tr>
                            <th>Applicant</th>
                            <th>Category</th>
                            <th>Mobile & Email</th>
                            <th>Profession</th>
                            <th>Proposed By</th>
                            <th>Submission Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $m)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width: 42px; height: 42px; border-radius: 50%; overflow: hidden; background: #0a1424; flex-shrink: 0;">
                                            <img src="{{ $m->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div>
                                            <h6 class="font-serif mb-0 fs-6">
                                                <a href="{{ route('admin.members.show', $m) }}" class="text-navy text-decoration-none fw-bold">
                                                    {{ $m->full_name }}
                                                </a>
                                            </h6>
                                            <small class="text-muted">{{ $m->upazila ?? 'Chatkhil' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        {{ $m->membershipType ? $m->membershipType->name : 'N/A' }}
                                    </span>
                                </td>
                                <td class="small">
                                    <div>{{ $m->mobile }}</div>
                                    <div class="text-muted">{{ $m->email ?: 'No email' }}</div>
                                </td>
                                <td class="small text-muted">
                                    {{ $m->profession ?: 'N/A' }}
                                </td>
                                <td class="small text-muted">
                                    {{ $m->proposed_by_name ?: 'Direct Applicant' }}
                                </td>
                                <td class="small text-muted">
                                    {{ $m->created_at->format('d M, Y') }}
                                </td>
                                <td class="text-end">
                                    <div class="d-flex gap-1 justify-content-end">
                                        <a href="{{ route('admin.members.show', $m) }}" class="btn btn-sm btn-outline-primary" title="Review Dossier">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <!-- Quick Approve Form -->
                                        <form action="{{ route('admin.members.approve', $m) }}" method="POST" onsubmit="return confirm('Approve {{ $m->full_name }}? A unique Member ID and login account will be generated automatically.');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success" title="Approve Membership">
                                                <i class="bi bi-check-lg"></i> Approve
                                            </button>
                                        </form>

                                        <!-- Reject Trigger -->
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $m->id }}" title="Reject Application">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </div>

                                    <!-- Rejection Modal -->
                                    <div class="modal fade" id="rejectModal{{ $m->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog text-start">
                                            <div class="modal-content">
                                                <form action="{{ route('admin.members.reject', $m) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-serif">Reject Application</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="small text-muted">Please provide a brief reason for declining the membership application for <strong>{{ $m->full_name }}</strong>:</p>
                                                        <div class="mb-3">
                                                            <label class="form-label small fw-semibold">Reason for Rejection <span class="text-danger">*</span></label>
                                                            <textarea name="rejection_reason" class="form-control" rows="3" required placeholder="e.g. Incomplete verification, out of area criteria..."></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-sm btn-danger">Confirm Rejection</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-center">
            {{ $members->links('pagination::bootstrap-5') }}
        </div>
    @endif

@endsection
