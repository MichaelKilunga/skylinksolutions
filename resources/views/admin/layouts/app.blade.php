<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — SkyLink Solutions</title>
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
    @stack('styles')
</head>

<body>
    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">SL</div>
            <div class="brand-text">
                <strong>SkyLink Solutions</strong>
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

                <div class="nav-label" style="margin-top:12px;">Content</div>
                <a href="{{ route('admin.announcements.index') }}"
                    class="nav-item {{ request()->routeIs('admin.announcements*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-bullhorn"></i></span> Announcements
                </a>
                {{-- <a href="{{ route('admin.services.index') }}" class="nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <span class="nav-icon"><i class="fas fa-cogs"></i></span> Services
            </a> --}}
                <a href="{{ route('admin.news.index') }}"
                    class="nav-item {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-newspaper"></i></span> News Update
                </a>
                <a href="{{ route('admin.projects.index') }}"
                    class="nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-external-link-alt"></i></span> Project Links
                </a>

                <div class="nav-label" style="margin-top:12px;">Settings</div>
                <a href="{{ route('admin.settings.index') }}"
                    class="nav-item {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-sliders-h"></i></span> Site Settings
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
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebar-overlay').classList.toggle('active');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('active');
        }
    </script>
    @stack('scripts')
</body>

</html>
