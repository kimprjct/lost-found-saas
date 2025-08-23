
@extends('layouts.tenant')

@section('header')
    Manage Found Items
@endsection

@section('content')
<div class="space-y-8">
    <!-- Page Title & Action Button -->
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Manage Found Items</h1>
        <a href="{{ route('tenant.found-items.create') }}" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium shadow-sm">
            + Add New Item
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Search Bar -->
            <div class="flex-1 relative">
                <input type="text" placeholder="Search items..." class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
               
                </svg>
            </div>
            
            <!-- Filter Dropdowns -->
            <div class="flex flex-col sm:flex-row gap-3">
                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                    <option>All Categories</option>
                    <option>Electronics</option>
                    <option>Accessories</option>
                    <option>Bags</option>
                    <option>Documents</option>
                    <option>Apparel</option>
                    <option>Other</option>
                </select>
                
                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white">
                    <option>All Locations</option>
                    <option>Library</option>
                    <option>Cafeteria</option>
                    <option>Admin Office</option>
                    <option>Main Entrance</option>
                    <option>Gym</option>
                    <option>Auditorium</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Found Items Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location Found</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Found</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-8 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Blue Backpack</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Apparel</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Library</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-20</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-500">Pending</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Silver Laptop</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Electronics</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Cafeteria</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-18</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Unclaimed</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Wallet (ID: John Doe)</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Documents</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Admin Office</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-15</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Unclaimed</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Black Umbrella</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Accessories</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Main Entrance</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-12</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Unclaimed</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Keys with Tag</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Accessories</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Gym</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-10</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-500">Pending</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Red Water Bottle</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Other</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Auditorium</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-08</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">Unclaimed</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50">
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Textbook: Advanced Calculus</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Documents</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-900">Library</td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm text-gray-500">2024-07-05</td>
                        <td class="px-8 py-4 whitespace-nowrap">
                            <span class="text-sm text-gray-500">Pending</span>
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-4">
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">✏️</button>
                                <button class="text-gray-600 hover:text-gray-900 p-2 rounded hover:bg-gray-50 text-lg">🗑️</button>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection







