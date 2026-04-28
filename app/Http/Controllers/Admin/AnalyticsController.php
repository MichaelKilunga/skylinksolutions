<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Overall Stats
        $totalVisitors = Visitor::count();
        $todayVisitors = Visitor::whereDate('visited_at', now()->today())->count();
        
        // Stats for cards
        $stats = [
            'total' => $totalVisitors,
            'today' => $todayVisitors,
            'unique_ips' => Visitor::distinct('ip_address')->count(),
            'avg_per_day' => round($totalVisitors / max(1, Visitor::select(DB::raw('count(distinct date(visited_at)) as days'))->first()->days ?? 1), 1)
        ];

        // Logs
        $visitors = Visitor::latest()->get();

        // Grouped Stats for Charts (Top Countries, Devices, etc.)
        $topCountries = Visitor::select('country', DB::raw('count(*) as count'))
            ->groupBy('country')
            ->orderByDesc('count')
            ->take(5)
            ->get();

        $topDevices = Visitor::select('device', DB::raw('count(*) as count'))
            ->groupBy('device')
            ->orderByDesc('count')
            ->get();

        $topPages = Visitor::select('url', DB::raw('count(*) as count'))
            ->groupBy('url')
            ->orderByDesc('count')
            ->take(10)
            ->get();

        return view('admin.analytics.index', compact('visitors', 'stats', 'topCountries', 'topDevices', 'topPages'));
    }
}
