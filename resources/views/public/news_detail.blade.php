@extends('layouts.public')

@section('title', $news->title . ' | Chatkhil Elite Club Limited')
@section('meta_description', $news->summary)

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('news.index') }}" class="text-warning text-decoration-none">News</a></li>
                    <li class="breadcrumb-item text-light active text-truncate" style="max-width: 300px;" aria-current="page">{{ $news->title }}</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">{{ $news->title }}</h1>
            <div class="d-flex flex-wrap gap-4 text-light-50 small mt-3">
                <span><i class="bi bi-calendar3 text-warning me-1"></i> {{ $news->published_at ? $news->published_at->format('F d, Y') : $news->created_at->format('F d, Y') }}</span>
                <span><i class="bi bi-person text-warning me-1"></i> {{ $news->author_name }}</span>
                @if($news->category)
                    <span><i class="bi bi-tag text-warning me-1"></i> {{ $news->category->name }}</span>
                @endif
                <span><i class="bi bi-eye text-warning me-1"></i> {{ $news->views_count }} Views</span>
            </div>
        </div>
    </div>

    <!-- Article Content & Sidebar -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <div class="col-lg-8">
                    <img src="{{ $news->thumbnail_url }}" alt="{{ $news->title }}" class="img-fluid rounded-4 shadow-sm w-100 mb-4" style="max-height: 440px; object-fit: cover;">

                    @if($news->summary)
                        <div class="p-3 mb-4 rounded-3 bg-light border-start border-4 border-warning fst-italic text-muted">
                            {{ $news->summary }}
                        </div>
                    @endif

                    <div class="article-content" style="font-size: 1.05rem; line-height: 1.85; color: #334155;">
                        {!! $news->content !!}
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background: #f8fafc; border-top: 4px solid var(--club-gold) !important;">
                        <h5 class="font-serif text-navy mb-3">Recent Stories</h5>
                        <ul class="list-unstyled mb-0">
                            @foreach($recentNews as $rNews)
                                <li class="mb-3 pb-3 border-bottom">
                                    <span class="small text-muted d-block mb-1"><i class="bi bi-calendar3 text-warning me-1"></i> {{ $rNews->published_at ? $rNews->published_at->format('d M, Y') : '' }}</span>
                                    <h6 class="font-serif mb-0 fs-6">
                                        <a href="{{ route('news.show', $rNews->slug) }}" class="text-navy text-decoration-none">
                                            {{ $rNews->title }}
                                        </a>
                                    </h6>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
