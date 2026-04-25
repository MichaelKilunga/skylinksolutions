@extends('admin.layouts.app')
@section('title', 'Company Settings')
@section('page-title', 'Company Settings')

@push('styles')
<style>
    .settings-grid { display: grid; grid-template-columns: 1fr; gap: 24px; }
    .panel { background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    .panel-header { padding: 18px 22px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; }
    .panel-title { font-size: 15px; font-weight: 700; color: #fff; }
    .panel-body { padding: 24px; }
    
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 13px; color: var(--text-muted); font-weight: 500; margin-bottom: 8px; }
    .form-control { 
        width: 100%; padding: 12px 16px; background: rgba(255,255,255,0.04); 
        border: 1px solid var(--border); border-radius: 10px; color: #fff; 
        font-size: 14px; transition: all 0.2s; 
    }
    .form-control:focus { border-color: var(--primary); outline: none; background: rgba(255,255,255,0.08); }
    
    .btn-submit { 
        background: var(--primary); color: #fff; border: none; padding: 12px 24px; 
        border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s; 
        display: inline-flex; align-items: center; gap: 8px;
    }
    .btn-submit:hover { background: var(--accent); transform: translateY(-2px); }
    
    .alert-success { 
        background: rgba(16,185,129,0.15); border: 1px solid rgba(16,185,129,0.3); 
        color: #34d399; padding: 16px; border-radius: 12px; margin-bottom: 24px; 
        display: flex; align-items: center; gap: 12px;
    }
</style>
@endpush

@section('content')
<div class="settings-grid">
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-info-circle" style="color:#60a5fa;margin-right:8px;"></i>Contact Information</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ $setting->email }}" placeholder="info@example.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" placeholder="+255 123 456 789">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Office Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $setting->address }}" placeholder="City, Country">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Working Hours</label>
                            <input type="text" name="working_hours" class="form-control" value="{{ $setting->working_hours }}" placeholder="Mon - Sat, 8:00 - 17:00">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel mt-4">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-share-alt" style="color:#22d3ee;margin-right:8px;"></i>Social Media & External Links</span>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Facebook URL</label>
                            <input type="text" name="facebook_url" class="form-control" value="{{ $setting->facebook_url }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Twitter URL</label>
                            <input type="text" name="twitter_url" class="form-control" value="{{ $setting->twitter_url }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">LinkedIn URL</label>
                            <input type="text" name="linkedin_url" class="form-control" value="{{ $setting->linkedin_url }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">YouTube URL</label>
                            <input type="text" name="youtube_url" class="form-control" value="{{ $setting->youtube_url }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Instagram URL</label>
                            <input type="text" name="instagram_url" class="form-control" value="{{ $setting->instagram_url }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Google Maps Link (Iframe Source)</label>
                            <textarea name="google_map_link" class="form-control" rows="3">{{ $setting->google_map_link }}</textarea>
                            <small class="text-muted">Only paste the 'src' attribute value from the Google Maps embed code.</small>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Save Changes
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
