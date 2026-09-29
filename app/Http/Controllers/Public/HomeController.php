<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Notice;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Member;
use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $upcomingEvents = Event::upcoming()->take(3)->get();
        $latestNotices = Notice::published()->take(5)->get();
        $latestNews = News::published()->take(3)->get();
        $galleryAlbums = Gallery::published()->with('images')->take(6)->get();

        $stats = [
            'total_members' => Setting::get('stats_total_members', Member::where('status', 'approved')->count()),
            'life_members' => Setting::get('stats_life_members', Member::where('status', 'approved')->whereHas('membershipType', fn($q) => $q->where('slug', 'life-member'))->count()),
            'executive_board' => Setting::get('stats_executive_board', '25'),
            'events_held' => Setting::get('stats_events_held', Event::count()),
        ];

        return view('public.home', compact(
            'upcomingEvents',
            'latestNotices',
            'latestNews',
            'galleryAlbums',
            'stats'
        ));
    }
}
