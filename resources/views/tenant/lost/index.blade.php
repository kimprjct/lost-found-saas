
@extends('layouts.tenant')

@section('header')
    Lost Items
@endsection

@section('content')
    <div class="flex justify-between items-center mb-4">
        <form method="GET" class="flex items-center space-x-2">
            <input name="q" value="{{ request('q') }}" placeholder="Search..." class="border rounded px-3 py-2" />
            <button class="px-3 py-2 rounded border">Filter</button>
        </form>
        <a href="{{ route('tenant.lost-items.create') }}" class="px-4 py-2 rounded bg-blue-600 text-white">Report Lost Item</a>
    </div>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Item</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Location</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($items as $item)
                    <tr>
                        <td class="px-4 py-2">{{ $item->item_name }}</td>
                        <td class="px-4 py-2">{{ $item->location }}</td>
                        <td class="px-4 py-2 text-gray-500 text-sm">{{ $item->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 text-right">
                            <a class="text-blue-600 hover:underline" href="{{ route('tenant.lost-items.edit', $item) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No lost items yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $items->links() }}</div>
@endsection







