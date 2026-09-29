@extends('layouts.public')

@section('title', 'Contact Us | Chatkhil Elite Club Limited')

@section('content')

    <!-- Banner Header -->
    <div class="py-5" style="background: linear-gradient(135deg, #060d18 0%, #0a1424 60%, #152640 100%); color: #fff; border-bottom: 3px solid var(--club-gold);">
        <div class="container py-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-2">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-warning text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-light active" aria-current="page">Contact</li>
                </ol>
            </nav>
            <h1 class="font-serif text-white display-5 mb-2">Contact Secretariat</h1>
            <p class="lead text-light-50 mb-0" style="color: #cbd5e1;">Get in touch with the executive leadership & office of Chatkhil Elite Club Limited</p>
        </div>
    </div>

    <!-- Contact Details & Form -->
    <div class="py-5 bg-white">
        <div class="container py-3">
            <div class="row g-5">
                <!-- Left: Contact Details & Info -->
                <div class="col-lg-5">
                    <span class="section-subtitle">Reach Us Directly</span>
                    <h2 class="club-heading mb-4">Club Secretariat</h2>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="bg-navy p-3 rounded-3 text-warning fs-4" style="background-color: var(--club-navy);">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <h6 class="font-serif fw-bold text-navy mb-1">Clubhouse Address</h6>
                            <p class="text-muted small mb-0">
                                {{ \App\Models\Setting::get('club_address', 'Elite Bhaban (2nd Floor), Main Road, Chatkhil Municipality, Noakhali - 3870, Bangladesh') }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="bg-navy p-3 rounded-3 text-warning fs-4" style="background-color: var(--club-navy);">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <h6 class="font-serif fw-bold text-navy mb-1">Telephone & Mobile</h6>
                            <p class="text-muted small mb-0">
                                {{ \App\Models\Setting::get('contact_phone', '+880 1819-234567, +880 1711-890123') }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="bg-navy p-3 rounded-3 text-warning fs-4" style="background-color: var(--club-navy);">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <h6 class="font-serif fw-bold text-navy mb-1">Email Correspondence</h6>
                            <p class="text-muted small mb-0">
                                {{ \App\Models\Setting::get('contact_email', 'info@chatkhileliteclub.com') }}
                            </p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start gap-3 mb-4">
                        <div class="bg-navy p-3 rounded-3 text-warning fs-4" style="background-color: var(--club-navy);">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div>
                            <h6 class="font-serif fw-bold text-navy mb-1">Office Hours</h6>
                            <p class="text-muted small mb-0">
                                {{ \App\Models\Setting::get('office_hours', 'Saturday – Thursday: 10:00 AM – 09:00 PM (Friday Closed)') }}
                            </p>
                        </div>
                    </div>

                    <!-- Map Embed -->
                    <div class="rounded-4 overflow-hidden shadow-sm border mt-4">
                        {!! \App\Models\Setting::get('map_iframe', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14691.002047391783!2d90.99955745!3d23.0483863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754988bf2eb1bcf%3A0xb35a8df2cbbe460e!2sChatkhil%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" width="100%" height="240" style="border:0;" allowfullscreen="" loading="lazy"></iframe>') !!}
                    </div>
                </div>

                <!-- Right: Contact Form -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="border-top: 4px solid var(--club-gold) !important;">
                        <h4 class="font-serif text-navy mb-2">Send an Inquiry or Message</h4>
                        <p class="text-muted small mb-4">Have questions regarding membership, events, or club facilities? Fill in the form below.</p>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Your Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Full Name" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+880 1XXXXXXXXX" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold">Subject <span class="text-danger">*</span></label>
                                    <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Subject of inquiry" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label small fw-semibold">Message <span class="text-danger">*</span></label>
                                    <textarea name="message" class="form-control" rows="5" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-club-gold btn-lg w-100 fw-bold py-2">
                                        <i class="bi bi-send-fill me-2"></i> Send Message
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
