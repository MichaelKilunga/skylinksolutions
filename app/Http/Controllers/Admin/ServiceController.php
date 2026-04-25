<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = AdminService::latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
        ]);

        $data['slug']      = Str::slug($data['title']);
        $data['icon']      = $data['icon'] ?? 'fa-cogs';
        $data['is_active'] = $request->has('is_active');

        AdminService::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(AdminService $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, AdminService $service)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
        ]);

        $data['slug']      = Str::slug($data['title']);
        $data['icon']      = $data['icon'] ?? 'fa-cogs';
        $data['is_active'] = $request->has('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(AdminService $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted.');
    }

    public function toggleActive(AdminService $service)
    {
        $service->update(['is_active' => !$service->is_active]);
        return back()->with('success', 'Service status updated.');
    }
}
