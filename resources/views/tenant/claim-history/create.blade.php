@extends('layouts.tenant')

@section('header')
    Create Claim History
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenant.claim-history.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-700 mb-1">Claim ID</label>
                <input name="claim_id" class="w-full border rounded px-3 py-2" value="{{ old('claim_id') }}" required />
                @error('claim_id')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Item Name</label>
                <input name="item_name" class="w-full border rounded px-3 py-2" value="{{ old('item_name') }}" required />
                @error('item_name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Claimant</label>
                <input name="claimant" class="w-full border rounded px-3 py-2" value="{{ old('claimant') }}" required />
                @error('claimant')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Claim Date</label>
                <input name="claim_date" type="date" class="w-full border rounded px-3 py-2" value="{{ old('claim_date') }}" required />
                @error('claim_date')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Claim Status</label>
                <select name="claim_status" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select Status</option>
                    <option value="completed" {{ old('claim_status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="pending" {{ old('claim_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="cancelled" {{ old('claim_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
                @error('claim_status')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenant.claim-history.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Create Claim History</button>
            </div>
        </form>
    </div>
@endsection
