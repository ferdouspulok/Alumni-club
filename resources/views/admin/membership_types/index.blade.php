@extends('layouts.admin')

@section('title', 'Membership Types & Fees | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Membership Types & Categories</h3>
            <span class="text-muted small">Configure club admission and subscription fees</span>
        </div>
        <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#createTypeModal">
            <i class="bi bi-plus-lg me-1"></i> Add Category
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Order</th>
                        <th>Category Name</th>
                        <th>Fee (BDT)</th>
                        <th>Validity Type</th>
                        <th>Members Enrolled</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $t)
                        <tr>
                            <td><span class="badge bg-light text-navy border">{{ $t->order_num }}</span></td>
                            <td>
                                <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">{{ $t->name }}</h6>
                                <small class="text-muted">{{ Str::limit($t->description, 60) }}</small>
                            </td>
                            <td><strong class="text-navy font-monospace">৳{{ number_format($t->fee, 0) }}</strong></td>
                            <td class="text-capitalize">{{ $t->validity_type }}</td>
                            <td>
                                <span class="badge bg-light text-navy border font-monospace">{{ $t->members_count }} Members</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $t->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $t->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="{{ route('admin.membership-types.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this membership category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" {{ $t->members_count > 0 ? 'disabled' : '' }}>
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $t->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.membership-types.update', $t) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title font-serif">Edit Category: {{ $t->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Category Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $t->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Fee (BDT) <span class="text-danger">*</span></label>
                                                <input type="number" name="fee" class="form-control" value="{{ $t->fee }}" step="0.01" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Validity Type <span class="text-danger">*</span></label>
                                                <select name="validity_type" class="form-select" required>
                                                    <option value="annual" {{ $t->validity_type === 'annual' ? 'selected' : '' }}>Annual</option>
                                                    <option value="lifetime" {{ $t->validity_type === 'lifetime' ? 'selected' : '' }}>Lifetime</option>
                                                    <option value="custom" {{ $t->validity_type === 'custom' ? 'selected' : '' }}>Custom</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Display Order</label>
                                                <input type="number" name="order_num" class="form-control" value="{{ $t->order_num }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-select" required>
                                                    <option value="active" {{ $t->status === 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $t->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Description</label>
                                                <textarea name="description" class="form-control" rows="2">{{ $t->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-sm btn-club-gold">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createTypeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.membership-types.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Add New Membership Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Category Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="e.g. Honorary Member">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Fee (BDT) <span class="text-danger">*</span></label>
                            <input type="number" name="fee" class="form-control" step="0.01" required value="0">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Validity Type <span class="text-danger">*</span></label>
                            <select name="validity_type" class="form-select" required>
                                <option value="annual">Annual</option>
                                <option value="lifetime">Lifetime</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Display Order</label>
                            <input type="number" name="order_num" class="form-control" value="5">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Description</label>
                            <textarea name="description" class="form-control" rows="2" placeholder="Privileges and guidelines..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
