@extends('admin.layouts.app')
@section('title', 'Project Links')
@section('page-title', 'Manage Project Links')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    
    .table-container { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; padding: 16px 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #94a3b8; border-bottom: 1px solid rgba(255,255,255,0.08); }
    td { padding: 16px 20px; font-size: 14px; color: #e2e8f0; border-bottom: 1px solid rgba(255,255,255,0.04); vertical-align: middle; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: rgba(255,255,255,0.02); }

    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .badge-active { background: rgba(16,185,129,0.15); color: #34d399; }
    .badge-inactive { background: rgba(100,116,139,0.15); color: #94a3b8; }

    .actions { display: flex; gap: 8px; }
    .btn-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px; cursor: pointer; transition: all 0.2s; border: 1px solid transparent; background: rgba(255,255,255,0.05); color: #94a3b8; }
    .btn-edit:hover { background: rgba(245,158,11,0.15); border-color: rgba(245,158,11,0.3); color: #fbbf24; }
    .btn-toggle:hover { background: rgba(6,182,212,0.15); border-color: rgba(6,182,212,0.3); color: #22d3ee; }
    .btn-delete:hover { background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.3); color: #f87171; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:#fff;">
        <i class="fas fa-external-link-alt" style="color:#3b82f6;margin-right:10px;"></i>Project Links
    </h2>
    <a href="{{ route('admin.projects.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Add Link
    </a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>URL</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
            <tr>
                <td style="width: 80px;">{{ $project->order }}</td>
                <td><strong style="color: #fff;">{{ $project->name }}</strong></td>
                <td><a href="{{ $project->url }}" target="_blank" style="color: #3b82f6; text-decoration: none;">{{ $project->url }}</a></td>
                <td>
                    @if($project->is_active)
                        <span class="status-badge badge-active"><i class="fas fa-check-circle"></i> Active</span>
                    @else
                        <span class="status-badge badge-inactive"><i class="fas fa-times-circle"></i> Inactive</span>
                    @endif
                </td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn-icon btn-edit" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.projects.toggle', $project) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-icon btn-toggle" title="{{ $project->is_active ? 'Deactivate' : 'Activate' }}">
                                <i class="fas fa-{{ $project->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-icon btn-delete" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 40px; color: #64748b;">
                    No project links found. <a href="{{ route('admin.projects.create') }}" style="color:#3b82f6;">Add your first one</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
