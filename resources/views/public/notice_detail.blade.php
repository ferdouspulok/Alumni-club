@extends('layouts.public')

@section('title', $notice->title . ' | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('notices.index') }}" class="text-warning text-decoration-none">Notices</a></li>
                    <li class="breadcrumb-item text-light active text-truncate" style="max-width: 300px;" aria-current="page">{{ $notice->title }}</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">{{ $notice->title }}</h1>
            <div class="d-flex flex-wrap gap-3 text-light-50 small mt-3">
                <span><i class="bi bi-calendar-event text-warning me-1"></i> Published: {{ $notice->publish_date->format('F d, Y') }}</span>
                @if($notice->notice_number)
                    <span><i class="bi bi-hash text-warning me-1"></i> Ref: {{ $notice->notice_number }}</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Notice Body -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mb-4" style="border-left: 5px solid var(--club-gold) !important;">
                        <div class="notice-text mb-4" style="font-size: 1.05rem; line-height: 1.85; color: #334155; white-space: pre-line;">
                            {{ $notice->description }}
                        </div>

                        @if($notice->file_attachment)
                            <div class="p-3 bg-light rounded-3 d-flex align-items-center justify-content-between border">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-1"></i>
                                    <div>
                                        <h6 class="mb-0 fw-bold">Official Document Attachment</h6>
                                        <span class="text-muted small">Ratified signed document</span>
                                    </div>
                                </div>
                                <a href="{{ asset('uploads/notices/' . $notice->file_attachment) }}" target="_blank" class="btn btn-club-gold btn-sm">
                                    <i class="bi bi-download me-1"></i> Download PDF
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #f8fafc;">
                        <h5 class="font-serif text-navy mb-3">Other Notices</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($recentNotices as $rNotice)
                                <li class="mb-3 pb-3 border-bottom">
                                    <span class="small text-muted d-block mb-1">{{ $rNotice->publish_date->format('d M, Y') }}</span>
                                    <h6 class="font-serif mb-0 fs-6">
                                        <a href="{{ route('notices.show', $rNotice->slug) }}" class="text-navy text-decoration-none">
                                            {{ $rNotice->title }}
                                        </a>
                                    </h6>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
