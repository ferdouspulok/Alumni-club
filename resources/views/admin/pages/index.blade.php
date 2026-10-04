@extends('layouts.admin')

@section('title', 'Manage Pages CMS | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2" 
                 style="background: rgba(13, 202, 240, 0.12); border: 1px solid rgba(13, 202, 240, 0.35);">
                <i class="bi bi-journal-richtext text-info" style="font-size: 0.8rem;"></i>
                <span class="text-dark fw-bold text-uppercase" style="letter-spacing: 0.08em; font-size: 0.72rem;">
                    Editorial Authority &bull; Static CMS
                </span>
            </div>
            <h3 class="font-serif text-navy mb-0">Website Pages CMS</h3>
            <span class="text-muted small">Edit content for About Us, Mission & Vision, Chairman's Message, Constitution, and Club Activities</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-box-arrow-up-right me-1"></i> Public Website
            </a>
        </div>
    </div>

    <!-- Content Manager Guidance Banner -->
    <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4 border-start border-4 border-info">
        <div class="d-flex align-items-start gap-3">
            <div class="bg-light p-3 rounded-circle text-info fs-4">
                <i class="bi bi-info-circle-fill"></i>
            </div>
            <div>
                <h6 class="font-serif fw-bold text-navy mb-1">Content Manager Role & Editorial Scope</h6>
                <p class="small text-muted mb-0" style="line-height: 1.6;">
                    As a <strong>Content Manager</strong>, you are responsible for maintaining the official literature, historical records, and policy statements of Chatkhil Elite Club Limited. 
                    Changes made here directly update the public web portal. You can edit page titles, body text (with headings and formatting), featured banners, and SEO metadata.
                </p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Page Title</th>
                        <th>Website Section</th>
                        <th>Public URL</th>
                        <th>Last Modified</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="p-2 rounded text-navy" style="background: rgba(197, 160, 89, 0.15);">
                                        <i class="bi bi-file-earmark-text-fill text-warning"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-serif mb-0 fs-6 fw-bold">
                                            <a href="{{ route('admin.pages.edit', $page) }}" class="text-navy text-decoration-none">
                                                {{ $page->title }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">{{ Str::limit($page->subtitle, 50) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($page->slug === 'about-us')
                                    <span class="badge bg-primary text-uppercase" style="font-size: 0.7rem;">Club Overview</span>
                                @elseif($page->slug === 'mission-vision')
                                    <span class="badge bg-success text-uppercase" style="font-size: 0.7rem;">Mission & Values</span>
                                @elseif($page->slug === 'president-message')
                                    <span class="badge bg-warning text-dark text-uppercase" style="font-size: 0.7rem;">Leadership Message</span>
                                @elseif($page->slug === 'constitution')
                                    <span class="badge bg-dark text-uppercase" style="font-size: 0.7rem;">Governance By-Laws</span>
                                @elseif($page->slug === 'activities')
                                    <span class="badge bg-info text-dark text-uppercase" style="font-size: 0.7rem;">Club Activities</span>
                                @else
                                    <span class="badge bg-secondary text-uppercase" style="font-size: 0.7rem;">Custom Page</span>
                                @endif
                            </td>
                            <td>
                                <code class="small">/about/{{ $page->slug === 'about-us' ? '' : $page->slug }}</code>
                            </td>
                            <td class="small text-muted">{{ $page->updated_at->format('d M, Y &bull; h:i A') }}</td>
                            <td class="text-end">
                                <div class="btn-group">
                                    <a href="{{ url('/about/' . ($page->slug === 'about-us' ? '' : $page->slug)) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View Public Page">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Live Site
                                    </a>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-club-gold" title="Edit Content">
                                        <i class="bi bi-pencil me-1"></i> Edit Content
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
