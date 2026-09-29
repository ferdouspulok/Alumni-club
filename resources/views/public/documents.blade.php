@extends('layouts.public')

@section('title', 'Documents & Downloads | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Downloads</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Documents & Downloads</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Official ratified constitution, circulars, reports, and membership application forms</p>
        </div>
    </div>

    <!-- Documents List -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($documents->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-folder-x fs-1 text-secondary mb-3 d-block"></i>
                    No public documents uploaded at this time.
                </div>
            @else
                @foreach($documents as $category => $docs)
                    <div class="mb-5">
                        <h4 class="font-serif text-navy mb-3 text-capitalize pb-2 border-bottom">
                            <i class="bi bi-folder-fill text-warning me-2"></i> {{ str_replace('_', ' ', $category) }}s
                        </h4>

                        <div class="row g-3">
                            @foreach($docs as $doc)
                                <div class="col-md-6">
                                    <div class="card border rounded-3 p-3 h-100 d-flex flex-row justify-content-between align-items-center shadow-sm">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="bg-light p-2 rounded-2 text-danger fs-2">
                                                <i class="bi bi-file-earmark-pdf-fill"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 font-serif fw-bold text-navy">{{ $doc->title }}</h6>
                                                <span class="text-muted small">
                                                    @if($doc->file_size) <span class="badge bg-light text-muted border me-1">{{ $doc->file_size }}</span> @endif
                                                    {{ $doc->created_at->format('M d, Y') }}
                                                </span>
                                                @if($doc->description)
                                                    <p class="small text-muted mb-0 mt-1">{{ Str::limit($doc->description, 80) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ $doc->download_url }}" target="_blank" class="btn btn-sm btn-club-primary ms-2 text-nowrap">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
