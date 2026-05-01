@extends('admin.layouts.app')
@section('title', 'Volunteers')
@section('page-title', 'Internship Applications')

@push('styles')
    <style>
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .table-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            padding: 14px 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid #fff;
            text-align: left;
        }

        tbody td {
            padding: 16px 20px;
            font-size: 14px;
            color: var(--text-muted);
            border-bottom: 1px solid #fff;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: rgba(255, 255, 255, 0.03);
        }

        .name-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
            background: linear-gradient(135deg, #10b981, #06b6d4);
        }

        .skills-tag {
            display: inline-block;
            background: rgba(139, 92, 246, 0.15);
            color: #a78bfa;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 6px;
            margin: 2px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-muted);
        }

        .btn-action:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .btn-del {
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.2);
            background: rgba(239, 68, 68, 0.1);
        }

        .btn-del:hover {
            background: rgba(239, 68, 68, 0.25);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.4);
        }

        .pagination-wrap {
            padding: 16px 20px;
            border-top: 1px solid #fff;
        }

        .empty-state {
            padding: 60px;
            text-align: center;
            color: #64748b;
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
            <i class="fas fa-hands-helping" style="color:#34d399;margin-right:10px;"></i>Internship Applicants
        </h2>
        <span style="font-size:13px;color:#64748b;">Total: {{ $volunteers->count() }}</span>
    </div>

    <div class="table-card">
        @if ($volunteers->count())
            <table class="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Skills</th>
                        <th>Motivation</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($volunteers as $i => $vol)
                        <tr>
                            <td style="color:#475569;">{{ $i + 1 }}</td>
                            <td>
                                <div class="name-cell">
                                    <div class="avatar">{{ strtoupper(substr($vol->name, 0, 1)) }}</div>
                                    <span style="font-weight:600;color: var(--text);">{{ $vol->name }}</span>
                                </div>
                            </td>
                            <td>
                                <div>{{ $vol->email }}</div>
                                <div style="font-size:12px;color:#64748b;">{{ $vol->phone ?? '—' }}</div>
                            </td>
                            <td>
                                @if ($vol->skills)
                                    @foreach (explode(',', $vol->skills) as $skill)
                                        <span class="skills-tag">{{ trim($skill) }}</span>
                                    @endforeach
                                @else
                                    <span style="color:#475569;">—</span>
                                @endif
                            </td>
                            <td style="max-width:200px;">{{ Str::limit($vol->motivation, 60) ?? '—' }}</td>
                            <td>{{ $vol->created_at->format('M d, Y') }}</td>
                            <td>
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('admin.volunteers.show', $vol) }}" class="btn-action"
                                        title="View Application">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form method="POST" action="{{ route('admin.volunteers.destroy', $vol) }}"
                                        onsubmit="return confirm('Remove this volunteer?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-action btn-del" title="Remove"><i
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
                <i class="fas fa-user-friends"></i>
                <p>No Internship applications yet.</p>
            </div>
        @endif
    </div>
@endsection
