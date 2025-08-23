@extends('layouts.tenant')

@section('header')
    Dashboard
@endsection

@section('content')
    <!-- Dashboard Overview Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Dashboard Overview</h2>
                <p class="text-gray-600">Overview</p>
            </div>
        </div>
        
        <!-- Metrics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6 mb-8">
            <!-- Total Lost Items -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-blue-600">1245</div>
                        <div class="text-sm text-gray-600 font-medium">Total Lost Items</div>
                        <div class="text-xs text-green-600 font-medium">+30.1% from last month</div>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Found Items -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-green-600">852</div>
                        <div class="text-sm text-gray-600 font-medium">Total Found Items</div>
                        <div class="text-xs text-green-600 font-medium">+16.3% from last month</div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Pending Verifications -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-orange-600">42</div>
                        <div class="text-sm text-gray-600 font-medium">Pending Verifications</div>
                        <div class="text-xs text-gray-500">Currently reviewing</div>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Claimed Items -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-green-600">789</div>
                        <div class="text-sm text-gray-600 font-medium">Claimed Items</div>
                        <div class="text-xs text-gray-500">75% of found items claimed</div>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Unclaimed Items -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-red-600">63</div>
                        <div class="text-sm text-gray-600 font-medium">Unclaimed Items</div>
                        <div class="text-xs text-gray-500">Awaiting owner contact</div>
                    </div>
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Users -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-purple-600">234</div>
                        <div class="text-sm text-gray-600 font-medium">Active Users</div>
                        <div class="text-xs text-green-600 font-medium">+5.2% from last month</div>
                    </div>
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Overview Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Monthly Item Activity Chart -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Item Activity</h3>
            <div class="relative" style="height: 300px;">
                <canvas id="monthlyActivityChart"></canvas>
            </div>
        </div>

        <!-- Claim Resolution Rate Chart -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Claim Resolution Rate</h3>
            <div class="relative" style="height: 300px;">
                <canvas id="claimResolutionChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activities</h3>
        <div class="space-y-4">
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">John Doe reported a lost laptop.</p>
                    <p class="text-xs text-gray-500">2 minutes ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Claim #1234 for wallet approved by Admin.</p>
                    <p class="text-xs text-gray-500">1 hour ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">New user registered: Jane Smith.</p>
                    <p class="text-xs text-gray-500">3 hours ago</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Found item 'Keys' processed at Main Lobby.</p>
                    <p class="text-xs text-gray-500">Yesterday</p>
                </div>
            </div>
            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                <div class="flex-1">
                    <p class="text-sm text-gray-900">Pending verification for 'Smartphone' escalated.</p>
                    <p class="text-xs text-gray-500">2 days ago</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Monthly Item Activity Chart
    const monthlyCtx = document.getElementById('monthlyActivityChart').getContext('2d');
    new Chart(monthlyCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Lost Items',
                data: [200, 180, 240, 160, 220, 140, 180, 160, 200, 240, 260, 220],
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }, {
                label: 'Found Items',
                data: [150, 120, 200, 100, 180, 90, 150, 110, 170, 200, 220, 180],
                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                borderColor: 'rgba(34, 197, 94, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 240
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        }
    });

    // Claim Resolution Rate Chart
    const resolutionCtx = document.getElementById('claimResolutionChart').getContext('2d');
    new Chart(resolutionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Approved Claims', 'Pending Claims'],
            datasets: [{
                data: [75, 25],
                backgroundColor: [
                    'rgba(15, 118, 110, 0.8)',
                    'rgba(245, 158, 11, 0.8)'
                ],
                borderColor: [
                    'rgba(15, 118, 110, 1)',
                    'rgba(245, 158, 11, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endpush
