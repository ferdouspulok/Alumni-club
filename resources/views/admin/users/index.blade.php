@extends('layouts.admin')

@section('title', 'Admin Users & Roles | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Admin Users & Roles</h3>
            <span class="text-muted small">Manage administrative staff credentials and permissions</span>
        </div>
        <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#createAdminModal">
            <i class="bi bi-person-plus me-1"></i> Add Admin User
        </button>
    </div>

    <!-- Role Explanation Banner -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="p-3 bg-white rounded-3 border-start border-4 border-primary shadow-sm small h-100">
                <strong class="text-navy d-block mb-1"><i class="bi bi-shield-fill-check text-primary me-1"></i> Super Admin</strong>
                Full unrestricted administrative control over members, content, governance, finances, and system settings.
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 bg-white rounded-3 border-start border-4 border-warning shadow-sm small h-100">
                <strong class="text-navy d-block mb-1"><i class="bi bi-people-fill text-warning me-1"></i> Member Manager</strong>
                Focused on membership lifecycle: reviews applications, approves/rejects members, and manages membership tiers and committees.
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 bg-white rounded-3 border-start border-4 border-info shadow-sm small h-100">
                <strong class="text-navy d-block mb-1"><i class="bi bi-journal-richtext text-info me-1"></i> Content Manager</strong>
                Specialized in website editorial: edits CMS static pages, publishes news stories, notice board circulars, photo gallery, events, and documents.
            </div>
        </div>
    </div>

    <!-- Permissions Specification Matrix Accordion -->
    <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white overflow-hidden">
        <div class="card-header bg-light border-0 py-3 px-4 d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-shield-shaded text-warning fs-5"></i>
                <h6 class="font-serif text-navy mb-0 fw-bold">Role Permissions & Access Control Specification</h6>
            </div>
            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#permissionsMatrixCollapse">
                <i class="bi bi-arrows-expand me-1"></i> Toggle Detailed Matrix
            </button>
        </div>
        <div class="collapse show" id="permissionsMatrixCollapse">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0 small text-center">
                    <thead class="bg-light text-navy text-uppercase" style="font-size: 0.72rem;">
                        <tr>
                            <th class="text-start" style="width: 35%;">System Feature / Administrative Module</th>
                            <th style="width: 20%;" class="bg-info bg-opacity-10 text-dark">
                                <i class="bi bi-journal-richtext me-1"></i> Content Manager
                            </th>
                            <th style="width: 20%;" class="bg-warning bg-opacity-10 text-dark">
                                <i class="bi bi-people-fill me-1"></i> Member Manager
                            </th>
                            <th style="width: 25%;" class="bg-primary bg-opacity-10 text-dark">
                                <i class="bi bi-shield-fill-check me-1"></i> Super Admin
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-layout-text-window-reverse text-info me-2"></i> Website Pages CMS (About, Mission, President Message, Constitution)
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Editorial</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> No Access</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-newspaper text-info me-2"></i> News Articles & Club Activities (Write, Publish, Categorize)
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Editorial</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> No Access</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-megaphone text-info me-2"></i> Notice Board Circulars & PDF Attachments
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Editorial</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> No Access</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-images text-info me-2"></i> Photo Gallery & Albums (Create Albums, Upload Photos)
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Editorial</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> No Access</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-file-earmark-arrow-down text-info me-2"></i> Official Documents, By-Laws & Forms
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Editorial</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> No Access</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-calendar-event text-success me-2"></i> Club Events & RSVP Attendee Lists
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Manage Events</td>
                            <td class="text-success fw-bold bg-warning bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Manage Events</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-envelope text-navy me-2"></i> Contact Inquiries & Feedback Messages
                            </td>
                            <td class="text-success fw-bold bg-info bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Read & Note</td>
                            <td class="text-success fw-bold bg-warning bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Read & Note</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-people text-warning me-2"></i> Member Applications, Approvals & Dossiers
                            </td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-success fw-bold bg-warning bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Control</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-award text-warning me-2"></i> Membership Types & Category Fees
                            </td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-success fw-bold bg-warning bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Control</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-diagram-3 text-warning me-2"></i> Executive Committee Terms & Appointments
                            </td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-success fw-bold bg-warning bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Control</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-sliders text-danger me-2"></i> General System Settings & Secretariats
                            </td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">
                                <i class="bi bi-shield-lock text-danger me-2"></i> Staff Admin Accounts & Role Allocation
                            </td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-danger"><i class="bi bi-x-circle me-1"></i> Restricted (403)</td>
                            <td class="text-success fw-bold bg-primary bg-opacity-10"><i class="bi bi-check-circle-fill me-1"></i> Full Access</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Administrator Name</th>
                        <th>Email & Phone</th>
                        <th>Assigned Role</th>
                        <th>Status</th>
                        <th>Created Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="bg-navy p-2 rounded-circle text-warning fs-6">
                                        <i class="bi bi-person-badge-fill"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">{{ $admin->name }}</h6>
                                        @if($admin->id === auth()->id())
                                            <span class="badge bg-light text-navy border" style="font-size: 0.65rem;">You</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="small">
                                <div>{{ $admin->email }}</div>
                                <div class="text-muted">{{ $admin->phone ?: 'No phone' }}</div>
                            </td>
                            <td>
                                @if($admin->role === 'super_admin')
                                    <span class="badge bg-primary text-uppercase">Super Admin</span>
                                @elseif($admin->role === 'member_manager')
                                    <span class="badge bg-warning text-dark text-uppercase">Member Manager</span>
                                @elseif($admin->role === 'content_manager')
                                    <span class="badge bg-info text-dark text-uppercase">Content Manager</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge bg-{{ $admin->status === 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($admin->status) }}
                                </span>
                            </td>
                            <td class="small text-muted">{{ $admin->created_at->format('d M, Y') }}</td>
                            <td class="text-end">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editAdminModal{{ $admin->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                @if($admin->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $admin) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this administrator account?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>

                        <!-- Edit Admin Modal -->
                        <div class="modal fade" id="editAdminModal{{ $admin->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('admin.users.update', $admin) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title font-serif">Edit Admin: {{ $admin->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Phone Number</label>
                                                <input type="text" name="phone" class="form-control" value="{{ $admin->phone }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Role <span class="text-danger">*</span></label>
                                                <select name="role" class="form-select" required>
                                                    <option value="super_admin" {{ $admin->role === 'super_admin' ? 'selected' : '' }}>Super Admin (Full Access)</option>
                                                    <option value="member_manager" {{ $admin->role === 'member_manager' ? 'selected' : '' }}>Member Manager (Members & Applications)</option>
                                                    <option value="content_manager" {{ $admin->role === 'content_manager' ? 'selected' : '' }}>Content Manager (News, Events, Media, CMS)</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-select" required>
                                                    <option value="active" {{ $admin->status === 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $admin->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-semibold">Reset Password (leave empty to keep current)</label>
                                                <input type="password" name="password" class="form-control" placeholder="••••••••">
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

    <!-- Create Admin Modal -->
    <div class="modal fade" id="createAdminModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Create Admin User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" required placeholder="Staff Full Name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" required placeholder="admin@chatkhil.club">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="+880 1XXXXXXXXX">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Role <span class="text-danger">*</span></label>
                            <select name="role" class="form-select" required>
                                <option value="super_admin">Super Admin (Full Access)</option>
                                <option value="member_manager">Member Manager (Members & Applications)</option>
                                <option value="content_manager">Content Manager (News, Events, Media, CMS)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Initial Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" required placeholder="Minimum 8 characters">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
