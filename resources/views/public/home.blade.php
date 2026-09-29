@extends('layouts.public')

@section('title', 'Chatkhil Elite Club Limited | United by Community, Driven by Excellence')

@section('content')

    <!-- Hero Section -->
    <section class="club-hero text-center text-md-start">
        <div class="container club-hero-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Chatkhil Elite Club Emblem" class="club-crest-hero">
                    <h1 class="club-hero-title font-serif">
                        {{ \App\Models\Setting::get('hero_title', 'Chatkhil Elite Club Limited') }}
                    </h1>
                    <p class="club-hero-tagline">
                        "{{ \App\Models\Setting::get('site_tagline', 'United by Community, Driven by Excellence') }}"
                    </p>
                    <p class="lead text-light mb-4 d-none d-md-block" style="max-width: 650px;">
                        {{ \App\Models\Setting::get('hero_subtitle', 'The premier social fellowship uniting professionals, entrepreneurs, and leaders of Chatkhil, Noakhali.') }}
                    </p>
                    <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start">
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg">
                            <i class="bi bi-award-fill me-2"></i> Become a Member
                        </a>
                        <a href="{{ route('about.index') }}" class="btn btn-club-outline btn-lg text-white">
                            <i class="bi bi-compass me-2"></i> Explore Our Club
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center">
                    <div class="p-4 rounded-4" style="background: rgba(10, 20, 36, 0.7); border: 2px solid var(--club-gold); box-shadow: 0 10px 30px rgba(0,0,0,0.4);">
                        <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="max-height: 220px; filter: drop-shadow(0 6px 16px rgba(197, 155, 39, 0.6));">
                        <h4 class="text-warning mt-3 font-serif mb-1">Established {{ \App\Models\Setting::get('club_established_year', '2018') }}</h4>
                        <p class="text-light small mb-0">Chatkhil, Noakhali, Bangladesh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Notice Ticker -->
    @if($latestNotices->isNotEmpty())
    <div class="notice-ticker-wrap">
        <div class="container d-flex align-items-center">
            <span class="ticker-badge me-3"><i class="bi bi-megaphone-fill me-1"></i> Announcements</span>
            <div class="overflow-hidden flex-grow-1 text-truncate">
                <a href="{{ route('notices.show', $latestNotices->first()->slug) }}" class="text-white text-decoration-none">
                    <strong class="text-warning">[{{ $latestNotices->first()->publish_date->format('d M, Y') }}]</strong> {{ $latestNotices->first()->title }}
                </a>
            </div>
            <a href="{{ route('notices.index') }}" class="text-warning small text-decoration-none ms-3 d-none d-sm-inline">All Notices &rarr;</a>
        </div>
    </div>
    @endif

    <!-- About the Club & President's Message -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row g-4 align-items-center">
                <div class="col-lg-7">
                    <div class="pe-lg-4">
                        <span class="section-subtitle">About Chatkhil Elite Club</span>
                        <h2 class="club-heading mb-3">A Prestigious Fellowship of Vision, Leadership & Welfare</h2>
                        <div class="mb-4 text-muted" style="line-height: 1.8;">
                            <p>
                                <strong>Chatkhil Elite Club Limited</strong> was established to foster an enlightened, non-political fellowship among accomplished individuals tracing their roots to Chatkhil Upazila, Noakhali.
                            </p>
                            <p>
                                The club provides a welcoming sanctuary for intellectual discourse, recreation, philanthropic service, and cultural enrichment. From organizing scholarships for underprivileged students to disaster relief operations and cultural galas, our members actively shape a brighter tomorrow.
                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('about.index') }}" class="btn btn-club-primary">
                                <i class="bi bi-info-circle me-1"></i> Read Full History
                            </a>
                            <a href="{{ route('committee') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-people me-1"></i> Executive Board
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="president-card">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div style="width: 80px; height: 80px; border-radius: 50%; border: 3px solid var(--club-gold); overflow: hidden; flex-shrink: 0;">
                                <img src="{{ asset(\App\Models\Setting::get('president_photo', 'images/president.jpg')) }}" alt="President Photo" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div>
                                <span class="badge bg-warning text-dark text-uppercase fw-bold mb-1">Message from President</span>
                                <h5 class="mb-0 text-navy font-serif">{{ \App\Models\Setting::get('president_name', 'Alhaj Md. Faruk Hossain') }}</h5>
                                <span class="text-muted small">{{ \App\Models\Setting::get('president_title', 'President, Chatkhil Elite Club Limited') }}</span>
                            </div>
                        </div>
                        <p class="small text-muted fst-italic mb-3" style="line-height: 1.6;">
                            "{{ \App\Models\Setting::get('president_message_short', 'Chatkhil Elite Club Limited is our collective pride. We invite every eligible son and daughter of Chatkhil to join hands in making our community stronger, more compassionate, and prosperous.') }}"
                        </p>
                        <a href="{{ route('about.president') }}" class="text-navy fw-bold small text-decoration-none">
                            Read Full Address <i class="bi bi-arrow-right text-warning"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Club Statistics Counter -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['total_members'] }}</div>
                        <div class="stat-label">Total Members</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['life_members'] }}</div>
                        <div class="stat-label">Life Members</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['executive_board'] }}</div>
                        <div class="stat-label">Executive Board</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="stat-box">
                        <div class="stat-number">{{ $stats['events_held'] }}</div>
                        <div class="stat-label">Events & Programs</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="section-title-wrap">
                <span class="section-subtitle">Calendar of Fellowship</span>
                <h2 class="section-main-title">Upcoming Events & Gatherings</h2>
            </div>

            @if($upcomingEvents->isEmpty())
                <div class="text-center py-5">
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
                                            <span class="badge bg-warning text-dark fw-bold">Fee: ৳{{ number_format($event->registration_fee, 0) }}</span>
                                        @else
                                            <span class="badge bg-success">Complimentary</span>
                                        @endif
                                        <a href="{{ route('events.show', $event->slug) }}" class="btn btn-sm btn-club-primary">
                                            View Details <i class="bi bi-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-5">
                    <a href="{{ route('events.index') }}" class="btn btn-club-outline">
                        <i class="bi bi-calendar-event me-1"></i> View All Club Events
                    </a>
                </div>
            @endif
        </div>
    </section>

    <!-- Latest Notices & Circulars -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row g-4 align-items-center">
                <div class="col-lg-4">
                    <span class="section-subtitle">Official Circulars</span>
                    <h2 class="club-heading mb-3">Notice Board</h2>
                    <p class="text-muted mb-4">
                        Stay informed with the latest official announcements, election schedules, executive decisions, and circulars ratified by the Executive Committee.
                    </p>
                    <a href="{{ route('notices.index') }}" class="btn btn-club-primary">
                        <i class="bi bi-clipboard-check me-1"></i> Browse All Notices
                    </a>
                </div>

                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="list-group list-group-flush">
                            @forelse($latestNotices as $notice)
                                <div class="list-group-item p-3 p-md-4 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="badge bg-navy text-white" style="background-color: var(--club-navy);">
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
                                            <a href="{{ asset('uploads/notices/' . $notice->file_attachment) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Download PDF">
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

    <!-- Latest News / Activities -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="section-title-wrap">
                <span class="section-subtitle">Community & Media</span>
                <h2 class="section-main-title">Latest News & Club Activities</h2>
            </div>

            <div class="row g-4">
                @foreach($latestNews as $post)
                    <div class="col-md-4">
                        <div class="club-card">
                            <div class="club-card-img-wrap">
                                <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}" class="club-card-img">
                                @if($post->category)
                                    <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3 fw-bold">
                                        {{ $post->category->name }}
                                    </span>
                                @endif
                            </div>
                            <div class="p-4 d-flex flex-column justify-content-between" style="min-height: 220px;">
                                <div>
                                    <div class="text-muted small mb-2">
                                        <i class="bi bi-clock me-1"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                    </div>
                                    <h5 class="font-serif mb-2">
                                        <a href="{{ route('news.show', $post->slug) }}" class="text-navy text-decoration-none">
                                            {{ Str::limit($post->title, 65) }}
                                        </a>
                                    </h5>
                                    <p class="small text-muted mb-3">
                                        {{ Str::limit($post->summary, 95) }}
                                    </p>
                                </div>
                                <a href="{{ route('news.show', $post->slug) }}" class="text-navy fw-bold small text-decoration-none">
                                    Read Article <i class="bi bi-arrow-right text-warning"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('news.index') }}" class="btn btn-club-primary">
                    <i class="bi bi-newspaper me-1"></i> Read All Club News
                </a>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Showcase -->
    @if($galleryAlbums->isNotEmpty())
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="section-title-wrap">
                <span class="section-subtitle">Memories & Highlights</span>
                <h2 class="section-main-title">Photo Gallery</h2>
            </div>

            <div class="row g-4">
                @foreach($galleryAlbums as $album)
                    <div class="col-md-6 col-lg-4">
                        <div class="club-card overflow-hidden">
                            <div class="position-relative" style="height: 230px; overflow: hidden; background: #0a1424;">
                                <img src="{{ $album->cover_url }}" alt="{{ $album->title }}" class="w-100 h-100 object-fit-cover">
                                <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white">
                                    <h6 class="mb-0 font-serif">{{ $album->title }}</h6>
                                    <small class="text-warning"><i class="bi bi-images me-1"></i> {{ $album->images->count() }} Photos</small>
                                </div>
                            </div>
                            <div class="p-3 text-center">
                                <a href="{{ route('gallery.show', $album->slug) }}" class="btn btn-sm btn-outline-dark w-100">
                                    View Album <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="{{ route('gallery.index') }}" class="btn btn-club-outline">
                    <i class="bi bi-grid-3x3-gap-fill me-1"></i> View Full Gallery
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Membership Call to Action -->
    <section class="py-5" style="background: linear-gradient(135deg, #0a1424 0%, #152742 100%); color: #ffffff; border-top: 4px solid var(--club-gold);">
        <div class="container py-4 text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="height: 80px; margin-bottom: 20px; filter: drop-shadow(0 4px 10px rgba(197, 155, 39, 0.4));">
                    <h2 class="font-serif text-white mb-3" style="font-size: 2.3rem;">
                        Become a Member of Chatkhil Elite Club Limited
                    </h2>
                    <p class="lead text-light mb-4" style="font-weight: 300;">
                        Join hands with our community of respected professionals, entrepreneurs, and changemakers. Experience noble fellowship, family privileges, and impactful social initiatives.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-lg px-4 py-3">
                            <i class="bi bi-person-plus-fill me-2"></i> Apply for Membership Online
                        </a>
                        <a href="{{ route('membership.info') }}" class="btn btn-club-outline btn-lg text-white px-4 py-3">
                            <i class="bi bi-info-circle me-2"></i> Categories & Eligibility
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
