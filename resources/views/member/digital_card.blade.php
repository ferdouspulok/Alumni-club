@extends('layouts.member')

@section('title', 'Digital Membership Card | Chatkhil Elite Club Limited')

@section('content')

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4 pb-3 border-bottom">
            <div>
                <h4 class="font-serif text-navy mb-1">Digital Membership Card</h4>
                <p class="text-muted small mb-0">Official identification for Chatkhil Elite Club Limited</p>
            </div>
            <div class="no-print">
                <button type="button" class="btn btn-club-gold btn-sm" onclick="window.print()">
                    <i class="bi bi-printer-fill me-1"></i> Print / Save Card
                </button>
            </div>
        </div>

        @if(!$member || $member->status !== 'approved')
            <div class="alert alert-warning text-center p-4">
                <i class="bi bi-hourglass-split fs-2 d-block mb-2"></i>
                <h5>Membership Card Pending Approval</h5>
                <p class="mb-0 small">Your digital membership card and verifiable QR code will be generated once your application is formally approved by the executive secretariat.</p>
            </div>
        @else

            <!-- Digital Card Component -->
            <div class="py-4">
                <div class="digital-id-card">
                    <!-- Card Header -->
                    <div class="id-card-header">
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="id-card-logo">
                            <div>
                                <div class="text-white fw-bold font-serif" style="font-size: 0.95rem; line-height: 1.1;">CHATKHIL ELITE CLUB</div>
                                <div class="text-warning small text-uppercase" style="font-size: 0.65rem; letter-spacing: 1px;">LIMITED</div>
                            </div>
                        </div>
                        <div class="id-card-club-name text-end">
                            <span class="badge bg-warning text-dark text-uppercase px-2 py-1" style="font-size: 0.65rem;">
                                {{ $member->membershipType ? $member->membershipType->name : 'MEMBER' }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="id-card-body">
                        <div class="id-photo-box">
                            <img src="{{ $member->photo_url }}" alt="{{ $member->full_name }}">
                        </div>

                        <div class="id-details">
                            <div class="id-member-name">{{ $member->full_name }}</div>
                            <div class="id-member-no font-monospace">{{ $member->member_id }}</div>
                            @if($member->profession)
                                <div class="small text-light-50 mt-1" style="font-size: 0.78rem;">{{ $member->profession }}</div>
                            @endif
                            <div class="id-type-badge font-monospace">
                                Blood: {{ $member->blood_group ?: 'O+' }}
                            </div>
                        </div>

                        <div class="id-qr-box">
                            @if($qrCodeData)
                                <img src="{{ $qrCodeData }}" alt="Verification QR">
                            @else
                                <div class="small text-dark text-center" style="font-size: 0.6rem;">Scan to Verify</div>
                            @endif
                        </div>
                    </div>

                    <!-- Card Footer -->
                    <div class="id-card-footer">
                        <span>Issued: {{ $member->approved_at ? $member->approved_at->format('M Y') : '2026' }}</span>
                        <span>Validity: {{ $member->membershipType && $member->membershipType->validity_type === 'lifetime' ? 'LIFETIME' : 'ANNUAL' }}</span>
                        <span>Chatkhil, Noakhali</span>
                    </div>
                </div>
            </div>

            <!-- Card Usage Notice -->
            <div class="text-center mt-3 text-muted small no-print">
                <i class="bi bi-shield-check text-warning me-1"></i>
                This card carries a dynamic verifiable QR code pointing to 
                <a href="{{ $member->verification_url }}" target="_blank" class="text-navy text-decoration-none fw-semibold">
                    {{ $member->verification_url }}
                </a>.
                Show this card for admission to club premises, partner facilities, and annual gatherings.
            </div>

        @endif

    </div>

@endsection
