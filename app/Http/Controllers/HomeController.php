<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\CoreValue;
use App\Models\Service;
use App\Models\HomeServiceItem;
use App\Models\CompanySetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $coreValues = CoreValue::where('is_active', true)->orderBy('order')->get();
        $services = Service::where('status', true)->take(4)->get();



        $nationwideItems = HomeServiceItem::where('is_active', true)->orderBy('order')->get();
        $settings = CompanySetting::first();

        return view('pages.home.index', compact(
            'sliders',
            'coreValues',
            'services',
            'nationwideItems',
            'settings'
        ));
    }
}
