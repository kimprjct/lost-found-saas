
@extends('layouts.tenant')

@section('header')
    
@endsection

@section('content')
<div class="space-y-8">
    <!-- Page Title & Action Button -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manage Lost Items</h1>
        <a href="{{ route('tenant.lost-items.create') }}" class="add-new-item-btn">
            + Add New Lost Item
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="search-filters-container">
            <!-- Filter Dropdowns -->
            <select class="lost-items-filter-dropdown">
                <option>All Categories</option>
                <option>Electronics</option>
                <option>Accessories</option>
                <option>Bags</option>
                <option>Containers</option>
                <option>Apparel & Personal</option>
            </select>
            
            <select class="lost-items-filter-dropdown">
                <option>All Status</option>
                <option>Lost</option>
                <option>Pending</option>
                <option>Found</option>
            </select>
            
            <select class="lost-items-filter-dropdown">
                <option>All Locations</option>
                <option>Student Union Lounge</option>
                <option>Library, 3rd Floor</option>
                <option>Gymnasium Locker Room</option>
                <option>Cafeteria Entrance</option>
                <option>Lecture Hall 101</option>
                <option>Admissions Office Waiting Area</option>
                <option>Computer Lab 2B</option>
            </select>
            
            <!-- Search Bar -->
            <div class="lost-items-search-container">
                <input type="text" placeholder="Search lost items..." class="lost-items-search-bar">
                <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Lost Items Overview Table -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="lost-items-overview-title">Lost Items Overview</h2>
        </div>
        
        <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                        <th class="px-6 py-4 text-left table-header w-48">Item</th>
                        <th class="px-6 py-4 text-left table-header w-32">Category</th>
                        <th class="px-6 py-4 text-left table-header w-64">Description</th>
                        <th class="px-6 py-4 text-left table-header w-48">Last Seen Location</th>
                        <th class="px-6 py-4 text-left table-header w-32">Reported Date</th>
                        <th class="px-6 py-4 text-left table-header w-24">Status</th>
                        <th class="px-6 py-4 text-left table-header w-24">Actions</th>
                </tr>
            </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-yellow-600 text-sm">📁</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Black Leather Wallet</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Accessories</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Contains university ID and some cash. No contact information inside.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Student Union Lounge
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-26</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-lost">Lost</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 1) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(1)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-blue-600 text-sm">💻</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Silver MacBook Pro 13"</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Electronics</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Belongs to a Computer Science student. Has a sticker on the back.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Library, 3rd Floor
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-25</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-pending">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 2) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(2)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-pink-600 text-sm">🥤</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Blue Water Bottle</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Containers</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Hydro Flask brand, dark blue with several stickers on it.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Gymnasium Locker Room
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-24</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-lost">Lost</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 3) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(3)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-red-600 text-sm">☂️</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Red Umbrella</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Apparel & Personal</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Compact travel umbrella, bright red color. Easy to identify.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Cafeteria Entrance
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-23</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-lost">Lost</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 4) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(4)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-gray-600 text-sm">🎒</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Black Backpack</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Bags</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Standard size backpack, empty, with one broken zipper.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Lecture Hall 101
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-22</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-found">Found</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 5) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(5)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-purple-600 text-sm">👓</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">Prescription Glasses</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Accessories</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Black frames, aviator style. In a hard grey case.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Admissions Office Waiting Area
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-21</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-lost">Lost</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 6) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(6)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <tr class="table-row">
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <span class="text-green-600 text-sm">💾</span>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <div class="item-name">USB Drive 64GB</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">Electronics</td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Small silver USB drive. Contains important project files.
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">
                            <div class="max-w-xs">
                                Computer Lab 2B
                            </div>
                        </td>
                        <td class="px-6 py-4 table-cell">2023-10-20</td>
                        <td class="px-6 py-4">
                            <span class="status-badge status-lost">Lost</span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium">
                            <div class="action-buttons-container">
                                <a href="{{ route('tenant.lost-items.edit', 7) }}" class="action-edit-btn" title="Edit">
                                    ✏️
                                </a>
                                <button onclick="deleteItem(7)" class="action-delete-btn" title="Delete">
                                    🗑️
                                </button>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-center">
                <nav class="flex items-center space-x-2">
                    <button class="pagination-btn">
                        &lt; Previous
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <button class="pagination-btn">
                        Next &gt;
                    </button>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
function deleteItem(itemId) {
    if (confirm('Are you sure you want to delete this item?')) {
        // Send delete request to server
        fetch(`/tenant/lost-items/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.ok) {
                // Reload the page or remove the row from DOM
                window.location.reload();
            } else {
                alert('Error deleting item. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error deleting item. Please try again.');
        });
    }
}
</script>
@endsection












