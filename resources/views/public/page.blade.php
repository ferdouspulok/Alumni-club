@extends('layouts.public')

@section('title', $page->meta_title ?: $page->title . ' | Chatkhil Elite Club Limited')
@section('meta_description', $page->meta_description ?: $page->subtitle)

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">About Us</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">{{ $page->title }}</h1>
            @if($page->subtitle)
                <p class="lead text-light-50 mb-0 font-italic" style="color: #cbd5e1;">{{ $page->subtitle }}</p>
            @endif
        </div>
    </div>

    <!-- Content Body -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-8">
                    @if($page->slug === 'president-message')
                        <!-- Executive President Profile Header Card -->
                        <div class="card border-0 rounded-4 shadow-sm p-4 p-md-4 mb-4 position-relative overflow-hidden" style="background: linear-gradient(135deg, #07101e 0%, #0e1c31 60%, #1a2f4c 100%); border: 1.5px solid var(--club-gold) !important;">
                            <div class="position-absolute end-0 top-0 p-3 opacity-10 pe-none">
                                <i class="bi bi-quote display-1 text-warning"></i>
                            </div>
                            <div class="row align-items-center g-4 position-relative">
                                <div class="col-sm-auto text-center">
                                    <div class="position-relative d-inline-block">
                                        <div style="width: 150px; height: 180px; border-radius: 18px; border: 3px solid var(--club-gold); overflow: hidden; box-shadow: 0 10px 28px rgba(0,0,0,0.45); background: #060d18;">
                                            <img src="{{ asset(\App\Models\Setting::get('president_photo', 'images/president.jpg')) }}" alt="{{ \App\Models\Setting::get('president_name', 'President Photo') }}" style="width: 100%; height: 100%; object-fit: cover; object-position: top center;">
                                        </div>
                                        <span class="position-absolute bottom-0 start-50 translate-middle-x badge bg-warning text-dark text-uppercase fw-bold shadow" style="font-size: 0.72rem; letter-spacing: 0.05em; transform: translate(-50%, 40%) !important; white-space: nowrap; border: 2px solid #07101e; padding: 4px 10px;">
                                            President
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm text-center text-sm-start text-white">
                                    <span class="badge bg-warning bg-opacity-20 text-warning border border-warning text-uppercase fw-bold px-3 py-1 mb-2" style="font-size: 0.75rem; letter-spacing: 0.08em;">
                                        Official Address
                                    </span>
                                    <h3 class="font-serif text-white mb-1 fw-bold">{{ \App\Models\Setting::get('president_name', 'ANISUR RAHMAN (SHEPON)') }}</h3>
                                    <p class="text-warning mb-2 fw-semibold" style="font-size: 0.95rem;">{{ \App\Models\Setting::get('president_title', 'President, Chatkhil Elite Club Ltd.') }}</p>
                                    <p class="text-light-50 small mb-0" style="color: #cbd5e1; font-style: italic;">
                                        “Together, we can connect, contribute, and create a lasting positive Impact.”
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif($page->featured_image)
                        <img src="{{ asset('uploads/' . $page->featured_image) }}" alt="{{ $page->title }}" class="img-fluid rounded-4 shadow-sm mb-4">
                    @endif

                    <div class="content-body" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
                        {!! $page->content !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #f8fafc; border-left: 4px solid var(--club-gold) !important;">
                        <h5 class="font-serif mb-3">About the Club</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2"><a href="{{ route('about.index') }}" class="text-decoration-none {{ request()->routeIs('about.index') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> About Chatkhil Elite Club</a></li>
                            <li class="mb-2"><a href="{{ route('about.president') }}" class="text-decoration-none {{ request()->routeIs('about.chairman') || request()->routeIs('about.president') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> President's Message</a></li>
                            <li class="mb-2"><a href="{{ route('about.mission') }}" class="text-decoration-none {{ request()->routeIs('about.mission') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> Mission & Vision</a></li>
                            <li class="mb-2"><a href="{{ route('about.activities') }}" class="text-decoration-none {{ request()->routeIs('about.activities') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> Our Activities</a></li>
                            <li class="mb-2"><a href="{{ route('committee') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right text-warning me-1"></i> Executive Committee</a></li>
                            <li class="mb-2"><a href="{{ route('about.constitution') }}" class="text-decoration-none {{ request()->routeIs('about.constitution') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> Constitution & By-Laws</a></li>
                            <li class="mb-0"><a href="{{ route('documents.index') }}" class="text-decoration-none text-muted"><i class="bi bi-chevron-right text-warning me-1"></i> Official Documents</a></li>
                        </ul>
                    </div>

                    <!-- Membership Promo Box -->
                    <div class="card border-0 rounded-4 p-4 text-center text-white" style="background: linear-gradient(135deg, #0a1424 0%, #172a45 100%); border: 1px solid var(--club-gold);">
                        <i class="bi bi-shield-lock-fill text-warning fs-1 mb-2"></i>
                        <h5 class="font-serif text-white mb-2">Join Our Fellowship</h5>
                        <p class="small text-light-50 mb-3">Connect with accomplished professionals and leaders from Chatkhil.</p>
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-sm w-100 fw-bold">Apply Online</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
