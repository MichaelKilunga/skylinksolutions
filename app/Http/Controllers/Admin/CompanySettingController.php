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
            'company_name' => 'nullable|string',
            // Home Fields
            'about_title' => 'nullable|string',
            'about_subtitle' => 'nullable|string',
            'about_description_1' => 'nullable|string',
            'about_description_2' => 'nullable|string',
            'experience_years' => 'nullable|string',
            'experience_text' => 'nullable|string',
            'about_feature_1' => 'nullable|string',
            'about_feature_2' => 'nullable|string',
            'nationwide_title' => 'nullable|string',
            'nationwide_description' => 'nullable|string',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
            'nationwide_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1024',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg,ico|max:1024',
            // About Page Fields
            'vision_title' => 'nullable|string',
            'vision_description' => 'nullable|string',
            'mission_title' => 'nullable|string',
            'mission_description' => 'nullable|string',
            'why_choose_us_title' => 'nullable|string',
            'why_choose_us_subtitle' => 'nullable|string',
            'software_projects_count' => 'nullable|string',
            'networking_systems_count' => 'nullable|string',
            'security_systems_count' => 'nullable|string',
            'automation_systems_count' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            if ($setting->logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->logo)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->logo);
            }
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            if ($setting->favicon && \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->favicon)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->favicon);
            }
            $validated['favicon'] = $request->file('favicon')->store('settings', 'public');
        }

        if ($request->hasFile('about_image')) {
            if ($setting->about_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->about_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->about_image);
            }
            $validated['about_image'] = $request->file('about_image')->store('settings', 'public');
        }
        if ($request->hasFile('nationwide_image')) {
            if ($setting->nationwide_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($setting->nationwide_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($setting->nationwide_image);
            }
            $validated['nationwide_image'] = $request->file('nationwide_image')->store('settings', 'public');
        }

        $setting->update($validated);

        return redirect()->route('admin.settings.index', ['tab' => $request->active_tab])
            ->with('success', 'Settings updated successfully!');
    }
}
