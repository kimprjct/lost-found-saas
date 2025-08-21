
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin</title>
    <style>
        :root {
            --bg-primary: #f5f7fa;
            --bg-secondary: #ffffff;
            --text-primary: #1a202c;
            --text-secondary: #4a5568;
            --text-muted: #718096;
            --border: #e2e8f0;
            --border-light: #f1f5f9;
            --accent: #3182ce;
            --accent-hover: #2b6cb0;
            --success: #38a169;
            --warning: #d69e2e;
            --danger: #e53e3e;
            --sidebar-bg: #1a202c;
            --sidebar-text: #e2e8f0;
            --sidebar-hover: #2d3748;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            background: var(--bg-primary);
            color: var(--text-primary);
            min-height: 100vh;
        }
        
        .admin-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: var(--sidebar-bg);
            padding: 24px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }
        
        .sidebar-header {
            padding: 0 24px 24px;
            border-bottom: 1px solid #2d3748;
            margin-bottom: 24px;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand img {
            height: 40px;
            width: auto;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: var(--sidebar-text);
        }
        
        .brand-subtitle {
            font-size: 12px;
            color: #a0aec0;
        }
        
        .nav-menu {
            padding: 0 16px;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--sidebar-text);
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
        }
        
        .nav-link:hover {
            background: var(--sidebar-hover);
            color: white;
        }
        
        .nav-link.active {
            background: var(--accent);
            color: white;
        }
        
        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            position: relative;
            background: var(--bg-primary);
        }
        
        .header {
            background: var(--bg-secondary);
            border-bottom: 1px solid var(--border);
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-primary);
        }
        
        .user-menu {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            color: var(--text-primary);
        }
        
        .user-role {
            font-size: 12px;
            color: var(--text-muted);
        }
        
        .logout-btn {
            background: var(--danger);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background: #c53030;
        }
        
        .content-area {
            padding: 32px;
            background: var(--bg-primary);
        }
        
        /* Cards */
        .card {
            background: var(--bg-secondary);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        
        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        
        .btn-primary {
            background: var(--accent);
            color: white;
        }
        
        .btn-primary:hover {
            background: var(--accent-hover);
        }
        
        .btn-accent {
            background: var(--success);
            color: white;
        }
        
        .btn-accent:hover {
            background: #2f855a;
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-secondary);
        }
        
        .btn-outline:hover {
            background: var(--bg-secondary);
            border-color: var(--accent);
            color: var(--accent);
        }
        
        .btn-warning {
            background: #d69e2e;
            color: white;
            border: none;
        }
        
        .btn-warning:hover {
            background: #b7791f;
            transform: translateY(-2px);
        }
        
        /* Grid */
        .grid {
            display: grid;
            gap: 24px;
        }
        
        .grid-cols-1 { grid-template-columns: 1fr; }
        .grid-cols-2 { grid-template-columns: repeat(2, 1fr); }
        .grid-cols-3 { grid-template-columns: repeat(3, 1fr); }
        .grid-cols-4 { grid-template-columns: repeat(4, 1fr); }
        
        @media (max-width: 768px) {
            .grid-cols-2, .grid-cols-3, .grid-cols-4 {
                grid-template-columns: 1fr;
            }
        }
        
        /* Stats */
        .stat-card {
            text-align: center;
            position: relative;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: 800;
            color: var(--accent);
            margin-bottom: 8px;
        }
        
        .stat-label {
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
        }
        
        /* Tables */
        .table-container {
            overflow-x: auto;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .table th {
            background: var(--bg-secondary);
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: var(--text-primary);
            border-bottom: 1px solid var(--border);
        }
        
        .table td {
            padding: 16px;
            border-bottom: 1px solid var(--border-light);
            color: var(--text-secondary);
        }
        
        .table tr:hover {
            background: var(--bg-primary);
        }
        
        /* Status badges */
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-success {
            background: rgba(56, 161, 105, 0.1);
            color: var(--success);
        }
        
        .badge-warning {
            background: rgba(214, 158, 46, 0.1);
            color: var(--warning);
        }
        
        .badge-danger {
            background: rgba(229, 62, 62, 0.1);
            color: var(--danger);
        }
        
        /* Form elements */
        input, select, textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s ease;
            background: var(--bg-secondary);
        }
        
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.open {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        /* Utilities */
        .mb-6 { margin-bottom: 24px; }
        .mb-8 { margin-bottom: 32px; }
    </style>
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand">
                    <img src="/images/foundulogo.png" alt="FoundU">
                    <div class="brand-text">
                        <div class="brand-name">FoundU</div>
                        <div class="brand-subtitle">Admin Panel</div>
                    </div>
                </div>
            </div>
            
            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <div class="nav-icon">📊</div>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('tenants.index') }}" class="nav-link {{ request()->routeIs('tenants.*') ? 'active' : '' }}">
                        <div class="nav-icon">🏢</div>
                        Tenants
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <div class="nav-icon">👥</div>
                        Users
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.registration-requests') }}" class="nav-link {{ request()->routeIs('admin.registration-requests*') ? 'active' : '' }}">
                        <div class="nav-icon">📝</div>
                        Registration Requests
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <div class="nav-icon">⚙️</div>
                        Settings
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1 class="page-title">@yield('header')</h1>
                <div class="user-menu">
                    <div class="user-info">
                        <div class="user-name">{{ auth()->user()->name }}</div>
                        <div class="user-role">Super Admin</div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </header>

            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>