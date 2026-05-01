@extends('admin.layouts.app')
@section('title', 'Edit Core Value')
@section('page-title', 'Edit Core Value: ' . $coreValue->title)

@section('content')
<div class="panel" style="max-width: 600px; margin: 0 auto;">
    <div class="panel-header">
        <span class="panel-title">Core Value Details</span>
    </div>
    <div class="panel-body">
        <form action="{{ route('admin.core_values.update', $coreValue) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Title</label>
                <input type="text" name="title" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);" value="{{ $coreValue->title }}" required>
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Description</label>
                <textarea name="description" rows="3" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);">{{ $coreValue->description }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">FontAwesome Icon</label>
                        <input type="text" name="icon" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);" placeholder="e.g. fa-users" value="{{ $coreValue->icon }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 13px; color: var(--text-muted); margin-bottom: 8px;">Display Order</label>
                        <input type="number" name="order" class="form-control" style="width: 100%; padding: 12px; background: #fff; border: 1px solid var(--border); border-radius: 8px; color: var(--text);" value="{{ $coreValue->order }}">
                    </div>
                </div>
            </div>

            <div class="form-group" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" name="is_active" id="is_active" {{ $coreValue->is_active ? 'checked' : '' }} style="width: 18px; height: 18px; cursor: pointer;">
                <label for="is_active" style="font-size: 14px; color: var(--text); cursor: pointer;">Mark as Active</label>
            </div>

            <div style="margin-top: 20px; display: flex; gap: 12px;">
                <button type="submit" class="topbar-btn" style="background: var(--primary); color: #fff; border: none; padding: 12px 24px;">
                    <i class="fas fa-save"></i> Update Core Value
                </button>
                <a href="{{ route('admin.core_values.index') }}" class="topbar-btn" style="padding: 12px 24px;">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection


