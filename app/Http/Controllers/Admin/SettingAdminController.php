<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SettingAdminController extends Controller
{
    public function index(): View
    {
        return view('admin.settings.index');
    }

    public function update(Request $request): RedirectResponse
    {
        $fields = [
            'site_name', 'site_tagline', 'club_reg_no', 'club_established_year',
            'club_address', 'contact_phone', 'contact_email', 'office_hours',
            'facebook_url', 'youtube_url', 'linkedin_url', 'map_iframe',
            'hero_title', 'hero_subtitle', 'stats_total_members', 'stats_life_members',
            'stats_executive_board', 'stats_events_held', 'president_name', 'president_title',
            'president_message_short'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field));
            }
        }

        if ($request->hasFile('site_logo')) {
            $file = $request->file('site_logo');
            $file->move(public_path('images'), 'logo.png');
            Setting::set('site_logo', 'images/logo.png');
        }

        if ($request->hasFile('president_photo')) {
            $file = $request->file('president_photo');
            $filename = 'president_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            Setting::set('president_photo', 'images/' . $filename);
        }

        return back()->with('success', 'Club settings updated successfully.');
    }
}
