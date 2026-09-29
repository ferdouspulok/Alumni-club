@extends('layouts.admin')

@section('title', 'Admin Dashboard | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Overview & Management Dashboard</h3>
            <span class="text-muted small">Chatkhil Elite Club Limited, Noakhali, Bangladesh</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.members.pending') }}" class="btn btn-danger btn-sm">
                <i class="bi bi-clock-history me-1"></i> Pending Applications ({{ $stats['pending_applications'] }})
            </a>
            <a href="{{ route('admin.members.create') }}" class="btn btn-club-gold btn-sm">
                <i class="bi bi-person-plus me-1"></i> Add Member
            </a>
        </div>
    </div>

    <!-- Statistics Counters -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-primary">
                <span class="text-muted small text-uppercase fw-bold">Total Members</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['total_members'] }}</div>
                <span class="small text-success"><i class="bi bi-check-circle me-1"></i> {{ $stats['active_members'] }} Active</span>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-warning">
                <span class="text-muted small text-uppercase fw-bold">Pending Applications</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['pending_applications'] }}</div>
                <a href="{{ route('admin.members.pending') }}" class="small text-danger text-decoration-none">Needs Review &rarr;</a>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-info">
                <span class="text-muted small text-uppercase fw-bold">Life Members</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['life_members'] }}</div>
                <span class="small text-muted">Prestigious Fellowship</span>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-success">
                <span class="text-muted small text-uppercase fw-bold">Upcoming Events</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['upcoming_events'] }}</div>
                <a href="{{ route('admin.events.index') }}" class="small text-navy text-decoration-none">Manage Events &rarr;</a>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Total News</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['total_news'] }}</div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Notices Board</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['total_notices'] }}</div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Photo Albums</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['gallery_albums'] }}</div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Unread Messages</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['unread_messages'] }}</div>
            </div>
        </div>
    </div>

    <!-- Recent Applications & Inquiries -->
    <div class="row g-4">
        <!-- Recent Applications -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0">Recent Membership Applications</h5>
                    <a href="{{ route('admin.members.index') }}" class="small text-navy text-decoration-none">View All &rarr;</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small text-muted text-uppercase">
                            <tr>
                                <th>Applicant</th>
                                <th>Category</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentApplications as $app)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div style="width: 38px; height: 38px; border-radius: 50%; overflow: hidden; background: #0a1424;">
                                                <img src="{{ $app->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fs-6 font-serif">
                                                    <a href="{{ route('admin.members.show', $app) }}" class="text-navy text-decoration-none">
                                                        {{ $app->full_name }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">{{ $app->profession ?: 'Applicant' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-navy border">
                                            {{ $app->membershipType ? $app->membershipType->name : 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="small font-monospace">{{ $app->mobile }}</td>
                                    <td>
                                        @if($app->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($app->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($app->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($app->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.members.show', $app) }}" class="btn btn-sm btn-outline-secondary">
                                            Review
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No applications found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0">Recent Inquiries</h5>
                    <a href="{{ route('admin.messages.index') }}" class="small text-navy text-decoration-none">All Messages &rarr;</a>
                </div>

                @if($recentMessages->isEmpty())
                    <p class="text-muted small my-3">No messages received yet.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($recentMessages as $msg)
                            <div class="list-group-item px-0 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold small text-navy">{{ $msg->name }}</span>
                                    <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="small fw-semibold text-truncate mb-1">{{ $msg->subject }}</div>
                                <p class="small text-muted mb-2 text-truncate">{{ $msg->message }}</p>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="small text-navy text-decoration-none">View Message &rarr;</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
