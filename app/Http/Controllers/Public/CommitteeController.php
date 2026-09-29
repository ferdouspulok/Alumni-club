<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Committee;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommitteeController extends Controller
{
    public function index(Request $request): View
    {
        $allCommittees = Committee::where('status', '!=', 'inactive')
            ->orderBy('term_start_year', 'desc')
            ->get();

        $selectedId = $request->query('committee_id');

        if ($selectedId) {
            $selectedCommittee = Committee::with('members')->findOrFail($selectedId);
        } else {
            $selectedCommittee = Committee::with('members')->where('is_current', true)->first()
                ?? $allCommittees->first();
        }

        return view('public.committee', compact('allCommittees', 'selectedCommittee'));
    }
}
