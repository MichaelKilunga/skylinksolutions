@extends('admin.layouts.app')
@section('title', 'Announcements')
@section('page-title', 'Announcements')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    .announcements-grid { display: grid; gap: 16px; }
    .ann-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 14px; padding: 22px 24px; transition: all 0.2s; }
    .ann-card:hover { border-color: rgba(59,130,246,0.3); background: rgba(59,130,246,0.05); }
    .ann-card.published { border-left: 3px solid #10b981; }
    .ann-card.draft     { border-left: 3px solid #475569; }
    .ann-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; margin-bottom: 10px; }
    .ann-title { font-size: 16px; font-weight: 700; color: #e2e8f0; }
    .ann-meta { font-size: 12px; color: #64748b; margin-top: 4px; }
    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; white-space: nowrap; flex-shrink: 0; }
    .badge-published { background: rgba(16,185,129,0.15); color: #34d399; }
    .badge-draft     { background: rgba(100,116,139,0.15); color: #94a3b8; }
    .ann-body { font-size: 13px; color: #94a3b8; line-height: 1.6; margin-bottom: 16px; }
    .ann-actions { display: flex; gap: 8px; align-items: center; flex-wrap: wrap; }
    .btn-sm { display: inline-flex; align-items: center; gap: 6px; padding: 7px 14px; border-radius: 8px; font-size: 12px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; font-family: 'Inter', sans-serif; }
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
        <i class="fas fa-bullhorn" style="color:#fbbf24;margin-right:10px;"></i>Announcements
    </h2>
    <a href="{{ route('admin.announcements.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> New Announcement
    </a>
</div>

<div class="announcements-grid">
    @forelse($announcements as $ann)
    <div class="ann-card {{ $ann->is_published ? 'published' : 'draft' }}">
        <div class="ann-top">
            <div>
                <div class="ann-title">{{ $ann->title }}</div>
                <div class="ann-meta">
                    <i class="fas fa-calendar" style="margin-right:4px;"></i>
                    {{ $ann->created_at->format('M d, Y \a\t h:i A') }}
                    @if($ann->published_at)
                        &nbsp;·&nbsp; Published {{ $ann->published_at->diffForHumans() }}
                    @endif
                </div>
            </div>
            @if($ann->is_published)
                <span class="status-badge badge-published"><i class="fas fa-check-circle"></i> Published</span>
            @else
                <span class="status-badge badge-draft"><i class="fas fa-clock"></i> Draft</span>
            @endif
        </div>
        <div class="ann-body">{{ Str::limit($ann->body, 160) }}</div>
        <div class="ann-actions">
            <a href="{{ route('admin.announcements.edit', $ann) }}" class="btn-sm btn-edit">
                <i class="fas fa-edit"></i> Edit
            </a>
            <form method="POST" action="{{ route('admin.announcements.toggle', $ann) }}">
                @csrf
                <button type="submit" class="btn-sm btn-toggle">
                    <i class="fas fa-{{ $ann->is_published ? 'eye-slash' : 'eye' }}"></i>
                    {{ $ann->is_published ? 'Unpublish' : 'Publish' }}
                </button>
            </form>
            <form method="POST" action="{{ route('admin.announcements.destroy', $ann) }}" onsubmit="return confirm('Delete this announcement?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-sm btn-del"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="empty-state">
        <i class="fas fa-bullhorn"></i>
        <p>No announcements yet. <a href="{{ route('admin.announcements.create') }}" style="color:#60a5fa;">Create one →</a></p>
    </div>
    @endforelse
</div>
@if($announcements->hasPages())
<div style="padding:20px 0;">{{ $announcements->links() }}</div>
@endif
@endsection
