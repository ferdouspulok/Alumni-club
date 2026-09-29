@extends('layouts.admin')

@section('title', 'Manage Committee: ' . $committee->name)

@section('content')

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">{{ $committee->name }}</h3>
            <span class="text-muted small">
                Years: {{ $committee->term_start_year }} – {{ $committee->term_end_year }} &bull; 
                @if($committee->is_current)
                    <span class="badge bg-warning text-dark"><i class="bi bi-check-circle-fill me-1"></i> Current Committee</span>
                @else
                    <span class="badge bg-secondary">Archived Tenure</span>
                @endif
            </span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.committees.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> All Tenures
            </a>
            <button type="button" class="btn btn-club-gold btn-sm" data-bs-toggle="modal" data-bs-target="#addMemberModal">
                <i class="bi bi-person-plus me-1"></i> Add Committee Position
            </button>
        </div>
    </div>

    <!-- Committee Members Table -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th style="width: 70px;">Order</th>
                        <th>Member Name</th>
                        <th>Designation / Position</th>
                        <th>Linked Club Member ID</th>
                        <th>Contact</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($committee->members as $m)
                        <tr>
                            <td><span class="badge bg-light text-navy border font-monospace">{{ $m->display_order }}</span></td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width: 40px; height: 40px; border-radius: 50%; overflow: hidden; background: #0a1424; flex-shrink: 0;">
                                        <img src="{{ $m->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">{{ $m->name }}</h6>
                                        @if($m->bio)
                                            <small class="text-muted">{{ Str::limit($m->bio, 50) }}</small>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-warning text-dark fw-bold" style="font-size: 0.78rem;">
                                    {{ $m->designation }}
                                </span>
                            </td>
                            <td>
                                @if($m->member && $m->member->member_id)
                                    <span class="member-id-badge">{{ $m->member->member_id }}</span>
                                @else
                                    <span class="text-muted small">External / Not Linked</span>
                                @endif
                            </td>
                            <td class="small text-muted">
                                @if($m->phone) <div>{{ $m->phone }}</div> @endif
                                @if($m->email) <div>{{ $m->email }}</div> @endif
                            </td>
                            <td class="text-end">
                                <form action="{{ route('admin.committees.members.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove {{ $m->name }} from this committee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Remove Member">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">No committee positions added yet. Click "Add Committee Position" to populate the board.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Member Modal -->
    <div class="modal fade" id="addMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.committees.members.store', $committee) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title font-serif">Add Position to {{ $committee->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Link with Approved Member (Optional)</label>
                            <select name="member_id" id="member_select" class="form-select" onchange="autoFillMember(this)">
                                <option value="">-- Choose Member or Enter Below --</option>
                                @foreach($approvedMembers as $appM)
                                    <option value="{{ $appM->id }}" data-name="{{ $appM->full_name }}" data-phone="{{ $appM->mobile }}" data-email="{{ $appM->email }}">
                                        {{ $appM->full_name }} ({{ $appM->member_id }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Member Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name_input" class="form-control" required placeholder="Full Name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Designation / Executive Position <span class="text-danger">*</span></label>
                            <input type="text" name="designation" class="form-control" required placeholder="e.g. President, General Secretary, Treasurer">
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Contact Phone</label>
                                <input type="text" name="phone" id="phone_input" class="form-control" placeholder="+880 1XXXXXXXXX">
                            </div>
                            <div class="col-6">
                                <label class="form-label small fw-semibold">Display Order <span class="text-danger">*</span></label>
                                <input type="number" name="display_order" class="form-control" required value="1" placeholder="1 = Top">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Short Bio / Credentials</label>
                            <textarea name="bio" class="form-control" rows="2" placeholder="Brief background or achievements..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Photo (Optional override)</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-club-gold">Add Position</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function autoFillMember(select) {
            const opt = select.options[select.selectedIndex];
            if (opt.value) {
                document.getElementById('name_input').value = opt.getAttribute('data-name');
                document.getElementById('phone_input').value = opt.getAttribute('data-phone');
            }
        }
    </script>
    @endpush

@endsection
