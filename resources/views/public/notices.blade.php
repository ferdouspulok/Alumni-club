@extends('layouts.public')

@section('title', 'Official Notice Board | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Notice Board</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Official Notice Board</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Official circulars, notifications, and resolutions of Chatkhil Elite Club Limited</p>
        </div>
    </div>

    <!-- Notices List -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($notices->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-clipboard-x fs-1 text-secondary mb-3 d-block"></i>
                    No notices published at this moment.
                </div>
            @else
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-muted small text-uppercase">
                                <tr>
                                    <th style="width: 140px;">Publish Date</th>
                                    <th>Notice Title & Reference</th>
                                    <th class="text-end" style="width: 180px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notices as $notice)
                                    <tr>
                                        <td>
                                            <span class="badge bg-navy text-white" style="background-color: var(--club-navy);">
                                                {{ $notice->publish_date->format('d M, Y') }}
                                            </span>
                                            @if($notice->is_pinned)
                                                <div class="mt-1"><span class="badge bg-warning text-dark"><i class="bi bi-pin-angle-fill"></i> Pinned</span></div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($notice->notice_number)
                                                <div class="small text-muted font-monospace mb-1">Ref: {{ $notice->notice_number }}</div>
                                            @endif
                                            <h6 class="mb-1 font-serif">
                                                <a href="{{ route('notices.show', $notice->slug) }}" class="text-navy text-decoration-none fw-bold">
                                                    {{ $notice->title }}
                                                </a>
                                            </h6>
                                            <p class="small text-muted mb-0">
                                                {{ Str::limit($notice->description, 140) }}
                                            </p>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('notices.show', $notice->slug) }}" class="btn btn-sm btn-outline-secondary me-1">
                                                View
                                            </a>
                                            @if($notice->file_attachment)
                                                <a href="{{ asset('uploads/notices/' . $notice->file_attachment) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Download PDF">
                                                    <i class="bi bi-file-earmark-pdf-fill me-1"></i> PDF
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $notices->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection
