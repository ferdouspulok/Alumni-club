@extends('layouts.admin')

@section('title', 'Manage Documents & Downloads | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Documents & Downloads</h3>
            <span class="text-muted small">Manage constitution, membership forms, reports, and official circulars</span>
        </div>
        <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#uploadDocModal">
            <i class="bi bi-cloud-arrow-up me-1"></i> Upload Document
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Document Title</th>
                        <th>Category</th>
                        <th>File Size</th>
                        <th>Upload Date</th>
                        <th>Public Download</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($documents as $doc)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-file-earmark-pdf-fill text-danger fs-4"></i>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">{{ $doc->title }}</h6>
                                        <small class="text-muted">{{ Str::limit($doc->description, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-navy border text-capitalize">
                                    {{ str_replace('_', ' ', $doc->category) }}
                                </span>
                            </td>
                            <td class="small font-monospace text-muted">{{ $doc->file_size ?: 'N/A' }}</td>
                            <td class="small text-muted">{{ $doc->created_at->format('d M, Y') }}</td>
                            <td>
                                @if($doc->is_public)
                                    <span class="badge bg-success">Public</span>
                                @else
                                    <span class="badge bg-secondary">Internal</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ $doc->download_url }}" target="_blank" class="btn btn-sm btn-outline-primary" title="Download">
                                    <i class="bi bi-download"></i>
                                </a>
                                <form action="{{ route('admin.documents.destroy', $doc) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this document?');">
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
                            <td colspan="6" class="text-center py-5 text-muted">No documents uploaded yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Upload Document Modal -->
    <div class="modal fade" id="uploadDocModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.documents.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Upload Official Document</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Document Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" required placeholder="e.g. Chatkhil Elite Club Constitution 2026">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Category <span class="text-danger">*</span></label>
                            <select name="category" class="form-select" required>
                                <option value="constitution">Club Constitution & Rules</option>
                                <option value="form">Membership Application Form</option>
                                <option value="report">Annual Audit & Activity Report</option>
                                <option value="circular">Important Circular</option>
                                <option value="other">Other Official Document</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Attach File <span class="text-danger">*</span></label>
                            <input type="file" name="file" class="form-control" required accept=".pdf,.doc,.docx,.xls,.xlsx">
                            <div class="form-text small">Accepted formats: PDF, Word, Excel (max 20MB).</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Description / Abstract</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="Brief note on document contents..."></textarea>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_public" id="is_public_doc" value="1" checked>
                            <label class="form-check-label small fw-semibold" for="is_public_doc">
                                Make available for public download on the website
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Upload Document</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
