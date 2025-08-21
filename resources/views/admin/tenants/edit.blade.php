
@extends('layouts.admin')

@section('header')
    Edit Tenant
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenants.update', $tenant) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm text-gray-700 mb-1">Name</label>
                <input name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $tenant->name) }}" required />
                @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Domain (optional)</label>
                <input name="domain" class="w-full border rounded px-3 py-2" value="{{ old('domain', $tenant->domain) }}" />
                @error('domain')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Address (optional)</label>
                <textarea name="address" class="w-full border rounded px-3 py-2" rows="3">{{ old('address', $tenant->address) }}</textarea>
                @error('address')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenants.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Save</button>
            </div>
        </form>
    </div>
@endsection


