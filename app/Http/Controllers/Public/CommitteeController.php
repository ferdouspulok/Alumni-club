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

        $president = null;
        $otherMembers = collect();

        if ($selectedCommittee && $selectedCommittee->members) {
            // Find President: exact match first
            $president = $selectedCommittee->members->first(function ($member) {
                return strcasecmp(trim($member->designation), 'President') === 0;
            });

            // Fallback: contains 'President' but not 'Executive', 'Vice', 'Past'
            if (!$president) {
                $president = $selectedCommittee->members->first(function ($member) {
                    $des = strtolower(trim($member->designation));
                    return str_contains($des, 'president')
                        && !str_contains($des, 'vice')
                        && !str_contains($des, 'executive')
                        && !str_contains($des, 'past');
                });
            }

            if ($president) {
                $otherMembers = $selectedCommittee->members->reject(function ($m) use ($president) {
                    return $m->id === $president->id;
                });
            } else {
                $otherMembers = $selectedCommittee->members;
            }
        }

        return view('public.committee', compact('allCommittees', 'selectedCommittee', 'president', 'otherMembers'));
    }
}
