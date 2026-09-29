<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(): View
    {
        $upcomingEvents = Event::upcoming()->paginate(6);
        $pastEvents = Event::past()->take(4)->get();
        return view('public.events', compact('upcomingEvents', 'pastEvents'));
    }

    public function show(string $slug): View
    {
        $event = Event::where('slug', $slug)->published()->firstOrFail();
        $relatedEvents = Event::published()
            ->where('id', '!=', $event->id)
            ->latest('event_date')
            ->take(3)
            ->get();

        return view('public.event_detail', compact('event', 'relatedEvents'));
    }

    public function register(Request $request, string $slug): RedirectResponse
    {
        $event = Event::where('slug', $slug)->published()->firstOrFail();

        $validated = $request->validate([
            'guest_name' => 'required|string|max:150',
            'guest_phone' => 'required|string|max:30',
            'guest_email' => 'nullable|email|max:150',
            'guest_count' => 'required|integer|min:1|max:10',
            'transaction_id' => 'nullable|string|max:100',
            'notes' => 'nullable|string|max:500',
        ]);

        $guestCount = (int)$validated['guest_count'];
        $feePerPerson = (float)$event->registration_fee;
        $totalAmount = $feePerPerson * $guestCount;

        $memberId = null;
        if (Auth::check() && Auth::user()->member) {
            $memberId = Auth::user()->member->id;
        }

        EventRegistration::create([
            'event_id' => $event->id,
            'member_id' => $memberId,
            'guest_name' => $validated['guest_name'],
            'guest_phone' => $validated['guest_phone'],
            'guest_email' => $validated['guest_email'],
            'guest_count' => $guestCount,
            'total_amount' => $totalAmount,
            'payment_status' => $totalAmount > 0 ? ($validated['transaction_id'] ? 'paid' : 'pending') : 'free',
            'transaction_id' => $validated['transaction_id'] ?? null,
            'notes' => $validated['notes'] ?? null,
        ]);

        return redirect()->route('events.show', $event->slug)
            ->with('success', 'Your registration for "' . $event->title . '" has been received successfully! See you at the club.');
    }
}
