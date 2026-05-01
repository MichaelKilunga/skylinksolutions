@extends('admin.layouts.app')
@section('title', 'News Updates')
@section('page-title', 'News Management')

@push('styles')
<style>
    .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
    .btn-create { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: linear-gradient(135deg,#3b82f6,#2563eb); border: none; border-radius: 10px; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; transition: all 0.2s; box-shadow: 0 4px 12px rgba(59,130,246,0.35); }
    .btn-create:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(59,130,246,0.4); }
    
    .news-table-container { background: #fff; border: 1px solid var(--border); border-radius: 14px; overflow: hidden; }
    table { width: 100%; border-collapse: collapse; }
    th { text-align: left; padding: 16px 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); border-bottom: 1px solid var(--border); }
    td { padding: 16px 20px; font-size: 14px; color: var(--text); border-bottom: 1px solid #fff; vertical-align: middle; }
    tr:last-child td { border-bottom: none; }
    tr:hover td { background: rgba(255,255,255,0.02); }

    .news-info { display: flex; align-items: center; gap: 14px; }
    .news-img { width: 60px; height: 40px; border-radius: 6px; object-fit: cover; background: #1e293b; }
    .news-title { font-weight: 600; color: #fff; display: block; margin-bottom: 2px; }
    .news-cat { font-size: 11px; color: #3b82f6; font-weight: 700; text-transform: uppercase; }

    .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 11px; font-weight: 700; padding: 4px 10px; border-radius: 20px; }
    .badge-published { background: rgba(16,185,129,0.15); color: #34d399; }
    .badge-draft     { background: rgba(100,116,139,0.15); color: var(--text-muted); }

    .actions { display: flex; gap: 8px; }
    .btn-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 14px; cursor: pointer; transition: all 0.2s; border: 1px solid transparent; background: #fff; color: var(--text-muted); }
    .btn-edit:hover { background: rgba(245,158,11,0.15); border-color: rgba(245,158,11,0.3); color: #fbbf24; }
    .btn-toggle:hover { background: rgba(6,182,212,0.15); border-color: rgba(6,182,212,0.3); color: #22d3ee; }
    .btn-delete:hover { background: rgba(239,68,68,0.15); border-color: rgba(239,68,68,0.3); color: #f87171; }
</style>
@endpush

@section('content')
<div class="page-header">
    <h2 style="font-size:20px;font-weight:700;color:var(--text);">
        <i class="fas fa-newspaper" style="color:#3b82f6;margin-right:10px;"></i>News Articles
    </h2>
    <a href="{{ route('admin.news.create') }}" class="btn-create">
        <i class="fas fa-plus"></i> Create Article
    </a>
</div>

<div class="news-table-container">
    <table class="datatable">
        <thead>
            <tr>
                <th>Article</th>
                <th>Category</th>
                <th>Author</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($news as $item)
            <tr>
                <td>
                    <div class="news-info">
                        <img src="{{ $item->image ? (Str::startsWith($item->image, 'images/') ? asset($item->image) : asset('storage/' . $item->image)) : asset('images/blog/software-update.png') }}" class="news-img">
                        <div>
                            <span class="news-title">{{ Str::limit($item->title, 40) }}</span>
                            <span class="news-cat">{{ $item->category ?? 'General' }}</span>
                        </div>
                    </div>
                </td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->author_name ?? 'SkyLink Team' }}</td>
                <td>
                    @if($item->is_published)
                        <span class="status-badge badge-published"><i class="fas fa-check-circle"></i> Published</span>
                    @else
                        <span class="status-badge badge-draft"><i class="fas fa-clock"></i> Draft</span>
                    @endif
                </td>
                <td>{{ $item->published_at ? $item->published_at->format('M d, Y') : 'N/A' }}</td>
                <td>
                    <div class="actions">
                        <a href="{{ route('admin.news.edit', $item) }}" class="btn-icon btn-edit" title="Edit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.news.toggle', $item) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-icon btn-toggle" title="{{ $item->is_published ? 'Unpublish' : 'Publish' }}">
                                <i class="fas fa-{{ $item->is_published ? 'toggle-on' : 'toggle-off' }}"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.news.destroy', $item) }}" method="POST" onsubmit="return confirm('Delete this article?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn-icon btn-delete" title="Delete"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align:center; padding: 40px; color: #64748b;">
                    No news articles found. <a href="{{ route('admin.news.create') }}" style="color:#3b82f6;">Create your first one</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection

