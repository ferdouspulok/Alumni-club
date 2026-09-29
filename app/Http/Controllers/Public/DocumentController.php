<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(): View
    {
        $documents = Document::where('is_public', true)
            ->latest()
            ->get()
            ->groupBy('category');

        return view('public.documents', compact('documents'));
    }
}
