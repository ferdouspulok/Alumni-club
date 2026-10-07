@extends('layouts.public')

@section('title', 'Chatkhil ELITE Club Ltd. | Official Web Portal')
@section('meta_description', 'Official portal of Chatkhil ELITE Club Ltd. (Registered under the Companies Act / Applicable Laws of Bangladesh). Unity • Excellence • Service • Leadership.')

@section('content')

    <!-- Highlighted Hero Section with Sliding Background Images -->
    <section class="club-hero position-relative overflow-hidden">
        <!-- Background Slider Carousel (4 High-Res Sliding Backdrops - Wide Angle & Top Views) -->
        <div class="hero-bg-slider">
            <div id="heroBgCarousel" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100">
                        <div class="hero-slide-img" style="background-image: url('{{ asset('images/hero-slide-1.jpg') }}');"></div>
                    </div>
                    <div class="carousel-item h-100">
                        <div class="hero-slide-img" style="background-image: url('{{ asset('images/hero-slide-2.jpg') }}');"></div>
                    </div>
                    <div class="carousel-item h-100">
                        <div class="hero-slide-img" style="background-image: url('{{ asset('images/hero-slide-3.jpg') }}');"></div>
                    </div>
                    <div class="carousel-item h-100">
                        <div class="hero-slide-img" style="background-image: url('{{ asset('images/hero-slide-4.jpg') }}');"></div>
                    </div>
                </div>
            </div>
            <!-- Highlighted / Reduced Darkness Overlay -->
            <div class="hero-overlay"></div>
        </div>

        <!-- Slider Indicators -->
        <div class="hero-slider-indicators">
            <button type="button" data-bs-target="#heroBgCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroBgCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroBgCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#heroBgCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>

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

    <!-- About Us & Chairman's Message Section -->
    <section class="py-5" style="background: #ffffff;">
        <div class="container py-4">
            <div class="row g-5 align-items-center mb-5">
                <div class="col-lg-7">
                    <div class="pe-lg-4">
                        <span class="section-subtitle">Community & Fellowship</span>
                        <h2 class="club-heading mb-3">About Chatkhil Elite Club Ltd.</h2>
                        <div class="mb-4 text-muted" style="line-height: 1.85; font-size: 1.02rem;">
                            <p class="lead fw-semibold text-navy mb-3" style="font-size: 1.1rem; line-height: 1.75;">
                                Chatkhil Elite Club Ltd. is a community-driven social organization dedicated to bringing together individuals who share a common commitment to social responsibility, personal development, friendship, and community well-being.
                            </p>
                            <p class="mb-3">
                                Our club provides a platform where members can connect, exchange ideas, participate in meaningful activities, and contribute positively to society. Through social initiatives, cultural programs, recreational activities, educational efforts, and community engagement, we aim to create a stronger and more connected community.
                            </p>
                            <div class="p-3 my-3 rounded-3 border" style="background: rgba(246, 248, 251, 0.95); border-left: 4px solid var(--liquid-gold) !important;">
                                <p class="mb-0 fw-semibold text-navy fst-italic">
                                    “We believe that when people come together with positive intentions and collective effort, meaningful and lasting change can be created.”
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('about.index') }}" class="btn btn-club-primary">
                                <i class="bi bi-info-circle me-1"></i> Read Full Story
                            </a>
                            <a href="{{ route('about.activities') }}" class="btn btn-club-outline">
                                <i class="bi bi-grid me-1"></i> Explore Activities
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="president-card position-relative overflow-hidden shadow-sm p-4" style="border: 1.5px solid rgba(197, 160, 89, 0.4); border-top: 4px solid var(--liquid-gold) !important; background: linear-gradient(180deg, #ffffff 0%, #fcfbf7 100%);">
                        <!-- Top Header with Large Portrait -->
                        <div class="d-flex flex-column flex-sm-row align-items-center align-items-sm-start gap-3 gap-md-4 mb-3 pb-3 border-bottom border-light-subtle">
                            <!-- Large President Portrait with Gold Frame -->
                            <div class="position-relative flex-shrink-0 text-center">
                                <div style="width: 130px; height: 155px; border-radius: 18px; border: 3px solid var(--liquid-gold); overflow: hidden; box-shadow: 0 10px 24px rgba(197, 160, 89, 0.3); background: #0a1424;">
                                    <img src="{{ asset(\App\Models\Setting::get('president_photo', 'images/president.jpg')) }}" alt="{{ \App\Models\Setting::get('president_name', 'President Photo') }}" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                                </div>
                                <span class="position-absolute bottom-0 start-50 translate-middle-x badge bg-warning text-dark text-uppercase fw-bold shadow-sm" style="font-size: 0.68rem; letter-spacing: 0.05em; transform: translate(-50%, 35%) !important; white-space: nowrap; border: 2px solid #fff; padding: 4px 10px;">
                                    President
                                </span>
                            </div>

                            <!-- President Info -->
                            <div class="text-center text-sm-start pt-2 pt-sm-0">
                                <span class="badge bg-warning bg-opacity-15 text-dark border border-warning text-uppercase fw-bold mb-1" style="font-size: 0.68rem; letter-spacing: 0.06em;">
                                    President's Address
                                </span>
                                <h5 class="mb-1 text-navy font-serif fw-bold" style="font-size: 1.15rem; line-height: 1.3;">
                                    {{ \App\Models\Setting::get('president_name', 'ANISUR RAHMAN (SHEPON)') }}
                                </h5>
                                <div class="text-muted small fw-semibold mb-2">
                                    {{ \App\Models\Setting::get('president_title', 'President, Chatkhil Elite Club Ltd.') }}
                                </div>
                                <span class="badge bg-light text-navy border px-2 py-1 small" style="font-size: 0.72rem;">
                                    <i class="bi bi-shield-check text-warning me-1"></i> Executive Board
                                </span>
                            </div>
                        </div>

                        <!-- Message Body -->
                        <p class="fw-bold text-navy mb-2" style="font-size: 0.98rem;">Welcome to Chatkhil Elite Club Ltd.</p>
                        <p class="small text-muted mb-3" style="line-height: 1.75; font-size: 0.91rem;">
                            {{ \App\Models\Setting::get('president_message_short', 'Our club was founded on the belief that strong communities are built through friendship, cooperation, mutual respect, and a willingness to contribute. We are committed to creating a platform where our members can connect with one another, enjoy meaningful activities, develop their potential, and contribute positively to society.') }}
                        </p>
                        <div class="p-2 px-3 rounded-2 mb-3 small" style="background: rgba(197, 160, 89, 0.12); border-left: 3px solid var(--liquid-gold);">
                            <span class="fst-italic text-navy fw-semibold">
                                “Together, we can connect, contribute, and create a lasting positive Impact.”
                            </span>
                        </div>
                        <a href="{{ route('about.president') }}" class="btn btn-sm btn-club-gold px-3 py-2 fw-bold text-decoration-none d-inline-flex align-items-center gap-2">
                            <span>Read Complete Message</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Our Mission & Our Vision Row -->
            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="club-card p-4 p-md-5 h-100 position-relative" style="border-top: 4px solid var(--liquid-gold) !important;">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-2 rounded-3 bg-warning bg-opacity-10 text-warning fs-3">
                                <i class="bi bi-compass"></i>
                            </div>
                            <h3 class="font-serif text-navy mb-0">Our Mission</h3>
                        </div>
                        <p class="text-muted mb-3">Our mission is to build a vibrant and responsible community by:</p>
                        <ul class="list-unstyled text-muted" style="line-height: 1.85;">
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Promoting friendship, unity, and mutual respect among members.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Organizing meaningful social, cultural, educational, and recreational activities.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Encouraging volunteerism and community service.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Supporting initiatives that contribute to the welfare of people and the local community.</span>
                            </li>
                            <li class="mb-2 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Creating opportunities for personal growth, networking, and leadership.</span>
                            </li>
                            <li class="mb-0 d-flex align-items-start gap-2">
                                <i class="bi bi-check2-circle text-warning fs-5 flex-shrink-0 mt-1"></i>
                                <span>Developing a positive and inclusive environment for members of all backgrounds.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="club-card p-4 p-md-5 h-100 position-relative d-flex flex-column justify-content-between" style="border-top: 4px solid var(--liquid-navy-deep) !important;">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-primary bg-opacity-10 text-primary fs-3">
                                    <i class="bi bi-eye"></i>
                                </div>
                                <h3 class="font-serif text-navy mb-0">Our Vision</h3>
                            </div>
                            <p class="text-muted lead mb-4" style="line-height: 1.85; font-size: 1.08rem;">
                                Our vision is to establish <strong>Chatkhil Elite Club Ltd.</strong> as a trusted and respected community platform where people come together to build relationships, develop their potential, serve society, and create positive change.
                            </p>
                        </div>
                        <div class="p-4 rounded-4" style="background: linear-gradient(135deg, rgba(7, 14, 27, 0.95) 0%, rgba(13, 26, 48, 0.95) 100%); color: #ffffff; border: 1.5px solid var(--liquid-gold);">
                            <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2 px-3 py-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                                A United Future
                            </span>
                            <h5 class="font-serif text-white mb-2" style="line-height: 1.6;">
                                We envision a community that is connected, responsible, compassionate, progressive, and united.
                            </h5>
                            <div class="d-flex flex-wrap gap-2 mt-3">
                                <span class="badge bg-white bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 fs-6">Connected</span>
                                <span class="badge bg-white bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 fs-6">Responsible</span>
                                <span class="badge bg-white bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 fs-6">Compassionate</span>
                                <span class="badge bg-white bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 fs-6">Progressive</span>
                                <span class="badge bg-white bg-opacity-10 text-warning border border-warning border-opacity-25 px-3 py-2 fs-6">United</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Core Values Section -->
    <section class="py-5 core-values-section">
        <div class="container py-4 position-relative" style="z-index: 2;">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle text-warning" style="letter-spacing: 0.12em;">Principles We Stand For</span>
                <h2 class="section-main-title text-white">Our Core Values</h2>
                <p class="mt-2" style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 0.95rem;">
                    The essential pillars shaping our culture, community actions, and fellowship standards:
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-warning bg-opacity-20 text-warning fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-shield-check"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Integrity</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We believe in honesty, transparency, and responsible conduct across all our operations and relationships.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-info bg-opacity-20 text-info fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-people"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Unity</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We value teamwork and believe that collective effort creates greater impact for our community.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-danger bg-opacity-20 text-danger fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-heart"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Respect</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We respect every member and value diversity of ideas, professions, and backgrounds.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-success bg-opacity-20 text-success fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-hand-thumbs-up"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Service</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We encourage members to contribute their time, skills, and resources for the benefit of society.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-warning bg-opacity-20 text-warning fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-award"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Leadership</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We promote responsible leadership, proactive initiative, and ongoing personal development.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="core-value-card p-4 h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <div class="p-2 rounded-3 bg-info bg-opacity-20 text-info fs-4 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;"><i class="bi bi-gem"></i></div>
                                <h4 class="font-serif text-white fw-bold mb-0 fs-5">Friendship</h4>
                            </div>
                            <p class="small mt-2 mb-0" style="color: #cbd5e1; line-height: 1.75; font-size: 0.92rem;">
                                We believe strong relationships and mutual trust are the foundation of a strong community.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Activities Section -->
    <section class="py-5" style="background: #ffffff;">
        <div class="container py-4">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle">What We Do</span>
                <h2 class="section-main-title">Our Activities</h2>
                <p class="text-muted mt-2" style="max-width: 680px; margin: 0 auto; font-size: 0.95rem;">
                    Creating meaningful impact through social welfare, cultural enrichment, sports, education, and mutual fellowship:
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-danger bg-opacity-10 text-danger fs-3"><i class="bi bi-heart-pulse-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Welfare</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Social Welfare</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            We organize and support initiatives aimed at helping people in need and contributing to community welfare.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-primary bg-opacity-10 text-primary fs-3"><i class="bi bi-people-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Impact</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Community Service</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            Our members participate in volunteer activities and community-focused programs designed to create a positive social impact.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-warning bg-opacity-10 text-warning fs-3"><i class="bi bi-palette-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Heritage</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Cultural Programs</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            We arrange cultural events, celebrations, and programs that encourage creativity and help preserve our shared cultural values.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-success bg-opacity-10 text-success fs-3"><i class="bi bi-mortarboard-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Knowledge</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Educational Initiatives</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            We support educational awareness, knowledge-sharing, seminars, workshops, and activities that encourage learning and personal development.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-warning bg-opacity-10 text-warning fs-3"><i class="bi bi-trophy-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Health</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Sports & Recreation</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            We organize sports, recreational events, and friendly competitions to promote healthy lifestyles, teamwork, and friendship.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="club-card p-4 h-100">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="p-3 rounded-4 bg-info bg-opacity-10 text-info fs-3"><i class="bi bi-share-fill"></i></div>
                            <div>
                                <span class="badge bg-light text-muted border text-uppercase" style="font-size: 0.65rem;">Fellowship</span>
                                <h5 class="font-serif fw-bold text-navy mb-0">Networking & Fellowship</h5>
                            </div>
                        </div>
                        <p class="small text-muted mb-0" style="line-height: 1.8;">
                            The club provides opportunities for members to meet, build meaningful relationships, exchange ideas, and develop professional and social networks.
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="club-card p-4" style="background: rgba(246, 248, 251, 0.95); border: 1.5px solid var(--liquid-gold);">
                        <div class="row align-items-center g-3">
                            <div class="col-md-8 d-flex align-items-center gap-3">
                                <div class="p-3 rounded-4 bg-danger bg-opacity-10 text-danger fs-2 flex-shrink-0"><i class="bi bi-gift-fill"></i></div>
                                <div>
                                    <span class="badge bg-danger text-white text-uppercase" style="font-size: 0.68rem;">Philanthropy</span>
                                    <h5 class="font-serif fw-bold text-navy mb-1">Charity & Support</h5>
                                    <p class="small text-muted mb-0" style="line-height: 1.7;">
                                        We may organize fundraising and assistance programs for deserving individuals and communities, subject to the club's policies and available resources.
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 text-md-end">
                                <a href="{{ route('about.activities') }}" class="btn btn-club-primary btn-sm px-4 py-2">
                                    <i class="bi bi-grid-fill me-1"></i> View Activities Page
                                </a>
                            </div>
                        </div>
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

    <!-- Why Join & Membership Call to Action with Liquid Glass -->
    <section class="py-5" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 50%, #152643 100%); color: #ffffff; border-top: 3px solid var(--liquid-gold);">
        <div class="container py-4">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7">
                    <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2 px-3 py-1" style="letter-spacing: 0.1em; font-size: 0.74rem;">
                        Join the Fellowship
                    </span>
                    <h2 class="font-serif text-white mb-3" style="font-size: 2.2rem;">
                        Why Join Chatkhil Elite Club?
                    </h2>
                    <p class="text-light mb-4" style="line-height: 1.7; color: #cbd5e1; font-size: 1.05rem;">
                        Being a member of <strong>Chatkhil Elite Club Ltd.</strong> means becoming part of a community where you can:
                    </p>
                    <div class="row g-3 text-start mb-4">
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Build meaningful friendships and connections.</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Participate in social and community activities.</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Develop leadership and organizational skills.</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Share knowledge, ideas, and experiences.</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Contribute to worthwhile initiatives.</span>
                        </div>
                        <div class="col-sm-6 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-light small">Enjoy cultural, recreational, and social events.</span>
                        </div>
                        <div class="col-12 d-flex align-items-start gap-2">
                            <i class="bi bi-check-circle-fill text-warning fs-5 flex-shrink-0 mt-1"></i>
                            <span class="text-white small fw-semibold">Become part of a positive and supportive community.</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="p-4 p-md-5 rounded-4 text-center" style="background: rgba(255, 255, 255, 0.06); backdrop-filter: blur(20px); border: 1.5px solid rgba(223, 196, 136, 0.35); box-shadow: 0 20px 45px rgba(0, 0, 0, 0.35);">
                        <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="height: 70px; margin-bottom: 15px; filter: drop-shadow(0 4px 12px rgba(197, 160, 89, 0.5));">
                        <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2 px-3 py-1" style="font-size: 0.72rem; letter-spacing: 0.08em;">
                            Membership Invitation
                        </span>
                        <h4 class="font-serif text-white mb-2">Become a Part of Our Community</h4>
                        <p class="small text-light-50 mb-3" style="line-height: 1.7; color: #cbd5e1;">
                            Chatkhil Elite Club Ltd. welcomes individuals who believe in friendship, community, personal development, and social responsibility.
                        </p>
                        <p class="small text-light-50 mb-3" style="line-height: 1.7; color: #cbd5e1;">
                            Whether you want to participate in community initiatives, meet new people, develop your network, or simply become part of an active and positive community, there is a place for you at Chatkhil Elite Club.
                        </p>
                        <div class="p-2 px-3 rounded-3 mb-4" style="background: rgba(197, 160, 89, 0.15); border: 1px solid rgba(197, 160, 89, 0.4);">
                            <span class="fw-bold text-warning font-serif" style="font-size: 1rem;">
                                Join us. Connect. Contribute. Grow together.
                            </span>
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg w-100 fw-bold py-3 shadow">
                                <i class="bi bi-pencil-square me-2"></i> Apply for Membership
                            </a>
                            <a href="{{ route('membership.info') }}" class="btn btn-club-glass btn-sm w-100 py-2">
                                <i class="bi bi-card-checklist me-1"></i> View 7 Categories & Fees
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
