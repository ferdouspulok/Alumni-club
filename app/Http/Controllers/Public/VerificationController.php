<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\View\View;

class VerificationController extends Controller
{
    public function verify(string $memberId): View
    {
        $member = Member::where('member_id', $memberId)
            ->orWhere('id', $memberId)
            ->with(['membershipType'])
            ->first();

        return view('public.verify_member', compact('member', 'memberId'));
    }
}
