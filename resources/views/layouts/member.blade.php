<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Member Portal | Chatkhil Elite Club Limited')</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Club Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/club-style.css') }}">
    @stack('styles')
</head>
<body class="bg-light">

    <!-- Top Member Bar -->
    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm py-2 sticky-top">
        <div class="container-fluid px-md-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('member.dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 42px;">
                <span class="font-serif fw-bold text-navy fs-5">Chatkhil Elite Club</span>
                <span class="badge bg-warning text-dark text-uppercase font-sans" style="font-size: 0.7rem;">Member Portal</span>
            </a>

            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" class="btn btn-sm btn-outline-secondary d-none d-md-inline">
                    <i class="bi bi-globe me-1"></i> Public Website
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-dark dropdown-toggle d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle text-warning fs-6"></i>
                        <span>{{ auth()->user()->name }}</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                        <li><a class="dropdown-item" href="{{ route('member.profile') }}"><i class="bi bi-person me-2"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('member.digital-card') }}"><i class="bi bi-credit-card-2-front me-2"></i> Digital ID Card</a></li>
                        <li><a class="dropdown-item" href="{{ route('member.change-password') }}"><i class="bi bi-shield-lock me-2"></i> Change Password</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Container with Sidebar -->
    <div class="container-fluid px-md-4 py-4">
        <div class="row g-4">
            <!-- Member Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center mb-4">
                    @php $member = auth()->user()->member; @endphp
                    <div class="mx-auto mb-3" style="width: 90px; height: 90px; border-radius: 50%; overflow: hidden; border: 3px solid var(--club-gold); background: #0a1424;">
                        <img src="{{ $member ? $member->photo_url : asset('images/avatar-placeholder.png') }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <h5 class="font-serif fw-bold text-navy mb-1 fs-6">{{ auth()->user()->name }}</h5>
                    <div class="badge bg-warning text-dark font-monospace mb-2">
                        {{ $member ? $member->member_id : 'MEMBER' }}
                    </div>
                    <span class="badge bg-light text-navy border small mb-3">
                        {{ $member && $member->membershipType ? $member->membershipType->name : 'General Member' }}
                    </span>

                    <hr class="my-2">

                    <nav class="nav flex-column text-start mt-2">
                        <a href="{{ route('member.dashboard') }}" class="nav-link py-2 px-3 rounded-3 mb-1 {{ request()->routeIs('member.dashboard') ? 'bg-navy text-white' : 'text-navy' }}" style="{{ request()->routeIs('member.dashboard') ? 'background-color: var(--club-navy);' : '' }}">
                            <i class="bi bi-speedometer2 text-warning me-2"></i> Dashboard
                        </a>
                        <a href="{{ route('member.profile') }}" class="nav-link py-2 px-3 rounded-3 mb-1 {{ request()->routeIs('member.profile*') ? 'bg-navy text-white' : 'text-navy' }}" style="{{ request()->routeIs('member.profile*') ? 'background-color: var(--club-navy);' : '' }}">
                            <i class="bi bi-person-lines-fill text-warning me-2"></i> My Profile
                        </a>
                        <a href="{{ route('member.digital-card') }}" class="nav-link py-2 px-3 rounded-3 mb-1 {{ request()->routeIs('member.digital-card') ? 'bg-navy text-white' : 'text-navy' }}" style="{{ request()->routeIs('member.digital-card') ? 'background-color: var(--club-navy);' : '' }}">
                            <i class="bi bi-qr-code text-warning me-2"></i> Digital ID Card
                        </a>
                        <a href="{{ route('member.my-events') }}" class="nav-link py-2 px-3 rounded-3 mb-1 {{ request()->routeIs('member.my-events') ? 'bg-navy text-white' : 'text-navy' }}" style="{{ request()->routeIs('member.my-events') ? 'background-color: var(--club-navy);' : '' }}">
                            <i class="bi bi-calendar-check text-warning me-2"></i> Event Registrations
                        </a>
                        <a href="{{ route('member.change-password') }}" class="nav-link py-2 px-3 rounded-3 mb-1 {{ request()->routeIs('member.change-password') ? 'bg-navy text-white' : 'text-navy' }}" style="{{ request()->routeIs('member.change-password') ? 'background-color: var(--club-navy);' : '' }}">
                            <i class="bi bi-shield-lock text-warning me-2"></i> Change Password
                        </a>
                    </nav>

                    <div class="mt-4 pt-3 border-top">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                <i class="bi bi-box-arrow-right me-1"></i> Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Member Main Content Area -->
            <div class="col-lg-9">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
