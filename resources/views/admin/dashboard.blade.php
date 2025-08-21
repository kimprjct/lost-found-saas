
@extends('layouts.admin')

@section('header')
    Dashboard
@endsection

@section('content')
    <!-- Stats Overview -->
    <div class="grid grid-cols-1 grid-cols-2 grid-cols-4 gap-6 mb-8">
        <div class="card stat-card">
            <div class="stat-number">{{ $tenantCount ?? 0 }}</div>
            <div class="stat-label">Total Tenants</div>
        </div>
        
        <div class="card stat-card">
            <div class="stat-number">{{ $userCount ?? 0 }}</div>
            <div class="stat-label">Total Users</div>
        </div>
        
        <div class="card stat-card">
            <div class="stat-number">{{ $itemCount ?? 0 }}</div>
            <div class="stat-label">Total Items</div>
        </div>
        
        <div class="card stat-card">
            <div class="stat-number">{{ $claimsToday ?? 0 }}</div>
            <div class="stat-label">Claims Today</div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card mb-8">
        <h2 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: var(--text);">Quick Actions</h2>
        <div class="grid grid-cols-1 grid-cols-3 gap-4">
            <a href="{{ route('tenants.create') }}" class="btn btn-primary">
                <span>➕</span>
                Register New Tenant
            </a>
            <a href="{{ route('users.create') }}" class="btn btn-accent">
                <span>👤</span>
                Add Tenant Admin
            </a>
            <a href="{{ route('admin.registration-requests') }}" class="btn btn-warning">
                <span>📝</span>
                View Registration Requests
                @if($pendingRequestsCount > 0)
                    <span class="badge" style="background: #e53e3e; color: white; padding: 2px 6px; border-radius: 10px; font-size: 11px; margin-left: 8px;">{{ $pendingRequestsCount }}</span>
                @endif
            </a>
        </div>
    </div>

    <!-- Recent Tenants -->
    <div class="card mb-8">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="font-size: 20px; font-weight: 700; color: var(--text);">Recent Tenants</h2>
            <a href="{{ route('tenants.index') }}" class="btn btn-outline">View All</a>
        </div>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>Domain</th>
                        <th>Admin</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentTenants ?? [] as $tenant)
                    <tr>
                        <td style="font-weight: 600; color: var(--text);">{{ $tenant->name }}</td>
                        <td>{{ $tenant->domain ?? 'N/A' }}</td>
                        <td>{{ $tenant->admin_name ?? 'N/A' }}</td>
                        <td>
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td>{{ $tenant->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-outline" style="padding: 4px 8px; font-size: 12px;">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--muted2); padding: 40px;">
                            No tenants registered yet. 
                            <a href="{{ route('tenants.create') }}" style="color: var(--brand); text-decoration: none; margin-left: 8px;">Register your first tenant</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Subscription Overview -->
    <div class="card mb-8">
        <h2 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: var(--text);">Subscription Overview</h2>
        <div class="grid grid-cols-1 grid-cols-3 gap-6">
            <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; color: var(--accent); margin-bottom: 8px;">
                    {{ $activeSubscriptions ?? 0 }}
                </div>
                <div style="color: var(--muted2); font-size: 14px;">Active Subscriptions</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; color: #f59e0b; margin-bottom: 8px;">
                    {{ $expiringSoon ?? 0 }}
                </div>
                <div style="color: var(--muted2); font-size: 14px;">Expiring Soon</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 24px; font-weight: 700; color: #f56565; margin-bottom: 8px;">
                    {{ $overdue ?? 0 }}
                </div>
                <div style="color: var(--muted2); font-size: 14px;">Overdue Payments</div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card">
        <h2 style="font-size: 20px; font-weight: 700; margin-bottom: 20px; color: var(--text);">Recent Activity</h2>
        <div style="color: var(--muted2); text-align: center; padding: 40px;">
            <div style="font-size: 48px; margin-bottom: 16px;">📊</div>
            <div style="font-size: 16px; margin-bottom: 8px;">No recent activity</div>
            <div style="font-size: 14px;">Activity will appear here as tenants and users interact with the system</div>
        </div>
    </div>
@endsection