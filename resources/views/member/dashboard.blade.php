@extends('layouts.member')

@section('title', 'Member Dashboard | Chatkhil Elite Club Limited')

@section('content')

    <!-- Welcome Header Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 text-white" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); border-left: 5px solid var(--club-gold) !important;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2">Active Fellowship</span>
                <h3 class="font-serif text-white mb-1">Welcome back, {{ $user->name }}!</h3>
                <p class="text-light-50 small mb-0">Chatkhil Elite Club Limited — United by Community, Driven by Excellence</p>
            </div>
            <div class="text-md-end">
                <a href="{{ route('member.digital-card') }}" class="btn btn-club-gold btn-sm">
                    <i class="bi bi-qr-code me-1"></i> View Digital ID Card
                </a>
            </div>
        </div>
    </div>

    <!-- Overview Counters -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small text-uppercase fw-bold">Membership ID</span>
                <div class="fs-4 fw-bold font-monospace text-navy">{{ $member ? $member->member_id : 'PENDING' }}</div>
                <span class="small text-success"><i class="bi bi-check-circle-fill me-1"></i> Approved & Active</span>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small text-uppercase fw-bold">Membership Type</span>
                <div class="fs-4 fw-bold text-navy">{{ $member && $member->membershipType ? $member->membershipType->name : 'General' }}</div>
                <span class="small text-muted">{{ $member && $member->membershipType ? ucfirst($member->membershipType->validity_type) : 'Annual' }}</span>
            </div>
        </div>

        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <span class="text-muted small text-uppercase fw-bold">My Registrations</span>
                <div class="fs-4 fw-bold text-navy">{{ $myRegistrations->count() }} Event(s)</div>
                <a href="{{ route('member.my-events') }}" class="small text-navy text-decoration-none">View Details &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Quick Sections: Upcoming Events & Notices -->
    <div class="row g-4">
        <!-- Upcoming Events -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0"><i class="bi bi-calendar-event text-warning me-2"></i> Upcoming Events</h5>
                    <a href="{{ route('events.index') }}" class="small text-navy text-decoration-none">All Events &rarr;</a>
                </div>

                @if($upcomingEvents->isEmpty())
                    <p class="text-muted small my-3">No upcoming events scheduled right now.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($upcomingEvents as $evt)
                            <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="font-serif mb-1 fs-6">
                                        <a href="{{ route('events.show', $evt->slug) }}" class="text-navy text-decoration-none">
                                            {{ $evt->title }}
                                        </a>
                                    </h6>
                                    <div class="small text-muted">
                                        <i class="bi bi-calendar3 text-warning me-1"></i> {{ $evt->event_date->format('d M, Y') }} &bull; {{ $evt->venue }}
                                    </div>
                                </div>
                                <a href="{{ route('events.show', $evt->slug) }}" class="btn btn-sm btn-outline-dark">RSVP</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <!-- Latest Notices -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100 bg-white">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0"><i class="bi bi-megaphone text-warning me-2"></i> Club Notices</h5>
                    <a href="{{ route('notices.index') }}" class="small text-navy text-decoration-none">All Notices &rarr;</a>
                </div>

                @if($latestNotices->isEmpty())
                    <p class="text-muted small my-3">No notices posted recently.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($latestNotices as $not)
                            <div class="list-group-item px-0 py-3">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="badge bg-light text-navy border small">{{ $not->publish_date->format('d M, Y') }}</span>
                                    @if($not->file_attachment)
                                        <span class="badge bg-danger text-white"><i class="bi bi-file-pdf"></i> PDF</span>
                                    @endif
                                </div>
                                <h6 class="font-serif mb-1 fs-6">
                                    <a href="{{ route('notices.show', $not->slug) }}" class="text-navy text-decoration-none">
                                        {{ $not->title }}
                                    </a>
                                </h6>
                                <p class="small text-muted mb-0">{{ Str::limit($not->description, 80) }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
