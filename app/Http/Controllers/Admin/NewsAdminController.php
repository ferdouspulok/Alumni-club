<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NewsAdminController extends Controller
{
    public function index(): View
    {
        $newsList = News::with('category')->latest()->paginate(15);
        $categories = NewsCategory::all();
        return view('admin.news.index', compact('newsList', 'categories'));
    }

    public function create(): View
    {
        $categories = NewsCategory::all();
        return view('admin.news.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'news_category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:100',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['is_featured'] = $request->has('is_featured');
        $validated['author_name'] = $validated['author_name'] ?: 'Chatkhil Elite Club';
        $validated['published_at'] = $validated['published_at'] ?: now();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'news_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $filename);
            $validated['thumbnail'] = $filename;
        }

        News::create($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article published successfully.');
    }

    public function edit(News $news): View
    {
        $categories = NewsCategory::all();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $validated = $request->validate([
            'news_category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'content' => 'nullable|string',
            'author_name' => 'nullable|string|max:100',
            'is_featured' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'status' => 'required|in:draft,published',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = 'news_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $filename);
            $validated['thumbnail'] = $filename;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')->with('success', 'News article updated successfully.');
    }

    public function destroy(News $news): RedirectResponse
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News article removed.');
    }

    public function storeCategory(Request $request): RedirectResponse
    {
        $validated = $request->validate(['name' => 'required|string|max:100']);
        $validated['slug'] = Str::slug($validated['name']);
        NewsCategory::create($validated);
        return back()->with('success', 'Category added.');
    }
}
