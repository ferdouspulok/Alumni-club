@extends('layouts.admin')

@section('title', 'Edit Article: ' . $news->title)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Edit News Article</h3>
            <span class="text-muted small">{{ $news->title }}</span>
        </div>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to News
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label class="form-label small fw-semibold">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $news->title) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="news_category_id" class="form-select" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $news->news_category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Author Name</label>
                    <input type="text" name="author_name" class="form-control" value="{{ old('author_name', $news->author_name) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Publish Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : date('Y-m-d')) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="published" {{ $news->status === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ $news->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-semibold">Change Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Executive Summary</label>
                    <textarea name="summary" class="form-control" rows="2">{{ old('summary', $news->summary) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Full Article Content</label>
                    <textarea name="content" class="form-control" rows="8">{{ old('content', $news->content) }}</textarea>
                </div>
            </div>

            <div class="form-check mb-4 bg-light p-3 rounded-3 border">
                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ $news->is_featured ? 'checked' : '' }}>
                <label class="form-check-label small fw-semibold" for="is_featured">
                    Feature on Homepage News Section
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-save me-1"></i> Update Article
                </button>
            </div>
        </form>
    </div>

@endsection
