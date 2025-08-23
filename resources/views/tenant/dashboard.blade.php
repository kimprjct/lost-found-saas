
@extends('layouts.tenant')

@section('header')
    Dashboard
@endsection

@section('content')
<div class="h-screen overflow-hidden flex flex-col">
    <!-- Dashboard Overview Section -->
    <div class="flex-shrink-0 mb-6">
        <div class="mb-4">
            <h2 class="text-2xl font-bold text-gray-900">Dashboard Overview</h2>
            <p class="text-sm font-semibold text-gray-600">Overview</p>
        </div>
        
        <!-- Metrics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <!-- Total Lost Items -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-3xl font-bold text-blue-600">1245</div>
                        <div class="text-sm text-gray-600 font-medium">Total Lost Items</div>
                        <div class="text-xs text-green-600">+20.1% from last month</div>
                    </div>
                    <div class="w-8 h-8 bg-blue-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
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
                        <div class="text-xs text-green-600">+18.5% from last month</div>
                    </div>
                    <div class="w-8 h-8 bg-green-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
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
                    <div class="w-8 h-8 bg-orange-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-orange-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
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
                    <div class="w-8 h-8 bg-green-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
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
                    <div class="w-8 h-8 bg-red-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
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
                        <div class="text-xs text-green-600">+5.2% from last month</div>
                    </div>
                    <div class="w-8 h-8 bg-purple-100 rounded flex items-center justify-center">
                        <svg class="w-4 h-4 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Performance Overview Section -->
    <div class="flex-1 grid grid-cols-1 lg:grid-cols-2 gap-4 min-h-0">
        <!-- Monthly Item Activity Chart -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex flex-col">
            <h3 class="text-base font-semibold text-gray-900 mb-2">Monthly Item Activity</h3>
            <div class="flex-1 relative" style="height: 200px;">
                <canvas id="monthlyActivityChart"></canvas>
            </div>
        </div>

        <!-- Claim Resolution Rate Chart -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 flex flex-col">
            <h3 class="text-base font-semibold text-gray-900 mb-2">Claim Resolution Rate</h3>
            <div class="flex-1 relative" style="height: 200px;">
                <canvas id="claimResolutionChart"></canvas>
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
    const activityCtx = document.getElementById('monthlyActivityChart').getContext('2d');
    new Chart(activityCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Lost Items',
                data: [120, 190, 300, 250, 200, 320],
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }, {
                label: 'Found Items',
                data: [80, 150, 200, 180, 150, 240],
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
                    max: 320,
                    ticks: {
                        stepSize: 80
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 10
                    }
                }
            }
        }
    });

    // Claim Resolution Rate Chart
    const resolutionCtx = document.getElementById('claimResolutionChart').getContext('2d');
    new Chart(resolutionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Resolved', 'Pending'],
            datasets: [{
                data: [75, 25],
                backgroundColor: [
                    'rgba(16, 185, 129, 0.8)',   // Teal/Green
                    'rgba(245, 158, 11, 0.8)'    // Yellow/Gold
                ],
                borderColor: [
                    'rgba(16, 185, 129, 1)',
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
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            }
        }
    });
});
</script>
@endpush


