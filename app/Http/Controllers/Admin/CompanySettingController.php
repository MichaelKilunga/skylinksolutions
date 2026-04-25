<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function index()
    {
        $setting = \App\Models\CompanySetting::first();
        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = \App\Models\CompanySetting::first();
        
        $validated = $request->validate([
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'working_hours' => 'nullable|string',
            'facebook_url' => 'nullable|string',
            'twitter_url' => 'nullable|string',
            'linkedin_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
            'instagram_url' => 'nullable|string',
            'google_map_link' => 'nullable|string',
        ]);

        $setting->update($validated);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
