@extends('admin.layouts.app')
@section('title', 'Message Detail')
@section('page-title', 'Message Detail')

@push('styles')
<style>
    .back-link { display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-size: 13px; text-decoration: none; margin-bottom: 20px; transition: color 0.2s; }
    .back-link:hover { color: #3b82f6; }
    .msg-card { background: #fff; border: 1px solid var(--border); border-radius: 16px; overflow: hidden; max-width: 780px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); }
    .msg-header { padding: 28px 32px; border-bottom: 1px solid var(--border); background: #f8fafc; }
    .msg-subject { font-size: 22px; font-weight: 800; color: var(--text); margin-bottom: 16px; display: flex; align-items: center; flex-wrap: wrap; gap: 10px; }
    .msg-meta { display: flex; flex-wrap: wrap; gap: 20px; }
    .meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #64748b; }
    .meta-item i { color: #3b82f6; width: 16px; text-align: center; }
    .meta-item strong { color: var(--text); }
    .msg-body { padding: 32px; background: #fff; }
    .msg-body p { font-size: 15px; color: var(--text); line-height: 1.8; white-space: pre-wrap; margin: 0; }
    .msg-footer { padding: 20px 32px; border-top: 1px solid var(--border); display: flex; gap: 12px; background: #f8fafc; }
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; font-family: 'Inter', sans-serif; }
    .btn-back { background: #fff; border: 1px solid var(--border); color: #64748b; }
    .btn-back:hover { background: #f1f5f9; color: var(--text); }
    .btn-delete { background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); color: #ef4444; }
    .btn-delete:hover { background: rgba(239,68,68,0.25); }
    .status-chip { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: rgba(16,185,129,0.15); color: #10b981; vertical-align: middle; }
</style>
@endpush

@section('content')
<div class="page-header" style="margin-bottom: 24px;">
    <h2 style="font-size:20px;font-weight:700;color:var(--text); margin: 0;">
        <i class="fas fa-envelope-open-text" style="color:#60a5fa;margin-right:10px;"></i>Message Detail
    </h2>
</div>

<a href="{{ route('admin.messages.index') }}" class="back-link">
    <i class="fas fa-arrow-left"></i> Back to Messages
</a>

<div class="msg-card">
    <div class="msg-header">
        <div class="msg-subject">
            {{ $message->subject }}
            <span class="status-chip"><i class="fas fa-check"></i> Read</span>
        </div>
        <div class="msg-meta">
            <div class="meta-item">
                <i class="fas fa-user"></i>
                <span>From: <strong>{{ $message->name }}</strong></span>
            </div>
            @if($message->phone)
            <div class="meta-item">
                <i class="fas fa-phone"></i>
                <span><strong>{{ $message->phone }}</strong></span>
            </div>
            @endif
            <div class="meta-item">
                <i class="fas fa-calendar"></i>
                <span>{{ $message->created_at->format('F d, Y \a\t h:i A') }}</span>
            </div>
            <div class="meta-item">
                <i class="fas fa-clock"></i>
                <span>{{ $message->created_at->diffForHumans() }}</span>
            </div>
        </div>
    </div>

    <div class="msg-body">
        <p>{{ $message->message }}</p>
    </div>

    <div class="msg-footer">
        <a href="{{ route('admin.messages.index') }}" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Back
        </a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-delete">
                <i class="fas fa-trash"></i> Delete Message
            </button>
        </form>
    </div>
</div>
@endsection

