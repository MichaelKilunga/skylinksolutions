@extends('admin.layouts.app')
@section('title', 'Edit Slider')
@section('page-title', 'Edit Slider: ' . $slider->title)

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; max-width: 800px; margin-left: auto; margin-right: auto; }
    .form-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); max-width: 800px; margin: 0 auto; }
    .form-section-title { font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 8px; }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 13px; font-weight: 600; color: #64748b; margin-bottom: 8px; }
    .form-control { width: 100%; padding: 12px 16px; background: #f8fafc; border: 1px solid #cbd5e1; border-radius: 8px; color: var(--text); font-size: 14px; transition: all 0.2s; font-family: inherit; }
    .form-control:focus { background: #fff; border-color: #3b82f6; outline: none; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
    .btn-save { display: inline-flex; align-items: center; gap: 8px; background: #3b82f6; color: #fff; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.2s; }
    .btn-save:hover { background: #2563eb; transform: translateY(-1px); }
    .btn-cancel { display: inline-flex; align-items: center; gap: 8px; background: #f1f5f9; color: #64748b; border: 1px solid #cbd5e1; padding: 12px 24px; border-radius: 8px; font-weight: 600; font-size: 14px; text-decoration: none; transition: all 0.2s; }
    .btn-cancel:hover { background: #e2e8f0; color: var(--text); }
    .image-preview { width: 100%; max-width: 200px; height: auto; border-radius: 8px; border: 1px solid var(--border); margin-bottom: 12px; }
    .custom-checkbox { display: flex; align-items: center; gap: 10px; cursor: pointer; }
    .custom-checkbox input[type="checkbox"] { width: 18px; height: 18px; border-radius: 4px; cursor: pointer; }
    .custom-checkbox span { font-size: 14px; font-weight: 600; color: var(--text); }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:var(--text); margin: 0;">
        <i class="fas fa-edit" style="color:#3b82f6;margin-right:10px;"></i>Edit Slider
    </h2>
    <a href="{{ route('admin.sliders.index') }}" class="btn-cancel" style="padding: 8px 16px;">
        <i class="fas fa-arrow-left"></i> Back
    </a>
</div>

<div class="form-card">
    <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-section-title"><i class="fas fa-heading text-primary"></i> Main Content</div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Slider Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label">Description / Subtitle</label>
                    <textarea name="description" rows="3" class="form-control">{{ $slider->description }}</textarea>
                </div>
            </div>
        </div>

        <div class="form-section-title" style="margin-top: 10px;"><i class="fas fa-link text-primary"></i> Call to Action Buttons</div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Primary Button Text</label>
                    <input type="text" name="btn1_text" class="form-control" value="{{ $slider->btn1_text }}" placeholder="e.g. Get Started">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Primary Button URL</label>
                    <input type="text" name="btn1_url" class="form-control" value="{{ $slider->btn1_url }}" placeholder="e.g. /contact">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Secondary Button Text</label>
                    <input type="text" name="btn2_text" class="form-control" value="{{ $slider->btn2_text }}" placeholder="e.g. Learn More">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Secondary Button URL</label>
                    <input type="text" name="btn2_url" class="form-control" value="{{ $slider->btn2_url }}" placeholder="e.g. /about">
                </div>
            </div>
        </div>

        <div class="form-section-title" style="margin-top: 10px;"><i class="fas fa-image text-primary"></i> Media & Settings</div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Display Order</label>
                    <input type="number" name="order" class="form-control" value="{{ $slider->order }}">
                </div>
                <div class="form-group" style="margin-top: 30px;">
                    <label class="custom-checkbox">
                        <input type="checkbox" name="is_active" {{ $slider->is_active ? 'checked' : '' }}>
                        <span>Mark as Active (Visible on homepage)</span>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label">Background Image</label>
                    @if($slider->image)
                        <div>
                            <img src="{{ asset('storage/' . $slider->image) }}" class="image-preview">
                        </div>
                    @endif
                    <input type="file" name="image" class="form-control">
                    <small style="color: #64748b; font-size: 12px; margin-top: 6px; display: block;">Leave empty to keep current image. Recommended size: 1920x1080px.</small>
                </div>
            </div>
        </div>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border); display: flex; gap: 12px; justify-content: flex-end;">
            <a href="{{ route('admin.sliders.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit" class="btn-save">
                <i class="fas fa-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection


