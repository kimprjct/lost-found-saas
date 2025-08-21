
@extends('layouts.tenant')

@section('header')
    Record Found Item
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenant.found-items.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-700 mb-1">Item Name</label>
                <input name="item_name" class="w-full border rounded px-3 py-2" value="{{ old('item_name') }}" required />
                @error('item_name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description') }}</textarea>
                @error('description')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Location</label>
                <input name="location" class="w-full border rounded px-3 py-2" value="{{ old('location') }}" />
                @error('location')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenant.found-items.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Submit</button>
            </div>
        </form>
    </div>
@endsection






