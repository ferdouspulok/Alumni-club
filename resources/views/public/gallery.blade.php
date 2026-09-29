@extends('layouts.public')

@section('title', 'Photo Gallery | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Gallery</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Photo Gallery</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Pictorial moments, galas, medical camps, and community fellowships</p>
        </div>
    </div>

    <!-- Albums Grid -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($albums->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-images fs-1 text-secondary mb-3 d-block"></i>
                    No photo albums available yet.
                </div>
            @else
                <div class="row g-4">
                    @foreach($albums as $album)
                        <div class="col-md-6 col-lg-4">
                            <div class="club-card overflow-hidden">
                                <div class="position-relative" style="height: 230px; overflow: hidden; background: #0a1424;">
                                    <img src="{{ $album->cover_url }}" alt="{{ $album->title }}" class="w-100 h-100 object-fit-cover">
                                    <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-dark bg-opacity-75 text-white">
                                        <h5 class="mb-0 font-serif fs-6">{{ $album->title }}</h5>
                                        <small class="text-warning"><i class="bi bi-images me-1"></i> {{ $album->images_count }} Photos</small>
                                    </div>
                                </div>
                                <div class="p-3 text-center">
                                    <a href="{{ route('gallery.show', $album->slug) }}" class="btn btn-sm btn-club-primary w-100">
                                        Browse Photos <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $albums->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection
