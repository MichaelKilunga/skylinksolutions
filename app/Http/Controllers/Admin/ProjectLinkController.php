<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectLink;
use Illuminate\Http\Request;

class ProjectLinkController extends Controller
{
    public function index()
    {
        $projects = ProjectLink::orderBy('order')->orderBy('name')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'url'       => ['required', 'url', 'max:255'],
            'order'     => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->has('is_active');
        
        ProjectLink::create($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project link created successfully.');
    }

    public function edit(ProjectLink $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, ProjectLink $project)
    {
        $data = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'url'       => ['required', 'url', 'max:255'],
            'order'     => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->has('is_active');

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Project link updated successfully.');
    }

    public function destroy(ProjectLink $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project link deleted.');
    }

    public function toggleActive(ProjectLink $project)
    {
        $project->update([
            'is_active' => !$project->is_active
        ]);
        return back()->with('success', 'Project status updated.');
    }
}
