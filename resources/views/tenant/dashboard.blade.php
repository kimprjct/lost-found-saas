
@extends('layouts.tenant')

@section('header')
    Tenant Dashboard
@endsection

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-sm text-gray-500">Lost Items</h3>
            <p class="text-3xl font-bold">{{ $lostCount }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-sm text-gray-500">Found Items</h3>
            <p class="text-3xl font-bold">{{ $foundCount }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-sm text-gray-500">Pending Claims</h3>
            <p class="text-3xl font-bold">0</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Recent Reports</h2>
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($recentReports as $report)
                        <tr>
                            <td class="px-4 py-2">{{ $report->item_name }}</td>
                            <td class="px-4 py-2">
                                <span class="inline-flex items-center px-2 py-1 rounded text-xs {{ $report->status === 'lost' ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">{{ ucfirst($report->status) }}</span>
                            </td>
                            <td class="px-4 py-2">{{ $report->location }}</td>
                            <td class="px-4 py-2 text-gray-500 text-sm">{{ $report->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">No reports yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection


