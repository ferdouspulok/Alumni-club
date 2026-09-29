@extends('layouts.public')

@section('title', 'Events & Gatherings | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Events</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Events & Gatherings</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Reunions, galas, sporting tournaments, and community programs</p>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle">Calendar of Fellowship</span>
                <h2 class="section-main-title">Upcoming Club Events</h2>
            </div>

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-calendar-x fs-1 text-secondary mb-3 d-block"></i>
                    No upcoming events currently scheduled. Check back soon!
                </div>
            @else
                <div class="row g-4">
                    @foreach($upcomingEvents as $event)
                        <div class="col-md-6 col-lg-4">
                            <div class="club-card">
                                <div class="club-card-img-wrap">
                                    <img src="{{ $event->banner_url }}" alt="{{ $event->title }}" class="club-card-img">
                                    <div class="club-date-badge">
                                        <span class="day">{{ $event->event_date->format('d') }}</span>
                                        <span class="month">{{ $event->event_date->format('M Y') }}</span>
                                    </div>
                                </div>
                                <div class="p-4 d-flex flex-column justify-content-between" style="min-height: 250px;">
                                    <div>
                                        <h5 class="font-serif mb-2">
                                            <a href="{{ route('events.show', $event->slug) }}" class="text-navy text-decoration-none">
                                                {{ $event->title }}
                                            </a>
                                        </h5>
                                        <p class="small text-muted mb-2">
                                            <i class="bi bi-geo-alt-fill text-warning me-1"></i> {{ $event->venue }}
                                        </p>
                                        <p class="small text-muted mb-3">
                                            {{ Str::limit($event->short_description, 110) }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                        @if($event->registration_fee > 0)
                                            <span class="badge bg-warning text-dark fw-bold">Fee: ৳{{ number_format($event->registration_fee, 0) }}</span>
                                        @else
                                            <span class="badge bg-success">Complimentary</span>
                                        @endif
                                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-club-primary">
                                            Details & RSVP <i class="bi bi-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $upcomingEvents->links('pagination::bootstrap-5') }}
                </div>
            @endif

            <!-- Past Events Section -->
            @if($pastEvents->isNotEmpty())
                <div class="mt-5 pt-5 border-top">
                    <div class="section-title-wrap mb-4">
                        <span class="section-subtitle">Memories</span>
                        <h3 class="club-heading">Past Events & Programs</h3>
                    </div>
                    <div class="row g-4">
                        @foreach($pastEvents as $pEvent)
                            <div class="col-md-6 col-lg-3">
                                <div class="club-card p-3">
                                    <img src="{{ $pEvent->banner_url }}" alt="{{ $pEvent->title }}" class="rounded-3 w-100 mb-3" style="height: 140px; object-fit: cover;">
                                    <div class="small text-muted mb-1"><i class="bi bi-calendar3 text-warning me-1"></i> {{ $pEvent->event_date->format('d M, Y') }}</div>
                                    <h6 class="font-serif mb-2">
                                        <a href="{{ route('events.show', $pEvent->slug) }}" class="text-navy text-decoration-none">
                                            {{ Str::limit($pEvent->title, 50) }}
                                        </a>
                                    </h6>
                                    <a href="{{ route('events.show', $pEvent->slug) }}" class="small text-muted text-decoration-none">View Archive &rarr;</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>

@endsection
