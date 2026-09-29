@extends('layouts.public')

@section('title', 'News & Club Activities | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">News & Activities</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">News & Club Activities</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Reports, humanitarian initiatives, sports, and community milestones</p>
        </div>
    </div>

    <!-- Category Filter Bar -->
    <div class="bg-light py-3 border-bottom">
        <div class="container d-flex flex-wrap gap-2 align-items-center">
            <span class="small text-muted fw-bold me-2">Categories:</span>
            <a href="{{ route('news.index') }}" class="badge rounded-pill text-decoration-none px-3 py-2 {{ !request('category') ? 'bg-navy text-white' : 'bg-white text-muted border' }}" style="{{ !request('category') ? 'background-color: var(--club-navy);' : '' }}">
                All Stories
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', ['category' => $cat->slug]) }}" class="badge rounded-pill text-decoration-none px-3 py-2 {{ request('category') === $cat->slug ? 'bg-warning text-dark' : 'bg-white text-muted border' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>

    <!-- News Grid -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($newsList->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-newspaper fs-1 text-secondary mb-3 d-block"></i>
                    No news articles published in this category yet.
                </div>
            @else
                <div class="row g-4">
                    @foreach($newsList as $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="club-card">
                                <div class="club-card-img-wrap">
                                    <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}" class="club-card-img">
                                    @if($post->category)
                                        <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3 fw-bold">
                                            {{ $post->category->name }}
                                        </span>
                                    @endif
                                </div>
                                <div class="p-4 d-flex flex-column justify-content-between" style="min-height: 240px;">
                                    <div>
                                        <div class="text-muted small mb-2">
                                            <i class="bi bi-calendar3 me-1"></i> {{ $post->published_at ? $post->published_at->format('M d, Y') : $post->created_at->format('M d, Y') }}
                                        </div>
                                        <h5 class="font-serif mb-2">
                                            <a href="{{ route('news.show', $post->slug) }}" class="text-navy text-decoration-none">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                        <p class="small text-muted mb-3">
                                            {{ Str::limit($post->summary, 110) }}
                                        </p>
                                    </div>
                                    <a href="{{ route('news.show', $post->slug) }}" class="text-navy fw-bold small text-decoration-none">
                                        Read Full Story <i class="bi bi-arrow-right text-warning"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $newsList->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection
