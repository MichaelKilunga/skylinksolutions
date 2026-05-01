@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')

@push('styles')
    <style>
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: transparent;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .stat-card.primary {
            border-bottom: 4px solid #3b82f6;
        }

        .stat-card.primary::before {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), transparent);
        }

        .stat-icon.primary {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        .stat-card.info {
            border-bottom: 4px solid #0ea5e9;
        }

        .stat-card.info::before {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.08), transparent);
        }

        .stat-icon.info {
            background: rgba(14, 165, 233, 0.15);
            color: #0ea5e9;
        }

        .stat-card.success {
            border-bottom: 4px solid #10b981;
        }

        .stat-card.success::before {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), transparent);
        }

        .stat-icon.success {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .stat-card.warning {
            border-bottom: 4px solid #f59e0b;
        }

        .stat-card.warning::before {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.08), transparent);
        }

        .stat-icon.warning {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .stat-card.danger {
            border-bottom: 4px solid #ef4444;
        }

        .stat-card.danger::before {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.08), transparent);
        }

        .stat-icon.danger {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .stat-card.purple {
            border-bottom: 4px solid #8b5cf6;
        }

        .stat-card.purple::before {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.08), transparent);
        }

        .stat-icon.purple {
            background: rgba(139, 92, 246, 0.15);
            color: #8b5cf6;
        }

        .stat-card:hover::before {
            opacity: 1;
        }

        .stat-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .stat-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: transform 0.3s;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-badge {
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
        }

        .stat-badge.danger {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
        }

        .stat-badge.success {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: var(--text);
            line-height: 1;
            margin-bottom: 4px;
            position: relative;
            z-index: 1;
        }

        .stat-label {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .section-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 900px) {
            .section-grid {
                grid-template-columns: 1fr;
            }
        }

        .panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .panel-header {
            padding: 18px 22px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .panel-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
        }

        .panel-link {
            font-size: 12px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .panel-link:hover {
            color: var(--accent);
        }

        .panel-body {
            padding: 0;
        }

        .data-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 22px;
            border-bottom: 1px solid var(--border);
            transition: background 0.15s;
        }

        .data-row:last-child {
            border-bottom: none;
        }

        .data-row:hover {
            background: rgba(255, 255, 255, 0.03);
        }

        .data-avatar {
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
        }

        .data-info {
            flex: 1;
            min-width: 0;
        }

        .data-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .data-sub {
            font-size: 12px;
            color: var(--text-muted);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .data-time {
            font-size: 11px;
            color: var(--text-muted);
            flex-shrink: 0;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dot-red {
            background: var(--danger);
            box-shadow: 0 0 6px rgba(239, 68, 68, 0.6);
        }

        .dot-green {
            background: var(--success);
        }

        .empty-state {
            padding: 40px;
            text-align: center;
            color: var(--text-muted);
            font-size: 14px;
        }

        .empty-state i {
            font-size: 32px;
            margin-bottom: 12px;
            opacity: 0.4;
            display: block;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding: 20px 22px;
        }

        .qa-btn {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .qa-btn:hover {
            background: rgba(59, 130, 246, 0.12);
            border-color: rgba(59, 130, 246, 0.3);
            color: #60a5fa;
        }

        .qa-btn i {
            font-size: 16px;
        }

        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-number {
            animation: countUp 0.5s ease forwards;
        }
    </style>
@endpush

@section('content')
    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="stat-top">
                <div class="stat-icon primary"><i class="fas fa-envelope"></i></div>
                @if ($stats['unread'] > 0)
                    <span class="stat-badge danger">{{ $stats['unread'] }} unread</span>
                @else
                    <span class="stat-badge success">All read</span>
                @endif
            </div>
            <div class="stat-number">{{ $stats['messages'] }}</div>
            <div class="stat-label">Total Messages</div>
        </div>
        <div class="stat-card info">
            <div class="stat-top">
                <div class="stat-icon info"><i class="fas fa-users"></i></div>
            </div>
            <div class="stat-number">{{ $stats['subscribers'] }}</div>
            <div class="stat-label">Subscribers</div>
        </div>
        <div class="stat-card success">
            <div class="stat-top">
                <div class="stat-icon success"><i class="fas fa-hands-helping"></i></div>
            </div>
            <div class="stat-number">{{ $stats['volunteers'] }}</div>
            <div class="stat-label">Internship</div>
        </div>
        <div class="stat-card danger">
            <div class="stat-top">
                <div class="stat-icon danger"><i class="fas fa-bullhorn"></i></div>
            </div>
            <div class="stat-number">{{ $stats['announcements'] }}</div>
            <div class="stat-label">Announcements</div>
        </div>
        <div class="stat-card purple">
            <div class="stat-top">
                <div class="stat-icon purple"><i class="fas fa-cogs"></i></div>
            </div>
            <div class="stat-number">{{ $stats['services'] }}</div>
            <div class="stat-label">Services Listed</div>
        </div>
        <div class="stat-card warning">
            <div class="stat-top">
                <div class="stat-icon warning"><i class="fas fa-chart-line"></i></div>
                <span class="stat-badge success">+{{ $stats['today_visitors'] }} today</span>
            </div>
            <div class="stat-number">{{ $stats['visitors'] }}</div>
            <div class="stat-label">Total Visitors</div>
        </div>
    </div>

    <!-- Data Panels -->
    <div class="section-grid">
        <!-- Recent Visitors -->
        <div class="panel" style="grid-column: span 2;">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-chart-bar" style="color:#a78bfa;margin-right:8px;"></i>Recent
                    Website Visitors</span>
                <a href="{{ route('admin.analytics.index') }}" class="panel-link">Detailed Analytics →</a>
            </div>
            <div class="panel-body" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                @forelse($recentVisitors as $visitor)
                    <div class="data-row">
                        <div class="data-avatar" style="background: linear-gradient(135deg,#6366f1,#a855f7);">
                            <i class="fas fa-user" style="font-size: 12px;"></i>
                        </div>
                        <div class="data-info">
                            <div class="data-name">{{ $visitor->ip_address }}</div>
                            <div class="data-sub">{{ $visitor->country }} • {{ $visitor->device }} •
                                {{ str_replace(url('/'), '', $visitor->url) ?: '/' }}</div>
                        </div>
                        <div class="data-time">{{ $visitor->visited_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="empty-state" style="grid-column: span 2;"><i class="fas fa-chart-line"></i>No visitor data
                        yet</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-envelope" style="color:#60a5fa;margin-right:8px;"></i>Recent
                    Messages</span>
                <a href="{{ route('admin.messages.index') }}" class="panel-link">View all →</a>
            </div>
            <div class="panel-body">
                @forelse($recentMessages as $msg)
                    <div class="data-row">
                        <div class="data-avatar" style="background: linear-gradient(135deg,#3b82f6,#06b6d4);">
                            {{ strtoupper(substr($msg->name, 0, 1)) }}
                        </div>
                        <div class="data-info">
                            <div class="data-name">{{ $msg->name }}</div>
                            <div class="data-sub">{{ Str::limit($msg->subject, 35) }}</div>
                        </div>
                        <div class="dot {{ $msg->is_read ? 'dot-green' : 'dot-red' }}"
                            title="{{ $msg->is_read ? 'Read' : 'Unread' }}"></div>
                        <div class="data-time">{{ $msg->created_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="empty-state"><i class="fas fa-inbox"></i>No messages yet</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Subscribers -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-users" style="color:#22d3ee;margin-right:8px;"></i>Recent
                    Subscribers</span>
                <a href="{{ route('admin.subscribers.index') }}" class="panel-link">View all →</a>
            </div>
            <div class="panel-body">
                @forelse($recentSubscribers as $sub)
                    <div class="data-row">
                        <div class="data-avatar" style="background: linear-gradient(135deg,#06b6d4,#8b5cf6);">
                            {{ strtoupper(substr($sub->email, 0, 1)) }}
                        </div>
                        <div class="data-info">
                            <div class="data-name">{{ $sub->name ?? 'Anonymous' }}</div>
                            <div class="data-sub">{{ $sub->email }}</div>
                        </div>
                        <div class="data-time">{{ $sub->created_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="empty-state"><i class="fas fa-user-slash"></i>No subscribers yet</div>
                @endforelse
            </div>
        </div>

        <!-- Recent Volunteers -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-hands-helping"
                        style="color:#34d399;margin-right:8px;"></i>Recent Volunteers</span>
                <a href="{{ route('admin.volunteers.index') }}" class="panel-link">View all →</a>
            </div>
            <div class="panel-body">
                @forelse($recentVolunteers as $vol)
                    <div class="data-row">
                        <div class="data-avatar" style="background: linear-gradient(135deg,#10b981,#06b6d4);">
                            {{ strtoupper(substr($vol->name, 0, 1)) }}
                        </div>
                        <div class="data-info">
                            <div class="data-name">{{ $vol->name }}</div>
                            <div class="data-sub">{{ $vol->email }}</div>
                        </div>
                        <div class="data-time">{{ $vol->created_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="empty-state"><i class="fas fa-user-friends"></i>No volunteers yet</div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="panel">
            <div class="panel-header">
                <span class="panel-title"><i class="fas fa-bolt" style="color:#fbbf24;margin-right:8px;"></i>Quick
                    Actions</span>
            </div>
            <div class="quick-actions">
                <a href="{{ route('admin.announcements.create') }}" class="qa-btn">
                    <i class="fas fa-plus-circle"></i> New Announcement
                </a>
                <a href="{{ route('admin.services.create') }}" class="qa-btn">
                    <i class="fas fa-plus-circle"></i> Add Service
                </a>
                <a href="{{ route('admin.messages.index') }}" class="qa-btn">
                    <i class="fas fa-envelope-open"></i> View Messages
                </a>
                <a href="{{ route('admin.volunteers.index') }}" class="qa-btn">
                    <i class="fas fa-clipboard-list"></i> View Volunteers
                </a>
            </div>
        </div>
    </div>
@endsection
