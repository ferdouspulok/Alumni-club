<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\View\View;

class NoticeController extends Controller
{
    public function index(): View
    {
        $notices = Notice::published()->paginate(10);
        return view('public.notices', compact('notices'));
    }

    public function show(string $slug): View
    {
        $notice = Notice::where('slug', $slug)->published()->firstOrFail();
        $recentNotices = Notice::published()
            ->where('id', '!=', $notice->id)
            ->take(5)
            ->get();

        return view('public.notice_detail', compact('notice', 'recentNotices'));
    }
}
