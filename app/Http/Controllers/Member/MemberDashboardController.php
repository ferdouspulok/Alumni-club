<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MemberDashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();
        $member = $user->member;

        $upcomingEvents = Event::upcoming()->take(3)->get();
        $latestNotices = Notice::published()->take(4)->get();
        $myRegistrations = $member ? $member->eventRegistrations()->with('event')->latest()->take(3)->get() : collect();

        return view('member.dashboard', compact('user', 'member', 'upcomingEvents', 'latestNotices', 'myRegistrations'));
    }
}
