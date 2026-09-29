@extends('layouts.admin')

@section('title', 'Manage Events | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Events & Reunions</h3>
            <span class="text-muted small">Manage club galas, sporting tournaments, and gatherings</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.events.registrations') }}" class="btn btn-outline-success btn-sm">
                <i class="bi bi-ticket-perforated me-1"></i> View All RSVPs
            </a>
            <a href="{{ route('admin.events.create') }}" class="btn btn-club-gold btn-sm">
                <i class="bi bi-plus-lg me-1"></i> Create Event
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Event Title</th>
                        <th>Event Date & Time</th>
                        <th>Venue</th>
                        <th>Fee</th>
                        <th>Registrations</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $event->banner_url }}" alt="Banner" style="width: 50px; height: 35px; object-fit: cover; border-radius: 4px;">
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold">
                                            <a href="{{ route('events.show', $event->slug) }}" target="_blank" class="text-navy text-decoration-none">
                                                {{ $event->title }}
                                            </a>
                                        </h6>
                                        @if($event->is_featured)
                                            <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="small">
                                <div><i class="bi bi-calendar-event text-warning me-1"></i> {{ $event->event_date->format('d M, Y') }}</div>
                                <div class="text-muted">{{ $event->event_time ?: 'TBA' }}</div>
                            </td>
                            <td class="small text-muted">{{ $event->venue }}</td>
                            <td class="fw-bold font-monospace">
                                {{ $event->registration_fee > 0 ? '৳' . number_format($event->registration_fee, 0) : 'Free' }}
                            </td>
                            <td>
                                <a href="{{ route('admin.events.registrations', ['event_id' => $event->id]) }}" class="badge bg-light text-navy border text-decoration-none font-monospace">
                                    {{ $event->registrations_count }} Attendee(s)
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-{{ $event->status === 'published' ? 'success' : ($event->status === 'draft' ? 'secondary' : 'danger') }}">
                                    {{ ucfirst($event->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.events.registrations', ['event_id' => $event->id]) }}" class="btn btn-sm btn-outline-info" title="View RSVPs">
                                    <i class="bi bi-people"></i>
                                </a>
                                <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this event and registrations?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">No events created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $events->links('pagination::bootstrap-5') }}
    </div>

@endsection
