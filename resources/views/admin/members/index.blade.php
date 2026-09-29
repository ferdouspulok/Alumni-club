@extends('layouts.admin')

@section('title', 'Manage Members | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Member Management</h3>
            <span class="text-muted small">Total Members: {{ $members->total() }}</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.members.export') }}" class="btn btn-outline-success btn-sm">
                <i class="bi bi-file-earmark-spreadsheet me-1"></i> Export CSV
            </a>
            <a href="{{ route('admin.members.pending') }}" class="btn btn-warning btn-sm">
                <i class="bi bi-clock-history me-1"></i> Review Pending
            </a>
            <a href="{{ route('admin.members.create') }}" class="btn btn-club-gold btn-sm">
                <i class="bi bi-person-plus me-1"></i> Add Member
            </a>
        </div>
    </div>

    <!-- Filters & Search -->
    <div class="card border-0 shadow-sm rounded-4 p-3 bg-white mb-4">
        <form action="{{ route('admin.members.index') }}" method="GET" class="row g-2">
            <div class="col-md-5">
                <div class="input-group input-group-sm">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="search" class="form-control" placeholder="Search name, Member ID, phone, email..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-3">
                <select name="type" class="form-select form-select-sm">
                    <option value="">All Categories</option>
                    @foreach($types as $t)
                        <option value="{{ $t->id }}" {{ request('type') == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Approved</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-club-primary w-100">Filter</button>
                @if(request()->hasAny(['search', 'type', 'status']))
                    <a href="{{ route('admin.members.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset"><i class="bi bi-x-circle"></i></a>
                @endif
            </div>
        </form>
    </div>

    <!-- Members Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Member Details</th>
                        <th>Member ID</th>
                        <th>Category</th>
                        <th>Mobile & Email</th>
                        <th>Profession</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $m)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 42px; height: 42px; border-radius: 50%; overflow: hidden; background: #0a1424; flex-shrink: 0;">
                                        <img src="{{ $m->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6">
                                            <a href="{{ route('admin.members.show', $m) }}" class="text-navy text-decoration-none fw-bold">
                                                {{ $m->full_name }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">{{ $m->upazila ?? 'Chatkhil' }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-navy border font-monospace fs-6">
                                    {{ $m->member_id ?? 'PENDING' }}
                                </span>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark">
                                    {{ $m->membershipType ? $m->membershipType->name : 'N/A' }}
                                </span>
                            </td>
                            <td class="small">
                                <div><i class="bi bi-telephone text-muted me-1"></i> {{ $m->mobile }}</div>
                                @if($m->email)
                                    <div class="text-muted"><i class="bi bi-envelope text-muted me-1"></i> {{ $m->email }}</div>
                                @endif
                            </td>
                            <td class="small text-muted">
                                {{ $m->profession ?: 'N/A' }}
                            </td>
                            <td>
                                @if($m->status === 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($m->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($m->status === 'rejected')
                                    <span class="badge bg-danger">Rejected</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($m->status) }}</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.members.show', $m) }}" class="btn btn-sm btn-outline-primary" title="View Dossier">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.members.edit', $m) }}" class="btn btn-sm btn-outline-secondary" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.members.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member record?');">
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
                            <td colspan="7" class="text-center py-5 text-muted">No members found matching your search.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $members->links('pagination::bootstrap-5') }}
    </div>

@endsection
