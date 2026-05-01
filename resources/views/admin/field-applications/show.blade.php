@extends('admin.layouts.app')
@section('title', 'Application Details')
@section('page-title', 'Field Application Details')

@push('styles')
    <style>
        .page-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; }
        .detail-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .info-group {
            margin-bottom: 24px;
        }

        .info-label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        .info-value {
            font-size: 15px;
            color: var(--text);
            font-weight: 500;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            padding: 15px;
            border-radius: 8px;
            line-height: 1.6;
            color: var(--text);
            font-size: 14px;
        }

        .attachment-box {
            background: #f8fafc;
            border: 1px dashed #cbd5e1;
            border-radius: 12px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-download {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(59,130,246,0.1);
            color: #3b82f6;
            border: 1px solid rgba(59,130,246,0.25);
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-download:hover {
            background: rgba(59,130,246,0.25);
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #64748b;
            font-weight: 600;
            font-size: 13px;
            transition: color 0.2s;
            text-decoration: none;
        }

        .back-btn:hover {
            color: var(--text);
        }

        .btn-del {
            display: inline-flex; align-items: center; gap: 6px; padding: 10px 20px; 
            background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.25); 
            border-radius: 8px; color: #ef4444; font-size: 13px; font-weight: 600; 
            cursor: pointer; transition: all 0.2s; text-decoration: none;
        }
        .btn-del:hover { background: rgba(239,68,68,0.25); }
    </style>
@endpush

@section('content')
    <div class="page-header">
        <h2 style="font-size:20px;font-weight:700;color:var(--text); margin: 0;">
            <i class="fas fa-file-alt" style="color:#22d3ee;margin-right:10px;"></i>Application Details
        </h2>
        <a href="{{ route('admin.field-applications.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="detail-card">
        <div class="row">
            <div class="col-lg-12 mb-4" style="border-bottom: 1px solid var(--border); padding-bottom: 20px;">
                <div style="display:flex; align-items:center; gap:20px;">
                    <div style="width:64px; height:64px; border-radius:50%; background:rgba(59,130,246,0.1); display:flex; align-items:center; justify-content:center; font-size:24px; font-weight:700; color:#3b82f6;">
                        {{ strtoupper(substr($application->full_name, 0, 1)) }}
                    </div>
                    <div>
                        <h2 style="color:var(--text); margin:0 0 5px 0; font-size:24px; font-weight: 700;">{{ $application->full_name }}</h2>
                        <div style="color:#64748b; font-size: 14px; display: flex; gap: 15px;">
                            <span><i class="far fa-calendar-alt" style="margin-right: 5px;"></i> Applied on {{ $application->created_at->format('M d, Y \a\t H:i') }}</span>
                            <span><i class="far fa-envelope" style="margin-right: 5px;"></i> {{ $application->email }}</span>
                            <span><i class="fas fa-phone-alt" style="margin-right: 5px;"></i> {{ $application->phone_number }}</span>
                        </div>
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
                        <div class="info-value">
                            <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 6px; font-size: 13px;">
                                {{ \Carbon\Carbon::parse($application->start_date)->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 info-group">
                        <div class="info-label">End Date</div>
                        <div class="info-value">
                            <span style="background: #f1f5f9; padding: 4px 10px; border-radius: 6px; font-size: 13px;">
                                {{ \Carbon\Carbon::parse($application->end_date)->format('M d, Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="col-12 info-group">
                        <div class="info-label">Total Duration</div>
                        <div class="info-value" style="color: #3b82f6; font-size:16px; font-weight: 700;">
                            {{ $application->duration_weeks }} Weeks
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="section-title"><i class="fas fa-user-cog"></i> Skills & Goals</div>
                <div class="row">
                    <div class="col-md-6 info-group">
                        <div class="info-label">Experience & Competence</div>
                        <div class="info-box">
                            {{ $application->experience ?? 'No experience details provided.' }}
                        </div>
                    </div>
                    <div class="col-md-6 info-group">
                        <div class="info-label">Learning Intentions</div>
                        <div class="info-box">
                            {{ $application->learning_goals ?? 'No learning goals provided.' }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="section-title"><i class="fas fa-paperclip"></i> Attachment & Discovery</div>
                <div class="row">
                    <div class="col-md-4 info-group">
                        <div class="info-label">How did they hear about us?</div>
                        <div class="info-value" style="background: #f1f5f9; padding: 8px 15px; border-radius: 8px; display: inline-block;">
                            {{ $application->source ?? 'Not specified' }}
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="attachment-box">
                            <div style="display:flex; align-items:center; gap:15px;">
                                <div style="width: 48px; height: 48px; background: rgba(248, 113, 113, 0.1); display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                                    <i class="fas fa-file-pdf" style="font-size:24px; color:#f87171;"></i>
                                </div>
                                <div>
                                    <div style="color:var(--text); font-weight:700; font-size: 15px;">Field Attachment Letter</div>
                                    <div style="font-size:13px; color:#64748b; margin-top: 2px;">Applicant Uploaded Document</div>
                                </div>
                            </div>
                            @if ($application->attachment)
                                <a href="{{ asset('storage/' . $application->attachment) }}" target="_blank" class="btn-download">
                                    <i class="fas fa-external-link-alt"></i> View Document
                                </a>
                            @else
                                <span style="color:#64748b; font-size: 13px; background: #f1f5f9; padding: 6px 12px; border-radius: 6px;">No attachment</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4" style="border-top: 1px solid var(--border); padding-top: 20px; display: flex; justify-content: flex-end;">
                <form method="POST" action="{{ route('admin.field-applications.destroy', $application) }}"
                    onsubmit="return confirm('Delete this application permanently?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn-del">
                        <i class="fas fa-trash"></i> Delete Application
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

