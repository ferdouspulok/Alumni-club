@extends('layouts.public')

@section('title', 'Chatkhil ELITE Club Ltd. | Official Web Portal')
@section('meta_description', 'Official portal of Chatkhil ELITE Club Ltd. (Registered under the Companies Act / Applicable Laws of Bangladesh). Unity • Excellence • Service • Leadership.')

@section('content')

    <!-- Liquid Glass Hero Section -->
    <section class="club-hero position-relative overflow-hidden">
        <div class="container club-hero-content position-relative py-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-7 text-center text-lg-start">
                    
                    <!-- Official Motto Pill -->
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" 
                         style="background: rgba(197, 160, 89, 0.15); border: 1px solid rgba(197, 160, 89, 0.4); backdrop-filter: blur(10px);">
                        <i class="bi bi-star-fill text-warning" style="font-size: 0.75rem;"></i>
                        <span class="text-warning fw-bold text-uppercase" style="letter-spacing: 0.12em; font-size: 0.78rem;">
                            “Unity • Excellence • Service • Leadership”
                        </span>
                        <i class="bi bi-star-fill text-warning" style="font-size: 0.75rem;"></i>
                    </div>

                    <h1 class="club-hero-title font-serif text-white mb-2">
                        Chatkhil <span style="background: linear-gradient(135deg, #dfc488 0%, #c5a059 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">ELITE</span> Club Ltd.
                    </h1>

                    <p class="text-light-50 mb-3" style="color: #94a3b8; font-size: 0.95rem; letter-spacing: 0.05em;">
                        (Registered under the Companies Act / Applicable Laws of Bangladesh)
                    </p>

                    <p class="lead text-light mb-4" style="max-width: 620px; font-weight: 300; font-size: 1.15rem; line-height: 1.7; color: #e2e8f0;">
                        The premier social fellowship uniting visionary leaders, entrepreneurs, scholars, and accomplished professionals from Chatkhil, Noakhali.
                    </p>

                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg px-4 py-3">
                            <i class="bi bi-award-fill me-2"></i> Apply for Membership
                        </a>
                        <a href="{{ route('about.index') }}" class="btn btn-club-glass btn-lg px-4 py-3">
                            <i class="bi bi-compass me-2"></i> Discover Our Club
                        </a>
                    </div>

                    <!-- Secretariat Quick Hotline Bar -->
                    <div class="d-flex flex-wrap align-items-center gap-3 mt-4 pt-3 border-top border-secondary border-opacity-25 small text-light-50 justify-content-center justify-content-lg-start">
                        <span><i class="bi bi-telephone-fill text-warning me-1"></i> +880 1805 561359</span>
                        <span>•</span>
                        <span><i class="bi bi-envelope-fill text-warning me-1"></i> info@celiteclub.com</span>
                        <span>•</span>
                        <span><i class="bi bi-geo-alt-fill text-warning me-1"></i> Sky View Trade Valley, Dhaka</span>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Glass Emblem & Club Heritage Card -->
                    <div class="hero-glass-card text-center position-relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="max-height: 190px; filter: drop-shadow(0 8px 24px rgba(197, 160, 89, 0.55)); margin-bottom: 18px;">
                        <h4 class="font-serif text-white mb-1" style="letter-spacing: 0.04em;">Chatkhil ELITE Club</h4>
                        <span class="badge bg-warning text-dark text-uppercase fw-bold mb-3 px-3 py-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                            Limited
                        </span>
                        
                        <div class="p-3 rounded-3 text-start small mb-3" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(223, 196, 136, 0.25);">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-light-50">Dhaka Secretariat:</span>
                                <strong class="text-white">Sky View Trade Valley</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-light-50">Local Presence:</span>
                                <strong class="text-white">Chatkhil, Noakhali</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-light-50">Official Website:</span>
                                <strong class="text-warning">www.celiteclub.com</strong>
                            </div>
                        </div>

                        <a href="{{ route('membership.info') }}" class="btn btn-sm btn-outline-warning w-100 rounded-pill py-2">
                            <i class="bi bi-card-checklist me-1"></i> View 7 Membership Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notice Ticker with Glass Finish -->
    @if($latestNotices->isNotEmpty())
    <div class="notice-ticker-wrap">
        <div class="container d-flex align-items-center">
            <span class="ticker-badge me-3"><i class="bi bi-megaphone-fill me-1"></i> Circular</span>
            <div class="overflow-hidden flex-grow-1 text-truncate">
                <a href="{{ route('notices.show', $latestNotices->first()->slug) }}" class="text-white text-decoration-none">
                    <strong class="text-warning">[{{ $latestNotices->first()->publish_date->format('d M, Y') }}]</strong> {{ $latestNotices->first()->title }}
                </a>
            </div>
            <a href="{{ route('notices.index') }}" class="text-warning small text-decoration-none ms-3 d-none d-sm-inline fw-semibold">All Notices &rarr;</a>
        </div>
    </div>
    @endif

    <!-- About & President Message Section -->
    <section class="py-5" style="background: #ffffff;">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <div class="pe-lg-4">
                        <span class="section-subtitle">Fellowship & Tradition</span>
                        <h2 class="club-heading mb-3">An Aristocratic Fellowship of Vision, Leadership & Brotherhood</h2>
                        <div class="mb-4 text-muted" style="line-height: 1.85; font-size: 1.02rem;">
                            <p>
                                <strong>Chatkhil ELITE Club Ltd.</strong> was established to foster an enlightened, non-political fellowship among accomplished individuals tracing their roots to Chatkhil Upazila, Noakhali.
                            </p>
                            <p>
                                Grounded in the enduring values of <em>Unity, Excellence, Service, and Leadership</em>, the club serves as a distinguished platform for cultural enrichment, civic progress, philanthropic endeavors, and family recreation.
                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('about.index') }}" class="btn btn-club-primary">
                                <i class="bi bi-info-circle me-1"></i> Explore Full Charter
                            </a>
                            <a href="{{ route('committee') }}" class="btn btn-club-outline">
                                <i class="bi bi-people me-1"></i> Executive Board
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="president-card position-relative overflow-hidden">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width: 82px; height: 82px; border-radius: 50%; border: 3px solid var(--liquid-gold); overflow: hidden; flex-shrink: 0; box-shadow: 0 4px 14px rgba(197, 160, 89, 0.35);">
                                <img src="{{ asset(\App\Models\Setting::get('president_photo', 'images/president.jpg')) }}" alt="President Photo" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <span class="badge bg-warning text-dark text-uppercase fw-bold mb-1" style="font-size: 0.68rem; letter-spacing: 0.05em;">Message from President</span>
                                <h5 class="mb-0 text-navy font-serif fw-bold">{{ \App\Models\Setting::get('president_name', 'Alhaj Md. Faruk Hossain') }}</h5>
                                <span class="text-muted small">{{ \App\Models\Setting::get('president_title', 'President, Chatkhil ELITE Club Ltd.') }}</span>
                            </div>
                        </div>
                        <p class="small text-muted fst-italic mb-3" style="line-height: 1.7; font-size: 0.92rem;">
                            "Chatkhil ELITE Club Ltd. represents our shared identity and collective pride. We invite every eligible son and daughter of Chatkhil to join hands in making our community stronger, more compassionate, and prosperous."
                        </p>
                        <a href="{{ route('about.president') }}" class="text-navy fw-bold small text-decoration-none d-inline-flex align-items-center gap-1">
                            Read Full Presidential Address <i class="bi bi-arrow-right text-warning"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Counter Section with Liquid Glass -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['total_members'] }}</div>
                        <div class="stat-label">Enrolled Members</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['life_members'] }}</div>
                        <div class="stat-label">Life & Founders</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['executive_board'] }}</div>
                        <div class="stat-label">Executive Committee</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['events_held'] }}</div>
                        <div class="stat-label">Programs & Galas</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Official 7 Membership Categories Preview -->
    <section class="py-5" style="background: #fbfbfd;">
        <div class="container py-4">
            <div class="section-title-wrap">
                <span class="section-subtitle">Prestigious Enrollment</span>
                <h2 class="section-main-title">Membership Categories</h2>
                <p class="text-muted mt-2" style="max-width: 650px; margin: 0 auto; font-size: 0.95rem;">
                    As defined in the official Chatkhil ELITE Club Ltd. constitution, choose the category that aligns with your profile:
                </p>
            </div>

            <div class="row g-4 justify-content-center">
                @php
                    $previewTypes = \App\Models\MembershipType::active()->orderBy('order_num')->take(6)->get();
                @endphp
                @foreach($previewTypes as $mType)
                    <div class="col-md-6 col-lg-4">
                        <div class="club-card p-4 d-flex flex-column justify-content-between h-100 position-relative">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.7rem;">
                                        {{ ucfirst($mType->validity_type) }}
                                    </span>
                                    @if($mType->slug === 'founder-member' || $mType->slug === 'life-member')
                                        <span class="badge bg-warning text-dark fw-bold" style="font-size: 0.7rem;">Prestigious</span>
                                    @endif
                                </div>
                                <h5 class="font-serif fw-bold text-navy mb-2">{{ $mType->name }}</h5>
                                <div class="mb-3">
                                    @if($mType->fee > 0)
                                        <span class="fs-3 fw-bold text-navy font-serif">৳{{ number_format($mType->fee, 0) }}</span>
                                    @else
                                        <span class="fs-4 fw-bold text-success font-serif">Conferred Honor</span>
                                    @endif
                                    <span class="text-muted small d-block">{{ $mType->validity_type === 'lifetime' ? 'One-time admission' : 'Annual fellowship' }}</span>
                                </div>
                                <p class="small text-muted mb-3" style="line-height: 1.6; min-height: 48px;">
                                    {{ Str::limit($mType->description, 95) }}
                                </p>
                            </div>
                            <div class="pt-3 border-top">
                                <a href="{{ route('membership.apply') }}?type={{ $mType->id }}" class="btn btn-sm btn-club-gold w-100 fw-bold">
                                    Apply for {{ $mType->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('membership.info') }}" class="btn btn-club-outline px-4 py-2">
                    <i class="bi bi-view-list me-1"></i> View All Categories & Application Guidelines
                </a>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="py-5" style="background: #ffffff;">
        <div class="container py-4">
            <div class="section-title-wrap">
                <span class="section-subtitle">Calendar & Galas</span>
                <h2 class="section-main-title">Upcoming Club Events</h2>
            </div>

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-4">
                    <p class="text-muted">No upcoming events scheduled right now. Check back soon!</p>
                </div>
            @else
                <div class="row g-4">
                    @foreach($upcomingEvents as $event)
                        <div class="col-md-6 col-lg-4">
                            <div class="club-card">
                                <div class="club-card-img-wrap">
                                    <img src="{{ $event->banner_url }}" alt="{{ $event->title }}" class="club-card-img">
                                    <div class="club-date-badge">
                                        <span class="day">{{ $event->event_date->format('d') }}</span>
                                        <span class="month">{{ $event->event_date->format('M Y') }}</span>
                                    </div>
                                </div>
                                <div class="p-4 d-flex flex-column justify-content-between" style="min-height: 240px;">
                                    <div>
                                        <h5 class="font-serif mb-2">
                                            <a href="{{ route('events.show', $event->slug) }}" class="text-navy text-decoration-none">
                                                {{ $event->title }}
                                            </a>
                                        </h5>
                                        <p class="small text-muted mb-2">
                                            <i class="bi bi-geo-alt-fill text-warning me-1"></i> {{ $event->venue }}
                                        </p>
                                        <p class="small text-muted mb-3">
                                            {{ Str::limit($event->short_description, 100) }}
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                        @if($event->registration_fee > 0)
                                            <span class="badge bg-warning text-dark fw-bold">৳{{ number_format($event->registration_fee, 0) }}</span>
                                        @else
                                            <span class="badge bg-success">Complimentary</span>
                                        @endif
                                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-club-primary">
                                            Details <i class="bi bi-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Latest Notices & Circulars -->
    <section class="py-5" style="background: #f7f9fc;">
        <div class="container py-4">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <span class="section-subtitle">Official Bulletins</span>
                    <h2 class="club-heading mb-3">Notice Board</h2>
                    <p class="text-muted mb-4" style="line-height: 1.7;">
                        Stay informed with circulars, constitutional notifications, election schedules, and official directives issued by the Club Secretariat.
                    </p>
                    <a href="{{ route('notices.index') }}" class="btn btn-club-primary">
                        <i class="bi bi-clipboard-check me-1"></i> View All Circulars
                    </a>
                </div>

                <div class="col-lg-8">
                    <div class="card border-0 rounded-4 shadow-sm overflow-hidden" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(14px);">
                        <div class="list-group list-group-flush">
                            @forelse($latestNotices as $notice)
                                <div class="list-group-item p-3 p-md-4 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-navy text-white" style="background-color: var(--liquid-navy-deep);">
                                                {{ $notice->publish_date->format('d M, Y') }}
                                            </span>
                                            @if($notice->is_pinned)
                                                <span class="badge bg-warning text-dark"><i class="bi bi-pin-angle-fill"></i> Pinned</span>
                                            @endif
                                            @if($notice->notice_number)
                                                <span class="text-muted small">Ref: {{ $notice->notice_number }}</span>
                                            @endif
                                        </div>
                                        <h6 class="mb-1 font-serif">
                                            <a href="{{ route('notices.show', $notice->slug) }}" class="text-navy text-decoration-none fw-bold">
                                                {{ $notice->title }}
                                            </a>
                                        </h6>
                                        <p class="small text-muted mb-0">
                                            {{ Str::limit($notice->description, 110) }}
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 d-flex gap-2">
                                        <a href="{{ route('notices.show', $notice->slug) }}" class="btn btn-sm btn-outline-secondary">
                                            Read
                                        </a>
                                        @if($notice->file_attachment)
                                            <a href="{{ asset('uploads/notices/' . $notice->file_attachment) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Download Circular PDF">
                                                <i class="bi bi-file-earmark-pdf"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="list-group-item p-4 text-center text-muted">No notices posted recently.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Call to Action with Liquid Glass -->
    <section class="py-5" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 50%, #152643 100%); color: #ffffff; border-top: 3px solid var(--liquid-gold);">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="height: 80px; margin-bottom: 20px; filter: drop-shadow(0 4px 12px rgba(197, 160, 89, 0.5));">
                    <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2 px-3 py-1" style="letter-spacing: 0.1em; font-size: 0.74rem;">
                        “Unity • Excellence • Service • Leadership”
                    </span>
                    <h2 class="font-serif text-white mb-3" style="font-size: 2.2rem;">
                        Enroll into Chatkhil ELITE Club Ltd.
                    </h2>
                    <p class="lead text-light mb-4" style="font-weight: 300; line-height: 1.7;">
                        Join hands with our community of respected professionals, entrepreneurs, and changemakers. Experience aristocratic fellowship, family privileges, and impactful community welfare.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg px-4 py-3">
                            <i class="bi bi-person-plus-fill me-2"></i> Fill Online Application Form
                        </a>
                        <a href="{{ route('membership.info') }}" class="btn btn-club-glass btn-lg px-4 py-3">
                            <i class="bi bi-info-circle me-2"></i> Categories & Guidelines
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
