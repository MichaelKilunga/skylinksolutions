@extends('admin.layouts.app')
@section('title', 'Add About Feature')
@section('page-title', 'Add New About Feature')

@push('styles')
    <style>
        .panel { background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
        .panel-header { padding: 18px 22px; border-bottom: 1px solid var(--border); }
        .panel-title { font-size: 15px; font-weight: 700; color: #fff; }
        .panel-body { padding: 24px; }
        
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; font-size: 13px; color: var(--text-muted); font-weight: 500; margin-bottom: 8px; }
        .form-control { width: 100%; padding: 12px 16px; background: #fff; border: 1px solid var(--border); border-radius: 10px; color: var(--text); font-size: 14px; transition: all 0.2s; }
        .form-control:focus { border-color: var(--primary); outline: none; background: rgba(255,255,255,0.08); }
        
        .btn-submit { background: var(--primary); color: #fff; border: none; padding: 12px 24px; border-radius: 10px; font-weight: 600; cursor: pointer; transition: all 0.2s; display: inline-flex; align-items: center; gap: 8px; }
        .btn-submit:hover { background: var(--accent); transform: translateY(-2px); }
    </style>
@endpush

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.about_features.index') }}" style="color:var(--text-muted); text-decoration:none; font-size:13px;">
            <i class="fas fa-arrow-left mr-1"></i> Back to list
        </a>
    </div>

    <div class="panel" style="max-width: 800px;">
        <div class="panel-header">
            <span class="panel-title">Feature Details</span>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.about_features.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required placeholder="e.g. Quality Assurance">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Order</label>
                            <input type="number" name="order" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Icon (FontAwesome Class)</label>
                            <input type="text" name="icon" class="form-control" placeholder="e.g. fa-shield">
                            <small class="text-muted">Use FontAwesome 4.7 classes (e.g. fa-shield, fa-rocket)</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Brief description of this feature..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="display:flex; align-items:center; gap:10px; color:var(--text); cursor:pointer;">
                                <input type="checkbox" name="is_active" value="1" checked style="width:18px; height:18px;">
                                <span style="font-size:14px; font-weight:500;">Active & Visible</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-save"></i> Save Feature
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

