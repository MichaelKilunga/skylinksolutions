@extends('admin.layouts.app')
@section('title', 'Users')
@section('page-title', 'User Management')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    
    .data-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: 16px; overflow: hidden; }
    .table-container { overflow-x: auto; }
    table { width: 100%; border-collapse: collapse; color: var(--text); font-size: 13px; }
    th { text-align: left; padding: 16px; background: var(--bg-dark); border-bottom: 1px solid var(--border); font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px; }
    td { padding: 16px; border-bottom: 1px solid var(--border); vertical-align: middle; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: var(--bg-dark); }

    .user-info { display: flex; align-items: center; gap: 12px; }
    .user-avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(139,92,246,0.2); }
    .user-name { font-weight: 700; color: var(--text); display: block; }
    .user-email { font-size: 11px; color: #64748b; }

    .badge { display: inline-flex; align-items: center; gap: 4px; padding: 4px 10px; border-radius: 20px; font-size: 10px; font-weight: 700; }
    .badge-admin { background: rgba(139,92,246,0.15); color: #a78bfa; border: 1px solid rgba(139,92,246,0.3); }
    .badge-user { background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid rgba(59,130,246,0.3); }
    
    .status-pill { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 600; }
    .status-on { color: #10b981; }
    .status-off { color: #ef4444; }

    .actions { display: flex; gap: 8px; }
    .btn-icon { width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 8px; border: 1px solid var(--border); background: rgba(255,255,255,0.03); color: var(--text-muted); transition: all 0.2s; cursor: pointer; }
    .btn-icon:hover { background: var(--border); color: var(--text); transform: translateY(-1px); }
    .btn-icon.edit:hover { color: #fbbf24; border-color: rgba(245,158,11,0.3); }
    .btn-icon.delete:hover { color: #f87171; border-color: rgba(239,68,68,0.3); }
    .btn-icon.toggle:hover { color: #22d3ee; border-color: rgba(6,182,212,0.3); }

    .deletion-request { background: rgba(239,68,68,0.1); color: #f87171; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; margin-top: 4px; display: inline-block; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:var(--text);">
        <i class="fas fa-users" style="color:#a78bfa;margin-right:10px;"></i>Users
    </h2>
    <a href="{{ route('admin.users.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Add User
    </a>
</div>

<div class="data-card">
    <div class="table-container">
        <table class="datatable">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>Position</th>
                    <th>Visibility</th>
                    <th>Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>
                        <div class="user-info">
                            <img src="{{ $user->profile_photo_url }}" class="user-avatar" alt="">
                            <div>
                                <span class="user-name">{{ $user->name }}</span>
                                <span class="user-email">{{ $user->email }}</span>
                                @if($user->deletion_requested_at)
                                    <span class="deletion-request">Deletion Requested</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($user->hasRole('super-admin'))
                            <span class="badge badge-admin">Super Admin</span>
                        @else
                            <span class="badge badge-user">User</span>
                        @endif
                    </td>
                    <td><span style="color: var(--text-muted);">{{ $user->position ?? '—' }}</span></td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.toggle-visibility', $user) }}">
                            @csrf
                            <button type="submit" style="background:none;border:none;{{ $user->email === 'info@skylinksolutions.co.tz' ? 'cursor:not-allowed;opacity:0.5;' : 'cursor:pointer;' }}" {{ $user->email === 'info@skylinksolutions.co.tz' ? 'disabled' : '' }}>
                                @if($user->is_visible)
                                    <span class="status-pill status-on"><i class="fas fa-eye"></i> Visible</span>
                                @else
                                    <span class="status-pill status-off"><i class="fas fa-eye-slash"></i> Hidden</span>
                                @endif
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.toggle-login', $user) }}">
                            @csrf
                            <button type="submit" style="background:none;border:none;{{ $user->email === 'info@skylinksolutions.co.tz' ? 'cursor:not-allowed;opacity:0.5;' : 'cursor:pointer;' }}" {{ $user->email === 'info@skylinksolutions.co.tz' ? 'disabled' : '' }}>
                                @if($user->can_login)
                                    <span class="status-pill status-on"><i class="fas fa-check-circle"></i> Enabled</span>
                                @else
                                    <span class="status-pill status-off"><i class="fas fa-times-circle"></i> Disabled</span>
                                @endif
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn-icon edit" title="Edit"><i class="fas fa-edit"></i></a>
                            @if($user->email !== 'info@skylinksolutions.co.tz')
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-icon delete" title="Delete"><i class="fas fa-trash"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:48px;color:#64748b;">
                        <i class="fas fa-users" style="font-size:32px;display:block;margin-bottom:12px;opacity:0.2;"></i>
                        No users found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

