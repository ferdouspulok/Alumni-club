@extends('layouts.member')

@section('title', 'Change Password | Chatkhil Elite Club Limited')

@section('content')

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white" style="max-width: 600px;">
        <h4 class="font-serif text-navy mb-1">Change Account Password</h4>
        <p class="text-muted small mb-4">Ensure your account is protected with a secure password</p>

        @if($errors->any())
            <div class="alert alert-danger small mb-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('member.change-password.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label small fw-semibold">Current Password</label>
                <input type="password" name="current_password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-semibold">New Password (minimum 8 characters)</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-semibold">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                <i class="bi bi-shield-check me-1"></i> Update Password
            </button>
        </form>
    </div>

@endsection
