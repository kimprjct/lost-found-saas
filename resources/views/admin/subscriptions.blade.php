@extends('layouts.admin')

@section('header')
    Subscription & Payment Management
@endsection

@section('content')
    <!-- Payment Stats -->
    <div class="stats-grid mb-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #dcfce7; color: var(--success);">💰</div>
            <div class="stat-value">₱{{ number_format($monthlyRevenue ?? 0) }}</div>
            <div class="stat-label">Monthly Revenue</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #dbeafe; color: var(--primary);">📊</div>
            <div class="stat-value">{{ $activeSubscriptions ?? 0 }}</div>
            <div class="stat-label">Active Subscriptions</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #fef3c7; color: var(--warning);">⚠️</div>
            <div class="stat-value">{{ $expiringSubscriptions ?? 0 }}</div>
            <div class="stat-label">Expiring Soon</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #fee2e2; color: var(--danger);">❌</div>
            <div class="stat-value">{{ $overduePayments ?? 0 }}</div>
            <div class="stat-label">Overdue Payments</div>
        </div>
    </div>

    <!-- Subscription Plans -->
    <div class="card mb-6">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Subscription Plans</h2>
                <button class="btn btn-primary" onclick="showAddPlanModal()">
                    <span style="margin-right: 0.5rem;">➕</span>
                    Add Plan
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Basic Plan -->
                <div class="border rounded-lg p-6 bg-white">
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold">Basic</h3>
                        <div class="text-3xl font-bold text-blue-600">₱2,500</div>
                        <div class="text-gray-500">per month</div>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Up to 100 users
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Basic reporting
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Email support
                        </li>
                    </ul>
                    <div class="flex space-x-2">
                        <button class="btn btn-outline flex-1">Edit</button>
                        <button class="btn btn-primary flex-1">Apply</button>
                    </div>
                </div>

                <!-- Professional Plan -->
                <div class="border-2 border-blue-500 rounded-lg p-6 bg-white relative">
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm">Most Popular</span>
                    </div>
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold">Professional</h3>
                        <div class="text-3xl font-bold text-blue-600">₱5,000</div>
                        <div class="text-gray-500">per month</div>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Up to 500 users
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Advanced analytics
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Priority support
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Custom branding
                        </li>
                    </ul>
                    <div class="flex space-x-2">
                        <button class="btn btn-outline flex-1">Edit</button>
                        <button class="btn btn-primary flex-1">Apply</button>
                    </div>
                </div>

                <!-- Enterprise Plan -->
                <div class="border rounded-lg p-6 bg-white">
                    <div class="text-center mb-4">
                        <h3 class="text-xl font-bold">Enterprise</h3>
                        <div class="text-3xl font-bold text-blue-600">₱10,000</div>
                        <div class="text-gray-500">per month</div>
                    </div>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Unlimited users
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            Full analytics suite
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            24/7 support
                        </li>
                        <li class="flex items-center">
                            <span class="text-green-500 mr-2">✓</span>
                            API access
                        </li>
                    </ul>
                    <div class="flex space-x-2">
                        <button class="btn btn-outline flex-1">Edit</button>
                        <button class="btn btn-primary flex-1">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Active Subscriptions -->
    <div class="card">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Active Subscriptions</h2>
        </div>
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tenant</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Next Payment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($subscriptions) && count($subscriptions) > 0)
                            @foreach($subscriptions as $subscription)
                                <tr>
                                    <td>
                                        <div class="font-medium">{{ $subscription->tenant->name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">{{ $subscription->tenant->admin->email ?? 'N/A' }}</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $subscription->plan_name ?? 'Basic' }}</span>
                                    </td>
                                    <td>
                                        <div class="font-medium">₱{{ number_format($subscription->amount ?? 0) }}</div>
                                        <div class="text-sm text-gray-500">{{ $subscription->billing_cycle ?? 'Monthly' }}</div>
                                    </td>
                                    <td>
                                        @if(($subscription->status ?? '') === 'active')
                                            <span class="badge badge-success">Active</span>
                                        @elseif(($subscription->status ?? '') === 'expired')
                                            <span class="badge badge-danger">Expired</span>
                                        @elseif(($subscription->status ?? '') === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-sm">{{ $subscription->next_payment_date ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500">{{ $subscription->days_until_payment ?? 'N/A' }}</div>
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <button class="btn btn-outline text-xs" onclick="viewSubscription({{ $subscription->id ?? 0 }})">View</button>
                                            <button class="btn btn-success text-xs" onclick="renewSubscription({{ $subscription->id ?? 0 }})">Renew</button>
                                            <button class="btn btn-warning text-xs" onclick="suspendSubscription({{ $subscription->id ?? 0 }})">Suspend</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center py-8 text-gray-500">
                                    <div class="text-4xl mb-2">💳</div>
                                    <div>No active subscriptions</div>
                                    <button class="btn btn-primary mt-4" onclick="showAddSubscriptionModal()">Add First Subscription</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Payment History -->
    <div class="card mt-6">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Payment History</h2>
        </div>
        <div class="card-body">
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Tenant</th>
                            <th>Plan</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($payments) && count($payments) > 0)
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        <div class="text-sm">{{ $payment->payment_date ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500">{{ $payment->created_at ?? 'N/A' }}</div>
                                    </td>
                                    <td>{{ $payment->tenant_name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge badge-info">{{ $payment->plan_name ?? 'Basic' }}</span>
                                    </td>
                                    <td>
                                        <div class="font-medium">₱{{ number_format($payment->amount ?? 0) }}</div>
                                    </td>
                                    <td>{{ $payment->payment_method ?? 'Bank Transfer' }}</td>
                                    <td>
                                        @if(($payment->status ?? '') === 'completed')
                                            <span class="badge badge-success">Completed</span>
                                        @elseif(($payment->status ?? '') === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif(($payment->status ?? '') === 'failed')
                                            <span class="badge badge-danger">Failed</span>
                                        @else
                                            <span class="badge badge-warning">Unknown</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <button class="btn btn-outline text-xs" onclick="viewPayment({{ $payment->id ?? 0 }})">View</button>
                                            @if(($payment->status ?? '') === 'pending')
                                                <button class="btn btn-success text-xs" onclick="approvePayment({{ $payment->id ?? 0 }})">Approve</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center py-8 text-gray-500">
                                    <div class="text-4xl mb-2">📊</div>
                                    <div>No payment history</div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function showAddPlanModal() {
            // Implement add plan modal
            console.log('Showing add plan modal');
        }
        
        function viewSubscription(subscriptionId) {
            // Implement subscription viewing
            console.log('Viewing subscription:', subscriptionId);
        }
        
        function renewSubscription(subscriptionId) {
            if (confirm('Renew this subscription?')) {
                // Implement subscription renewal
                console.log('Renewing subscription:', subscriptionId);
            }
        }
        
        function suspendSubscription(subscriptionId) {
            if (confirm('Suspend this subscription?')) {
                // Implement subscription suspension
                console.log('Suspending subscription:', subscriptionId);
            }
        }
        
        function showAddSubscriptionModal() {
            // Implement add subscription modal
            console.log('Showing add subscription modal');
        }
        
        function viewPayment(paymentId) {
            // Implement payment viewing
            console.log('Viewing payment:', paymentId);
        }
        
        function approvePayment(paymentId) {
            if (confirm('Approve this payment?')) {
                // Implement payment approval
                console.log('Approving payment:', paymentId);
            }
        }
    </script>
@endsection
