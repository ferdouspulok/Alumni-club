<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Services\MemberService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DigitalCardController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        $member = $user->member;

        $qrCodeData = null;
        if ($member) {
            $verificationUrl = url('/verify-member/' . ($member->member_id ?? $member->id));
            $qrCodeData = MemberService::generateQrCode($verificationUrl);
        }

        return view('member.digital_card', compact('user', 'member', 'qrCodeData'));
    }
}
