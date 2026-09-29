@extends('layouts.public')

@section('title', 'Membership Categories & Privileges | Chatkhil ELITE Club Ltd.')
@section('meta_description', 'Official Membership Categories & Fees of Chatkhil ELITE Club Ltd. (Registered under the Companies Act / Applicable Laws of Bangladesh).')

@section('content')

    <!-- Banner Header -->
    <div class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 50%, #152643 100%); border-bottom: 2px solid rgba(197, 160, 89, 0.4);">
        <div class="container position-relative py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center small mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Membership Categories</li>
                </ol>
            </nav>
            <span class="badge bg-warning text-dark px-3 py-1 fw-bold text-uppercase mb-2" style="letter-spacing: 0.1em; font-size: 0.78rem;">
                “Unity • Excellence • Service • Leadership”
            </span>
            <h1 class="font-serif display-5 fw-bold text-white mb-2">Club Membership Categories</h1>
            <p class="lead mb-0 text-light-50" style="color: #cbd5e1;">
                Prestigious fellowship options as defined in the official Constitution of Chatkhil ELITE Club Ltd.
            </p>
        </div>
    </div>

    <!-- Membership Types Section -->
    <div class="py-5" style="background: radial-gradient(at 0% 0%, rgba(223, 196, 136, 0.08) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(16, 28, 49, 0.06) 0px, transparent 50%), #f7f9fc;">
        <div class="container py-3">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle">Official 7 Categories</span>
                <h2 class="section-main-title">Select Your Fellowship Profile</h2>
                <p class="text-muted mt-2" style="max-width: 680px; margin: 0 auto; font-size: 0.95rem;">
                    We welcome accomplished sons and daughters of Chatkhil, as well as distinguished patrons and corporate partners, to join our aristocratic community.
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($types as $type)
                    <div class="col-md-6 col-lg-4">
                        <div class="club-card p-4 text-center d-flex flex-column justify-content-between h-100 position-relative" 
                             style="{{ in_array($type->slug, ['founder-member', 'life-member']) ? 'border: 2px solid var(--liquid-gold) !important; box-shadow: 0 16px 35px rgba(197, 160, 89, 0.22);' : '' }}">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="badge bg-light text-muted border text-uppercase px-2 py-1" style="font-size: 0.72rem;">
                                        {{ ucfirst($type->validity_type) }}
                                    </span>
                                    @if($type->slug === 'founder-member')
                                        <span class="badge bg-warning text-dark text-uppercase fw-bold px-2 py-1" style="font-size: 0.72rem;">Visionary Pioneer</span>
                                    @elseif($type->slug === 'life-member')
                                        <span class="badge bg-warning text-dark text-uppercase fw-bold px-2 py-1" style="font-size: 0.72rem;">Most Prestigious</span>
                                    @endif
                                </div>

                                <h4 class="font-serif fw-bold text-navy mb-2">{{ $type->name }}</h4>
                                <div class="my-3 py-2 rounded-3" style="background: rgba(246, 248, 251, 0.8);">
                                    @if($type->fee > 0)
                                        <span class="fs-2 fw-bold text-navy font-serif">৳{{ number_format($type->fee, 0) }}</span>
                                        <span class="text-muted small d-block">{{ $type->validity_type === 'lifetime' ? 'One-time admission fee' : 'Annual subscription fee' }}</span>
                                    @else
                                        <span class="fs-3 fw-bold text-success font-serif">Conferred Honor</span>
                                        <span class="text-muted small d-block">Nominated by Executive Committee</span>
                                    @endif
                                </div>

                                <p class="small text-muted mb-4" style="line-height: 1.7; min-height: 55px;">
                                    {{ $type->description }}
                                </p>
                            </div>

                            <div class="pt-3 border-top">
                                <a href="{{ route('membership.apply') }}?type={{ $type->id }}" class="btn {{ in_array($type->slug, ['founder-member', 'life-member']) ? 'btn-club-gold' : 'btn-club-primary' }} w-100 fw-bold py-2 shadow-sm">
                                    Apply as {{ $type->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Application & Scrutiny Process -->
            <div class="mt-5 p-4 p-md-5 rounded-4 shadow-sm" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px); border: 1.5px solid rgba(223, 196, 136, 0.4);">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-8">
                        <span class="section-subtitle mb-2">Protocol</span>
                        <h4 class="font-serif text-navy mb-3"><i class="bi bi-shield-lock-fill text-warning me-2"></i> Application & Approval Protocol</h4>
                        <ol class="mb-0 text-muted" style="line-height: 1.85;">
                            <li><strong>Online Form:</strong> Fill out personal, professional, contact, and proposer/seconder details using the official digital form.</li>
                            <li><strong>Secretariat Scrutiny:</strong> The Office Secretary and Membership Scrutiny Committee verify applicant eligibility under Club policies.</li>
                            <li><strong>Executive Ratification:</strong> The Director Membership/Admin and President/Executive President officially ratify the enrollment.</li>
                            <li><strong>Member ID & Credentials:</strong> Official Member ID (e.g. <code>CEC-2026-XXXX</code>) is generated with private login access.</li>
                            <li><strong>Verified Digital Card:</strong> Access your real-time verified club membership card with instant QR-code security badge.</li>
                        </ol>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="p-3 rounded-3" style="background: rgba(250, 247, 242, 0.95); border: 1px dashed var(--liquid-gold);">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 55px; margin-bottom: 10px;">
                            <h6 class="font-serif fw-bold text-navy mb-2">Ready to Apply?</h6>
                            <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg w-100 fw-bold mb-2 shadow">
                                <i class="bi bi-pencil-square me-2"></i> Fill Online Form
                            </a>
                            <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-sm w-100">
                                <i class="bi bi-headset me-1"></i> Contact Secretariat
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
