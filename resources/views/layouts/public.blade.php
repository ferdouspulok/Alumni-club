<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatkhil Elite Club Limited | Official Website')</title>
    <meta name="description" content="@yield('meta_description', 'Official web portal of Chatkhil Elite Club Limited, Chatkhil, Noakhali, Bangladesh. United by Community, Driven by Excellence.')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.php" rel="stylesheet" onerror="this.onerror=null;this.href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css';">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Club Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/club-style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Top Info Bar -->
    <div class="club-topbar py-1 d-none d-md-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-geo-alt-fill text-warning me-1"></i> {{ \App\Models\Setting::get('club_address', 'Chatkhil, Noakhali, Bangladesh') }}</span>
                <span><i class="bi bi-telephone-fill text-warning me-1"></i> {{ \App\Models\Setting::get('contact_phone', '+880 1819-234567') }}</span>
                <span><i class="bi bi-envelope-fill text-warning me-1"></i> {{ \App\Models\Setting::get('contact_email', 'info@chatkhileliteclub.com') }}</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ \App\Models\Setting::get('facebook_url', '#') }}" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ \App\Models\Setting::get('youtube_url', '#') }}" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                <a href="{{ \App\Models\Setting::get('linkedin_url', '#') }}" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <span class="text-secondary">|</span>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="badge bg-warning text-dark text-decoration-none px-2 py-1"><i class="bi bi-speedometer2 me-1"></i> Admin Panel</a>
                    @else
                        <a href="{{ route('member.dashboard') }}" class="badge bg-warning text-dark text-decoration-none px-2 py-1"><i class="bi bi-person-circle me-1"></i> My Portal</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-warning fw-semibold"><i class="bi bi-box-arrow-in-right me-1"></i> Member Login</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Main Navigation Header -->
    <nav class="navbar navbar-expand-lg club-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Chatkhil Elite Club Limited" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Chatkhil Elite Club</span>
                    <span class="brand-tagline">Limited</span>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#clubNavbar" aria-controls="clubNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="clubNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('about*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0">
                            <li><a class="dropdown-item" href="{{ route('about.index') }}">About the Club</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.mission') }}">Mission & Vision</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.president') }}">President's Message</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('about.constitution') }}">Constitution & By-Laws</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('committee') ? 'active' : '' }}" href="{{ route('committee') }}">Executive Committee</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('members.index') ? 'active' : '' }}" href="{{ route('members.index') }}">Members</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('activities') ? 'active' : '' }}" href="{{ route('activities') }}">Activities</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('events*') ? 'active' : '' }}" href="{{ route('events.index') }}">Events</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('news*') ? 'active' : '' }}" href="{{ route('news.index') }}">News</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('notices*') ? 'active' : '' }}" href="{{ route('notices.index') }}">Notices</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Gallery</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('membership*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Membership
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0">
                            <li><a class="dropdown-item" href="{{ route('membership.info') }}">Membership Categories</a></li>
                            <li><a class="dropdown-item text-primary fw-bold" href="{{ route('membership.apply') }}"><i class="bi bi-person-plus me-1"></i> Apply for Membership</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('documents.index') }}">Club Documents</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-club-primary btn-sm"><i class="bi bi-speedometer2 me-1"></i> Admin</a>
                        @else
                            <a href="{{ route('member.dashboard') }}" class="btn btn-club-primary btn-sm"><i class="bi bi-person-circle me-1"></i> Dashboard</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm" title="Logout"><i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-club-primary btn-sm"><i class="bi bi-lock me-1"></i> Login</a>
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-sm"><i class="bi bi-award me-1"></i> Join Club</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-info-circle-fill me-2"></i> {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="club-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('images/logo.png') }}" alt="Chatkhil Elite Club Limited" style="height: 60px; filter: drop-shadow(0 2px 8px rgba(197, 155, 39, 0.5));">
                        <div>
                            <h5 class="mb-0 text-white font-serif">Chatkhil Elite Club</h5>
                            <span class="text-warning small text-uppercase fw-bold letter-spacing-1">Limited</span>
                        </div>
                    </div>
                    <p class="small text-light-50">
                        {{ \App\Models\Setting::get('site_tagline', 'United by Community, Driven by Excellence.') }} The premier social fellowship uniting professionals, entrepreneurs, and leaders of Chatkhil, Noakhali.
                    </p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="{{ \App\Models\Setting::get('facebook_url', '#') }}" target="_blank" class="text-warning fs-5"><i class="bi bi-facebook"></i></a>
                        <a href="{{ \App\Models\Setting::get('youtube_url', '#') }}" target="_blank" class="text-warning fs-5"><i class="bi bi-youtube"></i></a>
                        <a href="{{ \App\Models\Setting::get('linkedin_url', '#') }}" target="_blank" class="text-warning fs-5"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('about.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> About Club</a></li>
                        <li class="mb-2"><a href="{{ route('committee') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Executive Board</a></li>
                        <li class="mb-2"><a href="{{ route('members.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Member Directory</a></li>
                        <li class="mb-2"><a href="{{ route('notices.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Notice Board</a></li>
                        <li class="mb-2"><a href="{{ route('gallery.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Photo Gallery</a></li>
                        <li class="mb-2"><a href="{{ route('documents.index') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Downloads</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Membership</h5>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><a href="{{ route('membership.info') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Categories & Fees</a></li>
                        <li class="mb-2"><a href="{{ route('membership.apply') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Apply Online</a></li>
                        <li class="mb-2"><a href="{{ route('about.constitution') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Code of Ethics</a></li>
                        <li class="mb-2"><a href="{{ route('login') }}"><i class="bi bi-chevron-right me-1 text-warning"></i> Member Login</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5>Secretariat</h5>
                    <p class="small mb-2">
                        <i class="bi bi-geo-alt text-warning me-2"></i>
                        {{ \App\Models\Setting::get('club_address', 'Elite Bhaban, Main Road, Chatkhil, Noakhali - 3870, Bangladesh') }}
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-telephone text-warning me-2"></i>
                        {{ \App\Models\Setting::get('contact_phone', '+880 1819-234567') }}
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-envelope text-warning me-2"></i>
                        {{ \App\Models\Setting::get('contact_email', 'info@chatkhileliteclub.com') }}
                    </p>
                    <p class="small mb-0">
                        <i class="bi bi-clock text-warning me-2"></i>
                        {{ \App\Models\Setting::get('office_hours', 'Sat - Thu: 10 AM - 9 PM') }}
                    </p>
                </div>
            </div>

            <div class="club-footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-2 mb-md-0">
                    &copy; {{ date('Y') }} <strong>Chatkhil Elite Club Limited</strong>. All rights reserved.
                </p>
                <div class="d-flex gap-3">
                    <a href="{{ route('about.constitution') }}" class="small">By-Laws</a>
                    <a href="{{ route('contact') }}" class="small">Support</a>
                    <a href="{{ route('login') }}" class="small">Member Portal</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
