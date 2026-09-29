@extends('layouts.admin')

@section('title', 'Manage Notices | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Notice Board Management</h3>
            <span class="text-muted small">Manage official circulars and downloadable announcements</span>
        </div>
        <a href="{{ route('admin.notices.create') }}" class="btn btn-club-gold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Add Notice
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Notice Details</th>
                        <th>Reference No</th>
                        <th>Publish Date</th>
                        <th>Attachment</th>
                        <th>Pinned</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notices as $not)
                        <tr>
                            <td>
                                <h6 class="font-serif mb-0 fs-6 fw-bold">
                                    <a href="{{ route('notices.show', $not->slug) }}" target="_blank" class="text-navy text-decoration-none">
                                        {{ $not->title }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ Str::limit($not->description, 70) }}</small>
                            </td>
                            <td class="small font-monospace text-muted">{{ $not->notice_number ?: 'N/A' }}</td>
                            <td class="small">{{ $not->publish_date->format('d M, Y') }}</td>
                            <td>
                                @if($not->file_attachment)
                                    <a href="{{ asset('uploads/notices/' . $not->file_attachment) }}" target="_blank" class="btn btn-sm btn-outline-danger" title="Download Attached File">
                                        <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download
                                    </a>
                                @else
                                    <span class="text-muted small">None</span>
                                @endif
                            </td>
                            <td>
                                @if($not->is_pinned)
                                    <span class="badge bg-warning text-dark"><i class="bi bi-pin-angle-fill"></i> Pinned</span>
                                @else
                                    <span class="text-muted small">Regular</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $not->status === 'published' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($not->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.notices.edit', $not) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.notices.destroy', $not) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this notice?');">
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
                            <td colspan="7" class="text-center py-5 text-muted">No notices found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $notices->links('pagination::bootstrap-5') }}
    </div>

@endsection
