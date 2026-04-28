<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $values = CoreValue::orderBy('order')->get();
        return view('admin.core_values.index', compact('values'));
    }

    public function create()
    {
        return view('admin.core_values.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'order'       => ['nullable', 'integer'],
        ]);

        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        CoreValue::create($data);

        return redirect()->route('admin.core_values.index')->with('success', 'Core Value created successfully.');
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.core_values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'icon'        => ['nullable', 'string', 'max:100'],
            'order'       => ['nullable', 'integer'],
        ]);

        $data['is_active'] = $request->has('is_active');
        
        $coreValue->update($data);

        return redirect()->route('admin.core_values.index')->with('success', 'Core Value updated successfully.');
    }

    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();
        return redirect()->route('admin.core_values.index')->with('success', 'Core Value deleted.');
    }

    public function toggleActive(CoreValue $coreValue)
    {
        $coreValue->update(['is_active' => !$coreValue->is_active]);
        return back()->with('success', 'Core Value status updated.');
    }
}
