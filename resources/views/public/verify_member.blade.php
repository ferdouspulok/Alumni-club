@extends('layouts.public')

@section('title', 'Member Verification | Chatkhil Elite Club Limited')

@section('content')

    <div class="py-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">

                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden text-center">
                        <div class="p-4" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
                            <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="height: 65px; filter: drop-shadow(0 2px 8px rgba(197, 155, 39, 0.5));">
                            <h4 class="font-serif text-white mt-2 mb-0">Chatkhil Elite Club Limited</h4>
                            <span class="text-warning small text-uppercase fw-bold letter-spacing-1">Official Member Verification</span>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            @if($member && $member->status === 'approved')
                                <div class="mb-4">
                                    <div class="d-inline-flex p-3 rounded-circle bg-success bg-opacity-10 text-success fs-1 mb-2">
                                        <i class="bi bi-shield-fill-check"></i>
                                    </div>
                                    <h4 class="text-success fw-bold font-serif mb-1">Verified Active Member</h4>
                                    <span class="text-muted small">Chatkhil Elite Club Limited</span>
                                </div>

                                <div class="mx-auto mb-3" style="width: 110px; height: 110px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                                    <img src="{{ $member->photo_url }}" alt="{{ $member->full_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>

                                <h3 class="font-serif text-navy fw-bold mb-1">{{ $member->full_name }}</h3>
                                <div class="badge bg-warning text-dark font-monospace fs-6 px-3 py-1 mb-3">
                                    {{ $member->member_id }}
                                </div>

                                <div class="bg-light p-3 rounded-3 text-start small mb-4 border">
                                    <div class="d-flex justify-content-between py-1 border-bottom">
                                        <span class="text-muted">Membership Category:</span>
                                        <span class="fw-bold text-navy">{{ $member->membershipType ? $member->membershipType->name : 'Member' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-1 border-bottom">
                                        <span class="text-muted">Profession:</span>
                                        <span class="fw-bold text-navy">{{ $member->profession ?: 'Respected Member' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-1 border-bottom">
                                        <span class="text-muted">Origin / District:</span>
                                        <span class="fw-bold text-navy">{{ $member->upazila ?? 'Chatkhil' }}, {{ $member->district ?? 'Noakhali' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between py-1">
                                        <span class="text-muted">Membership Status:</span>
                                        <span class="badge bg-success">Active & Verified</span>
                                    </div>
                                </div>

                                <div class="text-muted small fst-italic">
                                    <i class="bi bi-clock-history me-1"></i> Verified online via Official Club Database on {{ now()->format('M d, Y h:i A') }}
                                </div>
                            @else
                                <div class="mb-4">
                                    <div class="d-inline-flex p-3 rounded-circle bg-danger bg-opacity-10 text-danger fs-1 mb-2">
                                        <i class="bi bi-shield-fill-x"></i>
                                    </div>
                                    <h4 class="text-danger fw-bold font-serif mb-1">Unverified Member ID</h4>
                                    <span class="text-muted small">Record Not Found or Inactive</span>
                                </div>

                                <p class="text-muted small mb-4">
                                    The member identification number <strong>"{{ $memberId }}"</strong> could not be verified in the active membership roster of Chatkhil Elite Club Limited.
                                </p>

                                <a href="{{ route('contact') }}" class="btn btn-sm btn-outline-secondary">Contact Secretariat for Assistance</a>
                            @endif
                        </div>

                        <div class="card-footer bg-light py-3 border-top small text-muted">
                            Official Registry of Chatkhil Elite Club Limited, Bangladesh
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
