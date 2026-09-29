<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $categories = NewsCategory::all();
        $query = News::published()->with('category');

        if ($catSlug = $request->query('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $catSlug));
        }

        $newsList = $query->paginate(9)->withQueryString();

        return view('public.news', compact('newsList', 'categories'));
    }

    public function show(string $slug): View
    {
        $news = News::where('slug', $slug)->published()->firstOrFail();
        $news->increment('views_count');

        $recentNews = News::published()
            ->where('id', '!=', $news->id)
            ->take(4)
            ->get();

        return view('public.news_detail', compact('news', 'recentNews'));
    }
}
