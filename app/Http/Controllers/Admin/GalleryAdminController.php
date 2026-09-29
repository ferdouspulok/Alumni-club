<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GalleryAdminController extends Controller
{
    public function index(): View
    {
        $albums = Gallery::withCount('images')->latest()->paginate(15);
        return view('admin.gallery.index', compact('albums'));
    }

    public function show(Gallery $gallery): View
    {
        $gallery->load('images');
        return view('admin.gallery.show', compact('gallery'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/gallery'), $filename);
            $validated['cover_image'] = $filename;
        }

        $gallery = Gallery::create($validated);

        return redirect()->route('admin.gallery.show', $gallery)->with('success', 'Album created successfully. You can now upload photos to it.');
    }

    public function uploadImages(Request $request, Gallery $gallery): RedirectResponse
    {
        $request->validate([
            'photos.*' => 'required|image|mimes:jpeg,png,jpg|max:4096',
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                $filename = 'photo_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/gallery'), $filename);

                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image_path' => $filename,
                    'order_num' => 0,
                ]);

                if (!$gallery->cover_image) {
                    $gallery->update(['cover_image' => $filename]);
                }
            }
        }

        return back()->with('success', 'Photos uploaded successfully.');
    }

    public function deleteImage(GalleryImage $image): RedirectResponse
    {
        $image->delete();
        return back()->with('success', 'Photo deleted.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Album deleted.');
    }
}
