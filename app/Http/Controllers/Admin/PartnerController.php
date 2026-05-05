<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = \App\Models\Partner::latest()->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'activity' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $request->file('logo')->store('partners', 'public');
        }

        unset($validated['logo']);

        $validated['is_active'] = $request->has('is_active');

        \App\Models\Partner::create($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(\App\Models\Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, \App\Models\Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'activity' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            if ($partner->logo_path) {
                Storage::disk('public')->delete($partner->logo_path);
            }
            $validated['logo_path'] = $request->file('logo')->store('partners', 'public');
        }

        unset($validated['logo']);

        $validated['is_active'] = $request->has('is_active');

        $partner->update($validated);

        return redirect()->route('admin.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(\App\Models\Partner $partner)
    {
        if ($partner->logo_path) {
            Storage::disk('public')->delete($partner->logo_path);
        }
        $partner->delete();
        return redirect()->route('admin.partners.index')->with('success', 'Partner deleted successfully.');
    }

    public function toggleActive(\App\Models\Partner $partner)
    {
        $partner->update(['is_active' => !$partner->is_active]);
        return back()->with('success', 'Partner status updated.');
    }
}
