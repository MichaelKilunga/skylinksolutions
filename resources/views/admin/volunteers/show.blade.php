@extends('admin.layouts.app')
@section('title', 'Volunteer Details')
@section('page-title', 'Volunteer Application Details')

@push('styles')
<style>
    .detail-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 30px; }
    .section-title { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.06); display: flex; align-items: center; gap: 10px; }
    .info-group { margin-bottom: 24px; }
    .info-label { font-size: 12px; color: #64748b; margin-bottom: 6px; }
    .info-value { font-size: 15px; color: #e2e8f0; font-weight: 500; }
    .attachment-box { background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); border-radius: 12px; padding: 20px; display: flex; align-items: center; justify-content: space-between; }
    .btn-download { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #10b981; color: #fff; border-radius: 8px; font-weight: 600; font-size: 13px; transition: all 0.2s; }
    .btn-download:hover { background: #059669; transform: translateY(-1px); }
    .back-btn { display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-weight: 600; font-size: 13px; margin-bottom: 20px; transition: color 0.2s; }
    .back-btn:hover { color: #e2e8f0; }
    .skills-tag { display: inline-block; background: rgba(139,92,246,0.15); color: #a78bfa; font-size: 11px; font-weight: 600; padding: 3px 8px; border-radius: 6px; margin-right: 4px; margin-bottom: 4px; }
    .btn-action { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 8px; font-size: 14px; transition: all 0.2s; border: 1px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05); color: #94a3b8; }
    .btn-del { color: #f87171; border-color: rgba(239,68,68,0.2); background: rgba(239,68,68,0.1); }
    .btn-del:hover { background: rgba(239,68,68,0.25); color: #f87171; border-color: rgba(239,68,68,0.4); }
</style>
@endpush

@section('content')
<a href="{{ route('admin.volunteers.index') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i> Back to List
</a>

<div class="detail-card">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div style="display:flex; align-items:center; gap:20px;">
                <div style="width:64px; height:64px; border-radius:50%; background:linear-gradient(135deg,#10b981,#06b6d4); display:flex; align-items:center; justify-content:center; font-size:24px; font-weight:700; color:#fff;">
                    {{ strtoupper(substr($volunteer->name, 0, 1)) }}
                </div>
                <div>
                    <h2 style="color:#fff; margin:0; font-size:24px;">{{ $volunteer->name }}</h2>
                    <p style="color:#64748b; margin:0;">Applied on {{ $volunteer->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="section-title"><i class="fas fa-id-card"></i> Contact Information</div>
            <div class="row">
                <div class="col-sm-6 info-group">
                    <div class="info-label">Email Address</div>
                    <div class="info-value">{{ $volunteer->email }}</div>
                </div>
                <div class="col-sm-6 info-group">
                    <div class="info-label">Phone Number</div>
                    <div class="info-value">{{ $volunteer->phone ?? '—' }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="section-title"><i class="fas fa-tools"></i> Skills & Expertise</div>
            <div class="info-group">
                <div class="info-label">Highlighted Skills</div>
                <div class="info-value">
                    @if($volunteer->skills)
                        @foreach(explode(',', $volunteer->skills) as $skill)
                            <span class="skills-tag">{{ trim($skill) }}</span>
                        @endforeach
                    @else
                        <span style="color:#475569;">No specific skills listed.</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="section-title"><i class="fas fa-quote-left"></i> Motivation Statement</div>
            <div class="info-group">
                <div class="info-value" style="background:rgba(255,255,255,0.02); padding:20px; border-radius:12px; line-height:1.7; color:#cbd5e1; border: 1px solid rgba(255,255,255,0.04);">
                    {{ $volunteer->motivation ?? 'No motivation details provided.' }}
                </div>
            </div>
        </div>

        @if($volunteer->attachment)
        <div class="col-12 mt-3">
            <div class="section-title"><i class="fas fa-paperclip"></i> Attachments</div>
            <div class="attachment-box">
                <div style="display:flex; align-items:center; gap:15px;">
                    <i class="fas fa-file-pdf" style="font-size:32px; color:#10b981;"></i>
                    <div>
                        <div style="color:#fff; font-weight:600;">Resume / Application Document</div>
                        <div style="font-size:12px; color:#64748b;">Uploaded by candidate</div>
                    </div>
                </div>
                <a href="{{ asset('storage/' . $volunteer->attachment) }}" target="_blank" class="btn-download">
                    <i class="fas fa-download"></i> View / Download
                </a>
            </div>
        </div>
        @endif

        <div class="col-12 mt-5 text-right">
            <form method="POST" action="{{ route('admin.volunteers.destroy', $volunteer) }}" onsubmit="return confirm('Remove this volunteer application permanently?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-action btn-del" style="width:auto; padding:10px 20px; height:auto; display:inline-flex; gap:8px;">
                    <i class="fas fa-trash"></i> Delete Application
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
