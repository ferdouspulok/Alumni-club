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

                @if(auth()->user()->isMemberManager())
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
                @endif

                @if(auth()->user()->isContentManager())
                    <div class="nav-header">Content & Media (CMS)</div>
                    <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window-reverse"></i> Website Pages CMS
                    </a>
                    <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i> News & Activities
                    </a>
                    <a href="{{ route('admin.notices.index') }}" class="nav-link {{ request()->routeIs('admin.notices*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone"></i> Notice Board
                    </a>
                    <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
                        <i class="bi bi-images"></i> Photo Gallery
                    </a>
                    <a href="{{ route('admin.documents.index') }}" class="nav-link {{ request()->routeIs('admin.documents*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-arrow-down"></i> Documents & By-Laws
                    </a>
                @endif

                <div class="nav-header">Events & Activities</div>
                <a href="{{ route('admin.events.index') }}" class="nav-link {{ request()->routeIs('admin.events.index') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event"></i> All Events
                </a>
                <a href="{{ route('admin.events.create') }}" class="nav-link {{ request()->routeIs('admin.events.create') ? 'active' : '' }}">
                    <i class="bi bi-calendar-plus"></i> Add New Event
                </a>
                <a href="{{ route('admin.events.registrations') }}" class="nav-link {{ request()->routeIs('admin.events.registrations*') ? 'active' : '' }}">
                    <i class="bi bi-ticket-perforated"></i> Registrations / RSVPs
                </a>

                <div class="nav-header">Communications</div>
                <a href="{{ route('admin.messages.index') }}" class="nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <i class="bi bi-envelope"></i> Contact Messages
                    @if($unreadMsgCount > 0)
                        <span class="badge bg-warning text-dark ms-auto">{{ $unreadMsgCount }}</span>
                    @endif
                </a>

                @if(auth()->user()->isSuperAdmin())
                    <div class="nav-header">System Administration</div>
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                        <i class="bi bi-sliders"></i> General Settings
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="bi bi-shield-lock"></i> Admin Users & Roles
                    </a>
                @endif
            </div>

            <!-- Sidebar Footer -->
            <div class="p-3 border-top border-secondary border-opacity-25 small text-center text-muted">
                <div>Logged in as: <strong class="text-white">{{ auth()->user()->name }}</strong></div>
                @if(auth()->user()->role === 'content_manager')
                    <span class="badge bg-info text-dark text-uppercase mt-1" style="font-size: 0.65rem; letter-spacing: 0.05em;">
                        <i class="bi bi-journal-richtext me-1"></i> Content Manager
                    </span>
                    <div class="text-light-50 mt-1" style="font-size: 0.72rem; color: #94a3b8;">Website & CMS Editor</div>
                @elseif(auth()->user()->role === 'member_manager')
                    <span class="badge bg-warning text-dark text-uppercase mt-1" style="font-size: 0.65rem; letter-spacing: 0.05em;">
                        <i class="bi bi-people-fill me-1"></i> Member Manager
                    </span>
                    <div class="text-light-50 mt-1" style="font-size: 0.72rem; color: #94a3b8;">Membership Secretary</div>
                @else
                    <span class="badge bg-primary text-uppercase mt-1" style="font-size: 0.65rem; letter-spacing: 0.05em;">
                        <i class="bi bi-shield-fill-check me-1"></i> Super Admin
                    </span>
                    <div class="text-light-50 mt-1" style="font-size: 0.72rem; color: #94a3b8;">Full Administrative Access</div>
                @endif
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
                    <span class="badge bg-light text-navy border py-2 px-3 small d-none d-md-inline-block">
                        <i class="bi bi-person-badge text-warning me-1"></i>
                        <strong>{{ auth()->user()->name }}</strong>
                        <span class="text-muted ms-1">({{ str_replace('_', ' ', auth()->user()->role) }})</span>
                    </span>

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

    @php
        $credData = session('approved_credentials') ?? session('reset_credentials');
        $isReset = session()->has('reset_credentials');
    @endphp

    @if($credData)
        <!-- Automatic Pop-up Modal for Member ID & Password Delivery -->
        <div class="modal fade" id="credentialsPopupModal" tabindex="-1" aria-labelledby="credentialsPopupTitle" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="modal-header text-white" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 60%, #152643 100%); border-bottom: 2px solid var(--liquid-gold);">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-warning fs-4"></i>
                            <div>
                                <h5 class="modal-title font-serif fw-bold text-white mb-0" id="credentialsPopupTitle">
                                    {{ $isReset ? 'Password Reset — New Credentials' : 'Member Approved & Credentials Generated' }}
                                </h5>
                                <small class="text-light-50" style="color: #cbd5e1;">Ready to send to the member</small>
                            </div>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4" style="background: #faf8f5;">
                        <div class="text-center mb-3">
                            <h5 class="fw-bold text-navy mb-1" style="color: #0a1322 !important;">{{ $credData['name'] }}</h5>
                            <span class="badge bg-warning text-dark px-3 py-1 font-monospace fs-6 fw-bold" style="color: #000000 !important;">
                                Member ID: {{ $credData['member_id'] }}
                            </span>
                        </div>

                        <!-- Visual Credentials Details -->
                        <div class="p-3 bg-white rounded-3 border mb-3 shadow-sm text-dark">
                            <div class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted small">Login ID / Username:</span>
                                <strong class="text-navy font-monospace" style="color: #0a1322 !important;">{{ $credData['member_id'] }}</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted small">Registered Mobile:</span>
                                <strong class="text-navy" style="color: #0a1322 !important;">{{ $credData['mobile'] }}</strong>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted small">Email Address:</span>
                                <span class="text-dark">{{ $credData['email'] ?: 'N/A' }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-2 align-items-center">
                                <span class="text-muted small">Portal Password:</span>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle font-monospace fs-6 px-3 py-1 fw-bold">
                                    {{ $credData['password'] }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between py-1 border-top">
                                <span class="text-muted small">Portal Web Link:</span>
                                <a href="{{ $credData['login_url'] }}" target="_blank" class="small text-navy text-decoration-none fw-semibold" style="color: #0a1322 !important;">
                                    {{ $credData['login_url'] }}
                                </a>
                            </div>
                        </div>

                        @php
                            $waPhone = preg_replace('/[^0-9]/', '', $credData['mobile']);
                            if (strlen($waPhone) === 11 && str_starts_with($waPhone, '01')) {
                                $waPhone = '88' . $waPhone;
                            }
                            $shareText = "Assalamu Alaikum " . $credData['name'] . ",\n\n" . 
                                ($isReset ? "Your login password for Chatkhil ELITE Club Ltd. has been reset." : "Congratulations! Your membership for Chatkhil ELITE Club Ltd. has been approved.") . "\n\n" .
                                "Member ID: " . $credData['member_id'] . "\n" .
                                "Portal Link: " . $credData['login_url'] . "\n" .
                                "Login ID: " . $credData['member_id'] . " or " . $credData['mobile'] . "\n" .
                                "Password: " . $credData['password'] . "\n\n" .
                                "Please sign in to access your verified Digital ID Card.\n- Secretariat, Chatkhil ELITE Club Ltd.";
                        @endphp

                        <!-- Pre-formatted Message for WhatsApp/SMS -->
                        <div class="mb-3">
                            <label class="form-label small fw-bold text-navy mb-1" style="color: #0a1322 !important;">
                                <i class="bi bi-chat-text text-warning me-1"></i> Formatted Notification Template:
                            </label>
                            <textarea id="shareMsgText" class="form-control form-control-sm font-monospace text-dark" rows="5" readonly style="font-size: 0.8rem; background: #ffffff;">{{ $shareText }}</textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-club-gold btn-sm flex-grow-1 fw-bold py-2" onclick="copyShareMessage()">
                                <i class="bi bi-clipboard me-1" id="copyIcon"></i> <span id="copyBtnText">Copy Message to Clipboard</span>
                            </button>
                            <a href="https://wa.me/{{ $waPhone }}?text={{ urlencode($shareText) }}" target="_blank" class="btn btn-success btn-sm px-3 py-2 fw-bold" title="Direct WhatsApp Message">
                                <i class="bi bi-whatsapp me-1"></i> WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="modal-footer bg-light py-2">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var credModalEl = document.getElementById('credentialsPopupModal');
            if (credModalEl) {
                var modal = new bootstrap.Modal(credModalEl);
                modal.show();
            }
        });

        function copyShareMessage() {
            var copyText = document.getElementById("shareMsgText");
            if (!copyText) return;
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value).then(function() {
                var btnText = document.getElementById("copyBtnText");
                var icon = document.getElementById("copyIcon");
                if (btnText) btnText.innerText = "Copied to Clipboard!";
                if (icon) icon.className = "bi bi-check2-circle";
                setTimeout(function() {
                    if (btnText) btnText.innerText = "Copy Message to Clipboard";
                    if (icon) icon.className = "bi bi-clipboard";
                }, 3000);
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
