<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventAdminController extends Controller
{
    public function index(): View
    {
        $events = Event::withCount('registrations')->latest('event_date')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create(): View
    {
        return view('admin.events.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string|max:50',
            'venue' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'is_registration_required' => 'nullable|boolean',
            'registration_fee' => 'nullable|numeric|min:0',
            'registration_deadline' => 'nullable|date',
            'max_participants' => 'nullable|integer',
            'status' => 'required|in:draft,published,completed,cancelled',
            'is_featured' => 'nullable|boolean',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . time();
        $validated['is_registration_required'] = $request->has('is_registration_required');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['registration_fee'] = $validated['registration_fee'] ?? 0.00;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = 'event_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['banner_image'] = $filename;
        }

        Event::create($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event): View
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'nullable|string|max:50',
            'venue' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'is_registration_required' => 'nullable|boolean',
            'registration_fee' => 'nullable|numeric|min:0',
            'registration_deadline' => 'nullable|date',
            'max_participants' => 'nullable|integer',
            'status' => 'required|in:draft,published,completed,cancelled',
            'is_featured' => 'nullable|boolean',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $validated['is_registration_required'] = $request->has('is_registration_required');
        $validated['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = 'event_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/events'), $filename);
            $validated['banner_image'] = $filename;
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event removed.');
    }

    public function registrations(Request $request): View
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        $query = EventRegistration::with(['event', 'member']);

        if ($eventId = $request->input('event_id')) {
            $query->where('event_id', $eventId);
        }

        $registrations = $query->latest()->paginate(20)->withQueryString();

        return view('admin.events.registrations', compact('registrations', 'events'));
    }

    public function exportRegistrations(Request $request): StreamedResponse
    {
        $eventId = $request->input('event_id');
        $query = EventRegistration::with(['event', 'member']);

        if ($eventId) {
            $query->where('event_id', $eventId);
        }

        $records = $query->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="event_registrations_' . date('Y-m-d') . '.csv"',
        ];

        return response()->stream(function () use ($records) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Event Title', 'Guest/Member Name', 'Phone', 'Email', 'Guests Count', 'Total Fee', 'Payment Status', 'TxID', 'Date']);

            foreach ($records as $r) {
                fputcsv($handle, [
                    $r->id,
                    $r->event ? $r->event->title : 'N/A',
                    $r->guest_name,
                    $r->guest_phone,
                    $r->guest_email,
                    $r->guest_count,
                    $r->total_amount,
                    ucfirst($r->payment_status),
                    $r->transaction_id ?? 'N/A',
                    $r->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }
}
