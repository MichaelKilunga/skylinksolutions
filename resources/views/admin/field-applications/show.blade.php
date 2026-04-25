@extends('admin.layouts.app')
@section('title', 'Application Details')
@section('page-title', 'Field Application Details')

@push('styles')
<style>
    .detail-card { background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: 16px; padding: 30px; }
    .section-title { font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #64748b; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.06); display: flex; align-items: center; gap: 10px; }
    .info-group { margin-bottom: 24px; }
    .info-label { font-size: 12px; color: #64748b; margin-bottom: 6px; }
    .info-value { font-size: 15px; color: #e2e8f0; font-weight: 500; }
    .attachment-box { background: rgba(255,255,255,0.02); border: 1px dashed rgba(255,255,255,0.1); border-radius: 12px; padding: 20px; display: flex; align-items: center; justify-content: space-between; }
    .btn-download { display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: #3b82f6; color: #fff; border-radius: 8px; font-weight: 600; font-size: 13px; transition: all 0.2s; }
    .btn-download:hover { background: #2563eb; transform: translateY(-1px); }
    .back-btn { display: inline-flex; align-items: center; gap: 8px; color: #64748b; font-weight: 600; font-size: 13px; margin-bottom: 20px; transition: color 0.2s; }
    .back-btn:hover { color: #e2e8f0; }
</style>
@endpush

@section('content')
<a href="{{ route('admin.field-applications.index') }}" class="back-btn">
    <i class="fas fa-arrow-left"></i> Back to List
</a>

<div class="detail-card">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div style="display:flex; align-items:center; gap:20px;">
                <div style="width:64px; height:64px; border-radius:50%; background:linear-gradient(135deg,#3b82f6,#2563eb); display:flex; align-items:center; justify-content:center; font-size:24px; font-weight:700; color:#fff;">
                    {{ strtoupper(substr($application->full_name, 0, 1)) }}
                </div>
                <div>
                    <h2 style="color:#fff; margin:0; font-size:24px;">{{ $application->full_name }}</h2>
                    <p style="color:#64748b; margin:0;">Applied on {{ $application->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="section-title"><i class="fas fa-university"></i> Academic Information</div>
            <div class="row">
                <div class="col-sm-6 info-group">
                    <div class="info-label">University/College</div>
                    <div class="info-value">{{ $application->university }}</div>
                </div>
                <div class="col-sm-6 info-group">
                    <div class="info-label">Year of Study</div>
                    <div class="info-value">Year {{ $application->year_of_study }}</div>
                </div>
                <div class="col-12 info-group">
                    <div class="info-label">Program/Course</div>
                    <div class="info-value">{{ $application->program }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="section-title"><i class="fas fa-calendar-alt"></i> Placement Period</div>
            <div class="row">
                <div class="col-sm-6 info-group">
                    <div class="info-label">Start Date</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($application->start_date)->format('M d, Y') }}</div>
                </div>
                <div class="col-sm-6 info-group">
                    <div class="info-label">End Date</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($application->end_date)->format('M d, Y') }}</div>
                </div>
                <div class="col-12 info-group">
                    <div class="info-label">Total Duration</div>
                    <div class="info-value text-primary" style="font-size:18px;">{{ $application->duration_weeks }} Weeks</div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="section-title"><i class="fas fa-user-cog"></i> Skills & Goals</div>
            <div class="info-group">
                <div class="info-label">Experience & Competence</div>
                <div class="info-value" style="background:rgba(255,255,255,0.02); padding:15px; border-radius:8px; line-height:1.6;">
                    {{ $application->experience ?? 'No experience details provided.' }}
                </div>
            </div>
            <div class="info-group">
                <div class="info-label">Learning Intentions</div>
                <div class="info-value" style="background:rgba(255,255,255,0.02); padding:15px; border-radius:8px; line-height:1.6;">
                    {{ $application->learning_goals ?? 'No learning goals provided.' }}
                </div>
            </div>
        </div>

        <div class="col-12 mt-3">
            <div class="section-title"><i class="fas fa-paperclip"></i> Attachment & Discovery</div>
            <div class="row">
                <div class="col-md-6 info-group">
                    <div class="info-label">How did they hear about us?</div>
                    <div class="info-value">{{ $application->source ?? 'Not specified' }}</div>
                </div>
                <div class="col-md-12">
                    <div class="attachment-box">
                        <div style="display:flex; align-items:center; gap:15px;">
                            <i class="fas fa-file-pdf" style="font-size:32px; color:#f87171;"></i>
                            <div>
                                <div style="color:#fff; font-weight:600;">Field Attachment Letter</div>
                                <div style="font-size:12px; color:#64748b;">Applicant Uploaded Document</div>
                            </div>
                        </div>
                        @if($application->attachment)
                            <a href="{{ asset('storage/' . $application->attachment) }}" target="_blank" class="btn-download">
                                <i class="fas fa-download"></i> View / Download
                            </a>
                        @else
                            <span style="color:#64748b;">No attachment uploaded</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5 text-right">
            <form method="POST" action="{{ route('admin.field-applications.destroy', $application) }}" onsubmit="return confirm('Delete this application permanently?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-action btn-del" style="width:auto; padding:10px 20px; height:auto; display:inline-flex; gap:8px;">
                    <i class="fas fa-trash"></i> Delete Application
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
