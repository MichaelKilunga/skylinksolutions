@extends('admin.layouts.app')
@section('title', 'Add Valued Service')
@section('page-title', 'Create Valued Service')

@section('content')
    <div class="card"
        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 16px; padding: 30px;">
        <form action="{{ route('admin.valued_services.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label" style="color: #94a3b8; font-weight: 600; margin-bottom: 8px; display: block;">Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="e.g. Software Development"
                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px;">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label" style="color: #94a3b8; font-weight: 600; margin-bottom: 8px; display: block;">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control" placeholder="e.g. fa-code"
                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px;">
                </div>
                <div class="col-md-12 mb-4">
                    <label class="form-label" style="color: #94a3b8; font-weight: 600; margin-bottom: 8px; display: block;">URL Slug / Link</label>
                    <input type="text" name="slug" class="form-control" placeholder="e.g. software-development"
                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px;">
                    <small class="text-muted">If left blank, it will be generated from the title. This is used for the "Explore" link.</small>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label" style="color: #94a3b8; font-weight: 600; margin-bottom: 8px; display: block;">Short Description</label>
                    <textarea name="description" rows="4" class="form-control"
                        style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 8px; padding: 12px;"></textarea>
                </div>
                <div class="col-12 mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="statusSwitch">
                        <label class="form-check-label" for="statusSwitch" style="color: #fff;">Visible on Homepage</label>
                    </div>
                </div>
            </div>

            <div class="mt-4" style="display: flex; gap: 12px;">
                <button type="submit" class="btn btn-primary"
                    style="background: linear-gradient(135deg, #3b82f6, #2563eb); border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700;">Save Service</button>
                <a href="{{ route('admin.valued_services.index') }}" class="btn btn-secondary"
                    style="background: rgba(255,255,255,0.1); border: none; padding: 12px 30px; border-radius: 10px; font-weight: 700; color: #fff; text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>
@endsection
