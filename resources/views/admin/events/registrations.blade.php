@extends('layouts.admin')

@section('title', 'Event Registrations & RSVPs | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Event Registrations & Attendees</h3>
            <span class="text-muted small">Total Registrations: {{ $registrations->total() }}</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.events.registrations.export', ['event_id' => request('event_id')]) }}" class="btn btn-success btn-sm">
                <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export Attendees (CSV)
            </a>
            <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-calendar-event me-1"></i> All Events
            </a>
        </div>
    </div>

    <!-- Filter by Event -->
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
        <form action="{{ route('admin.events.registrations') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-8">
                <select name="event_id" class="form-select form-select-sm">
                    <option value="">-- All Events --</option>
                    @foreach($events as $e)
                        <option value="{{ $e->id }}" {{ request('event_id') == $e->id ? 'selected' : '' }}>
                            {{ $e->title }} ({{ $e->event_date->format('d M, Y') }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-club-primary w-100">Filter Event</button>
                @if(request('event_id'))
                    <a href="{{ route('admin.events.registrations') }}" class="btn btn-sm btn-outline-secondary" title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
                @endif
            </div>
        </form>
    </div>

    <!-- Registrations Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Attendee Name</th>
                        <th>Event Title</th>
                        <th>Contact Mobile & Email</th>
                        <th>Guests Count</th>
                        <th>Total Fee</th>
                        <th>Payment Status</th>
                        <th>Date Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $r)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-light p-2 rounded-circle text-navy">
                                        <i class="bi bi-person-fill"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">{{ $r->guest_name }}</h6>
                                        @if($r->member && $r->member->member_id)
                                            <span class="badge bg-warning text-dark font-monospace" style="font-size: 0.68rem;">
                                                {{ $r->member->member_id }}
                                            </span>
                                        @else
                                            <span class="text-muted small">Guest / Non-member</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h6 class="font-serif mb-0 fs-6">
                                    {{ $r->event ? $r->event->title : 'N/A' }}
                                </h6>
                            </td>
                            <td class="small">
                                <div><i class="bi bi-telephone text-muted me-1"></i> {{ $r->guest_phone }}</div>
                                @if($r->guest_email)
                                    <div class="text-muted"><i class="bi bi-envelope text-muted me-1"></i> {{ $r->guest_email }}</div>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-navy border font-monospace fs-6">
                                    {{ $r->guest_count }}
                                </span>
                            </td>
                            <td class="fw-bold font-monospace">
                                ৳{{ number_format($r->total_amount, 0) }}
                            </td>
                            <td>
                                @if($r->payment_status === 'paid')
                                    <span class="badge bg-success">Paid</span>
                                @elseif($r->payment_status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @else
                                    <span class="badge bg-info text-dark">Complimentary</span>
                                @endif
                                @if($r->transaction_id)
                                    <div class="small text-muted font-monospace mt-1">Tx: {{ $r->transaction_id }}</div>
                                @endif
                            </td>
                            <td class="small text-muted">
                                {{ $r->created_at->format('d M, Y h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">No registrations found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $registrations->links('pagination::bootstrap-5') }}
    </div>

@endsection
