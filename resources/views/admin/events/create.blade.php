@extends('layouts.admin')

@section('title', 'Create Event | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Create New Club Event</h3>
            <span class="text-muted small">Schedule an upcoming gathering, reunion, or sports program</span>
        </div>
        <a href="{{ route('admin.events.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Events
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label class="form-label small fw-semibold">Event Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}" placeholder="e.g. Grand Annual Reunion & Gala Dinner 2026">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Event Date <span class="text-danger">*</span></label>
                    <input type="date" name="event_date" class="form-control" required value="{{ old('event_date') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Time</label>
                    <input type="text" name="event_time" class="form-control" placeholder="e.g. 05:00 PM – 10:00 PM" value="{{ old('event_time') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Venue Location <span class="text-danger">*</span></label>
                    <input type="text" name="venue" class="form-control" required placeholder="e.g. Club Auditorium, Chatkhil" value="{{ old('venue') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Registration Fee (BDT)</label>
                    <input type="number" name="registration_fee" class="form-control" step="0.01" value="{{ old('registration_fee', 0) }}">
                    <div class="form-text small">Enter 0 for complimentary free events.</div>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Banner Image</label>
                    <input type="file" name="banner_image" class="form-control" accept="image/*">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Short Summary / Highlights</label>
                    <textarea name="short_description" class="form-control" rows="2" placeholder="Brief 1-2 sentence teaser...">{{ old('short_description') }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Detailed Description & Program Itinerary</label>
                    <textarea name="full_description" class="form-control" rows="6" placeholder="Schedule, guest of honor, dress code...">{{ old('full_description') }}</textarea>
                </div>
            </div>

            <div class="d-flex gap-4 mb-4 bg-light p-3 rounded-3 border">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_registration_required" id="is_registration_required" value="1" checked>
                    <label class="form-check-label small fw-semibold" for="is_registration_required">
                        Enable Online RSVP / Attendee Registration
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1">
                    <label class="form-check-label small fw-semibold" for="is_featured">
                        Mark as Featured on Homepage
                    </label>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-calendar-check me-1"></i> Save & Publish Event
                </button>
            </div>
        </form>
    </div>

@endsection
