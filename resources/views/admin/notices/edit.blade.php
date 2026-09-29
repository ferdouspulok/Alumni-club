@extends('layouts.admin')

@section('title', 'Edit Notice: ' . $notice->title)

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Edit Notice</h3>
            <span class="text-muted small">{{ $notice->title }}</span>
        </div>
        <a href="{{ route('admin.notices.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Notices
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.notices.update', $notice) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3 mb-4">
                <div class="col-md-8">
                    <label class="form-label small fw-semibold">Notice Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" required value="{{ old('title', $notice->title) }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Notice Reference Number</label>
                    <input type="text" name="notice_number" class="form-control" value="{{ old('notice_number', $notice->notice_number) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Publish Date <span class="text-danger">*</span></label>
                    <input type="date" name="publish_date" class="form-control" required value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select" required>
                        <option value="published" {{ $notice->status === 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ $notice->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Notice Text / Announcement <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="6" required>{{ old('description', $notice->description) }}</textarea>
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Replace Attached File</label>
                    <input type="file" name="file_attachment" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                    @if($notice->file_attachment)
                        <div class="form-text small text-success">
                            <i class="bi bi-file-check me-1"></i> Current attachment: {{ $notice->file_attachment }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-check mb-4 bg-light p-3 rounded-3 border">
                <input class="form-check-input" type="checkbox" name="is_pinned" id="is_pinned" value="1" {{ $notice->is_pinned ? 'checked' : '' }}>
                <label class="form-check-label small fw-semibold" for="is_pinned">
                    Pin this notice to top of Notice Board & Homepage Ticker
                </label>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-save me-1"></i> Update Notice
                </button>
            </div>
        </form>
    </div>

@endsection
