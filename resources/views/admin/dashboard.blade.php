@extends('layouts.admin')

@section('title', (auth()->user()->role === 'content_manager' ? 'Content Management Dashboard' : 'Admin Dashboard') . ' | Chatkhil Elite Club Limited')

@section('content')

@if(auth()->user()->role === 'content_manager')
    <!-- Content Manager Dedicated Dashboard -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2" 
                 style="background: rgba(13, 202, 240, 0.12); border: 1px solid rgba(13, 202, 240, 0.35);">
                <i class="bi bi-journal-richtext text-info" style="font-size: 0.8rem;"></i>
                <span class="text-dark fw-bold text-uppercase" style="letter-spacing: 0.08em; font-size: 0.72rem;">
                    Content Manager &bull; Editorial & CMS Center
                </span>
            </div>
            <h3 class="font-serif text-navy mb-0">Website Content Management Dashboard</h3>
            <span class="text-muted small">Manage website static pages, news stories, notice circulars, photo gallery albums, and events</span>
        </div>
        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.news.create') }}" class="btn btn-club-gold btn-sm">
                <i class="bi bi-pencil-square me-1"></i> New Article
            </a>
            <a href="{{ route('admin.notices.create') }}" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-megaphone me-1"></i> Post Notice
            </a>
            <a href="{{ route('admin.events.create') }}" class="btn btn-outline-success btn-sm">
                <i class="bi bi-calendar-plus me-1"></i> Add Event
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-info btn-sm">
                <i class="bi bi-images me-1"></i> Photo Gallery
            </a>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-dark btn-sm">
                <i class="bi bi-layout-text-window-reverse me-1"></i> Pages CMS
            </a>
        </div>
    </div>

    <!-- Content Management Metric Counters -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-primary">
                <span class="text-muted small text-uppercase fw-bold">Published News</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['total_news'] }}</div>
                <a href="{{ route('admin.news.index') }}" class="small text-primary text-decoration-none">Manage Articles &rarr;</a>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-warning">
                <span class="text-muted small text-uppercase fw-bold">Notice Board</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['total_notices'] }}</div>
                <a href="{{ route('admin.notices.index') }}" class="small text-navy text-decoration-none">Manage Notices &rarr;</a>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-info">
                <span class="text-muted small text-uppercase fw-bold">Photo Albums</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['gallery_albums'] }}</div>
                <span class="small text-muted">{{ $stats['total_photos'] }} Photos uploaded</span>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-success">
                <span class="text-muted small text-uppercase fw-bold">Upcoming Events</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['upcoming_events'] }}</div>
                <a href="{{ route('admin.events.index') }}" class="small text-success text-decoration-none">Manage Events &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Second Row Stats -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <div>
                    <span class="text-muted small">Website CMS Pages</span>
                    <div class="fs-4 fw-bold text-navy">{{ $stats['total_pages'] }} Pages</div>
                </div>
                <a href="{{ route('admin.pages.index') }}" class="btn btn-sm btn-outline-secondary">Edit Pages</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <div>
                    <span class="text-muted small">Official Documents</span>
                    <div class="fs-4 fw-bold text-navy">{{ $stats['total_documents'] }} Files</div>
                </div>
                <a href="{{ route('admin.documents.index') }}" class="btn btn-sm btn-outline-secondary">Manage Documents</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white d-flex flex-row align-items-center justify-content-between">
                <div>
                    <span class="text-muted small">Inquiries & Feedback</span>
                    <div class="fs-4 fw-bold text-navy">{{ $stats['unread_messages'] }} Unread</div>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-secondary">View Messages</a>
            </div>
        </div>
    </div>

    <!-- CMS Pages Quick-Access & Inquiries -->
    <div class="row g-4 mb-4">
        <!-- Website Pages CMS -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="font-serif text-navy mb-0">Website Pages CMS</h5>
                        <small class="text-muted">Edit static public sections of Chatkhil Elite Club Limited</small>
                    </div>
                    <a href="{{ route('admin.pages.index') }}" class="small text-navy text-decoration-none">All Pages &rarr;</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small text-muted text-uppercase">
                            <tr>
                                <th>Page Title</th>
                                <th>Public Path</th>
                                <th>Last Updated</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cmsPages as $p)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-light p-2 rounded text-navy">
                                                <i class="bi bi-file-earmark-richtext"></i>
                                            </div>
                                            <div>
                                                <h6 class="font-serif mb-0 fs-6 fw-bold">
                                                    <a href="{{ route('admin.pages.edit', $p) }}" class="text-navy text-decoration-none">
                                                        {{ $p->title }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">{{ Str::limit($p->subtitle, 45) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <code class="small">/about/{{ $p->slug === 'about-us' ? '' : $p->slug }}</code>
                                    </td>
                                    <td class="small text-muted">{{ $p->updated_at->format('d M, Y') }}</td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="{{ url('/about/' . ($p->slug === 'about-us' ? '' : $p->slug)) }}" target="_blank" class="btn btn-sm btn-outline-secondary" title="View on Website">
                                                <i class="bi bi-box-arrow-up-right"></i>
                                            </a>
                                            <a href="{{ route('admin.pages.edit', $p) }}" class="btn btn-sm btn-club-primary" title="Edit Content">
                                                <i class="bi bi-pencil me-1"></i> Edit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Contact Inquiries -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0">Recent Inquiries</h5>
                    <a href="{{ route('admin.messages.index') }}" class="small text-navy text-decoration-none">All Messages &rarr;</a>
                </div>

                @if($recentMessages->isEmpty())
                    <p class="text-muted small my-3">No messages received yet.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($recentMessages as $msg)
                            <div class="list-group-item px-0 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold small text-navy">{{ $msg->name }}</span>
                                    <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="small fw-semibold text-truncate mb-1">{{ $msg->subject }}</div>
                                <p class="small text-muted mb-2 text-truncate">{{ $msg->message }}</p>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="small text-navy text-decoration-none">View Message &rarr;</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- News & Notices Row -->
    <div class="row g-4">
        <!-- Recent News -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="font-serif text-navy mb-0">Latest News & Articles</h5>
                        <small class="text-muted">Recently published news stories and updates</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-club-gold">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small text-muted text-uppercase">
                            <tr>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th class="text-end">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentNews as $news)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ $news->thumbnail_url }}" alt="Thumb" style="width: 40px; height: 30px; object-fit: cover; border-radius: 4px;">
                                            <div>
                                                <h6 class="font-serif mb-0 fs-6">
                                                    <a href="{{ route('admin.news.edit', $news) }}" class="text-navy text-decoration-none">
                                                        {{ Str::limit($news->title, 35) }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">{{ $news->published_at ? $news->published_at->format('d M, Y') : 'Draft' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-navy border">
                                            {{ $news->category ? $news->category->name : 'General' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $news->status === 'published' ? 'success' : 'secondary' }}">
                                            {{ ucfirst($news->status) }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.news.edit', $news) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3 text-muted">No news articles published.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Notices -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="font-serif text-navy mb-0">Notice Board Circulars</h5>
                        <small class="text-muted">Official club announcements and circulars</small>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.notices.create') }}" class="btn btn-sm btn-club-gold">
                            <i class="bi bi-plus-lg"></i>
                        </a>
                        <a href="{{ route('admin.notices.index') }}" class="btn btn-sm btn-outline-secondary">View All</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small text-muted text-uppercase">
                            <tr>
                                <th>Notice</th>
                                <th>Date</th>
                                <th>File</th>
                                <th class="text-end">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentNotices as $notice)
                                <tr>
                                    <td>
                                        <div>
                                            <h6 class="font-serif mb-0 fs-6">
                                                <a href="{{ route('admin.notices.edit', $notice) }}" class="text-navy text-decoration-none">
                                                    {{ Str::limit($notice->title, 35) }}
                                                </a>
                                            </h6>
                                            @if($notice->is_pinned)
                                                <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Pinned</span>
                                            @endif
                                            @if($notice->notice_number)
                                                <small class="text-muted font-monospace">{{ $notice->notice_number }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="small text-muted">{{ $notice->publish_date->format('d M, Y') }}</td>
                                    <td>
                                        @if($notice->file_attachment)
                                            <i class="bi bi-paperclip text-primary fs-5" title="Attachment available"></i>
                                        @else
                                            <span class="text-muted small">&mdash;</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-outline-secondary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3 text-muted">No notices on the board.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@else
    <!-- Super Admin & Member Manager Executive Dashboard -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Overview & Management Dashboard</h3>
            <span class="text-muted small">Chatkhil Elite Club Limited, Noakhali, Bangladesh</span>
        </div>
        <div class="d-flex gap-2">
            @if(auth()->user()->isMemberManager())
                <a href="{{ route('admin.members.pending') }}" class="btn btn-danger btn-sm">
                    <i class="bi bi-clock-history me-1"></i> Pending Applications ({{ $stats['pending_applications'] }})
                </a>
                <a href="{{ route('admin.members.create') }}" class="btn btn-club-gold btn-sm">
                    <i class="bi bi-person-plus me-1"></i> Add Member
                </a>
            @endif
        </div>
    </div>

    <!-- Statistics Counters -->
    <div class="row g-3 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-primary">
                <span class="text-muted small text-uppercase fw-bold">Total Members</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['total_members'] }}</div>
                <span class="small text-success"><i class="bi bi-check-circle me-1"></i> {{ $stats['active_members'] }} Active</span>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-warning">
                <span class="text-muted small text-uppercase fw-bold">Pending Applications</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['pending_applications'] }}</div>
                <a href="{{ route('admin.members.pending') }}" class="small text-danger text-decoration-none">Needs Review &rarr;</a>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-info">
                <span class="text-muted small text-uppercase fw-bold">Life Members</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['life_members'] }}</div>
                <span class="small text-muted">Prestigious Fellowship</span>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white border-start border-4 border-success">
                <span class="text-muted small text-uppercase fw-bold">Upcoming Events</span>
                <div class="fs-3 fw-bold text-navy font-serif">{{ $stats['upcoming_events'] }}</div>
                <a href="{{ route('admin.events.index') }}" class="small text-navy text-decoration-none">Manage Events &rarr;</a>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Total News</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['total_news'] }}</div>
                <a href="{{ route('admin.news.index') }}" class="small text-muted text-decoration-none">View Articles &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Notices Board</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['total_notices'] }}</div>
                <a href="{{ route('admin.notices.index') }}" class="small text-muted text-decoration-none">View Circulars &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Photo Albums</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['gallery_albums'] }}</div>
                <a href="{{ route('admin.gallery.index') }}" class="small text-muted text-decoration-none">View Gallery &rarr;</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 p-3 bg-white text-center">
                <span class="text-muted small">Unread Messages</span>
                <div class="fs-4 fw-bold text-navy">{{ $stats['unread_messages'] }}</div>
                <a href="{{ route('admin.messages.index') }}" class="small text-muted text-decoration-none">View Messages &rarr;</a>
            </div>
        </div>
    </div>

    <!-- Recent Applications & Inquiries -->
    <div class="row g-4">
        <!-- Recent Applications -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0">Recent Membership Applications</h5>
                    <a href="{{ route('admin.members.index') }}" class="small text-navy text-decoration-none">View All &rarr;</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light small text-muted text-uppercase">
                            <tr>
                                <th>Applicant</th>
                                <th>Category</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentApplications as $app)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div style="width: 38px; height: 38px; border-radius: 50%; overflow: hidden; background: #0a1424;">
                                                <img src="{{ $app->photo_url }}" alt="Photo" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fs-6 font-serif">
                                                    <a href="{{ route('admin.members.show', $app) }}" class="text-navy text-decoration-none">
                                                        {{ $app->full_name }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">{{ $app->profession ?: 'Applicant' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-navy border">
                                            {{ $app->membershipType ? $app->membershipType->name : 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="small font-monospace">{{ $app->mobile }}</td>
                                    <td>
                                        @if($app->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @elseif($app->status === 'pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif($app->status === 'rejected')
                                            <span class="badge bg-danger">Rejected</span>
                                        @else
                                            <span class="badge bg-secondary">{{ ucfirst($app->status) }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.members.show', $app) }}" class="btn btn-sm btn-outline-secondary">
                                            Review
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">No applications found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Contact Messages -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="font-serif text-navy mb-0">Recent Inquiries</h5>
                    <a href="{{ route('admin.messages.index') }}" class="small text-navy text-decoration-none">All Messages &rarr;</a>
                </div>

                @if($recentMessages->isEmpty())
                    <p class="text-muted small my-3">No messages received yet.</p>
                @else
                    <div class="list-group list-group-flush">
                        @foreach($recentMessages as $msg)
                            <div class="list-group-item px-0 py-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <span class="fw-bold small text-navy">{{ $msg->name }}</span>
                                    <small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                                </div>
                                <div class="small fw-semibold text-truncate mb-1">{{ $msg->subject }}</div>
                                <p class="small text-muted mb-2 text-truncate">{{ $msg->message }}</p>
                                <a href="{{ route('admin.messages.show', $msg) }}" class="small text-navy text-decoration-none">View Message &rarr;</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endif

@endsection
