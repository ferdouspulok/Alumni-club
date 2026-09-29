<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel | Chatkhil Elite Club Limited')</title>
    
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

    <div class="d-flex">
        <!-- Admin Sidebar -->
        <aside class="admin-sidebar d-flex flex-column flex-shrink-0 p-0" style="width: 260px;">
            <div class="p-3 text-center border-bottom border-secondary border-opacity-25">
                <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-white d-flex align-items-center justify-content-center gap-2">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 42px;">
                    <div class="text-start">
                        <div class="font-serif fw-bold text-white fs-6" style="line-height: 1.1;">Chatkhil Elite Club</div>
                        <span class="badge bg-warning text-dark text-uppercase" style="font-size: 0.65rem;">Admin Panel</span>
                    </div>
                </a>
            </div>

            @php
                $pendingCount = \App\Models\Member::where('status', 'pending')->count();
                $unreadMsgCount = \App\Models\ContactMessage::where('is_read', false)->count();
            @endphp

            <div class="overflow-auto flex-grow-1 py-2">
                <div class="nav-header">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>

                <div class="nav-header">Membership</div>
                <a href="{{ route('admin.members.index') }}" class="nav-link {{ request()->routeIs('admin.members.index') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> All Members
                </a>
                <a href="{{ route('admin.members.pending') }}" class="nav-link {{ request()->routeIs('admin.members.pending') ? 'active' : '' }}">
                    <i class="bi bi-person-check"></i> Pending Applications
                    @if($pendingCount > 0)
                        <span class="badge bg-danger ms-auto">{{ $pendingCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.members.create') }}" class="nav-link {{ request()->routeIs('admin.members.create') ? 'active' : '' }}">
                    <i class="bi bi-person-plus"></i> Add New Member
                </a>
                <a href="{{ route('admin.membership-types.index') }}" class="nav-link {{ request()->routeIs('admin.membership-types*') ? 'active' : '' }}">
                    <i class="bi bi-award"></i> Membership Types
                </a>

                <div class="nav-header">Governance</div>
                <a href="{{ route('admin.committees.index') }}" class="nav-link {{ request()->routeIs('admin.committees*') ? 'active' : '' }}">
                    <i class="bi bi-diagram-3"></i> Committee Terms
                </a>

                <div class="nav-header">Events & RSVPs</div>
                <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i> All Events
                </a>
                <a href="{{ route('admin.events.create') }}" class="nav-link {{ request()->routeIs('admin.events.create') ? 'active' : '' }}">
                    <i class="bi bi-calendar-plus"></i> Add New Event
                </a>
                <a href="{{ route('admin.events.registrations') }}" class="nav-link {{ request()->routeIs('admin.events.registrations*') ? 'active' : '' }}">
                    <i class="bi bi-ticket-perforated"></i> Registrations / RSVPs
                </a>

                <div class="nav-header">Communications & Media</div>
                <a href="{{ route('admin.notices.index') }}" class="nav-link {{ request()->routeIs('admin.notices*') ? 'active' : '' }}">
                    <i class="bi bi-megaphone"></i> Notice Board
                </a>
                <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper"></i> News & Activities
                </a>
                <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                    <i class="bi bi-images"></i> Photo Gallery
                </a>
                <a href="{{ route('admin.documents.index') }}" class="nav-link {{ request()->routeIs('admin.documents*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-arrow-down"></i> Documents & By-Laws
                </a>

                <div class="nav-header">Website & Settings</div>
                <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                    <i class="bi bi-layout-text-window-reverse"></i> Pages CMS
                </a>
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i> Contact Messages
                    @if($unreadMsgCount > 0)
                        <span class="badge bg-warning text-dark ms-auto">{{ $unreadMsgCount }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="bi bi-sliders"></i> General Settings
                </a>
                @if(auth()->user()->isSuperAdmin())
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="bi bi-shield-lock"></i> Admin Users & Roles
                    </a>
                @endif
            </div>

            <!-- Sidebar Footer -->
            <div class="p-3 border-top border-secondary border-opacity-25 small text-center text-muted">
                <div>Logged in as: <strong class="text-white">{{ auth()->user()->name }}</strong></div>
                <span class="badge bg-warning text-dark text-uppercase mt-1" style="font-size: 0.65rem;">
                    {{ str_replace('_', ' ', auth()->user()->role) }}
                </span>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="flex-grow-1 min-vh-100 d-flex flex-column">
            <!-- Top Admin Navbar -->
            <header class="bg-white border-bottom shadow-sm px-4 py-2 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <span class="text-muted small">
                        <i class="bi bi-geo-alt-fill text-warning me-1"></i> Chatkhil, Noakhali &bull; {{ date('l, F d, Y') }}
                    </span>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-box-arrow-up-right me-1"></i> View Website
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Logout">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </header>

            <!-- Page Body -->
            <div class="p-4 flex-grow-1">
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

            <!-- Admin Footer -->
            <footer class="bg-white border-top py-2 px-4 text-muted small text-center text-md-start">
                &copy; {{ date('Y') }} Chatkhil Elite Club Limited. Admin Management System.
            </footer>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
