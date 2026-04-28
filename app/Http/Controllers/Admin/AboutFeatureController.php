<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use Illuminate\Http\Request;

class AboutFeatureController extends Controller
{
    public function index()
    {
        $features = AboutFeature::orderBy('order')->get();
        return view('admin.about_features.index', compact('features'));
    }

    public function create()
    {
        return view('admin.about_features.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        AboutFeature::create($validated);

        return redirect()->route('admin.about_features.index')->with('success', 'Feature created successfully!');
    }

    public function edit(AboutFeature $aboutFeature)
    {
        return view('admin.about_features.edit', compact('aboutFeature'));
    }

    public function update(Request $request, AboutFeature $aboutFeature)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $aboutFeature->update($validated);

        return redirect()->route('admin.about_features.index')->with('success', 'Feature updated successfully!');
    }

    public function destroy(AboutFeature $aboutFeature)
    {
        $aboutFeature->delete();
        return redirect()->route('admin.about_features.index')->with('success', 'Feature deleted successfully!');
    }

    public function toggleActive(AboutFeature $aboutFeature)
    {
        $aboutFeature->update(['is_active' => !$aboutFeature->is_active]);
        return response()->json(['success' => true]);
    }
}
