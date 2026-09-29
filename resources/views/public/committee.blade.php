@extends('layouts.public')

@section('title', 'Executive Committee | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Governance</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Executive Committee</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Leadership and governance of Chatkhil Elite Club Limited</p>
        </div>
    </div>

    <!-- Committee Period Selector Bar -->
    <div class="bg-light py-3 border-bottom">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
            <div>
                <span class="text-muted small text-uppercase fw-bold">Active Tenure:</span>
                <span class="badge bg-warning text-dark fs-6 ms-2 font-serif">{{ $selectedCommittee->name }}</span>
                @if($selectedCommittee->is_current)
                    <span class="badge bg-success ms-1"><i class="bi bi-check-circle-fill me-1"></i> Current Board</span>
                @else
                    <span class="badge bg-secondary ms-1">Historical Archive</span>
                @endif
            </div>

            <!-- Switcher Dropdown -->
            <form action="{{ route('committee') }}" method="GET" class="d-flex align-items-center gap-2">
                <label for="committee_id" class="small text-muted text-nowrap">Select Period:</label>
                <select name="committee_id" id="committee_id" class="form-select form-select-sm" onchange="this.form.submit()">
                    @foreach($allCommittees as $comm)
                        <option value="{{ $comm->id }}" {{ $selectedCommittee->id == $comm->id ? 'selected' : '' }}>
                            {{ $comm->name }} {{ $comm->is_current ? '(Current)' : '' }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <!-- Committee Members Roster -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="section-title-wrap mb-5">
                <span class="section-subtitle">Board of Directors & Officers</span>
                <h2 class="section-main-title">{{ $selectedCommittee->name }}</h2>
                <p class="text-muted mt-2">Term: {{ $selectedCommittee->term_start_year }} – {{ $selectedCommittee->term_end_year }}</p>
            </div>

            @if($selectedCommittee->members->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 text-secondary mb-3 d-block"></i>
                    No members listed under this committee tenure yet.
                </div>
            @else
                <div class="row g-4">
                    @foreach($selectedCommittee->members as $member)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="club-card text-center p-4">
                                <div class="mx-auto mb-3" style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                                    <img src="{{ $member->photo_url }}" alt="{{ $member->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h5 class="font-serif mb-1 fs-6 fw-bold text-navy">{{ $member->name }}</h5>
                                <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2" style="font-size: 0.72rem;">
                                    {{ $member->designation }}
                                </span>
                                @if($member->member && $member->member->member_id)
                                    <div class="small text-muted mb-2 font-monospace">{{ $member->member->member_id }}</div>
                                @endif
                                @if($member->bio)
                                    <p class="small text-muted mb-3" style="font-size: 0.82rem; line-height: 1.4;">
                                        {{ Str::limit($member->bio, 80) }}
                                    </p>
                                @endif
                                @if($member->phone)
                                    <div class="pt-2 border-top">
                                        <a href="tel:{{ $member->phone }}" class="text-muted small text-decoration-none">
                                            <i class="bi bi-telephone text-warning me-1"></i> {{ $member->phone }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
