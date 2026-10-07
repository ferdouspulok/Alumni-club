@extends('layouts.public')

@section('title', 'Member & Admin Login | Chatkhil Elite Club Limited')

@section('content')

    <div class="py-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">

                    <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                        <div class="p-4 text-center" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
                            <img src="{{ asset('images/logo.png') }}" alt="Emblem" style="height: 65px; filter: drop-shadow(0 2px 8px rgba(197, 155, 39, 0.5));">
                            <h4 class="font-serif text-white mt-2 mb-1">Club Portal Login</h4>
                            <span class="text-warning small">Chatkhil Elite Club Limited</span>
                        </div>

                        <div class="card-body p-4 p-md-5">
                            @if(session('error'))
                                <div class="alert alert-danger small mb-4">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-navy">Member ID, Mobile Number, or Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-person-badge text-warning"></i></span>
                                        <input type="text" name="login" id="login_input" class="form-control" placeholder="e.g. CEC-2026-0001, 018XXXXXXXX, or Email" value="{{ old('login') }}" required autofocus>
                                    </div>
                                    <div class="form-text small" style="font-size: 0.74rem;">Approved members can log in using their assigned Member ID or Mobile.</div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label small fw-semibold text-navy">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-lock text-warning"></i></span>
                                        <input type="password" name="password" id="password_input" class="form-control" placeholder="••••••••" required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4 small">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label text-muted" for="remember">Remember me</label>
                                    </div>
                                    <a href="{{ route('contact') }}" class="text-decoration-none text-muted">Need help?</a>
                                </div>

                                <button type="submit" class="btn btn-club-gold w-100 fw-bold py-2 mb-3 shadow-sm">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Sign In to Member Portal
                                </button>
                            </form>

                            <div class="text-center mt-4 small text-muted">
                                Not a member yet? <a href="{{ route('membership.apply') }}" class="text-navy fw-bold text-decoration-none">Apply for Membership &rarr;</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
