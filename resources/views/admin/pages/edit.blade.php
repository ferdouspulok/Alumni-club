@extends('layouts.admin')

@section('title', 'Edit Page: ' . $page->title)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Edit Page: {{ $page->title }}</h3>
            <span class="text-muted small">Slug: <code>/about/{{ $page->slug === 'about-us' ? '' : $page->slug }}</code></span>
        </div>
        <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Pages
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $page->title) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Page Subtitle</label>
                    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $page->subtitle) }}">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Page Content (HTML supported) <span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control" rows="12" required>{{ old('content', $page->content) }}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Featured Image</label>
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-save me-1"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

@endsection
