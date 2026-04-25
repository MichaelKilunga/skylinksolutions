<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FieldApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FieldApplicationController extends Controller
{
    public function index()
    {
        $applications = FieldApplication::latest()->paginate(15);
        return view('admin.field-applications.index', compact('applications'));
    }

    public function show(FieldApplication $application)
    {
        return view('admin.field-applications.show', compact('application'));
    }

    public function destroy(FieldApplication $application)
    {
        if ($application->attachment) {
            Storage::disk('public')->delete($application->attachment);
        }
        
        $application->delete();
        return redirect()->route('admin.field-applications.index')->with('success', 'Application record removed.');
    }
}
