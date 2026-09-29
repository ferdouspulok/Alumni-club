@extends('layouts.admin')

@section('title', 'Write News Article | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Write News Article</h3>
            <span class="text-muted small">Publish club activity reports and press statements</span>
        </div>
        <a href="{{ route('admin.news.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to News
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label class="form-label small fw-semibold">Article Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}" placeholder="Headline">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="news_category_id" class="form-select" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Author Name</label>
                    <input type="text" name="author_name" class="form-control" value="{{ old('author_name', 'Chatkhil Elite Club') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Publish Date</label>
                    <input type="date" name="published_at" class="form-control" value="{{ date('Y-m-d') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label class="form-label small fw-semibold">Featured Thumbnail Image</label>
                    <input type="file" name="thumbnail" class="form-control" accept="image/*">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Executive Summary (Short snippet for cards)</label>
                    <textarea name="summary" class="form-control" rows="2" placeholder="Brief summary...">{{ old('summary') }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Full Article Content</label>
                    <textarea name="content" class="form-control" rows="8" placeholder="Write full text or HTML formatted article...">{{ old('content') }}</textarea>
                </div>
            </div>

            <div class="form-check mb-4 bg-light p-3 rounded-3 border">
                <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1">
                <label class="form-check-label small fw-semibold" for="is_featured">
                    Feature on Homepage News Section
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-send me-1"></i> Publish Article
                </button>
            </div>
        </form>
    </div>

@endsection
