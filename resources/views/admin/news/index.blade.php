@extends('layouts.admin')

@section('title', 'Manage News & Activities | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">News & Club Activities</h3>
            <span class="text-muted small">Publish announcements, community welfare reports, and sports achievements</span>
        </div>
        <div class="d-flex gap-2">
            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#catModal">
                <i class="bi bi-tag me-1"></i> Add Category
            </button>
            <a href="{{ route('admin.news.create') }}" class="btn btn-club-gold btn-sm">
                <i class="bi bi-plus-lg me-1"></i> New Article
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Published Date</th>
                        <th>Views</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($newsList as $news)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ $news->thumbnail_url }}" alt="Thumb" style="width: 48px; height: 35px; object-fit: cover; border-radius: 4px;">
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold">
                                            <a href="{{ route('news.show', $news->slug) }}" target="_blank" class="text-navy text-decoration-none">
                                                {{ Str::limit($news->title, 55) }}
                                            </a>
                                        </h6>
                                        @if($news->is_featured)
                                            <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Featured</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-navy border">
                                    {{ $news->category ? $news->category->name : 'General' }}
                                </span>
                            </td>
                            <td class="small text-muted">{{ $news->author_name }}</td>
                            <td class="small text-muted">
                                {{ $news->published_at ? $news->published_at->format('d M, Y') : 'N/A' }}
                            </td>
                            <td class="small font-monospace">{{ $news->views_count }}</td>
                            <td>
                                <span class="badge bg-{{ $news->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($news->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $news) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?');">
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
                            <td colspan="7" class="text-center py-5 text-muted">No news articles published yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $newsList->links('pagination::bootstrap-5') }}
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="catModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.news.categories.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Add News Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label small fw-semibold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Sports, Cultural, Charity">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
