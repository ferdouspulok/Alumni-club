@extends('layouts.public')

@section('title', $event->title . ' | Chatkhil Elite Club Limited')
@section('meta_description', $event->short_description)

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('events.index') }}" class="text-warning text-decoration-none">Events</a></li>
                    <li class="breadcrumb-item text-light active text-truncate" style="max-width: 300px;" aria-current="page">{{ $event->title }}</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">{{ $event->title }}</h1>
            <div class="d-flex flex-wrap gap-4 text-light-50 small mt-3">
                <span><i class="bi bi-calendar-event text-warning me-1"></i> {{ $event->event_date->format('l, F d, Y') }}</span>
                @if($event->event_time)
                    <span><i class="bi bi-clock text-warning me-1"></i> {{ $event->event_time }}</span>
                @endif
                <span><i class="bi bi-geo-alt text-warning me-1"></i> {{ $event->venue }}</span>
            </div>
        </div>
    </div>

    <!-- Event Body & Registration -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img src="{{ $event->banner_url }}" alt="{{ $event->title }}" class="img-fluid rounded-4 shadow-sm w-100 mb-4" style="max-height: 440px; object-fit: cover;">

                    <div class="event-description" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
                        @if($event->full_description)
                            {!! $event->full_description !!}
                        @else
                            <p>{{ $event->short_description }}</p>
                        @endif
                    </div>
                </div>

                <!-- Registration Card Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 100px; border-top: 4px solid var(--club-gold) !important;">
                        <h4 class="font-serif text-navy mb-3"><i class="bi bi-ticket-perforated-fill text-warning me-2"></i> Event Registration</h4>

                        <div class="bg-light p-3 rounded-3 mb-3 small">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Registration Fee:</span>
                                <span class="fw-bold text-navy">
                                    {{ $event->registration_fee > 0 ? '৳' . number_format($event->registration_fee, 0) . ' / Person' : 'Free' }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Date:</span>
                                <span class="fw-bold text-navy">{{ $event->event_date->format('d M, Y') }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-0">
                                <span class="text-muted">Venue:</span>
                                <span class="fw-bold text-navy text-end" style="max-width: 170px;">{{ $event->venue }}</span>
                            </div>
                        </div>

                        @if($event->status !== 'published')
                            <div class="alert alert-secondary text-center small mb-0">
                                Registration for this event is closed.
                            </div>
                        @else
                            <form action="{{ route('events.register', $event->slug) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="guest_name" class="form-control form-control-sm" value="{{ auth()->check() ? auth()->user()->name : old('guest_name') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="guest_phone" class="form-control form-control-sm" value="{{ auth()->check() ? auth()->user()->phone : old('guest_phone') }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Email Address</label>
                                    <input type="email" name="guest_email" class="form-control form-control-sm" value="{{ auth()->check() ? auth()->user()->email : old('guest_email') }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Number of Attendees / Guests <span class="text-danger">*</span></label>
                                    <select name="guest_count" class="form-select form-select-sm" required>
                                        @for($i=1; $i<=6; $i++)
                                            <option value="{{ $i }}" {{ old('guest_count') == $i ? 'selected' : '' }}>{{ $i }} Person{{ $i > 1 ? 's' : '' }}</option>
                                        @endfor
                                    </select>
                                </div>

                                @if($event->registration_fee > 0)
                                    <div class="p-2 mb-3 rounded bg-light border small text-muted">
                                        <p class="mb-1 text-navy fw-bold"><i class="bi bi-info-circle text-warning me-1"></i> Payment Options:</p>
                                        bKash/Nagad (Merchant): <strong>01819-234567</strong><br>
                                        Bank: Islami Bank Chatkhil Br. (A/C: 2050...)
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label small fw-semibold">Transaction ID (if paid)</label>
                                        <input type="text" name="transaction_id" class="form-control form-control-sm" placeholder="bKash / Nagad TxID" value="{{ old('transaction_id') }}">
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold">Special Notes / Family Details</label>
                                    <textarea name="notes" class="form-control form-control-sm" rows="2" placeholder="Accompanying members...">{{ old('notes') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-club-gold w-100 fw-bold py-2">
                                    <i class="bi bi-check2-circle me-1"></i> Confirm RSVP & Register
                                </button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
