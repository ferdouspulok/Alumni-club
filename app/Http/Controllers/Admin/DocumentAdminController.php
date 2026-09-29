<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DocumentAdminController extends Controller
{
    public function index(): View
    {
        $documents = Document::latest()->paginate(15);
        return view('admin.documents.index', compact('documents'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:constitution,form,report,circular,other',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:20480',
            'is_public' => 'nullable|boolean',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $sizeInBytes = $file->getSize();
            $fileSize = $sizeInBytes > 1048576 
                ? round($sizeInBytes / 1048576, 1) . ' MB' 
                : round($sizeInBytes / 1024, 1) . ' KB';

            $filename = 'doc_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/documents'), $filename);

            $validated['file_path'] = $filename;
            $validated['file_size'] = $fileSize;
        }

        $validated['is_public'] = $request->has('is_public');
        Document::create($validated);

        return back()->with('success', 'Document uploaded successfully.');
    }

    public function destroy(Document $document): RedirectResponse
    {
        if ($document->file_path && file_exists(public_path('uploads/documents/' . $document->file_path))) {
            @unlink(public_path('uploads/documents/' . $document->file_path));
        }

        $document->delete();
        return back()->with('success', 'Document deleted.');
    }
}
