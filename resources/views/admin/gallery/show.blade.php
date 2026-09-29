@extends('layouts.admin')

@section('title', 'Manage Album: ' . $gallery->title)

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">{{ $gallery->title }}</h3>
            <span class="text-muted small">Total Photos: {{ $gallery->images->count() }} &bull; {{ $gallery->event_date ? $gallery->event_date->format('M d, Y') : '' }}</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Albums
            </a>
            <a href="{{ route('gallery.show', $gallery->slug) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-eye me-1"></i> Public View
            </a>
        </div>
    </div>

    <!-- Upload Photos Box -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
        <h5 class="font-serif text-navy mb-3"><i class="bi bi-cloud-arrow-up-fill text-warning me-2"></i> Upload Photos to this Album</h5>
        <form action="{{ route('admin.gallery.upload', $gallery) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-md-9">
                    <input type="file" name="photos[]" class="form-control" multiple required accept="image/*">
                    <div class="form-text small">Select one or multiple photos simultaneously (JPG/PNG).</div>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-club-gold w-100 fw-bold">
                        <i class="bi bi-upload me-1"></i> Upload Photos
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Photos Grid -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
        <h5 class="font-serif text-navy mb-3">Photos in Album</h5>
        @if($gallery->images->isEmpty())
            <p class="text-muted small my-4 text-center">No photos in this album yet. Upload photos using the form above.</p>
        @else
            <div class="row g-3">
                @foreach($gallery->images as $img)
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                        <div class="card border rounded-3 overflow-hidden position-relative h-100 shadow-sm">
                            <div style="height: 130px; overflow: hidden; background: #0a1424;">
                                <img src="{{ $img->image_url }}" alt="Photo" class="w-100 h-100 object-fit-cover">
                            </div>
                            <div class="p-2 text-center bg-light">
                                <form action="{{ route('admin.gallery.images.destroy', $img) }}" method="POST" onsubmit="return confirm('Delete this photo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" style="font-size: 0.75rem;">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
