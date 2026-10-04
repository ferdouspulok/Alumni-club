<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Event;
use App\Models\News;
use App\Models\Notice;
use App\Models\Gallery;
use App\Models\ContactMessage;
use App\Models\GalleryImage;
use App\Models\Document;
use App\Models\Page;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'total_members' => Member::count(),
            'pending_applications' => Member::where('status', 'pending')->count(),
            'active_members' => Member::where('status', 'approved')->count(),
            'life_members' => Member::where('status', 'approved')->whereHas('membershipType', fn($q) => $q->where('slug', 'life-member'))->count(),
            'upcoming_events' => Event::upcoming()->count(),
            'total_news' => News::count(),
            'total_notices' => Notice::count(),
            'gallery_albums' => Gallery::count(),
            'total_photos' => GalleryImage::count(),
            'total_documents' => Document::count(),
            'total_pages' => Page::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentApplications = Member::with('membershipType')->latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        $upcomingEvents = Event::upcoming()->take(4)->get();
        $recentNews = News::with('category')->latest()->take(5)->get();
        $recentNotices = Notice::latest('publish_date')->take(5)->get();
        $recentAlbums = Gallery::withCount('images')->latest()->take(4)->get();
        $cmsPages = Page::all();

        return view('admin.dashboard', compact(
            'stats',
            'recentApplications',
            'recentMessages',
            'upcomingEvents',
            'recentNews',
            'recentNotices',
            'recentAlbums',
            'cmsPages'
        ));
    }
}
