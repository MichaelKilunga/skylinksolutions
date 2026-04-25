@extends('admin.layouts.app')
@section('title', 'Subscribers')
@section('page-title', 'Newsletter Subscribers')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .table-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead th { padding: 14px 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.06); text-align: left; }
    tbody td { padding: 16px 20px; font-size: 14px; color: #cbd5e1; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: rgba(255,255,255,0.03); }
    .email-cell { display: flex; align-items: center; gap: 12px; }
    .avatar { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #fff; flex-shrink: 0; background: linear-gradient(135deg,#06b6d4,#8b5cf6); }
    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .status-active   { background: rgba(16,185,129,0.15); color: #34d399; }
    .status-inactive { background: rgba(100,116,139,0.15); color: #94a3b8; }
    .btn-del { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); border-radius: 8px; color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; }
    .btn-del:hover { background: rgba(239,68,68,0.25); }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.06); }
    .empty-state { padding: 60px; text-align: center; color: #64748b; }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:#fff;">
        <i class="fas fa-users" style="color:#22d3ee;margin-right:10px;"></i>Subscribers
    </h2>
    <span style="font-size:13px;color:#64748b;">Total: {{ $subscribers->total() }}</span>
</div>

<div class="table-card">
    @if($subscribers->count())
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Name</th>
                <th>Status</th>
                <th>Subscribed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subscribers as $i => $sub)
            <tr>
                <td style="color:#475569;">{{ $subscribers->firstItem() + $i }}</td>
                <td>
                    <div class="email-cell">
                        <div class="avatar">{{ strtoupper(substr($sub->email, 0, 1)) }}</div>
                        <span>{{ $sub->email }}</span>
                    </div>
                </td>
                <td>{{ $sub->name ?? '—' }}</td>
                <td>
                    @if($sub->is_active)
                        <span class="status-badge status-active"><i class="fas fa-circle" style="font-size:7px;"></i> Active</span>
                    @else
                        <span class="status-badge status-inactive">Inactive</span>
                    @endif
                </td>
                <td>{{ $sub->created_at->format('M d, Y') }}</td>
                <td>
                    <form method="POST" action="{{ route('admin.subscribers.destroy', $sub) }}" onsubmit="return confirm('Remove this subscriber?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-del"><i class="fas fa-trash"></i> Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">{{ $subscribers->links() }}</div>
    @else
    <div class="empty-state">
        <i class="fas fa-user-slash"></i>
        <p>No subscribers yet.</p>
    </div>
    @endif
</div>
@endsection
