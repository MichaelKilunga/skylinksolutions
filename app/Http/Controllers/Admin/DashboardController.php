<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\AdminService;
use App\Models\ContactMessage;
use App\Models\Subscriber;
use App\Models\Volunteer;
use App\Models\Visitor;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'messages'      => ContactMessage::count(),
            'unread'        => ContactMessage::where('is_read', false)->count(),
            'subscribers'   => Subscriber::count(),
            'volunteers'    => Volunteer::count(),
            'announcements' => Announcement::count(),
            'services'      => AdminService::count(),
            'visitors'      => Visitor::count(),
            'today_visitors'=> Visitor::whereDate('visited_at', now()->today())->count(),
        ];

        $recentMessages   = ContactMessage::latest()->take(5)->get();
        $recentSubscribers = Subscriber::latest()->take(5)->get();
        $recentVolunteers  = Volunteer::latest()->take(5)->get();
        $recentVisitors    = Visitor::latest()->take(6)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentSubscribers', 'recentVolunteers', 'recentVisitors'));
    }
}
