@extends('layouts.tenant')

@section('header')
    Claim Requests
@endsection

@section('content')
<div class="space-y-8">
    <!-- Page Title & Action Link -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Claim Requests</h1>
        <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Manage incoming requests</a>
    </div>

    <!-- Filter & Search Claims Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Filter & Search Claims</h2>
        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Search Bar -->
            <div class="flex-1 relative">
                <input type="text" placeholder="Search by Item, Claimant, or ID..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            
            <!-- Filter Dropdowns -->
            <div class="flex flex-col sm:flex-row gap-3">
                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                    <option>All Statuses</option>
                    <option>Pending</option>
                    <option>Approved</option>
                    <option>Rejected</option>
                    <option>Under Review</option>
                </select>
                
                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Accessories</option>
                    <option>Bags</option>
                    <option>Documents</option>
                    <option>Apparel</option>
                    <option>Other</option>
                </select>
                
                <button class="px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm bg-white flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Filter by Date
                </button>
                
                <button class="px-4 py-3 border border-gray-300 rounded-lg hover:bg-gray-50 text-sm bg-white">
                    Clear Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Pending Claim Requests Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Pending Claim Requests</h2>
            <p class="text-sm text-gray-600 mt-1">Review and manage claims submitted by users.</p>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Request ID</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Claimed</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Claimant Info</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Submitted</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CR001</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">💻</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Silver Laptop</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-blue-600 text-xs font-medium">AJ</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Alice Johnson</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-03-15</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800 border border-orange-200">Pending</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">✓</button>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Verify</a>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Approve</button>
                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Reject</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CR002</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">📁</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Brown Leather Wallet</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-200 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-green-600 text-xs font-medium">BW</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Bob Williams</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-03-14</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">Approved</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">✓</button>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Verify</a>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Approve</button>
                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Reject</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CR003</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">🎒</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Blue Backpack</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-purple-200 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-purple-600 text-xs font-medium">CD</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Charlie Davis</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-03-12</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Rejected</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">✓</button>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Verify</a>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Approve</button>
                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Reject</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CR004</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">🔑</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Car Keys</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-pink-200 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-pink-600 text-xs font-medium">DM</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Diana Miller</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-03-10</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800 border border-orange-200">Pending</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">✓</button>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Verify</a>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Approve</button>
                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Reject</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">CR005</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gray-200 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-gray-500 text-xs">🧣</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Red Scarf</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-200 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-yellow-600 text-xs font-medium">EG</span>
                                </div>
                                <div class="text-sm font-medium text-gray-900">Eve Green</div>
                            </div>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-03-08</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">Under Review</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <button class="text-green-600 hover:text-green-900 p-1 rounded hover:bg-green-50">✓</button>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Verify</a>
                                <button class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">Approve</button>
                                <button class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">Reject</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
