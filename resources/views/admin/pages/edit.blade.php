@extends('layouts.admin')

@section('title', 'Edit Page: ' . $page->title . ' | Chatkhil Elite Club Limited')

@section('content')

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2" 
                 style="background: rgba(13, 202, 240, 0.12); border: 1px solid rgba(13, 202, 240, 0.35);">
                <i class="bi bi-journal-richtext text-info" style="font-size: 0.8rem;"></i>
                <span class="text-dark fw-bold text-uppercase" style="letter-spacing: 0.08em; font-size: 0.72rem;">
                    Content Manager &bull; CMS Page Editor
                </span>
            </div>
            <h3 class="font-serif text-navy mb-0">Edit Page: {{ $page->title }}</h3>
            <span class="text-muted small">Public URL: <code>/about/{{ $page->slug === 'about-us' ? '' : $page->slug }}</code></span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/about/' . ($page->slug === 'about-us' ? '' : $page->slug)) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-box-arrow-up-right me-1"></i> View Live Page
            </a>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Back to Pages CMS
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
        <form action="{{ route('admin.pages.update', $page) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4 mb-4">
                <div class="col-md-7">
                    <label class="form-label small fw-semibold">Page Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control form-control-lg" required value="{{ old('title', $page->title) }}">
                    <div class="form-text small">This will appear as the main heading of the section.</div>
                </div>

                <div class="col-md-5">
                    <label class="form-label small fw-semibold">Page Subtitle / Tagline</label>
                    <input type="text" name="subtitle" class="form-control form-control-lg" value="{{ old('subtitle', $page->subtitle) }}">
                    <div class="form-text small">Brief descriptive summary shown below title.</div>
                </div>

                <!-- Rich Content Formatting Toolbar -->
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label class="form-label small fw-semibold mb-0">Page Body Content (HTML supported) <span class="text-danger">*</span></label>
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#previewModal">
                            <i class="bi bi-eye me-1"></i> Quick Preview
                        </button>
                    </div>

                    <!-- Quick Toolbar -->
                    <div class="btn-toolbar p-2 bg-light border rounded-top gap-1" role="toolbar">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white border" onclick="wrapText('<b>', '</b>')" title="Bold"><b>B</b></button>
                            <button type="button" class="btn btn-white border" onclick="wrapText('<i>', '</i>')" title="Italic"><i>I</i></button>
                            <button type="button" class="btn btn-white border" onclick="wrapText('<u>', '</u>')" title="Underline"><u>U</u></button>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white border" onclick="wrapText('<h3>', '</h3>')" title="Heading 3">H3</button>
                            <button type="button" class="btn btn-white border" onclick="wrapText('<h4>', '</h4>')" title="Heading 4">H4</button>
                            <button type="button" class="btn btn-white border" onclick="wrapText('<p>', '</p>')" title="Paragraph">&para;</button>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white border" onclick="insertTemplate('ul')" title="Bullet List"><i class="bi bi-list-ul"></i></button>
                            <button type="button" class="btn btn-white border" onclick="insertTemplate('ol')" title="Numbered List"><i class="bi bi-list-ol"></i></button>
                            <button type="button" class="btn btn-white border" onclick="wrapText('<blockquote class=\'blockquote p-3 bg-light border-start border-4 border-warning\'>', '</blockquote>')" title="Quote"><i class="bi bi-quote"></i></button>
                            <button type="button" class="btn btn-white border" onclick="insertTemplate('callout')" title="Gold Alert Box"><i class="bi bi-info-square"></i></button>
                        </div>
                    </div>

                    <textarea id="pageContentArea" name="content" class="form-control rounded-top-0 font-monospace" rows="15" required style="font-size: 0.95rem; line-height: 1.6;">{{ old('content', $page->content) }}</textarea>
                    <div class="form-text small mt-1">
                        Use the toolbar buttons above or standard HTML tags (<code>&lt;p&gt;</code>, <code>&lt;h3&gt;</code>, <code>&lt;ul&gt;</code>, <code>&lt;li&gt;</code>, <code>&lt;strong&gt;</code>) to format the article.
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">Featured Banner / Photo</label>
                    @if($page->featured_image)
                        <div class="d-flex align-items-center gap-3 mb-2 p-2 border rounded bg-light">
                            <img src="{{ asset('uploads/' . $page->featured_image) }}" alt="Preview" style="height: 60px; width: 90px; object-fit: cover; border-radius: 4px;">
                            <div class="small">
                                <span class="d-block fw-bold text-navy">Current Image:</span>
                                <span class="text-muted font-monospace" style="font-size: 0.8rem;">{{ $page->featured_image }}</span>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="featured_image" class="form-control" accept="image/*">
                    <div class="form-text small">Recommended size: 1200x600px. JPG, PNG formats up to 3MB.</div>
                </div>

                <!-- SEO Meta Title -->
                <div class="col-md-6">
                    <label class="form-label small fw-semibold">SEO Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $page->meta_title) }}" placeholder="e.g. About Us | Chatkhil Elite Club Limited">
                    <div class="form-text small">Appears on search engine tabs and social previews.</div>
                </div>

                <!-- SEO Meta Description -->
                <div class="col-12">
                    <label class="form-label small fw-semibold">SEO Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="2" placeholder="Brief summary of this page for search engines...">{{ old('meta_description', $page->meta_description) }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                <a href="{{ route('admin.pages.index') }}" class="btn btn-outline-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn btn-club-gold px-4 py-2 fw-bold">
                    <i class="bi bi-save me-1"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Quick Preview Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-serif text-navy">
                        <i class="bi bi-eye me-1"></i> HTML Content Live Preview
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="border p-4 rounded-3 bg-white" id="modalPreviewBody">
                        <!-- Populated by JS -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close Preview</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function wrapText(openTag, closeTag) {
            const textarea = document.getElementById('pageContentArea');
            const start = textarea.selectionStart;
            const end = textarea.selectionEnd;
            const text = textarea.value;
            const selectedText = text.substring(start, end);

            const replacement = openTag + selectedText + closeTag;
            textarea.value = text.substring(0, start) + replacement + text.substring(end);
            textarea.focus();
            textarea.setSelectionRange(start + openTag.length, start + openTag.length + selectedText.length);
        }

        function insertTemplate(type) {
            const textarea = document.getElementById('pageContentArea');
            let template = '';
            if (type === 'ul') {
                template = "\n<ul>\n  <li>Key initiative point one</li>\n  <li>Key initiative point two</li>\n  <li>Key initiative point three</li>\n</ul>\n";
            } else if (type === 'ol') {
                template = "\n<ol>\n  <li>Step or article section one</li>\n  <li>Step or article section two</li>\n  <li>Step or article section three</li>\n</ol>\n";
            } else if (type === 'callout') {
                template = "\n<div class=\"p-3 my-3 rounded-3\" style=\"background: rgba(197, 160, 89, 0.12); border-left: 4px solid #c5a059;\">\n  <strong style=\"color: #06101e;\">Official Note:</strong>\n  <p class=\"mb-0 small\">Your important highlighted text or clause goes here.</p>\n</div>\n";
            }

            const start = textarea.selectionStart;
            const text = textarea.value;
            textarea.value = text.substring(0, start) + template + text.substring(start);
            textarea.focus();
        }

        // Live preview trigger
        const previewModal = document.getElementById('previewModal');
        if (previewModal) {
            previewModal.addEventListener('show.bs.modal', function () {
                const content = document.getElementById('pageContentArea').value;
                document.getElementById('modalPreviewBody').innerHTML = content;
            });
        }
    </script>

@endsection
