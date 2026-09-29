@extends('layouts.member')

@section('title', 'My Event Registrations | Chatkhil Elite Club Limited')

@section('content')

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <h4 class="font-serif text-navy mb-1">My Event Registrations</h4>
        <p class="text-muted small mb-4">History of your RSVPs and event admissions</p>

        @if($myRegistrations->isEmpty())
            <div class="text-center py-5 text-muted border rounded-3 mb-4">
                <i class="bi bi-calendar-x fs-1 text-secondary mb-2 d-block"></i>
                You have not registered for any events yet.
            </div>
        @else
            <div class="table-responsive mb-4">
                <table class="table table-hover align-middle">
                    <thead class="bg-light small text-uppercase text-muted">
                        <tr>
                            <th>Event Title</th>
                            <th>Date & Time</th>
                            <th>Venue</th>
                            <th>Guests</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($myRegistrations as $reg)
                            <tr>
                                <td>
                                    <h6 class="font-serif mb-0 fs-6">
                                        <a href="{{ route('events.show', $reg->event->slug) }}" class="text-navy text-decoration-none fw-bold">
                                            {{ $reg->event->title }}
                                        </a>
                                    </h6>
                                </td>
                                <td class="small text-muted">
                                    {{ $reg->event->event_date->format('d M, Y') }}
                                </td>
                                <td class="small text-muted">{{ $reg->event->venue }}</td>
                                <td><span class="badge bg-light text-navy border">{{ $reg->guest_count }} Person(s)</span></td>
                                <td class="fw-bold font-monospace">৳{{ number_format($reg->total_amount, 0) }}</td>
                                <td>
                                    @if($reg->payment_status === 'paid')
                                        <span class="badge bg-success">Confirmed</span>
                                    @elseif($reg->payment_status === 'pending')
                                        <span class="badge bg-warning text-dark">Payment Pending</span>
                                    @else
                                        <span class="badge bg-info text-dark">Complimentary</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <h5 class="font-serif text-navy mt-4 mb-3">Other Upcoming Gatherings</h5>
        <div class="row g-3">
            @foreach($upcomingEvents as $evt)
                <div class="col-md-6">
                    <div class="p-3 border rounded-3 d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="font-serif mb-1 fs-6">{{ $evt->title }}</h6>
                            <span class="small text-muted"><i class="bi bi-calendar3 text-warning me-1"></i> {{ $evt->event_date->format('d M, Y') }}</span>
                        </div>
                        <a href="{{ route('events.show', $evt->slug) }}" class="btn btn-sm btn-club-primary">RSVP</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
