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
            background: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
        }
        
        .tenant-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 280px;
            background: white;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 24px;
            border-bottom: 1px solid #e2e8f0;
            background: white;
        }
        
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .brand-icon {
            font-size: 24px;
            color: #3b82f6;
        }
        
        .brand-text {
            display: flex;
            flex-direction: column;
        }
        
        .brand-name {
            font-size: 20px;
            font-weight: 700;
            color: #3b82f6;
            font-style: italic;
        }
        
        .brand-subtitle {
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
        }
        
        .nav-menu {
            padding: 16px 0;
            flex: 1;
        }
        
        .nav-item {
            margin-bottom: 4px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 24px;
            color: #374151;
            text-decoration: none;
            border-radius: 0;
            transition: all 0.2s ease;
            font-weight: 400;
            font-size: 14px;
            margin-bottom: 0;
        }
        
        .nav-link:hover {
            color: #1e293b;
            background: #f9fafb;
        }
        
        .nav-link.active {
            background: #f3f4f6;
            color: #1e293b;
            font-weight: 600;
        }
        
        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #374151;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            min-height: 100vh;
            position: relative;
            font-size: 19px;
        }
        
        .header {
            background: white;
            border-bottom: 1px solid #e2e8f0;
            padding: 10px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 30;
            height: 81px;
        }
        
        .page-title {
            font-size: 35px;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.025em;
            align-items: center;
           
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
            color: #1e293b;
            font-size: 14px;
        }
        
        .user-role {
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
        }
        
        .logout-btn {
            background: #ef4444;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .logout-btn:hover {
            background: #dc2626;
        }
        
        .notification-btn, .settings-btn {
            background: transparent;
            border: 1px solid #d1d5db;
            color: #6b7280;
            padding: 4px 8px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 20px;
        }
        
        .notification-btn:hover, .settings-btn:hover {
            background: #f3f4f6;
            color: #1f2937;
        }
        
        .user-avatar {
            margin-left: 5px;
        }
        
        .avatar-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #3b82f6;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
            cursor: pointer;
        }
        
        .logout-sidebar-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            color: #ef4444;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 14px;
            background: transparent;
            border: none;
            cursor: pointer;
            width: 100%;
            text-align: left;
        }
        
        .logout-sidebar-btn:hover {
            background: #fef2f2;
            color: #dc2626;
        }
        
        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid #e2e8f0;
            margin-top: auto;
        }
        
        .search-input {
            width: 300px;
            padding: 8px 12px 8px 40px;
            border: 1px solid var(--gray-300);
            border-radius: 8px;
            background: white;
            color: var(--gray-900);
            font-size: 14px;
            margin-left: 890px;
            margin-bottom: 36px;
            margin-top: 40px;
            align-items: center;

        }
        
        .search-input:focus {
            outline: none;
            border-color: var(--primary-500);
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.1);
        }
        
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: var(--gray-500);
            margin-left: 1150px;
            margin-top: 1px;
        }
        
        /* Manage Lost Items Specific Styles */
        .add-new-item-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1), 0 2px 4px -1px rgba(59, 130, 246, 0.06);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-left: 1120px;
            margin-top: 0px;
            margin-bottom: 0px;
            align-items: center;
        }
        
        .add-new-item-btn:hover {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.1), 0 4px 6px -2px rgba(59, 130, 246, 0.05);
        }
        
        .add-new-item-btn:active {
            transform: translateY(0);
        }
        
        .action-edit-btn {
            background: transparent;
            color: #6b7280;
            padding: 8px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 16px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
        }
        
        .action-edit-btn:hover {
            background: #f3f4f6;
            color: #374151;
            transform: scale(1.1);
        }
        
        .action-delete-btn {
            background: transparent;
            color: #6b7280;
            padding: 8px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 16px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
        }
        
        .action-delete-btn:hover {
            background: #fef2f2;
            color: #dc2626;
            transform: scale(1.1);
        }
        
        .action-buttons-container {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: flex-start;
        }
        
        .filter-dropdown {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s ease;
            min-width: 150px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
        }
        
        .filter-dropdown:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1);
        }
        
        .filter-dropdown:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .search-bar {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px 12px 44px;
            font-size: 14px;
            color: #374151;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-top: 10px;
           
        }
        
        .search-bar:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1);
        }
        
        .search-bar:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .search-container {
            position: relative;
            display: inline-block;
        }
        
        .search-container .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #6b7280;
          
            
        }
        
        /* Specific classes for Manage Lost Items filters and search */
        /* Unified CSS for all search elements in Manage Lost Items */
        .lost-items-filter-dropdown {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            transition: all 0.2s ease;
            min-width: 150px;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            margin-right: 16px;
        }
        
        .lost-items-filter-dropdown:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1);
        }
        
        .lost-items-filter-dropdown:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .lost-items-search-bar {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 12px 16px 12px 44px;
            font-size: 14px;
            color: #374151;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        
        .lost-items-search-bar:hover {
            border-color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1);
        }
        
        .lost-items-search-bar:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .lost-items-search-container {
            position: relative;
            display: inline-block;
        }
        
        .lost-items-search-container .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            color: #6b7280;
        }
        
        /* Container for all search elements */
        .search-filters-container {
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }
        
        /* Item name styling - smaller font size */
        .item-name {
            font-size: 16px;
            font-weight: 500;
            color:rgb(8, 8, 8);
        
        }
        
        /* Table cell styling for better organization */
        .table-cell {
            font-size: 14px;
            color:rgb(5, 5, 5);
            padding: 15px 18px;
        }
        
        /* Table header styling */
        .table-header {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .pagination-btn {
            background: white;
            border: 2px solid #e5e7eb;
            border-radius: 6px;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
           
        }
        
        .pagination-btn:hover {
            border-color: #3b82f6;
            color: #3b82f6;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.1);
        }
        
        .pagination-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }
        
        .table-row {
            transition: all 0.2s ease;
        }
        
        .table-row:hover {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
          
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px -1px rgba(0, 0, 0, 0.1);
        }
        
        .status-lost {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
            color: #d97706;
            border: 1px solid #fed7aa;
        }
        
        .status-found {
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            color: #16a34a;
            border: 1px solid #bbf7d0;
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
                    <div class="brand-icon">⭐</div>
                    <div class="brand-text">
                        <div class="brand-name">logo</div>
                    </div>
                </div>
            </div>
            
            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="{{ route('tenant.dashboard') }}" class="nav-link {{ request()->routeIs('tenant.dashboard') ? 'active' : '' }}">
                        <div class="nav-icon">📋</div>
                        Dashboard
                    </a>
                </div>
              
                <div class="nav-item">
                    <a href="{{ route('tenant.lost-items.index') }}" class="nav-link {{ request()->routeIs('tenant.lost-items.*') ? 'active' : '' }}">
                        <div class="nav-icon">📦</div>
                        Manage Lost Items
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('tenant.found-items.index') }}" class="nav-link {{ request()->routeIs('tenant.found-items.*') ? 'active' : '' }}">
                        <div class="nav-icon">📦</div>
                        Manage Found Items
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('tenant.claims.index') }}" class="nav-link {{ request()->routeIs('tenant.claims.*') ? 'active' : '' }}">
                        <div class="nav-icon">🔔</div>
                        Claim Requests
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon">🔍</div>
                        Found It Requests
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('tenant.staff.index') }}" class="nav-link {{ request()->routeIs('tenant.staff.*') ? 'active' : '' }}">
                        <div class="nav-icon">👥</div>
                        User Management
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon">🕒</div>
                        Claim History
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <div class="nav-icon">📊</div>
                        Reports & Analytics
                    </a>
                </div>
            </nav>
            
            <!-- Logout Button -->
            <div class="sidebar-footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-sidebar-btn">
                        <div class="nav-icon">🚪</div>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <div class="flex items-center space-x-4">
                <h1 class="page-title">@yield('header')</h1>
                    <div class="relative">
                        <input type="text" placeholder="Search items or users..." class="search-input">
                        <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="user-menu">
                    <button class="notification-btn" title="Notifications">🔔</button>
                    <button class="settings-btn" title="Settings">⚙️</button>
                    <div class="user-avatar">
                        <div class="avatar-circle">👤</div>
                    </div>
                </div>
            </header>

            <div class="content-area">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')
    
    <script>
    function logout() {
        if (confirm('Are you sure you want to logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
    </script>
</body>
</html>