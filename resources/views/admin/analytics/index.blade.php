@extends('admin.layouts.app')
@section('title', 'Analytics')
@section('page-title', 'Visitor Analytics')

@push('styles')
    <style>
        .analytics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .ana-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .ana-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: transparent;
        }

        .ana-card::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .ana-card.primary {
            border-bottom: 4px solid #3b82f6;
        }

        .ana-card.primary::before {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.08), transparent);
        }

        .ana-icon.primary {
            background: rgba(59, 130, 246, 0.15);
            color: #3b82f6;
        }

        .ana-card.success {
            border-bottom: 4px solid #10b981;
        }

        .ana-card.success::before {
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.08), transparent);
        }

        .ana-icon.success {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
        }

        .ana-card.info {
            border-bottom: 4px solid #0ea5e9;
        }

        .ana-card.info::before {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.08), transparent);
        }

        .ana-icon.info {
            background: rgba(14, 165, 233, 0.15);
            color: #0ea5e9;
        }

        .ana-card.warning {
            border-bottom: 4px solid #f59e0b;
        }

        .ana-card.warning::before {
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.08), transparent);
        }

        .ana-icon.warning {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
        }

        .ana-card:hover::before {
            opacity: 1;
        }

        .ana-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 16px;
            position: relative;
            z-index: 1;
        }

        .ana-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            transition: transform 0.3s;
        }

        .ana-card:hover .ana-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .ana-value {
            font-size: 32px;
            font-weight: 800;
            color: var(--text);
            line-height: 1;
            margin-bottom: 4px;
            position: relative;
            z-index: 1;
        }

        .ana-label {
            font-size: 14px;
            color: var(--text-muted);
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .charts-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 32px;
        }

        @media (max-width: 900px) {
            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        .chart-panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
        }

        .chart-title {
            font-size: 15px;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .list-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }

        .list-item:last-child {
            border-bottom: none;
        }

        .list-label {
            font-size: 14px;
            color: var(--text);
        }

        .list-value {
            font-size: 14px;
            font-weight: 700;
            color: var(--primary);
        }

        .table-panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.02);
            color: var(--text-muted);
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            font-size: 14px;
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 700;
        }

        .badge-blue {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
        }

        .badge-purple {
            background: rgba(139, 92, 246, 0.15);
            color: #a78bfa;
        }

        .badge-green {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
        }

        .country-flag {
            width: 20px;
            height: 14px;
            object-fit: cover;
            border-radius: 2px;
            margin-right: 8px;
            vertical-align: middle;
        }

        .pagination-box {
            padding: 20px;
            border-top: 1px solid var(--border);
        }
    </style>
@endpush

@section('content')
    <div class="analytics-grid">
        <div class="ana-card primary">
            <div class="ana-top">
                <div class="ana-icon primary"><i class="fas fa-users"></i></div>
            </div>
            <div class="ana-value">{{ number_format($stats['total']) }}</div>
            <div class="ana-label">Total Visitors</div>
        </div>
        <div class="ana-card success">
            <div class="ana-top">
                <div class="ana-icon success"><i class="fas fa-user-clock"></i></div>
            </div>
            <div class="ana-value">{{ number_format($stats['today']) }}</div>
            <div class="ana-label">Visitors Today</div>
        </div>
        <div class="ana-card info">
            <div class="ana-top">
                <div class="ana-icon info"><i class="fas fa-fingerprint"></i></div>
            </div>
            <div class="ana-value">{{ number_format($stats['unique_ips']) }}</div>
            <div class="ana-label">Unique IPs</div>
        </div>
        <div class="ana-card warning">
            <div class="ana-top">
                <div class="ana-icon warning"><i class="fas fa-chart-line"></i></div>
            </div>
            <div class="ana-value">{{ $stats['avg_per_day'] }}</div>
            <div class="ana-label">Avg. Visitors / Day</div>
        </div>
    </div>

    <div class="charts-grid">
        <div class="chart-panel">
            <div class="chart-title"><i class="fas fa-globe" style="color:#60a5fa;"></i> Top Countries</div>
            <div class="list-container">
                @foreach ($topCountries as $country)
                    <div class="list-item">
                        <span class="list-label">{{ $country->country ?: 'Unknown' }}</span>
                        <span class="list-value">{{ $country->count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="chart-panel">
            <div class="chart-title"><i class="fas fa-laptop" style="color:#a78bfa;"></i> Device Distribution</div>
            <div class="list-container">
                @foreach ($topDevices as $device)
                    <div class="list-item">
                        <span class="list-label">{{ $device->device ?: 'Desktop' }}</span>
                        <span class="list-value">{{ $device->count }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="table-panel">
        <div class="panel-header" style="padding: 20px; border-bottom: 1px solid var(--border);">
            <h3 style="font-size: 16px; font-weight: 700; color: var(--text);">Recent Visitor Logs</h3>
        </div>
        <div class="table-container">
            <table class="datatable">
                <thead>
                    <tr>
                        <th>Visitor Info</th>
                        <th>Device / OS</th>
                        <th>Location</th>
                        <th>Page Visited</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitors as $visitor)
                        <tr>
                            <td>
                                <div style="font-weight: 600;">{{ $visitor->ip_address }}</div>
                                <div style="font-size: 11px; color: var(--text-muted);">
                                    {{ Str::limit($visitor->user_agent, 40) }}</div>
                            </td>
                            <td>
                                <span class="badge badge-blue badge-primary">{{ $visitor->device }}</span>
                                <div style="font-size: 12px; margin-top: 4px; color: var(--text-muted);">
                                    {{ $visitor->os }} / {{ $visitor->browser }}</div>
                            </td>
                            <td>
                                <div>{{ $visitor->country }}</div>
                                <div style="font-size: 12px; color: var(--text-muted);">{{ $visitor->city }}</div>
                            </td>
                            <td>
                                <div style="font-size: 13px; color: var(--primary); max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"
                                    title="{{ $visitor->url }}">
                                    {{ str_replace(url('/'), '', $visitor->url) ?: '/' }}
                                </div>
                            </td>
                            <td>
                                <div style="font-weight: 500;">{{ $visitor->visited_at->diffForHumans() }}</div>
                                <div style="font-size: 11px; color: var(--text-muted);">
                                    {{ $visitor->visited_at->format('M d, H:i') }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
