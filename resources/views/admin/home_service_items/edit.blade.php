@extends('admin.layouts.app')
@section('title', 'Edit Sector')
@section('page-title', 'Edit Sector: ' . $homeServiceItem->title)

@section('content')
<div class="panel" style="max-width: 600px; margin: 0 auto;">
    <div class="panel-header">
        <span class="panel-title">Sector Details</span>
    </div>
    <div class="panel-body">
        <form action="{{ route('admin.home_service_items.update', $homeServiceItem) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Title</label>
                <input type="text" name="title" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);" value="{{ $homeServiceItem->title }}" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Description</label>
                <textarea name="description" rows="3" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);">{{ $homeServiceItem->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Sector Image</label>
                        <div style="margin-bottom: 10px;">
                            <img src="{{ asset('storage/' . $homeServiceItem->image) }}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border);">
                        </div>
                        <input type="file" name="image" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);">
                        <small style="color: var(--text-muted);">Leave empty to keep current image.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Display Order</label>
                        <input type="number" name="order" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);" value="{{ $homeServiceItem->order }}">
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" id="is_active" {{ $homeServiceItem->is_active ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                <label for="is_active" style="font-size: 14px; color: var(--text); cursor: pointer;">Mark as Active</label>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="topbar-btn" style="background: var(--primary); color: #fff; border: none; padding: 12px 24px;">
                    <i class="fas fa-save"></i> Update Sector
                </button>
                <a href="{{ route('admin.home_service_items.index') }}" class="topbar-btn" style="padding: 12px 24px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection


