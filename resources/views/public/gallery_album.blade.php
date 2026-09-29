@extends('layouts.public')

@section('title', $album->title . ' | Photo Gallery')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}" class="text-warning text-decoration-none">Gallery</a></li>
                    <li class="breadcrumb-item text-light active text-truncate" style="max-width: 300px;" aria-current="page">{{ $album->title }}</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">{{ $album->title }}</h1>
            @if($album->description)
                <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">{{ $album->description }}</p>
            @endif
        </div>
    </div>

    <!-- Photos Grid -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($album->images->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-images fs-1 text-secondary mb-3 d-block"></i>
                    No photos uploaded to this album yet.
                </div>
            @else
                <div class="row g-4">
                    @foreach($album->images as $img)
                        <div class="col-sm-6 col-md-4">
                            <div class="club-card overflow-hidden">
                                <a href="{{ $img->image_url }}" target="_blank" title="View Full Image">
                                    <div style="height: 250px; overflow: hidden; background: #0a1424;">
                                        <img src="{{ $img->image_url }}" alt="{{ $img->caption }}" class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                                    </div>
                                </a>
                                @if($img->caption)
                                    <div class="p-3 text-center small text-muted font-italic">
                                        {{ $img->caption }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
