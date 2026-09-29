@extends('layouts.admin')

@section('title', 'Manage Photo Gallery | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Photo Gallery Albums</h3>
            <span class="text-muted small">Manage event galleries and club photo collections</span>
        </div>
        <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#createAlbumModal">
            <i class="bi bi-plus-lg me-1"></i> New Album
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Album Cover & Title</th>
                        <th>Event Date</th>
                        <th>Photos Count</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($albums as $alb)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $alb->cover_url }}" alt="Cover" style="width: 50px; height: 35px; object-fit: cover; border-radius: 4px;">
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold">
                                            <a href="{{ route('admin.gallery.show', $alb) }}" class="text-navy text-decoration-none">
                                                {{ $alb->title }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">{{ Str::limit($alb->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="small">{{ $alb->event_date ? $alb->event_date->format('d M, Y') : 'N/A' }}</td>
                            <td>
                                <span class="badge bg-light text-navy border font-monospace">
                                    {{ $alb->images_count }} Photo(s)
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $alb->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($alb->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.gallery.show', $alb) }}" class="btn btn-sm btn-outline-primary" title="Manage Photos">
                                    <i class="bi bi-images me-1"></i> Photos
                                </a>
                                <form action="{{ route('admin.gallery.destroy', $alb) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this album and all its images?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No albums created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Album Modal -->
    <div class="modal fade" id="createAlbumModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Create Photo Album</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Album Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required placeholder="e.g. Annual Sports Tournament 2026">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Event Date</label>
                                <input type="date" name="event_date" class="form-control" value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                                <select name="status" class="form-select" required>
                                    <option value="published">Published</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Album Description</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="Highlights of the event..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Create Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
