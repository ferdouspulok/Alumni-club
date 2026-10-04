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
                    @if($page->featured_image)
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
                            <li class="mb-2"><a href="{{ route('about.chairman') }}" class="text-decoration-none {{ request()->routeIs('about.chairman') || request()->routeIs('about.president') ? 'fw-bold text-navy' : 'text-muted' }}"><i class="bi bi-chevron-right text-warning me-1"></i> Chairman's Message</a></li>
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
