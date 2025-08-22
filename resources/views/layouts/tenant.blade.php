
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - {{ auth()->user()->tenant->name ?? 'Tenant' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-50: #f0f9ff;
            --primary-100: #e0f2fe;
            --primary-200: #bae6fd;
            --primary-300: #7dd3fc;
            --primary-400: #38bdf8;
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --primary-700: #0369a1;
            --primary-800: #075985;
            --primary-900: #0c4a6e;
            --primary-950: #082f49;
            
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            
            --success-50: #f0fdf4;
            --success-500: #22c55e;
            --success-600: #16a34a;
            --warning-50: #fffbeb;
            --warning-500: #f59e0b;
            --warning-600: #d97706;
            --danger-50: #fef2f2;
            --danger-500: #ef4444;
            --danger-600: #dc2626;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--primary-50) 100%);
            color: var(--gray-900);
            min-height: 100vh;
        }
        
        .tenant-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, var(--primary-800) 0%, var(--primary-900) 100%);
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
        }
        
        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand img {
            height: 40px;
            width: auto;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .brand-text {
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 20px;
            font-weight: 700;
            color: white;
            letter-spacing: -0.025em;
        }
        
        .brand-subtitle {
            font-size: 12px;
            color: var(--primary-200);
            font-weight: 500;
        }
        
        .nav-menu {
            padding: 16px 12px;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            color: var(--primary-100);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 14px;
            position: relative;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: linear-gradient(90deg, var(--primary-600), var(--primary-500));
            transition: width 0.3s ease;
            z-index: -1;
        }
        
        .nav-link:hover::before {
            width: 100%;
        }
        
        .nav-link:hover {
            color: white;
            transform: translateX(4px);
        }
        
        .nav-link.active {
            background: linear-gradient(135deg, var(--primary-600), var(--primary-500));
            color: white;
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
        }
        
        .nav-link.setup-highlight {
            background: linear-gradient(135deg, var(--warning-500), var(--warning-600));
            color: white;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.02); }
        }
        
        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            position: relative;
        }
        
        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            padding: 20px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 40;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--gray-900);
            letter-spacing: -0.025em;
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
            color: var(--gray-900);
            font-size: 14px;
        }
        
        .user-role {
            font-size: 12px;
            color: var(--gray-500);
            font-weight: 500;
        }
        
        .logout-btn {
            background: var(--danger-500);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.2);
        }
        
        .logout-btn:hover {
            background: var(--danger-600);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
        }
        
        .content-area {
            padding: 32px;
            background: transparent;
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
    </style>
</head>
<body>
    <div class="tenant-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand">
                    @php($tenantLogo = auth()->user()->tenant->logo ?? null)
                    @if ($tenantLogo)
                        <img src="{{ asset('storage/' . $tenantLogo) }}" alt="{{ auth()->user()->tenant->name }}">
                    @else
                        <img src="{{ asset('images/foundu-lockup.svg') }}" alt="FoundU">
                    @endif
                    <div class="brand-text">
                        <div class="brand-name">{{ auth()->user()->tenant->name ?? 'FoundU' }}</div>
                        <div class="brand-subtitle">Tenant Portal</div>
                    </div>
                </div>
            </div>
            
            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="{{ route('tenant.dashboard') }}" class="nav-link {{ request()->routeIs('tenant.dashboard') ? 'active' : '' }}">
                    
                        Dashboard
                    </a>
                </div>
              
                <div class="nav-item">
                    <a href="{{ route('tenant.lost-items.index') }}" class="nav-link {{ request()->routeIs('tenant.lost-items.*') ? 'active' : '' }}">
                        Lost Items
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('tenant.found-items.index') }}" class="nav-link {{ request()->routeIs('tenant.found-items.*') ? 'active' : '' }}">
                        Found Items
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('tenant.claims.index') }}" class="nav-link {{ request()->routeIs('tenant.claims.*') ? 'active' : '' }}">
                        Claims
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('tenant.staff.index') }}" class="nav-link {{ request()->routeIs('tenant.staff.*') ? 'active' : '' }}">
                        Staff
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
                        <div class="user-role">{{ ucfirst(auth()->user()->role) }}</div>
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