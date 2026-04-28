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

    @php $activeTab = request('tab', 'home'); @endphp

    <div class="panel mb-4" style="background: transparent; border: none;">
        <div class="d-flex gap-2">
            <a href="{{ route('admin.settings.index', ['tab' => 'identity']) }}" 
               class="btn {{ $activeTab == 'identity' ? 'btn-primary' : 'btn-outline-secondary' }}" 
               style="border-radius: 10px; margin-right: 10px; padding: 10px 20px; color: {{ $activeTab == 'identity' ? '#fff' : 'var(--text-muted)' }}; background: {{ $activeTab == 'identity' ? 'var(--primary)' : 'rgba(255,255,255,0.05)' }}; border: 1px solid {{ $activeTab == 'identity' ? 'var(--primary)' : 'var(--border)' }}; text-decoration: none;">
               <i class="fas fa-fingerprint mr-2"></i> Site Identity
            </a>
            <a href="{{ route('admin.settings.index', ['tab' => 'home']) }}" 
               class="btn {{ $activeTab == 'home' ? 'btn-primary' : 'btn-outline-secondary' }}" 
               style="border-radius: 10px; margin-right: 10px; padding: 10px 20px; color: {{ $activeTab == 'home' ? '#fff' : 'var(--text-muted)' }}; background: {{ $activeTab == 'home' ? 'var(--primary)' : 'rgba(255,255,255,0.05)' }}; border: 1px solid {{ $activeTab == 'home' ? 'var(--primary)' : 'var(--border)' }}; text-decoration: none;">
               <i class="fas fa-home mr-2"></i> Home Page Content
            </a>
            <a href="{{ route('admin.settings.index', ['tab' => 'contact']) }}" 
               class="btn {{ $activeTab == 'contact' ? 'btn-primary' : 'btn-outline-secondary' }}"
               style="border-radius: 10px; padding: 10px 20px; color: {{ $activeTab == 'contact' ? '#fff' : 'var(--text-muted)' }}; background: {{ $activeTab == 'contact' ? 'var(--primary)' : 'rgba(255,255,255,0.05)' }}; border: 1px solid {{ $activeTab == 'contact' ? 'var(--primary)' : 'var(--border)' }}; text-decoration: none;">
               <i class="fas fa-address-book mr-2"></i> Contact & Socials
            </a>
            <a href="{{ route('admin.settings.index', ['tab' => 'about']) }}" 
               class="btn {{ $activeTab == 'about' ? 'btn-primary' : 'btn-outline-secondary' }}"
               style="border-radius: 10px; padding: 10px 20px; color: {{ $activeTab == 'about' ? '#fff' : 'var(--text-muted)' }}; background: {{ $activeTab == 'about' ? 'var(--primary)' : 'rgba(255,255,255,0.05)' }}; border: 1px solid {{ $activeTab == 'about' ? 'var(--primary)' : 'var(--border)' }}; text-decoration: none;">
               <i class="fas fa-info-circle mr-2"></i> About Us Page
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="active_tab" value="{{ $activeTab }}">
        
        @if($activeTab == 'identity')
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-fingerprint" style="color:#a855f7;margin-right:8px;"></i>Site Identity</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}" placeholder="SkyLink Solutions">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Main Logo</label>
                                @if($setting->logo)
                                    <div class="mb-3 p-3 text-center" style="background:rgba(255,255,255,0.05);border-radius:12px;">
                                        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" style="max-height:80px;">
                                    </div>
                                @endif
                                <input type="file" name="logo" class="form-control">
                                <small class="text-muted">Recommended: PNG or SVG with transparent background.</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Favicon</label>
                                @if($setting->favicon)
                                    <div class="mb-3 p-3 text-center" style="background:rgba(255,255,255,0.05);border-radius:12px;">
                                        <img src="{{ asset('storage/' . $setting->favicon) }}" alt="Favicon" style="height:32px;width:32px;">
                                    </div>
                                @endif
                                <input type="file" name="favicon" class="form-control">
                                <small class="text-muted">Recommended: 32x32px .ico or .png file.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($activeTab == 'contact')
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
                </div>
            </div>
        @elseif($activeTab == 'about')
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-eye" style="color:#8b5cf6;margin-right:8px;"></i>Vision & Mission</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Vision Title</label>
                                <input type="text" name="vision_title" class="form-control" value="{{ $setting->vision_title }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Vision Description</label>
                                <textarea name="vision_description" class="form-control" rows="3">{{ $setting->vision_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Mission Title</label>
                                <input type="text" name="mission_title" class="form-control" value="{{ $setting->mission_title }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mission Description</label>
                                <textarea name="mission_description" class="form-control" rows="3">{{ $setting->mission_description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel mt-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-question-circle" style="color:#ec4899;margin-right:8px;"></i>Why Choose Us Section</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Section Title</label>
                                <input type="text" name="why_choose_us_title" class="form-control" value="{{ $setting->why_choose_us_title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Section Subtitle</label>
                                <input type="text" name="why_choose_us_subtitle" class="form-control" value="{{ $setting->why_choose_us_subtitle }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-info bg-dark border-secondary text-light p-3 rounded mb-4">
                                <i class="fas fa-info-circle mr-2"></i> Why Choose Us features can be managed in the <a href="{{ route('admin.about_features.index') }}" class="text-primary font-weight-bold">About Features</a> section.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel mt-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-chart-line" style="color:#10b981;margin-right:8px;"></i>Counter Statistics</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Software Projects</label>
                                <input type="text" name="software_projects_count" class="form-control" value="{{ $setting->software_projects_count }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Networking Systems</label>
                                <input type="text" name="networking_systems_count" class="form-control" value="{{ $setting->networking_systems_count }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Security Systems</label>
                                <input type="text" name="security_systems_count" class="form-control" value="{{ $setting->security_systems_count }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Automation Systems</label>
                                <input type="text" name="automation_systems_count" class="form-control" value="{{ $setting->automation_systems_count }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">About Page Side Image</label>
                                @if($setting->about_image)
                                    <img src="{{ asset('storage/' . $setting->about_image) }}" alt="About" style="width:100px;margin-bottom:10px;border-radius:8px;display:block;">
                                @endif
                                <input type="file" name="about_image" class="form-control">
                                <small class="text-muted">This image appears next to the About description on both the Home and About pages.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-user-tie" style="color:#f59e0b;margin-right:8px;"></i>Home Page: About Section</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">About Title</label>
                                <input type="text" name="about_title" class="form-control" value="{{ $setting->about_title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">About Subtitle</label>
                                <input type="text" name="about_subtitle" class="form-control" value="{{ $setting->about_subtitle }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Experience Years (e.g. 5+)</label>
                                <input type="text" name="experience_years" class="form-control" value="{{ $setting->experience_years }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Experience Text</label>
                                <input type="text" name="experience_text" class="form-control" value="{{ $setting->experience_text }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Feature 1</label>
                                <input type="text" name="about_feature_1" class="form-control" value="{{ $setting->about_feature_1 }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Feature 2</label>
                                <input type="text" name="about_feature_2" class="form-control" value="{{ $setting->about_feature_2 }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description 1</label>
                                <textarea name="about_description_1" class="form-control" rows="3">{{ $setting->about_description_1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Description 2</label>
                                <textarea name="about_description_2" class="form-control" rows="3">{{ $setting->about_description_2 }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel mt-4">
                <div class="panel-header">
                    <span class="panel-title"><i class="fas fa-globe-africa" style="color:#10b981;margin-right:8px;"></i>Home Page: Nationwide Section</span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nationwide Title</label>
                                <input type="text" name="nationwide_title" class="form-control" value="{{ $setting->nationwide_title }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nationwide Description</label>
                                <textarea name="nationwide_description" class="form-control" rows="3">{{ $setting->nationwide_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Nationwide Image</label>
                                @if($setting->nationwide_image)
                                    <img src="{{ asset('storage/' . $setting->nationwide_image) }}" alt="Nationwide" style="width:100px;margin-bottom:10px;border-radius:8px;">
                                @endif
                                <input type="file" name="nationwide_image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        
        <div class="mt-4">
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
