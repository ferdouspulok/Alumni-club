@extends('layouts.public')

@section('title', 'Membership Categories & Privileges | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Membership</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Membership Categories</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Prestigious community fellowship options at Chatkhil Elite Club Limited</p>
        </div>
    </div>

    <!-- Membership Types Cards -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle">Membership Types & Fees</span>
                <h2 class="section-main-title">Choose Your Club Fellowship</h2>
                <p class="text-muted mt-2" style="max-width: 680px; margin: 0 auto;">
                    We welcome citizens of integrity with roots or connection to Chatkhil who share our devotion to mutual progress, cultural celebration, and community welfare.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($types as $type)
                    <div class="col-md-6 col-lg-3">
                        <div class="club-card p-4 text-center d-flex flex-column justify-content-between h-100" style="{{ $type->slug === 'life-member' ? 'border: 2px solid var(--club-gold); box-shadow: 0 10px 25px rgba(197, 155, 39, 0.2);' : '' }}">
                            <div>
                                @if($type->slug === 'life-member')
                                    <div class="badge bg-warning text-dark text-uppercase fw-bold mb-3 px-3 py-1">Most Prestigious</div>
                                @else
                                    <div class="badge bg-light text-muted border text-uppercase mb-3 px-3 py-1">{{ ucfirst($type->validity_type) }}</div>
                                @endif

                                <h4 class="font-serif fw-bold text-navy mb-2">{{ $type->name }}</h4>
                                <div class="my-3">
                                    <span class="fs-2 fw-bold text-navy font-serif">৳{{ number_format($type->fee, 0) }}</span>
                                    <span class="text-muted small d-block">
                                        {{ $type->validity_type === 'lifetime' ? 'One-time admission' : 'Annual subscription' }}
                                    </span>
                                </div>
                                <hr class="my-3">
                                <p class="small text-muted mb-4" style="line-height: 1.6; min-height: 60px;">
                                    {{ $type->description }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('membership.apply') }}?type={{ $type->id }}" class="btn {{ $type->slug === 'life-member' ? 'btn-club-gold' : 'btn-club-primary' }} w-100">
                                    Apply as {{ $type->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Eligibility & Steps -->
            <div class="mt-5 p-4 p-md-5 rounded-4 bg-light border">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <h4 class="font-serif text-navy mb-3"><i class="bi bi-patch-check-fill text-warning me-2"></i> Application & Approval Process</h4>
                        <ol class="mb-0 text-muted" style="line-height: 1.8;">
                            <li><strong>Online Submission:</strong> Complete the digital membership application form with personal, professional, and reference details.</li>
                            <li><strong>Scrutiny & Review:</strong> The Executive Committee verifies the applicant's credentials and references.</li>
                            <li><strong>Approval & Member ID:</strong> Upon approval, a unique Member ID (e.g. <code>CEC-2026-XXXX</code>) and member portal account are issued.</li>
                            <li><strong>Digital Membership Card:</strong> Access your verified digital card with an instant QR-code verification badge immediately.</li>
                        </ol>
                    </div>
                    <div class="col-lg-4 text-center">
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg w-100 mb-2">
                            <i class="bi bi-pencil-square me-2"></i> Start Application
                        </a>
                        <a href="{{ route('documents.index') }}" class="btn btn-outline-secondary btn-sm w-100">
                            <i class="bi bi-download me-1"></i> Download Printable Form
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
