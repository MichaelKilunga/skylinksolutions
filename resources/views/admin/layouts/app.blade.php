<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') — {{ $company_setting->company_name ?? 'SkyLink Solutions' }}</title>
    @if ($company_setting->favicon)
        <link rel="shortcut icon" href="{{ asset('storage/' . $company_setting->favicon) }}" type="image/x-icon">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <style>
        :root {
            --sidebar-w: 260px;
            --primary: #007bff;
            --primary-dark: #0056b3;
            --accent: #0dcaf0;
            --bg-dark: #f0f4f8;
            --bg-card: #ffffff;
            --bg-sidebar: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
            --border: #e2e8f0;
            --border-light: rgba(255, 255, 255, 0.15);
            --text: #1e293b;
            --text-muted: #64748b;
            --sidebar-text: #ffffff;
            --sidebar-text-muted: rgba(255, 255, 255, 0.7);
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
            border-right: none;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--border-light);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-brand .brand-icon {
            width: 42px;
            height: 42px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #fff;
            font-weight: 800;
            flex-shrink: 0;
            backdrop-filter: blur(10px);
        }

        .sidebar-brand .brand-text {
            line-height: 1.2;
        }

        .sidebar-brand .brand-text strong {
            font-size: 15px;
            font-weight: 800;
            color: #fff;
            display: block;
        }

        .sidebar-brand .brand-text span {
            font-size: 11px;
            color: var(--sidebar-text-muted);
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
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .nav-label {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: var(--sidebar-text-muted);
            padding: 10px 10px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 10px;
            color: var(--sidebar-text-muted);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            position: relative;
            margin-bottom: 2px;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.1);
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
            border-top: 1px solid var(--border-light);
        }

        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-user .avatar {
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.2);
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
            color: var(--sidebar-text-muted);
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
            background: #ffffff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 28px;
            gap: 16px;
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .topbar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text);
            flex: 1;
        }

        .topbar-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .topbar-btn:hover {
            background: #f8f9fa;
            color: var(--primary);
            border-color: #d1d5db;
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
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #047857;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
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
            color: var(--sidebar-text-muted);
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
        /* DataTables Custom Styling for Light Theme */
        .dataTables_wrapper {
            padding: 20px 0;
        }

        .dataTables_length,
        .dataTables_filter {
            margin-bottom: 20px;
            padding: 0 20px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .dataTables_length select,
        .dataTables_filter input {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text);
            padding: 6px 12px;
            margin: 0 8px;
            outline: none;
        }

        .dataTables_length select:focus,
        .dataTables_filter input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(0, 123, 255, 0.2);
        }

        .dataTables_info {
            padding: 20px;
            color: var(--text-muted);
            font-size: 13px;
        }

        .dataTables_paginate {
            padding: 20px;
        }

        .paginate_button {
            padding: 6px 12px !important;
            margin: 0 4px !important;
            border-radius: 8px !important;
            border: 1px solid var(--border) !important;
            background: #fff !important;
            color: var(--text-muted) !important;
            cursor: pointer;
            transition: all 0.2s;
        }

        .paginate_button.current {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
            color: #fff !important;
        }

        .paginate_button:hover:not(.current) {
            background: #f8f9fa !important;
            color: var(--primary) !important;
        }

        .dataTables_empty {
            padding: 40px !important;
            text-align: center;
            color: var(--text-muted);
        }

        table.dataTable thead th {
            border-bottom: 2px solid var(--border) !important;
            color: var(--text);
        }

        table.dataTable.no-footer {
            border-bottom: 1px solid var(--border) !important;
        }
    </style>
    @stack('styles')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-container .nice-select.swal2-select { display: none !important; }
    </style>
</head>

<body>
    <!-- Overlay for mobile sidebar -->
    <div class="sidebar-overlay" id="sidebar-overlay" onclick="closeSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            @if ($company_setting->logo)
                <div style="background: #ffffff; padding: 6px; border-radius: 50%; width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                    <img src="{{ asset('storage/' . $company_setting->logo) }}" alt="Logo"
                        style="max-width: 100%; max-height: 100%; object-fit: contain;">
                </div>
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
                    <span class="nav-icon"><i class="fas fa-hands-helping"></i></span> Internship
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

                <a href="{{ route('admin.valued_services.index') }}"
                    class="nav-item {{ request()->routeIs('admin.valued_services*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-gem"></i></span> Valued Services
                </a>

                <a href="{{ route('admin.home_service_items.index') }}"
                    class="nav-item {{ request()->routeIs('admin.home_service_items*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-th-list"></i></span> Service Sectors
                </a>
                <a href="{{ route('admin.settings.index', ['tab' => 'home']) }}"
                    class="nav-item {{ (request()->routeIs('admin.settings*') && request('tab') == 'home') || (request()->routeIs('admin.settings*') && !request()->has('tab')) ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-edit"></i></span> Page Content
                </a>
                <a href="{{ route('admin.services.index') }}"
                    class="nav-item {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="fas fa-cogs"></i></span> Our Services
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
                    lengthMenu: [
                        [5, 10, 50, 100, -1],
                        [5, 10, 50, 100, "All"]
                    ],
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
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif

        @if (session('error'))
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
            });
        @endif

        @if (session('status'))
            Toast.fire({
                icon: 'info',
                title: '{{ session('status') }}'
            });
        @endif

        // Global File Size Validation (1MB limit)
        const MAX_FILE_SIZE = 1048576; // 1MB in bytes

        // Block on file selection
        document.addEventListener('change', function(e) {
            if (e.target.tagName === 'INPUT' && e.target.type === 'file') {
                const file = e.target.files[0];
                if (file && file.size > MAX_FILE_SIZE) {
                    Swal.fire({
                        icon: 'error',
                        title: 'File Too Large',
                        html: '<p>The selected file <strong>' + file.name + '</strong> is <strong>' + (file.size / 1048576).toFixed(2) + 'MB</strong>.</p><p>Please upload a file smaller than <strong>1MB</strong>.</p>',
                        confirmButtonColor: '#3b82f6',
                        confirmButtonText: 'OK, choose another file'
                    });
                    e.target.value = ''; // Clear the input
                    e.target.dataset.invalid = 'true';
                } else if (e.target.dataset.invalid) {
                    delete e.target.dataset.invalid;
                }
            }
        });

        // Block form submission if any file input is still oversized
        document.addEventListener('submit', function(e) {
            const fileInputs = e.target.querySelectorAll('input[type="file"]');
            for (let input of fileInputs) {
                const file = input.files[0];
                if (file && file.size > MAX_FILE_SIZE) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'File Too Large',
                        html: '<p>The file <strong>' + file.name + '</strong> is <strong>' + (file.size / 1048576).toFixed(2) + 'MB</strong>.</p><p>Please upload a file smaller than <strong>1MB</strong>.</p>',
                        confirmButtonColor: '#3b82f6',
                        confirmButtonText: 'OK, choose another file'
                    });
                    input.value = '';
                    input.focus();
                    return;
                }
            }
        });
    </script>
</body>

</html>

