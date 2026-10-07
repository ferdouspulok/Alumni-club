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
            @if($selectedCommittee)
            <div>
                <span class="text-muted small text-uppercase fw-bold">Active Tenure:</span>
                <span class="badge bg-warning text-dark fs-6 ms-2 font-serif">{{ $selectedCommittee->name }}</span>
                @if($selectedCommittee->is_current)
                    <span class="badge bg-success ms-1"><i class="bi bi-check-circle-fill me-1"></i> Current Board</span>
                @else
                    <span class="badge bg-secondary ms-1">Historical Archive</span>
                @endif
            </div>
            @endif

            <!-- Switcher Dropdown -->
            <form action="{{ route('committee') }}" method="GET" class="d-flex align-items-center gap-2">
                <label for="committee_id" class="small text-muted text-nowrap">Select Period:</label>
                <select name="committee_id" id="committee_id" class="form-select form-select-sm" onchange="this.form.submit()">
                    @foreach($allCommittees as $comm)
                        <option value="{{ $comm->id }}" {{ $selectedCommittee && $selectedCommittee->id == $comm->id ? 'selected' : '' }}>
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
                <h2 class="section-main-title">{{ $selectedCommittee?->name ?? 'Executive Committee' }}</h2>
                @if($selectedCommittee)
                    <p class="text-muted mt-2">Term: {{ $selectedCommittee->term_start_year }} – {{ $selectedCommittee->term_end_year }}</p>
                @endif
            </div>

            @if(!$selectedCommittee || $selectedCommittee->members->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-people fs-1 text-secondary mb-3 d-block"></i>
                    No members listed under this committee tenure yet.
                </div>
            @else
                @if(isset($president) && $president)
                    <!-- President (Single Center-Aligned) -->
                    <div class="row justify-content-center mb-5">
                        <div class="col-sm-8 col-md-5 col-lg-4">
                            <div class="club-card text-center p-4 position-relative" style="border-top: 4px solid var(--club-gold);">
                                <div class="mx-auto mb-3" style="width: 140px; height: 140px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424; box-shadow: 0 8px 24px rgba(197, 160, 89, 0.25);">
                                    <img src="{{ $president->photo_url }}" alt="{{ $president->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                </div>
                                <h4 class="font-serif mb-1 fs-5 fw-bold text-navy">{{ $president->name }}</h4>
                                <span class="badge bg-warning text-dark text-uppercase fw-bold mb-2 px-3 py-1" style="font-size: 0.78rem; letter-spacing: 0.5px;">
                                    {{ $president->designation }}
                                </span>
                                @if($president->member && $president->member->member_id)
                                    <div class="small text-muted mb-2 font-monospace">{{ $president->member->member_id }}</div>
                                @endif
                                @if($president->bio)
                                    <p class="small text-muted mb-3" style="font-size: 0.84rem; line-height: 1.5; white-space: pre-line;">
                                        {{ $president->bio }}
                                    </p>
                                @endif
                                @if($president->phone)
                                    <div class="pt-2 border-top">
                                        <a href="tel:{{ $president->phone }}" class="text-muted small text-decoration-none">
                                            <i class="bi bi-telephone text-warning me-1"></i> {{ $president->phone }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Other Committee Members -->
                @if(isset($otherMembers) && $otherMembers->isNotEmpty())
                    <div class="row g-4 justify-content-center">
                        @foreach($otherMembers as $member)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="club-card text-center p-4 d-flex flex-column justify-content-between h-100">
                                    <div>
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
                                            <p class="small text-muted mb-3" style="font-size: 0.82rem; line-height: 1.4; white-space: pre-line;">
                                                {{ Str::limit($member->bio, 120) }}
                                            </p>
                                        @endif
                                    </div>
                                    @if($member->phone)
                                        <div class="pt-2 border-top mt-auto">
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
            @endif
        </div>
    </div>

@endsection
