<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeServiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeServiceItemController extends Controller
{
    public function index()
    {
        $items = HomeServiceItem::orderBy('order')->get();
        return view('admin.home_service_items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.home_service_items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'order'       => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('home_services', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        HomeServiceItem::create($data);

        return redirect()->route('admin.home_service_items.index')->with('success', 'Service item created successfully.');
    }

    public function edit(HomeServiceItem $homeServiceItem)
    {
        return view('admin.home_service_items.edit', compact('homeServiceItem'));
    }

    public function update(Request $request, HomeServiceItem $homeServiceItem)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'order'       => ['nullable', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            if ($homeServiceItem->image) Storage::disk('public')->delete($homeServiceItem->image);
            $data['image'] = $request->file('image')->store('home_services', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        
        $homeServiceItem->update($data);

        return redirect()->route('admin.home_service_items.index')->with('success', 'Service item updated successfully.');
    }

    public function destroy(HomeServiceItem $homeServiceItem)
    {
        if ($homeServiceItem->image) Storage::disk('public')->delete($homeServiceItem->image);
        $homeServiceItem->delete();
        return redirect()->route('admin.home_service_items.index')->with('success', 'Service item deleted.');
    }

    public function toggleActive(HomeServiceItem $homeServiceItem)
    {
        $homeServiceItem->update(['is_active' => !$homeServiceItem->is_active]);
        return back()->with('success', 'Service item status updated.');
    }
}
