@extends('admin.layouts.app')
@section('title', 'Edit Slider')
@section('page-title', 'Edit Slider: ' . $slider->title)

@section('content')
<div class="panel" style="max-width: 800px; margin: 0 auto;">
    <div class="panel-header">
        <span class="panel-title">Slider Details</span>
    </div>
    <div class="panel-body">
        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Title</label>
                        <input type="text" name="title" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->title }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Description</label>
                        <textarea name="description" rows="3" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;">{{ $slider->description }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Button 1 Text</label>
                        <input type="text" name="btn1_text" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->btn1_text }}" placeholder="e.g. Get Started">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Button 1 URL</label>
                        <input type="text" name="btn1_url" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->btn1_url }}" placeholder="e.g. /contact">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Button 2 Text</label>
                        <input type="text" name="btn2_text" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->btn2_text }}" placeholder="e.g. Learn More">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Button 2 URL</label>
                        <input type="text" name="btn2_url" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->btn2_url }}" placeholder="e.g. /about">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Display Order</label>
                        <input type="number" name="order" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;" value="{{ $slider->order }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Slider Image</label>
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset($slider->image) }}" style="width: 150px; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                        <input type="file" name="image" class="form-control" style="width: 100%; padding: 12px; background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff;">
                        <small style="color: var(--text-muted);">Leave empty to keep current image.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" name="is_active" id="is_active" {{ $slider->is_active ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                        <label for="is_active" style="font-size: 14px; color: #fff; cursor: pointer;">Mark as Active</label>
                    </div>
                </div>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="topbar-btn" style="background: var(--primary); color: #fff; border: none; padding: 12px 24px;">
                    <i class="fas fa-save"></i> Update Slider
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="topbar-btn" style="padding: 12px 24px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
