@extends('admin.layouts.app')
@section('title', 'Message Detail')
@section('page-title', 'Message Detail')

@push('styles')
<style>
    .back-link { display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-size: 13px; text-decoration: none; margin-bottom: 20px; transition: color 0.2s; }
    .back-link:hover { color: #60a5fa; }
    .msg-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; overflow: hidden; max-width: 780px; }
    .msg-header { padding: 28px 32px; border-bottom: 1px solid rgba(255,255,255,0.06); background: rgba(59,130,246,0.05); }
    .msg-subject { font-size: 22px; font-weight: 800; color: #fff; margin-bottom: 16px; }
    .msg-meta { display: flex; flex-wrap: wrap; gap: 20px; }
    .meta-item { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #94a3b8; }
    .meta-item i { color: #60a5fa; width: 16px; text-align: center; }
    .meta-item strong { color: #e2e8f0; }
    .msg-body { padding: 32px; }
    .msg-body p { font-size: 15px; color: #cbd5e1; line-height: 1.8; white-space: pre-wrap; }
    .msg-footer { padding: 20px 32px; border-top: 1px solid rgba(255,255,255,0.06); display: flex; gap: 12px; }
    .btn { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; border-radius: 10px; font-size: 13px; font-weight: 600; text-decoration: none; cursor: pointer; transition: all 0.2s; border: none; font-family: 'Inter', sans-serif; }
    .btn-back { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; }
    .btn-back:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .btn-delete { background: rgba(239,68,68,0.12); border: 1px solid rgba(239,68,68,0.3); color: #f87171; }
    .btn-delete:hover { background: rgba(239,68,68,0.25); }
    .status-chip { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 700; padding: 4px 12px; border-radius: 20px; background: rgba(16,185,129,0.15); color: #34d399; margin-left: 12px; vertical-align: middle; }
</style>
@endpush

@section('content')
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
