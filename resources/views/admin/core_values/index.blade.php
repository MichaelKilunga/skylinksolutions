@extends('admin.layouts.app')
@section('title', 'Manage Core Values')
@section('page-title', 'Core Values')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .table-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead th { padding: 14px 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; background: rgba(255,255,255,0.02); border-bottom: 1px solid #fff; text-align: left; }
    tbody td { padding: 16px 20px; font-size: 14px; color: var(--text-muted); border-bottom: 1px solid #fff; vertical-align: middle; }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: rgba(255,255,255,0.03); }
    
    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .status-active   { background: rgba(16,185,129,0.15); color: #34d399; }
    .status-inactive { background: rgba(239,68,68,0.15); color: #ef4444; }
    
    .btn-edit { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(59,130,246,0.1); border: 1px solid rgba(59,130,246,0.25); border-radius: 8px; color: #3b82f6; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; text-decoration: none; }
    .btn-edit:hover { background: rgba(59,130,246,0.25); }

    .btn-del { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); border-radius: 8px; color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; }
    .btn-del:hover { background: rgba(239,68,68,0.25); }
    
    .btn-status { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; border: 1px solid transparent; }
    .btn-activate { background: rgba(16,185,129,0.1); border-color: rgba(16,185,129,0.25); color: #34d399; }
    .btn-activate:hover { background: rgba(16,185,129,0.25); }
    .btn-deactivate { background: rgba(245,158,11,0.1); border-color: rgba(245,158,11,0.25); color: #fbbf24; }
    .btn-deactivate:hover { background: rgba(245,158,11,0.25); }
    
    .empty-state { padding: 60px; text-align: center; color: #64748b; }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:var(--text);">
        <i class="fas fa-star" style="color:#22d3ee;margin-right:10px;"></i>Company Core Values
    </h2>
    <div style="display: flex; gap: 15px; align-items: center;">
        <span style="font-size:13px;color:#64748b;">Total: {{ $values->count() }}</span>
        <a href="{{ route('admin.core_values.create') }}" class="btn-edit" style="background: var(--primary); color: #fff; border-color: var(--primary);">
            <i class="fas fa-plus"></i> Add New Value
        </a>
    </div>
</div>

<div class="table-card">
    @if($values->count())
    <table class="datatable">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title & Description</th>
                <th>Order</th>
                <th>Status</th>
                <th style="text-align: right;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($values as $value)
            <tr>
                <td>
                    <div style="width: 40px; height: 40px; background: rgba(59, 130, 246, 0.1); color: var(--primary); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 18px;">
                        <i class="fa {{ $value->icon }}"></i>
                    </div>
                </td>
                <td>
                    <div style="font-weight: 600; color: var(--text);">{{ $value->title }}</div>
                    <div style="font-size: 12px; color: var(--text-muted); max-width: 300px;">
                        {{ $value->description }}
                    </div>
                </td>
                <td>{{ $value->order }}</td>
                <td>
                    @if($value->is_active)
                        <span class="status-badge status-active"><i class="fas fa-circle" style="font-size:7px;"></i> Active</span>
                    @else
                        <span class="status-badge status-inactive"><i class="fas fa-circle" style="font-size:7px;"></i> Inactive</span>
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 8px; justify-content: flex-end;">
                        <form method="POST" action="{{ route('admin.core_values.toggle', $value) }}">
                            @csrf
                            <button type="submit" class="btn-status {{ $value->is_active ? 'btn-deactivate' : 'btn-activate' }}">
                                <i class="fas {{ $value->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                {{ $value->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                        <a href="{{ route('admin.core_values.edit', $value) }}" class="btn-edit">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.core_values.destroy', $value) }}" method="POST" onsubmit="return confirm('Delete this core value?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-del"><i class="fas fa-trash"></i> Remove</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="empty-state">
        <i class="fas fa-star"></i>
        <p>No core values found.</p>
    </div>
    @endif
</div>
@endsection


