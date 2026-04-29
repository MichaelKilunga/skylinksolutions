<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ValuedService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValuedServiceController extends Controller
{
    public function index()
    {
        $valuedServices = ValuedService::latest()->get();
        return view('admin.valued_services.index', compact('valuedServices'));
    }

    public function create()
    {
        return view('admin.valued_services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255', 'unique:admin_services,slug'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'is_active'   => ['boolean'],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        ValuedService::create($data);

        return redirect()->route('admin.valued_services.index')->with('success', 'Valued Service created successfully.');
    }

    public function edit(ValuedService $valuedService)
    {
        return view('admin.valued_services.edit', compact('valuedService'));
    }

    public function update(Request $request, ValuedService $valuedService)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'slug'        => ['nullable', 'string', 'max:255', 'unique:admin_services,slug,' . $valuedService->id],
            'icon'        => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'is_active'   => ['boolean'],
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $valuedService->update($data);

        return redirect()->route('admin.valued_services.index')->with('success', 'Valued Service updated successfully.');
    }

    public function destroy(ValuedService $valuedService)
    {
        $valuedService->delete();
        return redirect()->route('admin.valued_services.index')->with('success', 'Valued Service deleted successfully.');
    }

    public function toggleActive(ValuedService $valuedService)
    {
        $valuedService->update(['is_active' => !$valuedService->is_active]);
        return back()->with('success', 'Valued Service status updated.');
    }
}
