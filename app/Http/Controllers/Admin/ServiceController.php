<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceImage;
use App\Models\ServiceFeature;
use App\Models\ServiceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'icon'              => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description'       => ['nullable', 'string'],
            'banner_image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'status'            => ['boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['icon'] = $data['icon'] ?? 'fa-cogs';

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $service->load(['images', 'features', 'projects']);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title'             => ['required', 'string', 'max:255'],
            'icon'              => ['nullable', 'string', 'max:100'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description'       => ['nullable', 'string'],
            'banner_image'      => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'status'            => ['boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['icon'] = $data['icon'] ?? 'fa-cogs';

        if ($request->hasFile('banner_image')) {
            // Delete old banner
            if ($service->banner_image) {
                Storage::disk('public')->delete($service->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('services/banners', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Delete related files
        if ($service->banner_image) {
            Storage::disk('public')->delete($service->banner_image);
        }
        
        foreach($service->images as $img) {
            Storage::disk('public')->delete($img->image);
        }

        foreach($service->projects as $proj) {
            Storage::disk('public')->delete($proj->image);
        }

        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }

    public function toggleActive(Service $service)
    {
        $service->update(['status' => !$service->status]);
        return back()->with('success', 'Service status updated.');
    }

    // --- Related Items Management ---

    public function addImage(Request $request, Service $service)
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'title' => ['nullable', 'string', 'max:255'],
        ]);

        $path = $request->file('image')->store('services/images', 'public');

        $service->images()->create([
            'image' => $path,
            'title' => $request->title,
        ]);

        return back()->with('success', 'Image added successfully.');
    }

    public function deleteImage(ServiceImage $image)
    {
        Storage::disk('public')->delete($image->image);
        $image->delete();
        return back()->with('success', 'Image deleted successfully.');
    }

    public function addFeature(Request $request, Service $service)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ]);

        $service->features()->create($request->all());

        return back()->with('success', 'Feature added successfully.');
    }

    public function deleteFeature(ServiceFeature $feature)
    {
        $feature->delete();
        return back()->with('success', 'Feature deleted successfully.');
    }

    public function addProject(Request $request, Service $service)
    {
        $request->validate([
            'title'    => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'image'    => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'link'     => ['nullable', 'url'],
        ]);

        $path = $request->file('image')->store('services/projects', 'public');

        $service->projects()->create([
            'title'    => $request->title,
            'category' => $request->category,
            'image'    => $path,
            'link'     => $request->link,
        ]);

        return back()->with('success', 'Project added successfully.');
    }

    public function deleteProject(ServiceProject $project)
    {
        Storage::disk('public')->delete($project->image);
        $project->delete();
        return back()->with('success', 'Project deleted successfully.');
    }
}
