<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NoticeAdminController extends Controller
{
    public function index(): View
    {
        $notices = Notice::latest('publish_date')->paginate(15);
        return view('admin.notices.index', compact('notices'));
    }

    public function create(): View
    {
        return view('admin.notices.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'notice_number' => 'nullable|string|max:50',
            'description' => 'required|string',
            'publish_date' => 'required|date',
            'is_pinned' => 'nullable|boolean',
            'status' => 'required|in:published,draft',
            'file_attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:10240',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['is_pinned'] = $request->has('is_pinned');

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filename = 'notice_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/notices'), $filename);
            $validated['file_attachment'] = $filename;
        }

        Notice::create($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice published successfully.');
    }

    public function edit(Notice $notice): View
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'notice_number' => 'nullable|string|max:50',
            'description' => 'required|string',
            'publish_date' => 'required|date',
            'is_pinned' => 'nullable|boolean',
            'status' => 'required|in:published,draft',
            'file_attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:10240',
        ]);

        $validated['is_pinned'] = $request->has('is_pinned');

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filename = 'notice_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/notices'), $filename);
            $validated['file_attachment'] = $filename;
        }

        $notice->update($validated);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice): RedirectResponse
    {
        $notice->delete();
        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted.');
    }
}
