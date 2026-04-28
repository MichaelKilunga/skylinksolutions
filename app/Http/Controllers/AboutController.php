<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $teamMembers = User::visibleTeam()->get();
        $settings = \App\Models\CompanySetting::first();
        $features = \App\Models\AboutFeature::where('is_active', true)->orderBy('order')->get();
        
        return view('pages.company.about', compact('teamMembers', 'settings', 'features'));
    }
}
