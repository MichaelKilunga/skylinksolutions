@extends('admin.layouts.app')
@section('title', 'Edit Valued Service')
@section('page-title', 'Edit Valued Service')

@section('content')
    <div class="card"
        style="background: #fff; border: 1px solid var(--border); border-radius: 16px; padding: 30px;">
        <form action="{{ route('admin.valued_services.update', $valuedService) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label" style="color: var(--text-muted); font-weight: 600; margin-bottom: 8px; display: block;">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $valuedService->title }}" required
                        style="background: #fff; border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: 12px;">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label" style="color: var(--text-muted); font-weight: 600; margin-bottom: 8px; display: block;">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" value="{{ $valuedService->icon }}"
                        style="background: #fff; border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: 12px;">
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label" style="color: var(--text-muted); font-weight: 600; margin-bottom: 8px; display: block;">URL Slug / Link</label>
                    <input type="text" name="slug" class="form-control" value="{{ $valuedService->slug }}"
                        style="background: #fff; border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: 12px;">
                    <small class="text-muted">This is used for the "Explore" link destination.</small>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label" style="color: var(--text-muted); font-weight: 600; margin-bottom: 8px; display: block;">Short Description</label>
                    <textarea name="description" rows="4" class="form-control"
                        style="background: #fff; border: 1px solid var(--border); color: var(--text); border-radius: 8px; padding: 12px;">{{ $valuedService->description }}</textarea>
                </div>
                <div class="col-12 mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" {{ $valuedService->is_active ? 'checked' : '' }} id="statusSwitch">
                        <label class="form-check-label" for="statusSwitch" style="color: var(--text);">Visible on Homepage</label>
                    </div>
                </div>
            </div>

            <div class="mt-4" style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary"
                    style="background: linear-gradient(135deg, #3b82f6, #2563eb); border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700;">Update Service</button>
                <a href="{{ route('admin.valued_services.index') }}" class="btn btn-secondary"
                    style="background: rgba(255,255,255,0.1); border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700; color: var(--text); text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>
@endsection

