@extends('layouts.public')

@section('title', 'Contact Us & Secretariat | Chatkhil ELITE Club Ltd.')
@section('meta_description', 'Contact Secretariat and Clubhouse of Chatkhil ELITE Club Ltd. Sky View Trade Valley, Naya Paltan, Dhaka and Chatkhil, Noakhali.')

@section('content')

    <!-- Banner Header -->
    <div class="py-5 text-center text-white position-relative overflow-hidden" style="background: linear-gradient(135deg, #070e1b 0%, #0d1a30 50%, #152643 100%); border-bottom: 2px solid rgba(197, 160, 89, 0.4);">
        <div class="container position-relative py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center small mb-3">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Contact Secretariat</li>
                </ol>
            </nav>
            <span class="badge bg-warning text-dark px-3 py-1 fw-bold text-uppercase mb-2" style="letter-spacing: 0.1em; font-size: 0.78rem;">
                “Unity • Excellence • Service • Leadership”
            </span>
            <h1 class="font-serif display-5 fw-bold text-white mb-2">Club Secretariat & Liaison</h1>
            <p class="lead mb-0 text-light-50" style="color: #cbd5e1;">
                Get in touch with the administrative office, membership committee, or clubhouse
            </p>
        </div>
    </div>

    <!-- Contact Content with Liquid Glass Cards -->
    <div class="py-5" style="background: radial-gradient(at 0% 0%, rgba(223, 196, 136, 0.08) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(16, 28, 49, 0.06) 0px, transparent 50%), #f7f9fc;">
        <div class="container py-3">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show p-4 rounded-4 shadow-sm mb-5 text-center" role="alert">
                    <i class="bi bi-check-circle-fill text-success fs-2 mb-2 d-block"></i>
                    <h5 class="font-serif fw-bold text-success mb-1">Message Dispatched!</h5>
                    <p class="mb-0">{{ session('success') }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-5">
                <!-- Left Column: Official Contact Cards & Locations -->
                <div class="col-lg-5">
                    <div class="pe-lg-3">
                        <span class="section-subtitle">Official Channels</span>
                        <h2 class="club-heading mb-4">Chatkhil ELITE Club Ltd.</h2>
                        <p class="text-muted small mb-4">
                            (Registered under the Companies Act / Applicable Laws of Bangladesh)
                        </p>

                        <!-- Registered Office Card (Dhaka) -->
                        <div class="glass-panel p-4 mb-4" style="border-left: 4px solid var(--liquid-gold);">
                            <div class="d-flex align-items-start gap-3">
                                <div class="p-2 rounded-3 text-warning fs-3" style="background: rgba(10, 19, 34, 0.95); width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-building"></i>
                                </div>
                                <div>
                                    <span class="badge bg-warning text-dark text-uppercase fw-bold mb-1" style="font-size: 0.68rem;">Registered Secretariat</span>
                                    <h6 class="font-serif fw-bold text-navy mb-1">Dhaka Office</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                                        Sky View Trade Valley, B-6, 66/1 (VIP Road),<br>
                                        Naya Paltan, Dhaka-1000, Bangladesh.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Chatkhil Clubhouse Card (Noakhali) -->
                        <div class="glass-panel p-4 mb-4" style="border-left: 4px solid var(--liquid-navy-surface);">
                            <div class="d-flex align-items-start gap-3">
                                <div class="p-2 rounded-3 text-warning fs-3" style="background: rgba(10, 19, 34, 0.95); width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </div>
                                <div>
                                    <span class="badge bg-secondary text-white text-uppercase fw-bold mb-1" style="font-size: 0.68rem;">Community Hub</span>
                                    <h6 class="font-serif fw-bold text-navy mb-1">Chatkhil Clubhouse</h6>
                                    <p class="text-muted small mb-0" style="line-height: 1.6;">
                                        Main Road, Chatkhil Municipality,<br>
                                        Noakhali - 3870, Bangladesh.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Direct Lines Card -->
                        <div class="glass-panel p-4 mb-4">
                            <h6 class="font-serif fw-bold text-navy mb-3"><i class="bi bi-telephone-inbound-fill text-warning me-2"></i> Direct Helplines</h6>
                            <div class="row g-2 text-navy small fw-semibold">
                                <div class="col-sm-6">
                                    <a href="tel:+8801805561359" class="text-decoration-none text-navy d-block p-2 rounded bg-white border">
                                        <i class="bi bi-telephone text-warning me-1"></i> +880 1805 561359
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="tel:+8801805561361" class="text-decoration-none text-navy d-block p-2 rounded bg-white border">
                                        <i class="bi bi-telephone text-warning me-1"></i> +880 1805 561361
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="tel:+8801805561363" class="text-decoration-none text-navy d-block p-2 rounded bg-white border">
                                        <i class="bi bi-telephone text-warning me-1"></i> +880 1805 561363
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="tel:+8801805561634" class="text-decoration-none text-navy d-block p-2 rounded bg-white border">
                                        <i class="bi bi-telephone text-warning me-1"></i> +880 1805 561634
                                    </a>
                                </div>
                            </div>

                            <div class="mt-3 pt-3 border-top d-flex flex-column gap-2 small">
                                <div>
                                    <i class="bi bi-envelope-at-fill text-warning me-2"></i>
                                    <strong>Email:</strong> <a href="mailto:info@celiteclub.com" class="text-navy text-decoration-none">info@celiteclub.com</a>
                                </div>
                                <div>
                                    <i class="bi bi-globe text-warning me-2"></i>
                                    <strong>Official Web:</strong> <span class="text-muted">www.celiteclub.com</span>
                                </div>
                            </div>
                        </div>

                        <!-- Map Embed -->
                        <div class="rounded-4 overflow-hidden shadow-sm border">
                            {!! \App\Models\Setting::get('map_iframe', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14691.002047391783!2d90.99955745!3d23.0483863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754988bf2eb1bcf%3A0xb35a8df2cbbe460e!2sChatkhil%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>') !!}
                        </div>
                    </div>
                </div>

                <!-- Right Column: Interactive Inquiry Form -->
                <div class="col-lg-7">
                    <div class="card border-0 rounded-4 shadow-lg p-4 p-md-5" 
                         style="background: rgba(255, 255, 255, 0.88); backdrop-filter: blur(25px) saturate(180%); -webkit-backdrop-filter: blur(25px) saturate(180%); border: 1.5px solid rgba(223, 196, 136, 0.45) !important;">
                        
                        <div class="d-flex align-items-center gap-3 mb-4 pb-3 border-bottom">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 52px; filter: drop-shadow(0 2px 6px rgba(197, 160, 89, 0.4));">
                            <div>
                                <h4 class="font-serif fw-bold text-navy mb-0">Secretariat Inquiry Desk</h4>
                                <small class="text-muted">Direct correspondence with the Administrative Executive</small>
                            </div>
                        </div>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Your Name : <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control liquid-input" value="{{ old('name') }}" placeholder="Full Name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Contact Mobile (WhatsApp) : <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control liquid-input" value="{{ old('phone') }}" placeholder="+880 1XXXXXXXXX" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Email Address :</label>
                                    <input type="email" name="email" class="form-control liquid-input" value="{{ old('email') }}" placeholder="you@example.com">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Subject : <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control liquid-input" value="{{ old('subject') }}" placeholder="Membership, Event, or Administrative Inquiry" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-secondary">Message Details : <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control liquid-input" rows="5" placeholder="Please write your query or request in detail..." required>{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12 pt-2">
                                    <button type="submit" class="btn btn-club-gold btn-lg w-100 fw-bold py-3 shadow">
                                        <i class="bi bi-send-fill me-2"></i> Transmit Message to Secretariat
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
