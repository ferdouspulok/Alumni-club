@extends('layouts.public')

@section('title', 'Member Directory | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Community</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Member Directory</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Roster of approved members of Chatkhil Elite Club Limited</p>
        </div>
    </div>

    <!-- Search & Filter Controls -->
    <div class="bg-light py-4 border-bottom">
        <div class="container">
            <form action="{{ route('members.index') }}" method="GET" class="row g-3 align-items-center">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-search text-warning"></i></span>
                        <input type="text" name="search" class="form-control" placeholder="Search by name, Member ID, profession..." value="{{ request('search') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <select name="type" class="form-select">
                        <option value="">All Membership Types</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <input type="text" name="profession" class="form-control" placeholder="Filter Profession" value="{{ request('profession') }}">
                </div>

                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-club-primary w-100">Filter</button>
                    @if(request()->hasAny(['search', 'type', 'profession']))
                        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary" title="Reset"><i class="bi bi-arrow-counterclockwise"></i></a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    <!-- Member Cards Grid -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            @if($members->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-person-x fs-1 text-muted d-block mb-3"></i>
                    <h5 class="text-muted">No members found matching your search criteria.</h5>
                    <a href="{{ route('members.index') }}" class="btn btn-sm btn-outline-dark mt-2">Clear Filters</a>
                </div>
            @else
                <div class="row g-4">
                    @foreach($members as $m)
                        <div class="col-md-6 col-lg-4">
                            <div class="club-card p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="d-flex gap-3 align-items-center mb-3">
                                        <div style="width: 75px; height: 75px; border-radius: 50%; overflow: hidden; border: 2px solid var(--club-gold); background: #0a1424; flex-shrink: 0;">
                                            <img src="{{ $m->photo_url }}" alt="{{ $m->full_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div>
                                            <h5 class="font-serif mb-1 fs-6 fw-bold text-navy">{{ $m->full_name }}</h5>
                                            <div class="badge bg-warning text-dark font-monospace mb-1">{{ $m->member_id ?? 'PENDING' }}</div>
                                            <div>
                                                <span class="badge bg-light text-navy border" style="font-size: 0.75rem;">
                                                    {{ $m->membershipType ? $m->membershipType->name : 'Member' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="small text-muted mb-3" style="line-height: 1.6;">
                                        @if($m->profession)
                                            <div><i class="bi bi-briefcase text-warning me-2"></i> {{ $m->profession }}</div>
                                        @endif
                                        @if($m->organization)
                                            <div><i class="bi bi-building text-warning me-2"></i> {{ $m->organization }}</div>
                                        @endif
                                        <div><i class="bi bi-geo-alt text-warning me-2"></i> {{ $m->upazila ?? 'Chatkhil' }}, {{ $m->district ?? 'Noakhali' }}</div>
                                    </div>
                                </div>

                                <div class="pt-3 border-top d-flex justify-content-between align-items-center">
                                    <div class="small">
                                        @if($m->show_phone_public && $m->mobile)
                                            <a href="tel:{{ $m->mobile }}" class="text-decoration-none me-2 text-navy" title="Call Member"><i class="bi bi-telephone-fill text-warning"></i> {{ $m->mobile }}</a>
                                        @endif
                                        @if($m->show_email_public && $m->email)
                                            <a href="mailto:{{ $m->email }}" class="text-decoration-none text-navy" title="Email Member"><i class="bi bi-envelope-fill text-warning"></i></a>
                                        @endif
                                    </div>
                                    @if($m->member_id)
                                        <a href="{{ route('verify.member', $m->member_id) }}" target="_blank" class="badge bg-light text-secondary text-decoration-none border" title="Verify Membership Card">
                                            <i class="bi bi-qr-code-scan me-1"></i> Verify
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    {{ $members->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

@endsection
