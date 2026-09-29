<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MemberEventController extends Controller
{
    public function index(): View
    {
        $member = Auth::user()->member;
        $myRegistrations = $member ? $member->eventRegistrations()->with('event')->latest()->paginate(10) : collect();
        $upcomingEvents = Event::upcoming()->get();

        return view('member.my_events', compact('myRegistrations', 'upcomingEvents'));
    }
}
