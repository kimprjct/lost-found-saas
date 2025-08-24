@extends('layouts.tenant')

@section('header')
    Create User
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('tenant.user-management.store') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-700 mb-1">User ID</label>
                <input name="user_id" class="w-full border rounded px-3 py-2" value="{{ old('user_id') }}" required />
                @error('user_id')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Name</label>
                <input name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required />
                @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Department</label>
                <select name="department" class="w-full border rounded px-3 py-2" required>
                    <option value="">Select Department</option>
                    <option value="COT" {{ old('department') == 'COT' ? 'selected' : '' }}>COT</option>
                    <option value="CEIT" {{ old('department') == 'CEIT' ? 'selected' : '' }}>CEIT</option>
                    <option value="CAS" {{ old('department') == 'CAS' ? 'selected' : '' }}>CAS</option>
                    <option value="CTE" {{ old('department') == 'CTE' ? 'selected' : '' }}>CTE</option>
                </select>
                @error('department')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Email</label>
                <input name="email" type="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required />
                @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Contact Number</label>
                <input name="contact_number" class="w-full border rounded px-3 py-2" value="{{ old('contact_number') }}" required />
                @error('contact_number')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Password</label>
                <input name="password" type="password" class="w-full border rounded px-3 py-2" required />
                @error('password')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Confirm Password</label>
                <input name="password_confirmation" type="password" class="w-full border rounded px-3 py-2" required />
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('tenant.user-management.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Create User</button>
            </div>
        </form>
    </div>
@endsection
