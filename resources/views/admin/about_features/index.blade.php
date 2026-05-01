@extends('admin.layouts.app')
@section('title', 'About Page Features')
@section('page-title', 'About Us Features Management')

@push('styles')
    <style>
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
        .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg, #3b82f6, #2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35); }
        .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59, 130, 246, 0.4); }
        
        table { width: 100%; border-collapse: collapse; }
        th { text-align: left; padding: 16px 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); border-bottom: 1px solid var(--border); }
        td { padding: 16px 20px; font-size: 14px; color: var(--text); border-bottom: 1px solid #fff; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(255, 255, 255, 0.02); }
        
        .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
        .badge-active { background: rgba(16, 185, 129, 0.15); color: #34d399; }
        .badge-inactive { background: rgba(100, 116, 139, 0.15); color: var(--text-muted); }
        
        .card-actions { display: flex; gap: 6px; }
        .btn-sm { display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; }
        .btn-edit { background: rgba(245, 158, 11, 0.12); border: 1px solid rgba(245, 158, 11, 0.3); color: #fbbf24; }
        .btn-toggle { background: rgba(6, 182, 212, 0.12); border: 1px solid rgba(6, 182, 212, 0.3); color: #22d3ee; }
        .btn-del { background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.25); color: #f87171; }
        
        .empty-state { padding: 60px; text-align: center; color: #64748b; background: rgba(255, 255, 255, 0.03); border-radius: 14px; border: 1px solid #fff; }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h2 style="font-size:20px;font-weight:700;color:var(--text);">
            <i class="fas fa-info-circle" style="color:#ec4899;margin-right:10px;"></i>About Features
        </h2>
        <a href="{{ route('admin.about_features.create') }}" class="btn-create">
            <i class="fas fa-plus"></i> Add Feature
        </a>
    </div>


    <div class="table-card" style="background: #fff; border: 1px solid var(--border); border-radius: 16px; overflow: hidden;">
        @if ($features->count())
            <table class="datatable">
                <thead>
                    <tr>
                        <th width="50">Order</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($features as $feature)
                        <tr>
                            <td><span style="color: var(--text-muted); font-weight:700;">#{{ $feature->order }}</span></td>
                            <td>
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <div style="width:36px; height:36px; background:rgba(236,72,153,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#ec4899;">
                                        <i class="fa {{ $feature->icon ?? 'fa-star' }}"></i>
                                    </div>
                                    <div style="font-weight:700; color: var(--text);">{{ $feature->title }}</div>
                                </div>
                            </td>
                            <td>
                                <div style="font-size:13px; color: var(--text-muted);">{{ Str::limit($feature->description, 80) }}</div>
                            </td>
                            <td>
                                @if ($feature->is_active)
                                    <span class="status-badge badge-active"><i class="fas fa-circle" style="font-size:7px;"></i> Active</span>
                                @else
                                    <span class="status-badge badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="card-actions">
                                    <a href="{{ route('admin.about_features.edit', $feature) }}" class="btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('admin.about_features.toggle', $feature) }}" class="toggle-form">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-toggle" title="{{ $feature->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $feature->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.about_features.destroy', $feature) }}" onsubmit="return confirm('Delete this feature?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-sm btn-del" title="Delete"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-info-circle" style="font-size:48px; margin-bottom:16px; display:block; opacity:0.3;"></i>
                <p>No about features yet. <a href="{{ route('admin.about_features.create') }}" style="color:#60a5fa;">Add one →</a></p>
            </div>
        @endif
    </div>
@endsection

