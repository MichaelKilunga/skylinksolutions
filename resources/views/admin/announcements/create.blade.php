@extends('admin.layouts.app')
@section('title', 'New Announcement')
@section('page-title', 'New Announcement')

@push('styles')
<style>
    .back-link { display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-size: 13px; text-decoration: none; margin-bottom: 20px; transition: color 0.2s; }
    .back-link:hover { color: #60a5fa; }
    .form-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 32px; max-width: 760px; }
    .form-group { margin-bottom: 22px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: #cbd5e1; margin-bottom: 8px; }
    .form-control { width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; color: #e2e8f0; font-size: 14px; font-family: 'Inter', sans-serif; transition: all 0.2s; outline: none; resize: vertical; }
    .form-control:focus { border-color: #3b82f6; background: rgba(59,130,246,0.08); box-shadow: 0 0 0 3px rgba(59,130,246,0.12); }
    .form-control::placeholder { color: #475569; }
    .form-error { font-size: 12px; color: #f87171; margin-top: 6px; }
    .toggle-row { display: flex; align-items: center; gap: 12px; }
    .toggle-switch { position: relative; width: 44px; height: 24px; }
    .toggle-switch input { opacity: 0; width: 0; height: 0; }
    .toggle-slider { position: absolute; inset: 0; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.15); border-radius: 24px; cursor: pointer; transition: 0.3s; }
    .toggle-slider:before { content:''; position: absolute; width: 18px; height: 18px; left: 2px; top: 2px; background: #94a3b8; border-radius: 50%; transition: 0.3s; }
    input:checked + .toggle-slider { background: rgba(16,185,129,0.3); border-color: rgba(16,185,129,0.5); }
    input:checked + .toggle-slider:before { transform: translateX(20px); background: #10b981; }
    .toggle-label { font-size: 14px; color: #94a3b8; }
    .form-actions { display: flex; gap: 12px; margin-top: 28px; }
    .btn-submit { display: inline-flex; align-items: center; gap: 8px; padding: 12px 28px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 14px; font-weight: 700; cursor: pointer; transition: all 0.2s; font-family: 'Inter', sans-serif; }
    .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    .btn-cancel { display: inline-flex; align-items: center; gap: 8px; padding: 12px 22px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; color: #94a3b8; font-size: 14px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
    .btn-cancel:hover { background: rgba(255,255,255,0.1); color: #fff; }
</style>
@endpush

@section('content')
<a href="{{ route('admin.announcements.index') }}" class="back-link">
    <i class="fas fa-arrow-left"></i> Back to Announcements
</a>
<div class="form-card">
    <form method="POST" action="{{ route('admin.announcements.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Announcement Title <span style="color:#f87171;">*</span></label>
            <input type="text" id="title" name="title" class="form-control" placeholder="Enter announcement title" value="{{ old('title') }}" required>
            @error('title')<div class="form-error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label for="body">Content <span style="color:#f87171;">*</span></label>
            <textarea id="body" name="body" class="form-control" rows="8" placeholder="Write the announcement content..." required>{{ old('body') }}</textarea>
            @error('body')<div class="form-error">{{ $message }}</div>@enderror
        </div>
        <div class="form-group">
            <label>Publish immediately</label>
            <div class="toggle-row">
                <label class="toggle-switch">
                    <input type="checkbox" name="is_published" {{ old('is_published') ? 'checked' : '' }}>
                    <span class="toggle-slider"></span>
                </label>
                <span class="toggle-label">Enable to publish right away</span>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn-submit"><i class="fas fa-save"></i> Create Announcement</button>
            <a href="{{ route('admin.announcements.index') }}" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>
@endsection
