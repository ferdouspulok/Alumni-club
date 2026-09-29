@extends('layouts.admin')

@section('title', 'Global Settings | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">System & Website Settings</h3>
            <span class="text-muted small">Configure club branding, contact channels, homepage hero & statistics</span>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white mb-4">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 1. General & Branding -->
            <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-shield-shaded text-warning me-2"></i> 1. Organization & Branding</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Organization Name <span class="text-danger">*</span></label>
                    <input type="text" name="site_name" class="form-control" value="{{ \App\Models\Setting::get('site_name', 'Chatkhil Elite Club Limited') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Tagline / Motto</label>
                    <input type="text" name="site_tagline" class="form-control" value="{{ \App\Models\Setting::get('site_tagline', 'United by Community, Driven by Excellence') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Registration Number</label>
                    <input type="text" name="club_reg_no" class="form-control" value="{{ \App\Models\Setting::get('club_reg_no', 'REG-NOA-CEC-2018/42') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Established Year</label>
                    <input type="text" name="club_established_year" class="form-control" value="{{ \App\Models\Setting::get('club_established_year', '2018') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Update Club Logo</label>
                    <input type="file" name="site_logo" class="form-control" accept="image/*">
                </div>
            </div>

            <!-- 2. Homepage Hero & Counters -->
            <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-display text-warning me-2"></i> 2. Homepage Customizer & Statistics</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Hero Title</label>
                    <input type="text" name="hero_title" class="form-control" value="{{ \App\Models\Setting::get('hero_title', 'Chatkhil Elite Club Limited') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Hero Subtitle</label>
                    <input type="text" name="hero_subtitle" class="form-control" value="{{ \App\Models\Setting::get('hero_subtitle', 'The premier social fellowship uniting professionals, entrepreneurs, and leaders of Chatkhil, Noakhali.') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Total Members Display</label>
                    <input type="text" name="stats_total_members" class="form-control" value="{{ \App\Models\Setting::get('stats_total_members', '520+') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Life Members Display</label>
                    <input type="text" name="stats_life_members" class="form-control" value="{{ \App\Models\Setting::get('stats_life_members', '145+') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Executive Board Display</label>
                    <input type="text" name="stats_executive_board" class="form-control" value="{{ \App\Models\Setting::get('stats_executive_board', '25') }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-semibold">Events Held Display</label>
                    <input type="text" name="stats_events_held" class="form-control" value="{{ \App\Models\Setting::get('stats_events_held', '65+') }}">
                </div>
            </div>

            <!-- 3. President Address Preview -->
            <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-person-badge text-warning me-2"></i> 3. President's Address (Homepage Card)</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label small fw-semibold">President Name</label>
                    <input type="text" name="president_name" class="form-control" value="{{ \App\Models\Setting::get('president_name', 'Alhaj Md. Faruk Hossain') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">President Title</label>
                    <input type="text" name="president_title" class="form-control" value="{{ \App\Models\Setting::get('president_title', 'President, Chatkhil Elite Club Limited') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">President Photo</label>
                    <input type="file" name="president_photo" class="form-control" accept="image/*">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Short Message (Homepage Card)</label>
                    <textarea name="president_message_short" class="form-control" rows="2">{{ \App\Models\Setting::get('president_message_short') }}</textarea>
                </div>
            </div>

            <!-- 4. Contact & Location -->
            <h5 class="font-serif text-navy mb-3 pb-2 border-bottom"><i class="bi bi-geo-alt-fill text-warning me-2"></i> 4. Contact & Secretariat Location</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Clubhouse Address</label>
                    <input type="text" name="club_address" class="form-control" value="{{ \App\Models\Setting::get('club_address') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Contact Phone(s)</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ \App\Models\Setting::get('contact_phone') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Secretariat Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ \App\Models\Setting::get('contact_email') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Office Hours</label>
                    <input type="text" name="office_hours" class="form-control" value="{{ \App\Models\Setting::get('office_hours') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">Facebook Page URL</label>
                    <input type="text" name="facebook_url" class="form-control" value="{{ \App\Models\Setting::get('facebook_url') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">YouTube URL</label>
                    <input type="text" name="youtube_url" class="form-control" value="{{ \App\Models\Setting::get('youtube_url') }}">
                </div>

                <div class="col-md-4">
                    <label class="form-label small fw-semibold">LinkedIn URL</label>
                    <input type="text" name="linkedin_url" class="form-control" value="{{ \App\Models\Setting::get('linkedin_url') }}">
                </div>

                <div class="col-12">
                    <label class="form-label small fw-semibold">Google Maps Embed Code (&lt;iframe&gt;)</label>
                    <textarea name="map_iframe" class="form-control" rows="3">{{ \App\Models\Setting::get('map_iframe') }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-club-gold px-4 fw-bold">
                    <i class="bi bi-save me-1"></i> Save All Settings
                </button>
            </div>
        </form>
    </div>

@endsection
