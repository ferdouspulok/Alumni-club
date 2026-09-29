@extends('layouts.admin')

@section('title', 'Committee Terms & Tenures | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Executive Committee Tenures</h3>
            <span class="text-muted small">Manage current and historical committee periods</span>
        </div>
        <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#createCommitteeModal">
            <i class="bi bi-plus-lg me-1"></i> Add Committee Tenure
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Tenure Name</th>
                        <th>Period Years</th>
                        <th>Status</th>
                        <th>Current Board</th>
                        <th>Members Count</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($committees as $c)
                        <tr>
                            <td>
                                <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">
                                    <a href="{{ route('admin.committees.show', $c) }}" class="text-navy text-decoration-none">
                                        {{ $c->name }}
                                    </a>
                                </h6>
                            </td>
                            <td>{{ $c->term_start_year }} – {{ $c->term_end_year }}</td>
                            <td>
                                <span class="badge bg-{{ $c->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($c->status) }}
                                </span>
                            </td>
                            <td>
                                @if($c->is_current)
                                    <span class="badge bg-warning text-dark"><i class="bi bi-check-circle-fill me-1"></i> Current Committee</span>
                                @else
                                    <span class="text-muted small">Archived</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-light text-navy border font-monospace">{{ $c->members_count }} Members</span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.committees.show', $c) }}" class="btn btn-sm btn-outline-primary" title="Manage Members">
                                    <i class="bi bi-people me-1"></i> Manage Members
                                </a>
                                <form action="{{ route('admin.committees.destroy', $c) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this entire committee period and its members?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Committee Modal -->
    <div class="modal fade" id="createCommitteeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.committees.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Create Committee Tenure</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Tenure Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Executive Committee 2028–2030">
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Start Year <span class="text-danger">*</span></label>
                                <input type="number" name="term_start_year" class="form-control" required value="{{ date('Y') }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">End Year <span class="text-danger">*</span></label>
                                <input type="number" name="term_end_year" class="form-control" required value="{{ date('Y') + 2 }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_current" id="is_current_create" value="1">
                            <label class="form-check-label small fw-bold" for="is_current_create">
                                Set as Current Active Committee (will unset other tenures)
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Save Tenure</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
