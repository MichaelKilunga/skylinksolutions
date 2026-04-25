@extends('admin.layouts.app')
@section('title', 'Services')
@section('page-title', 'Services Management')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    .services-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; }
    .svc-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 24px; transition: all 0.2s; position: relative; overflow: hidden; }
    .svc-card:hover { transform: translateY(-3px); border-color: rgba(139,92,246,0.3); box-shadow: 0 12px 30px rgba(0,0,0,0.2); }
    .svc-card.inactive { opacity: 0.6; }
    .svc-icon { width: 52px; height: 52px; background: linear-gradient(135deg, rgba(139,92,246,0.25), rgba(59,130,246,0.15)); border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 22px; color: #a78bfa; margin-bottom: 16px; }
    .svc-title { font-size: 16px; font-weight: 700; color: #e2e8f0; margin-bottom: 6px; }
    .svc-desc  { font-size: 13px; color: #64748b; line-height: 1.6; margin-bottom: 16px; min-height: 40px; }
    .svc-footer { display: flex; align-items: center; justify-content: space-between; }
    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .badge-active   { background: rgba(16,185,129,0.15); color: #34d399; }
    .badge-inactive { background: rgba(100,116,139,0.15); color: #94a3b8; }
    .card-actions { display: flex; gap: 6px; }
    .btn-sm { display: inline-flex; align-items: center; gap: 5px; padding: 6px 12px; border-radius: 8px; font-size: 11px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; font-family: 'Inter', sans-serif; }
    .btn-edit   { background: rgba(245,158,11,0.12); border: 1px solid rgba(245,158,11,0.3); color: #fbbf24; }
    .btn-edit:hover { background: rgba(245,158,11,0.25); }
    .btn-toggle { background: rgba(6,182,212,0.12); border: 1px solid rgba(6,182,212,0.3); color: #22d3ee; }
    .btn-toggle:hover { background: rgba(6,182,212,0.25); }
    .btn-del { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); color: #f87171; }
    .btn-del:hover { background: rgba(239,68,68,0.25); }
    .empty-state { grid-column: 1/-1; padding: 60px; text-align: center; color: #64748b; background: rgba(255,255,255,0.03); border-radius: 14px; border: 1px solid rgba(255,255,255,0.06); }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:#fff;">
        <i class="fas fa-cogs" style="color:#a78bfa;margin-right:10px;"></i>Services
    </h2>
    <a href="{{ route('admin.services.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Add Service
    </a>
</div>

<div class="services-grid">
    @forelse($services as $svc)
    <div class="svc-card {{ !$svc->is_active ? 'inactive' : '' }}">
        <div class="svc-icon"><i class="fas {{ $svc->icon }}"></i></div>
        <div class="svc-title">{{ $svc->title }}</div>
        <div class="svc-desc">{{ Str::limit($svc->description, 80) ?? 'No description.' }}</div>
        <div class="svc-footer">
            @if($svc->is_active)
                <span class="status-badge badge-active"><i class="fas fa-circle" style="font-size:7px;"></i> Active</span>
            @else
                <span class="status-badge badge-inactive">Inactive</span>
            @endif
            <div class="card-actions">
                <a href="{{ route('admin.services.edit', $svc) }}" class="btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{ route('admin.services.toggle', $svc) }}">
                    @csrf
                    <button type="submit" class="btn-sm btn-toggle" title="{{ $svc->is_active ? 'Deactivate' : 'Activate' }}">
                        <i class="fas fa-{{ $svc->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                    </button>
                </form>
                <form method="POST" action="{{ route('admin.services.destroy', $svc) }}" onsubmit="return confirm('Delete this service?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-sm btn-del"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <i class="fas fa-cogs"></i>
        <p>No services yet. <a href="{{ route('admin.services.create') }}" style="color:#60a5fa;">Add one →</a></p>
    </div>
    @endforelse
</div>
@if($services->hasPages())
<div style="padding:20px 0;">{{ $services->links() }}</div>
@endif
@endsection
