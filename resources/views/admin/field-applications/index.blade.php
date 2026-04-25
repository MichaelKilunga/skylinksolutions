@extends('admin.layouts.app')
@section('title', 'Field Applications')
@section('page-title', 'Student Field Applications')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .table-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    thead th { padding: 14px 20px; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.06); text-align: left; }
    tbody td { padding: 16px 20px; font-size: 14px; color: #cbd5e1; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
    tbody tr:last-child td { border-bottom: none; }
    tbody tr:hover td { background: rgba(255,255,255,0.03); }
    .name-cell { display: flex; align-items: center; gap: 12px; }
    .avatar { width: 38px; height: 38px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 700; color: #fff; flex-shrink: 0; background: linear-gradient(135deg,#3b82f6,#2563eb); }
    .status-tag { display: inline-block; background: rgba(16,185,129,0.15); color: #10b981; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 6px; }
    .btn-action { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; font-size: 14px; transition: all 0.2s; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #94a3b8; }
    .btn-action:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .btn-del { color: #f87171; border-color: rgba(239,68,68,0.2); background: rgba(239,68,68,0.1); }
    .btn-del:hover { background: rgba(239,68,68,0.25); color: #f87171; border-color: rgba(239,68,68,0.4); }
    .pagination-wrap { padding: 16px 20px; border-top: 1px solid rgba(255,255,255,0.06); }
    .empty-state { padding: 60px; text-align: center; color: #64748b; }
    .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; opacity: 0.3; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:#fff;">
        <i class="fas fa-graduation-cap" style="color:#60a5fa;margin-right:10px;"></i>Field Applications
    </h2>
    <span style="font-size:13px;color:#64748b;">Total: {{ $applications->total() }}</span>
</div>

<div class="table-card">
    @if($applications->count())
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Applicant</th>
                <th>Institution/Program</th>
                <th>Duration</th>
                <th>Date Applied</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $i => $app)
            <tr>
                <td style="color:#475569;">{{ $applications->firstItem() + $i }}</td>
                <td>
                    <div class="name-cell">
                        <div class="avatar">{{ strtoupper(substr($app->full_name, 0, 1)) }}</div>
                        <div>
                            <div style="font-weight:600;color:#e2e8f0;">{{ $app->full_name }}</div>
                            <div style="font-size:11px;color:#64748b;">Year {{ $app->year_of_study }} Student</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div style="color:#e2e8f0;">{{ $app->university }}</div>
                    <div style="font-size:12px;color:#64748b;">{{ $app->program }}</div>
                </td>
                <td>
                    <div style="color:#cbd5e1;">{{ $app->duration_weeks }} Weeks</div>
                    <div style="font-size:11px;color:#64748b;">{{ \Carbon\Carbon::parse($app->start_date)->format('M d') }} - {{ \Carbon\Carbon::parse($app->end_date)->format('M d, Y') }}</div>
                </td>
                <td>{{ $app->created_at->format('M d, Y') }}</td>
                <td>
                    <div style="display:flex;gap:8px;">
                        <a href="{{ route('admin.field-applications.show', $app) }}" class="btn-action" title="View Details">
                            <i class="fas fa-eye"></i>
                        </a>
                        <form method="POST" action="{{ route('admin.field-applications.destroy', $app) }}" onsubmit="return confirm('Delete this application permanently?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-action btn-del" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">{{ $applications->links() }}</div>
    @else
    <div class="empty-state">
        <i class="fas fa-file-invoice"></i>
        <p>No student field applications yet.</p>
    </div>
    @endif
</div>
@endsection
