@extends('layouts.admin')

@section('title', 'View Message: ' . $message->subject)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Inquiry Message Details</h3>
            <span class="text-muted small">From: {{ $message->name }} &bull; {{ $message->created_at->format('M d, Y h:i A') }}</span>
        </div>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Messages
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
        <div class="row g-4 mb-4 pb-4 border-bottom">
            <div class="col-md-4">
                <span class="text-muted small d-block">Sender Name</span>
                <strong class="text-navy font-serif fs-5">{{ $message->name }}</strong>
            </div>
            <div class="col-md-4">
                <span class="text-muted small d-block">Contact Phone</span>
                <a href="tel:{{ $message->phone }}" class="text-navy fw-semibold"><i class="bi bi-telephone text-warning me-1"></i> {{ $message->phone }}</a>
            </div>
            <div class="col-md-4">
                <span class="text-muted small d-block">Email Address</span>
                <a href="mailto:{{ $message->email }}" class="text-navy fw-semibold"><i class="bi bi-envelope text-warning me-1"></i> {{ $message->email ?: 'N/A' }}</a>
            </div>
        </div>

        <div class="mb-4">
            <span class="text-muted small d-block mb-1">Subject</span>
            <h5 class="font-serif text-navy fw-bold">{{ $message->subject }}</h5>
            <div class="p-4 bg-light rounded-3 mt-3 text-dark" style="font-size: 1rem; line-height: 1.8; white-space: pre-line;">
                {{ $message->message }}
            </div>
        </div>

        <!-- Admin Internal Notes -->
        <div class="pt-3 border-top">
            <h6 class="font-serif text-navy mb-2"><i class="bi bi-journal-text text-warning me-1"></i> Internal Secretariat Reply Notes</h6>
            <form action="{{ route('admin.messages.notes', $message) }}" method="POST">
                @csrf
                <div class="row g-2">
                    <div class="col-md-10">
                        <input type="text" name="admin_notes" class="form-control" value="{{ old('admin_notes', $message->admin_notes) }}" placeholder="e.g. Replied by phone on 28th Sep, resolved query...">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-club-primary w-100">Save Note</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
