<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Chatkhil Elite Club Limited | Official Website')</title>
    <meta name="description" content="@yield('meta_description', 'Official web portal of Chatkhil Elite Club Limited, Chatkhil, Noakhali, Bangladesh. United by Community, Driven by Excellence.')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts: Cinzel (Regal Club Serif) & Plus Jakarta Sans (Modern Clean UI) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Club Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/club-style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Top Info Bar -->
    <div class="club-topbar py-1 d-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-warning text-dark px-2 py-1 fw-bold" style="font-size: 0.7rem; letter-spacing: 0.04em;">
                    “Unity • Excellence • Service • Leadership”
                </span>
                <span><i class="bi bi-geo-alt-fill text-warning me-1"></i> Sky View Trade Valley, Naya Paltan, Dhaka</span>
                <span><i class="bi bi-telephone-fill text-warning me-1"></i> +880 1805 561359</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <span><i class="bi bi-envelope-fill text-warning me-1"></i> info@celiteclub.com</span>
                <span class="text-secondary">|</span>
                <a href="{{ \App\Models\Setting::get('facebook_url', '#') }}" target="_blank" title="Facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{ \App\Models\Setting::get('youtube_url', '#') }}" target="_blank" title="YouTube"><i class="bi bi-youtube"></i></a>
                <a href="{{ \App\Models\Setting::get('linkedin_url', '#') }}" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Optimized & Compact) -->
    <nav class="navbar navbar-expand-lg club-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Chatkhil Elite Club Limited" class="brand-logo">
                <div class="brand-text">
                    <span class="brand-name">Chatkhil <span class="text-warning">ELITE</span> Club</span>
                    <span class="brand-tagline">Ltd. • Bangladesh</span>
                </div>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none p-1" type="button" data-bs-toggle="collapse" data-bs-target="#clubNavbar" aria-controls="clubNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="clubNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>

                    <!-- About Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('about*') || request()->routeIs('committee') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About
                        </a>
                        <ul class="dropdown-menu dropdown-menu-glass border-0">
                            <li><a class="dropdown-item" href="{{ route('about.index') }}"><i class="bi bi-info-circle text-warning"></i> About the Club</a></li>
                            <li><a class="dropdown-item" href="{{ route('committee') }}"><i class="bi bi-people-fill text-warning"></i> Executive Committee</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.president') }}"><i class="bi bi-chat-quote-fill text-warning"></i> President's Message</a></li>
                            <li><a class="dropdown-item" href="{{ route('about.mission') }}"><i class="bi bi-compass-fill text-warning"></i> Mission & Vision</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item" href="{{ route('about.constitution') }}"><i class="bi bi-file-text-fill text-warning"></i> Constitution & By-Laws</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('members.index') ? 'active' : '' }}" href="{{ route('members.index') }}">Members</a>
                    </li>

                    <!-- Events & Media Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('events*') || request()->is('news*') || request()->is('notices*') || request()->is('gallery*') || request()->routeIs('activities') || request()->is('documents*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Events & Media
                        </a>
                        <ul class="dropdown-menu dropdown-menu-glass border-0">
                            <li><a class="dropdown-item" href="{{ route('events.index') }}"><i class="bi bi-calendar-event-fill text-warning"></i> Club Events</a></li>
                            <li><a class="dropdown-item" href="{{ route('news.index') }}"><i class="bi bi-newspaper text-warning"></i> News & Activities</a></li>
                            <li><a class="dropdown-item" href="{{ route('notices.index') }}"><i class="bi bi-megaphone-fill text-warning"></i> Notice Board</a></li>
                            <li><a class="dropdown-item" href="{{ route('gallery.index') }}"><i class="bi bi-images text-warning"></i> Photo Gallery</a></li>
                            <li><hr class="dropdown-divider my-1"></li>
                            <li><a class="dropdown-item" href="{{ route('documents.index') }}"><i class="bi bi-file-earmark-arrow-down-fill text-warning"></i> Club Documents</a></li>
                        </ul>
                    </li>

                    <!-- Membership Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('membership*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Membership
                        </a>
                        <ul class="dropdown-menu dropdown-menu-glass border-0">
                            <li><a class="dropdown-item" href="{{ route('membership.info') }}"><i class="bi bi-award-fill text-warning"></i> Categories & Fees</a></li>
                            <li><a class="dropdown-item fw-bold text-navy" href="{{ route('membership.apply') }}"><i class="bi bi-pencil-square text-warning"></i> Apply for Membership</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>

                <!-- Action CTA Area -->
                <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-club-primary btn-sm px-3 py-1" style="font-size: 0.82rem;"><i class="bi bi-speedometer2 me-1"></i> Admin</a>
                        @else
                            <a href="{{ route('member.dashboard') }}" class="btn btn-club-primary btn-sm px-3 py-1" style="font-size: 0.82rem;"><i class="bi bi-person-circle me-1"></i> Portal</a>
                        @endif
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm p-1 px-2" title="Logout"><i class="bi bi-box-arrow-right"></i></button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-club-outline btn-sm px-3 py-1" style="font-size: 0.82rem;"><i class="bi bi-person me-1"></i> Login</a>
                        <a href="{{ route('membership.apply') }}" class="btn btn-club-gold btn-sm px-3 py-1" style="font-size: 0.82rem;"><i class="bi bi-award me-1"></i> Join Club</a>
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
                    <h5>Official Secretariat</h5>
                    <p class="small mb-2">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                        <strong>Registered Office:</strong><br>
                        Sky View Trade Valley, B-6, 66/1 (VIP Road), Naya Paltan, Dhaka-1000.
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-pin-map-fill text-warning me-2"></i>
                        <strong>Chatkhil Hub:</strong> Main Road, Chatkhil, Noakhali.
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-telephone-fill text-warning me-2"></i>
                        +880 1805 561359, +880 1805 561361<br>
                        <span class="ms-4 text-light-50">+880 1805 561363, +880 1805 561634</span>
                    </p>
                    <p class="small mb-2">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                        <a href="mailto:info@celiteclub.com" class="text-warning">info@celiteclub.com</a>
                    </p>
                    <p class="small mb-0">
                        <i class="bi bi-globe text-warning me-2"></i>
                        <span class="text-light-50">www.celiteclub.com</span>
                    </p>
                </div>
            </div>

            <div class="club-footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-2 mb-md-0">
                    &copy; {{ date('Y') }} <strong>Chatkhil ELITE Club Ltd.</strong> (Registered under Companies Act / Applicable Laws of Bangladesh)
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
