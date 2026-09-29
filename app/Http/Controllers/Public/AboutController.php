<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $page = Page::where('slug', 'about-us')->firstOrFail();
        return view('public.page', compact('page'));
    }

    public function missionVision(): View
    {
        $page = Page::where('slug', 'mission-vision')->firstOrFail();
        return view('public.page', compact('page'));
    }

    public function presidentMessage(): View
    {
        $page = Page::where('slug', 'president-message')->firstOrFail();
        return view('public.page', compact('page'));
    }

    public function constitution(): View
    {
        $page = Page::where('slug', 'constitution')->firstOrFail();
        return view('public.page', compact('page'));
    }
}
