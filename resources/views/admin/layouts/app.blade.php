<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — {{ $company_setting->company_name ?? 'SkyLink Solutions' }}</title>
    @if($company_setting->favicon)
        <link rel="shortcut icon" href="{{ asset('storage/' . $company_setting->favicon) }}" type="image/x-icon">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --sidebar-w: 260px;
            --primary: #3b82f6;
            --primary-dark: #2563eb;
            --accent: #06b6d4;
            --bg-dark: #0b0f1a;
            --bg-card: rgba(255, 255, 255, 0.05);
            --bg-sidebar: rgba(15, 23, 42, 0.98);
            --border: rgba(255, 255, 255, 0.08);
            --text: #e2e8f0;
            --text-muted: #94a3b8;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            backdrop-filter: blur(20px);
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand .brand-icon {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
            font-weight: 800;
            flex-shrink: 0;
        }

        .sidebar-brand .brand-text {
            line-height: 1.2;
        }

        .sidebar-brand .brand-text strong {
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            display: block;
        }

        .sidebar-brand .brand-text span {
            font-size: 11px;
            color: var(--text-muted);
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--text-muted);
            padding: 10px 10px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            position: relative;
            margin-bottom: 2px;
        }

        .nav-item:hover {
            background: rgba(59, 130, 246, 0.12);
            color: var(--text);
        }

        .nav-item.active {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.25), rgba(6, 182, 212, 0.15));
            color: #fff;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .nav-item .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        .nav-badge {
            margin-left: auto;
            background: var(--danger);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
        }

        .sidebar-footer {
            padding: 16px 12px;
            border-top: 1px solid var(--border);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar-user .avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar-user .user-info {
            flex: 1;
            min-width: 0;
        }

        .sidebar-user .user-name {
            font-size: 13px;
            font-weight: 600;
            color: #fff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user .user-role {
            font-size: 11px;
            color: var(--accent);
        }

        /* Main */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Top bar */
        .topbar {
            height: 64px;
            background: rgba(11, 15, 26, 0.9);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            flex: 1;
        }

        .topbar-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: rgba(255, 255, 255, 0.05);
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .topbar-btn:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.4);
            color: var(--danger);
        }

        .topbar-btn form {
            margin: 0;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 28px;
        }

        /* Alert */
        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #6ee7b7;
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        /* Mobile toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: 1px solid var(--border);
            color: var(--text);
            padding: 8px 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        .sidebar-close {
            display: none;
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 20px;
            cursor: pointer;
            margin-left: auto;
            transition: color 0.2s;
        }

        .sidebar-close:hover {
            color: #fff;
        }

        .sidebar-overlay {
            visibility: hidden;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 90;
            backdrop-filter: blur(2px);
            opacity: 0;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .sidebar-overlay.active {
            visibility: visible;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .sidebar-close {
                display: block;
            }
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s;
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .content {
                padding: 16px;
            }
        }
    </style>
    <style>
        /* DataTables Custom Styling for Dark Theme */
        .dataTables_wrapper { padding: 20px 0; }
        .dataTables_length, .dataTables_filter { margin-bottom: 20px; padding: 0 20px; color: var(--text-muted); font-size: 13px; }
        .dataTables_length select, .dataTables_filter input { background: rgba(255,255,255,0.05); border: 1px solid var(--border); border-radius: 8px; color: #fff; padding: 6px 12px; margin: 0 8px; outline: none; }
        .dataTables_info { padding: 20px; color: var(--text-muted); font-size: 13px; }
        .dataTables_paginate { padding: 20px; }
        .paginate_button { padding: 6px 12px !important; margin: 0 4px !important; border-radius: 8px !important; border: 1px solid var(--border) !important; background: rgba(255,255,255,0.05) !important; color: var(--text-muted) !important; cursor: pointer; transition: all 0.2s; }
        .paginate_button.current { background: var(--primary) !important; border-color: var(--primary) !important; color: #fff !important; }
        .paginate_button:hover:not(.current) { background: rgba(255,255,255,0.1) !important; color: #fff !important; }
        .dataTables_empty { padding: 40px !important; text-align: center; color: var(--text-muted); }
        table.dataTable thead th { border-bottom: 1px solid var(--border) !important; }
        table.dataTable.no-footer { border-bottom: none !important; }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            @if($company_setting->logo)
                <img src="{{ asset('storage/' . $company_setting->logo) }}" alt="Logo" style="height: 40px; width: auto; border-radius: 8px;">
            @else
                <div class="brand-icon">SL</div>
            @endif
            <div class="brand-text">
                <strong>{{ $company_setting->company_name ?? 'SkyLink Solutions' }}</strong>
                <span>Admin Panel</span>
            </div>
            <button class="sidebar-close" onclick="closeSidebar()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-chart-line"></i></span> Dashboard
            </a>
            <a href="{{ route('admin.profile.edit') }}"
                class="nav-item {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-user-circle"></i></span> My Profile
            </a>

            @if (auth()->user()->hasRole('super-admin'))
                <div class="nav-label" style="margin-top:12px;">Website Data</div>
                <a href="{{ route('admin.messages.index') }}"
                    class="nav-item {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-envelope"></i></span> Messages
                    @php $unread = \App\Models\ContactMessage::where('is_read', false)->count(); @endphp
                    @if ($unread > 0)
                        <span class="nav-badge">{{ $unread }}</span>
                    @endif
                </a>
                <a href="{{ route('admin.subscribers.index') }}"
                    class="nav-item {{ request()->routeIs('admin.subscribers*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-users"></i></span> Subscribers
                </a>
                <a href="{{ route('admin.volunteers.index') }}"
                    class="nav-item {{ request()->routeIs('admin.volunteers*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-hands-helping"></i></span> Volunteers
                </a>
                <a href="{{ route('admin.field-applications.index') }}"
                    class="nav-item {{ request()->routeIs('admin.field-applications*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-graduation-cap"></i></span> Field Applications
                </a>
                <a href="{{ route('admin.analytics.index') }}"
                    class="nav-item {{ request()->routeIs('admin.analytics*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-chart-pie"></i></span> Visitor Analytics
                </a>

                <div class="nav-label" style="margin-top:12px;">Home Page</div>
                <a href="{{ route('admin.sliders.index') }}"
                    class="nav-item {{ request()->routeIs('admin.sliders*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-images"></i></span> Sliders
                </a>
                <a href="{{ route('admin.core_values.index') }}"
                    class="nav-item {{ request()->routeIs('admin.core_values*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-gem"></i></span> Core Values
                </a>

                <a href="{{ route('admin.home_service_items.index') }}"
                    class="nav-item {{ request()->routeIs('admin.home_service_items*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-th-list"></i></span> Service Sectors
                </a>
                <a href="{{ route('admin.settings.index', ['tab' => 'home']) }}"
                    class="nav-item {{ (request()->routeIs('admin.settings*') && request('tab') == 'home') || (request()->routeIs('admin.settings*') && !request()->has('tab')) ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-edit"></i></span> Page Content
                </a>

                <div class="nav-label" style="margin-top:12px;">About Us Page</div>
                <a href="{{ route('admin.about_features.index') }}"
                    class="nav-item {{ request()->routeIs('admin.about_features*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-info-circle"></i></span> About Features
                </a>
                <a href="{{ route('admin.settings.index', ['tab' => 'about']) }}"
                    class="nav-item {{ request()->routeIs('admin.settings*') && request('tab') == 'about' ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-edit"></i></span> About Page Content
                </a>

                <div class="nav-label" style="margin-top:12px;">Dynamic Services</div>
                <a href="{{ route('admin.services.index') }}"
                    class="nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-project-diagram"></i></span> Manage Services
                </a>

                <div class="nav-label" style="margin-top:12px;">Content</div>
                <a href="{{ route('admin.announcements.index') }}"
                    class="nav-item {{ request()->routeIs('admin.announcements*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-bullhorn"></i></span> Announcements
                </a>

                <a href="{{ route('admin.news.index') }}"
                    class="nav-item {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-newspaper"></i></span> News Update
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-external-link-alt"></i></span> Project Links
                </a>
                <a href="{{ route('admin.partners.index') }}"
                    class="nav-item {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-handshake"></i></span> Partners
                </a>

                <div class="nav-label" style="margin-top:12px;">Settings</div>
                <a href="{{ route('admin.settings.index', ['tab' => 'contact']) }}"
                    class="nav-item {{ request()->routeIs('admin.settings*') && request('tab') == 'contact' ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-address-book"></i></span> Contact & Socials
                </a>
                <a href="{{ route('admin.users.index') }}"
                    class="nav-item {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-user-shield"></i></span> User Management
                </a>
            @endif
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <div class="user-info">
                    <div class="user-name">{{ auth()->user()->name }}</div>
                    <div class="user-role">
                        {{ auth()->user()->hasRole('super-admin') ? 'Super Admin' : auth()->user()->position ?? 'Staff Member' }}
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main -->
    <div class="main-wrapper">
        <header class="topbar">
            <button class="mobile-toggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="topbar-title">@yield('page-title', 'Dashboard')</h1>
            @yield('topbar-actions')
            <form method="POST" action="{{ route('admin.logout') }}" style="margin:0;">
                @csrf
                <button type="submit" class="topbar-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </header>

        <main class="content">
            @if (session('success'))
                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-error"><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebar-overlay').classList.toggle('active');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('active');
        }

        $(document).ready(function() {
            if ($('.datatable').length > 0) {
                $('.datatable').DataTable({
                    pageLength: 10,
                    lengthMenu: [[5, 10, 50, 100, -1], [5, 10, 50, 100, "All"]],
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Search records...",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        paginate: {
                            first: '<i class="fas fa-angle-double-left"></i>',
                            last: '<i class="fas fa-angle-double-right"></i>',
                            next: '<i class="fas fa-chevron-right"></i>',
                            previous: '<i class="fas fa-chevron-left"></i>'
                        }
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>

</html>
