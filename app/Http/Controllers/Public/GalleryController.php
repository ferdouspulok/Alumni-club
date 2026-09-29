<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $albums = Gallery::published()->withCount('images')->paginate(9);
        return view('public.gallery', compact('albums'));
    }

    public function show(string $slug): View
    {
        $album = Gallery::where('slug', $slug)->published()->with('images')->firstOrFail();
        return view('public.gallery_album', compact('album'));
    }
}
