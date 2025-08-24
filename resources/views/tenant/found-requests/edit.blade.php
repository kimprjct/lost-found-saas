@extends('layouts.tenant')

@section('header')
    Edit Found Request
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenant.found-requests.update', $foundRequest) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm text-gray-700 mb-1">Item Name</label>
                <input name="item_name" class="w-full border rounded px-3 py-2" value="{{ old('item_name', $foundRequest->item_name) }}" required />
                @error('item_name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="4">{{ old('description', $foundRequest->description) }}</textarea>
                @error('description')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Found by</label>
                <input name="found_by" class="w-full border rounded px-3 py-2" value="{{ old('found_by', $foundRequest->found_by) }}" required />
                @error('found_by')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Location Found</label>
                <input name="location_found" class="w-full border rounded px-3 py-2" value="{{ old('location_found', $foundRequest->location_found) }}" />
                @error('location_found')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Contact Information</label>
                <input name="contact_info" class="w-full border rounded px-3 py-2" value="{{ old('contact_info', $foundRequest->contact_info) }}" />
                @error('contact_info')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Date Found</label>
                <input name="date_found" type="date" class="w-full border rounded px-3 py-2" value="{{ old('date_found', $foundRequest->date_found) }}" />
                @error('date_found')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Verification Status</label>
                <select name="verification_status" class="w-full border rounded px-3 py-2">
                    <option value="pending" {{ old('verification_status', $foundRequest->verification_status) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="verified" {{ old('verification_status', $foundRequest->verification_status) == 'verified' ? 'selected' : '' }}>Verified</option>
                    <option value="rejected" {{ old('verification_status', $foundRequest->verification_status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                @error('verification_status')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenant.found-requests.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Update Found Request</button>
            </div>
        </form>
    </div>
@endsection
