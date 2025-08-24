@extends('layouts.tenant')

@section('header')
    Create Claim Request
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenant.claims.store') }}" class="space-y-4">
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
                <label class="block text-sm text-gray-700 mb-1">Claimant Name</label>
                <input name="claimant_name" class="w-full border rounded px-3 py-2" value="{{ old('claimant_name') }}" required />
                @error('claimant_name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Location Found</label>
                <input name="location_found" class="w-full border rounded px-3 py-2" value="{{ old('location_found') }}" />
                @error('location_found')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Contact Information</label>
                <input name="contact_info" class="w-full border rounded px-3 py-2" value="{{ old('contact_info') }}" />
                @error('contact_info')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenant.claims.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Submit Claim</button>
            </div>
        </form>
    </div>
@endsection
