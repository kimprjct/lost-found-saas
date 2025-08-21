@extends('layouts.admin')

@section('header')
    Tenant Management
@endsection

@section('content')
    <!-- Header Actions -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 700; color: var(--text); margin-bottom: 8px;">Manage Tenants</h1>
            <p style="color: var(--muted2);">Register and manage organizations using FoundU</p>
        </div>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">
            <span>➕</span>
            Register New Tenant
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="card mb-6">
        <div style="display: flex; gap: 16px; align-items: center;">
            <div style="flex: 1;">
                <input type="text" placeholder="Search tenants..." style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
            </div>
            <select style="padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
                <option>All Status</option>
                <option>Active</option>
                <option>Suspended</option>
                <option>Expired</option>
            </select>
            <button class="btn btn-outline">Filter</button>
        </div>
    </div>

    <!-- Tenants Table -->
    <div class="card">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>Domain</th>
                        <th>Admin Contact</th>
                        <th>Subscription</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tenants ?? [] as $tenant)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2)); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                    {{ strtoupper(substr($tenant->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: var(--text);">{{ $tenant->name }}</div>
                                    <div style="font-size: 12px; color: var(--muted2);">{{ $tenant->address ?? 'No address' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $tenant->domain ?? 'N/A' }}</td>
                        <td>
                            <div>
                                <div style="font-weight: 500; color: var(--text);">{{ $tenant->admin_name ?? 'N/A' }}</div>
                                <div style="font-size: 12px; color: var(--muted2);">{{ $tenant->admin_email ?? 'N/A' }}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div style="font-weight: 500; color: var(--text);">Premium Plan</div>
                                <div style="font-size: 12px; color: var(--muted2);">Expires: Dec 31, 2024</div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td>{{ $tenant->created_at->format('M d, Y') }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-outline" style="padding: 6px 12px; font-size: 12px;">View</a>
                                <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-accent" style="padding: 6px 12px; font-size: 12px;">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--muted2); padding: 60px;">
                            <div style="font-size: 48px; margin-bottom: 16px;">🏢</div>
                            <div style="font-size: 18px; margin-bottom: 8px;">No tenants registered yet</div>
                            <div style="font-size: 14px; margin-bottom: 24px;">Get started by registering your first tenant organization</div>
                            <a href="{{ route('tenants.create') }}" class="btn btn-primary">Register First Tenant</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
