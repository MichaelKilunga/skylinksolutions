@extends('admin.layouts.app')
@section('title', 'Services')
@section('page-title', 'Services Management')

@push('styles')
    <style>
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .btn-create {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.35);
        }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(59, 130, 246, 0.4);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 16px 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 20px;
            font-size: 14px;
            color: var(--text);
            border-bottom: 1px solid #fff;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .badge-active {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
        }

        .badge-inactive {
            background: rgba(100, 116, 139, 0.15);
            color: var(--text-muted);
        }

        .card-actions {
            display: flex;
            gap: 6px;
        }

        .btn-sm {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            font-family: 'Inter', sans-serif;
        }

        .btn-edit {
            background: rgba(245, 158, 11, 0.12);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: #fbbf24;
        }

        .btn-edit:hover {
            background: rgba(245, 158, 11, 0.25);
        }

        .btn-toggle {
            background: rgba(6, 182, 212, 0.12);
            border: 1px solid rgba(6, 182, 212, 0.3);
            color: #22d3ee;
        }

        .btn-toggle:hover {
            background: rgba(6, 182, 212, 0.25);
        }

        .btn-del {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #f87171;
        }

        .btn-del:hover {
            background: rgba(239, 68, 68, 0.25);
        }

        .empty-state {
            grid-column: 1/-1;
            padding: 60px;
            text-align: center;
            color: #64748b;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 14px;
            border: 1px solid #fff;
        }

        .empty-state i {
            font-size: 48px;
            margin-bottom: 16px;
            display: block;
            opacity: 0.3;
        }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h2 style="font-size:20px;font-weight:700;color:var(--text);">
            <i class="fas fa-cogs" style="color:#a78bfa;margin-right:10px;"></i>Services
        </h2>
        <a href="{{ route('admin.services.create') }}" class="btn-create">
            <i class="fas fa-plus"></i> Add Service
        </a>
    </div>

    <div class="table-card" style="background: #fff; border: 1px solid var(--border); border-radius: 16px; overflow: hidden;">
        @if ($services->count())
            <table class="datatable">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $svc)
                        <tr class="{{ !$svc->status ? 'inactive' : '' }}">
                            <td>
                                <div style="display:flex; align-items:center; gap:12px;">
                                    @if ($svc->banner_image)
                                        <img src="{{ $svc->banner_image_url }}" style="width:40px; height:40px; object-fit:cover; border-radius:8px;">
                                    @else
                                        <div style="width:40px; height:40px; background:rgba(139,92,246,0.1); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#a78bfa;">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    @endif
                                    <div style="font-weight:700; color: var(--text);">{{ $svc->title }}</div>
                                </div>
                            </td>
                            <td>
                                <div style="font-size:13px; color: var(--text-muted);">
                                    {{ Str::limit($svc->short_description, 60) }}
                                </div>
                            </td>
                            <td>
                                @if ($svc->status)
                                    <span class="status-badge badge-active"><i class="fas fa-circle"
                                            style="font-size:7px;"></i> Active</span>
                                @else
                                    <span class="status-badge badge-inactive">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="card-actions">
                                    <a href="{{ route('admin.services.edit', $svc) }}" class="btn-sm btn-edit"
                                        title="Edit"><i class="fas fa-edit"></i></a>
                                    <form method="POST" action="{{ route('admin.services.toggle', $svc) }}">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-toggle"
                                            title="{{ $svc->status ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $svc->status ? 'toggle-on' : 'toggle-off' }}"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.services.destroy', $svc) }}"
                                        onsubmit="return confirm('Delete this service?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-sm btn-del" title="Delete"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-cogs"></i>
                <p>No services yet. <a href="{{ route('admin.services.create') }}" style="color:#60a5fa;">Add one →</a></p>
            </div>
        @endif
    </div>
@endsection
