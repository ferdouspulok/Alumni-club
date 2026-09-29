@extends('layouts.admin')

@section('title', 'Manage Pages CMS | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="font-serif text-navy mb-0">Website Pages CMS</h3>
            <span class="text-muted small">Edit content for About Us, Mission, President Message, and Constitution</span>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light small text-muted text-uppercase">
                    <tr>
                        <th>Page Title</th>
                        <th>URL Slug</th>
                        <th>Subtitle</th>
                        <th>Last Updated</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                        <tr>
                            <td>
                                <h6 class="font-serif mb-0 fs-6 fw-bold text-navy">
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="text-navy text-decoration-none">
                                        {{ $page->title }}
                                    </a>
                                </h6>
                            </td>
                            <td><code>/about/{{ $page->slug === 'about-us' ? '' : $page->slug }}</code></td>
                            <td class="small text-muted">{{ Str::limit($page->subtitle, 60) }}</td>
                            <td class="small text-muted">{{ $page->updated_at->format('d M, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-club-primary">
                                    <i class="bi bi-pencil me-1"></i> Edit Content
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
