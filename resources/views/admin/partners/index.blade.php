@extends('admin.layouts.app')
@section('title', 'Partners')
@section('page-title', 'Partners Management')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; padding: 16px 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; border-bottom: 1px solid rgba(255,255,255,0.08); }
    td { padding: 16px 20px; font-size: 14px; color: #e2e8f0; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: rgba(255,255,255,0.02); }

    tr:not(.inactive) td:first-child { border-left: 3px solid #10b981; }
    tr.inactive td:first-child { border-left: 3px solid #475569; }
    tr.inactive { opacity: 0.7; }

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
    .empty-state { padding: 60px; text-align: center; color: #64748b; background: rgba(255,255,255,0.03); border-radius: 14px; border: 1px solid rgba(255,255,255,0.06); }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:#fff;">
        <i class="fas fa-handshake" style="color:#a78bfa;margin-right:10px;"></i>Partners
    </h2>
    <a href="{{ route('admin.partners.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Add Partner
    </a>
</div>

<div class="table-card" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; overflow: hidden;">
    @if($partners->count())
    <table class="datatable">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Partner</th>
                <th>Activity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $ptr)
            <tr class="{{ !$ptr->is_active ? 'inactive' : '' }}">
                <td><img src="{{ $ptr->logo_path ? asset('storage/' . $ptr->logo_path) : asset('images/placeholder.jpg') }}" alt="{{ $ptr->name }}" style="width: 60px; height: 36px; object-fit: contain; background: #fff; border-radius: 4px; padding: 2px;"></td>
                <td><div style="font-weight:700; color:#e2e8f0;">{{ $ptr->name }}</div></td>
                <td><div style="font-size:12px; font-weight:600; color:#3b82f6;">{{ $ptr->activity }}</div></td>
                <td>
                    @if($ptr->is_active)
                        <span class="status-badge badge-active"><i class="fas fa-circle" style="font-size:7px;"></i> Active</span>
                    @else
                        <span class="status-badge badge-inactive">Inactive</span>
                    @endif
                </td>
                <td>
                    <div class="card-actions">
                        <a href="{{ route('admin.partners.edit', $ptr) }}" class="btn-sm btn-edit" title="Edit"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.partners.toggle', $ptr) }}">
                            @csrf
                            <button type="submit" class="btn-sm btn-toggle" title="{{ $ptr->is_active ? 'Deactivate' : 'Activate' }}">
                                <i class="fas fa-{{ $ptr->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.partners.destroy', $ptr) }}" onsubmit="return confirm('Delete this partner?')">
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
        <i class="fas fa-handshake"></i>
        <p>No partners yet. <a href="{{ route('admin.partners.create') }}" style="color:#60a5fa;">Add one →</a></p>
    </div>
    @endif
</div>
@endsection
