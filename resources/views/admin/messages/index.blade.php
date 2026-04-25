@extends('admin.layouts.app')
@section('title', 'Messages')
@section('page-title', 'Contact Messages')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .page-header h2 { font-size: 20px; font-weight: 700; color: #fff; }
    .badge-count { font-size: 12px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: rgba(239,68,68,0.15); color: #f87171; margin-left: 10px; }

    .table-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead th { padding: 14px 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.06); text-align: left; }
    tbody td { padding: 16px 20px; font-size: 14px; color: #cbd5e1; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: rgba(255,255,255,0.03); }
    tbody tr.unread td { background: rgba(59,130,246,0.04); }
    tbody tr.unread td:first-child { border-left: 3px solid #3b82f6; }

    .sender-cell { display: flex; align-items: center; gap: 12px; }
    .avatar { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #fff; flex-shrink: 0; background: linear-gradient(135deg,#3b82f6,#06b6d4); }
    .sender-name { font-weight: 600; color: #e2e8f0; }
    .sender-phone { font-size: 12px; color: #64748b; }

    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .status-unread { background: rgba(239,68,68,0.15); color: #f87171; }
    .status-read   { background: rgba(16,185,129,0.12); color: #34d399; }

    .action-btns { display: flex; gap: 8px; align-items: center; }
    .btn-view { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.3); border-radius: 8px; color: #60a5fa; font-size: 12px; font-weight: 600; text-decoration: none; transition: all 0.2s; }
    .btn-view:hover { background: rgba(59,130,246,0.3); }
    .btn-del { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); border-radius: 8px; color: #f87171; font-size: 12px; font-weight: 600; cursor: pointer; transition: all 0.2s; border-style: solid; }
    .btn-del:hover { background: rgba(239,68,68,0.25); }

    .pagination-wrap { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.06); }
    .pagination-wrap .pagination { display: flex; gap: 6px; list-style: none; }
    .pagination-wrap .page-item .page-link { display: flex; align-items: center; justify-content: center; width: 36px; height: 36px; border-radius: 8px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08); color: #94a3b8; font-size: 13px; text-decoration: none; transition: all 0.2s; }
    .pagination-wrap .page-item.active .page-link { background: rgba(59,130,246,0.3); border-color: rgba(59,130,246,0.5); color: #fff; }
    .pagination-wrap .page-item .page-link:hover { background: rgba(255,255,255,0.1); color: #fff; }

    .empty-state { padding: 60px; text-align: center; color: #64748b; }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
    .empty-state p { font-size: 15px; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2>
        <i class="fas fa-envelope" style="color:#60a5fa;margin-right:10px;"></i>
        Messages
        @php $unread = $messages->where('is_read', false)->count(); @endphp
        @if($unread > 0)
            <span class="badge-count">{{ $unread }} unread</span>
        @endif
    </h2>
    <span style="font-size:13px;color:#64748b;">Total: {{ $messages->total() }}</span>
</div>

<div class="table-card">
    @if($messages->count())
    <table>
        <thead>
            <tr>
                <th>Sender</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
            <tr class="{{ !$msg->is_read ? 'unread' : '' }}">
                <td>
                    <div class="sender-cell">
                        <div class="avatar">{{ strtoupper(substr($msg->name, 0, 1)) }}</div>
                        <div>
                            <div class="sender-name">{{ $msg->name }}</div>
                            <div class="sender-phone">{{ $msg->phone ?? '—' }}</div>
                        </div>
                    </div>
                </td>
                <td>{{ Str::limit($msg->subject, 45) }}</td>
                <td>
                    @if($msg->is_read)
                        <span class="status-badge status-read"><i class="fas fa-check"></i> Read</span>
                    @else
                        <span class="status-badge status-unread"><i class="fas fa-circle" style="font-size:7px;"></i> Unread</span>
                    @endif
                </td>
                <td>{{ $msg->created_at->format('M d, Y') }}<br><span style="font-size:11px;color:#64748b;">{{ $msg->created_at->format('h:i A') }}</span></td>
                <td>
                    <div class="action-btns">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="btn-view"><i class="fas fa-eye"></i> View</a>
                        <form method="POST" action="{{ route('admin.messages.destroy', $msg) }}" onsubmit="return confirm('Delete this message?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-del"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">{{ $messages->links() }}</div>
    @else
    <div class="empty-state">
        <i class="fas fa-inbox"></i>
        <p>No messages have been received yet.</p>
    </div>
    @endif
</div>
@endsection
