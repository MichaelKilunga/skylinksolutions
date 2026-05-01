@extends('admin.layouts.app')
@section('title', 'Add Project Link')
@section('page-title', 'Add New Project Link')

@push('styles')
<style>
    .form-card { background: #fff; border: 1px solid var(--border); border-radius: 14px; padding: 24px; max-width: 800px; }
    .form-group { margin-bottom: 20px; }
    label { display: block; font-size: 13px; font-weight: 600; color: var(--text-muted); margin-bottom: 8px; }
    .form-control { width: 100%; background: rgba(0,0,0,0.2); border: 1px solid var(--border); border-radius: 8px; padding: 10px 14px; color: var(--text); font-size: 14px; transition: all 0.2s; }
    .form-control:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
    .error-msg { color: #f87171; font-size: 12px; margin-top: 4px; display: block; }
    
    .btn-save { padding: 10px 24px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 8px; color: #fff; font-size: 14px; font-weight: 700; cursor: pointer; transition: all 0.2s; }
    .btn-save:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(59,130,246,0.3); }
    .btn-cancel { padding: 10px 24px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text-muted); font-size: 14px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
    .btn-cancel:hover { background: rgba(255,255,255,0.08); color: #fff; }

    .switch { position: relative; display: inline-block; width: 44px; height: 22px; }
    .switch input { opacity: 0; width: 0; height: 0; }
    .slider { position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255,255,255,0.1); transition: .4s; border-radius: 22px; }
    .slider:before { position: absolute; content: ""; height: 16px; width: 16px; left: 3px; bottom: 3px; background-color: #fff; transition: .4s; border-radius: 50%; }
    input:checked + .slider { background-color: #3b82f6; }
    input:checked + .slider:before { transform: translateX(22px); }
</style>
@endpush

@section('content')
<div class="form-card">
    <form action="{{ route('admin.projects.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name">Project Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. PILLPOINTONE" value="{{ old('name') }}" required>
            @error('name') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="url">Project URL</label>
            <input type="url" name="url" id="url" class="form-control" placeholder="https://example.com" value="{{ old('url') }}" required>
            @error('url') <span class="error-msg">{{ $message }}</span> @enderror
        </div>

        <div class="row" style="display:flex; gap:20px;">
            <div class="form-group" style="flex:1;">
                <label for="order">Display Order</label>
                <input type="number" name="order" id="order" class="form-control" placeholder="0" value="{{ old('order', 0) }}">
                @error('order') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
            <div class="form-group" style="flex:1;">
                <label>Active Status</label>
                <div style="display:flex; align-items:center; gap:10px; margin-top:8px;">
                    <label class="switch">
                        <input type="checkbox" name="is_active" checked value="1">
                        <span class="slider"></span>
                    </label>
                    <span style="font-size:13px; color: var(--text);">Visible in header</span>
                </div>
            </div>
        </div>

        <div style="margin-top:30px; display:flex; gap:12px;">
            <button type="submit" class="btn-save">Create Project Link</button>
            <a href="{{ route('admin.projects.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection

