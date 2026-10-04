@extends('layouts.public')

@section('title', '403 Forbidden - Access Restricted | Chatkhil Elite Club Limited')

@section('content')
<div class="container py-5 my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" 
                 style="background: rgba(10, 20, 36, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(223, 196, 136, 0.3) !important;">
                
                <div class="p-4 p-md-5 text-center text-white">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-4" 
                         style="width: 80px; height: 80px; background: rgba(239, 68, 68, 0.15); border: 2px solid rgba(239, 68, 68, 0.4);">
                        <i class="bi bi-shield-lock-fill text-danger fs-1"></i>
                    </div>

                    <div class="d-inline-block px-3 py-1 rounded-pill mb-3" 
                         style="background: rgba(197, 160, 89, 0.15); border: 1px solid rgba(197, 160, 89, 0.4);">
                        <span class="text-warning fw-bold text-uppercase" style="letter-spacing: 0.12em; font-size: 0.75rem;">
                            Administrative Security Protocol
                        </span>
                    </div>

                    <h2 class="font-serif text-white mb-2">403 &bull; Section Access Restricted</h2>
                    <p class="text-light-50 mb-4" style="color: #94a3b8; font-size: 0.95rem;">
                        {{ $exception->getMessage() ?: 'You do not have sufficient permissions to access this administrative section.' }}
                    </p>

                    @auth
                        <div class="p-3 rounded-3 text-start small mb-4" 
                             style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1);">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-light-50">Authenticated Account:</span>
                                <strong class="text-white">{{ auth()->user()->name }} ({{ auth()->user()->email }})</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-light-50">Assigned Role:</span>
                                <span class="badge bg-warning text-dark text-uppercase fw-bold">
                                    {{ str_replace('_', ' ', auth()->user()->role) }}
                                </span>
                            </div>
                            <div class="pt-2 border-top border-secondary border-opacity-25 text-light-50" style="font-size: 0.85rem;">
                                @if(auth()->user()->role === 'content_manager')
                                    <i class="bi bi-info-circle text-warning me-1"></i>
                                    As a <strong>Content Manager</strong>, your authorization is focused on managing 
                                    <strong>CMS Pages, News Articles, Notice Board, Photo Gallery, Official Documents, and Events</strong>. 
                                    Member registry, committee appointments, and system administration are restricted to Member Managers and Super Admins.
                                @elseif(auth()->user()->role === 'member_manager')
                                    <i class="bi bi-info-circle text-warning me-1"></i>
                                    As a <strong>Member Manager</strong>, your authorization is focused on member dossiers, approvals, and committee rosters.
                                @else
                                    <i class="bi bi-info-circle text-warning me-1"></i>
                                    Please request administrative access from the Super Administrator if you require entry to this section.
                                @endif
                            </div>
                        </div>
                    @endauth

                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-club-gold px-4 py-2">
                            <i class="bi bi-speedometer2 me-1"></i> Return to Admin Dashboard
                        </a>
                        @auth
                            @if(auth()->user()->role === 'content_manager')
                                <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-light px-3 py-2">
                                    <i class="bi bi-layout-text-window-reverse me-1"></i> Edit Website CMS
                                </a>
                                <a href="{{ route('admin.news.index') }}" class="btn btn-outline-light px-3 py-2">
                                    <i class="bi bi-newspaper me-1"></i> News & Articles
                                </a>
                            @endif
                        @endauth
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary px-3 py-2 text-white">
                            <i class="bi bi-house me-1"></i> Public Website
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
