<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceFeature;
use App\Models\ServiceProject;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::with(['images', 'features', 'projects'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('pages.services.dynamic-services', compact('service'));
    }
}
