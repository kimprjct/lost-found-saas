
@extends('layouts.admin')

@section('header')
    Dashboard
@endsection

@section('content')
    <!-- Top metrics -->
    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="card stat-card">
            <div class="stat-number">{{ number_format($tenantCount ?? 0) }}</div>
            <div class="stat-label">Total Organizations Registered</div>
        </div>
        <div class="card stat-card">
            <div class="stat-number">{{ number_format($userCount ?? 0) }}</div>
            <div class="stat-label">Active Users (All Orgs)</div>
        </div>
        <div class="card stat-card">
            <div class="stat-number">{{ number_format($itemCount ?? 0) }}</div>
            <div class="stat-label">Total Lost/Found Items</div>
        </div>
        <div class="card stat-card">
            <div class="stat-number">{{ number_format($pendingRequestsCount ?? 0) }}</div>
            <div class="stat-label">Pending Organization Approvals</div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-2 gap-6 mb-8">
        <div class="card">
            <div style="font-weight:700; color: var(--text-primary); margin-bottom: 12px;">Items Reported Over Time</div>
            <svg viewBox="0 0 600 260" width="100%" height="260" role="img" aria-label="Items over time area chart">
                <rect x="0" y="0" width="600" height="260" fill="#ffffff" />
                <g stroke="#e2e8f0">
                    <line x1="50" y1="220" x2="580" y2="220" />
                    <line x1="50" y1="180" x2="580" y2="180" />
                    <line x1="50" y1="140" x2="580" y2="140" />
                    <line x1="50" y1="100" x2="580" y2="100" />
                    <line x1="50" y1="60" x2="580" y2="60" />
                </g>
                <path d="M50 220 L90 200 L130 210 L170 180 L210 170 L250 150 L290 140 L330 120 L370 110 L410 95 L450 80 L490 70 L530 60 L580 50 L580 220 L50 220 Z" fill="rgba(49,130,206,0.25)" stroke="rgba(49,130,206,0.6)" stroke-width="2" />
                <g fill="#718096" font-size="10">
                    <text x="70" y="238">Jan</text>
                    <text x="130" y="238">Feb</text>
                    <text x="190" y="238">Mar</text>
                    <text x="250" y="238">Apr</text>
                    <text x="310" y="238">May</text>
                    <text x="370" y="238">Jun</text>
                    <text x="430" y="238">Jul</text>
                    <text x="490" y="238">Aug</text>
                    <text x="550" y="238">Sep</text>
                </g>
            </svg>
        </div>
        <div class="card">
            <div style="font-weight:700; color: var(--text-primary); margin-bottom: 12px;">Claims Made Over Time</div>
            <svg viewBox="0 0 600 260" width="100%" height="260" role="img" aria-label="Claims over time area chart">
                <rect x="0" y="0" width="600" height="260" fill="#ffffff" />
                <g stroke="#e2e8f0">
                    <line x1="50" y1="220" x2="580" y2="220" />
                    <line x1="50" y1="180" x2="580" y2="180" />
                    <line x1="50" y1="140" x2="580" y2="140" />
                    <line x1="50" y1="100" x2="580" y2="100" />
                    <line x1="50" y1="60" x2="580" y2="60" />
                </g>
                <path d="M50 220 L90 210 L130 205 L170 190 L210 175 L250 160 L290 150 L330 135 L370 120 L410 110 L450 95 L490 80 L530 70 L580 55 L580 220 L50 220 Z" fill="rgba(56,161,105,0.25)" stroke="rgba(56,161,105,0.6)" stroke-width="2" />
                <g fill="#718096" font-size="10">
                    <text x="70" y="238">Jan</text>
                    <text x="130" y="238">Feb</text>
                    <text x="190" y="238">Mar</text>
                    <text x="250" y="238">Apr</text>
                    <text x="310" y="238">May</text>
                    <text x="370" y="238">Jun</text>
                    <text x="430" y="238">Jul</text>
                    <text x="490" y="238">Aug</text>
                    <text x="550" y="238">Sep</text>
                </g>
            </svg>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="card">
        <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom: 12px;">
            <div style="font-weight:700; color: var(--text-primary);">Quick Links</div>
            <div style="color: var(--text-muted); font-size:12px;">Shortcuts</div>
        </div>
        <div class="grid grid-cols-4 gap-6">
            <a href="{{ route('tenants.create') }}" class="btn btn-primary">New Organization</a>
            <a href="{{ route('users.create') }}" class="btn btn-accent">Add User</a>
            <a href="{{ route('admin.registration-requests') }}" class="btn btn-warning">Approvals @if(($pendingRequestsCount ?? 0) > 0)<span class="badge" style="margin-left:8px; background: var(--danger); color: #fff;">{{ $pendingRequestsCount }}</span>@endif</a>
            <a href="{{ route('tenants.index') }}" class="btn btn-outline">View Organizations</a>
        </div>
    </div>
@endsection