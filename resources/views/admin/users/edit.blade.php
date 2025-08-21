@extends('layouts.admin')

@section('header')
    Edit User
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-xl">
        <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm text-gray-700 mb-1">Name</label>
                <input name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $user->name) }}" required />
                @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email', $user->email) }}" required />
                @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Role</label>
                    <select name="role" class="w-full border rounded px-3 py-2" required>
                        <option value="tenant_admin" @selected(old('role',$user->role)==='tenant_admin')>Tenant Admin</option>
                        <option value="staff" @selected(old('role',$user->role)==='staff')>Staff</option>
                        <option value="super_admin" @selected(old('role',$user->role)==='super_admin')>Super Admin</option>
                    </select>
                    @error('role')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
                <div>
                    <label class="block text-sm text-gray-700 mb-1">Tenant</label>
                    <select name="tenant_id" class="w-full border rounded px-3 py-2">
                        <option value="">— None —</option>
                        @foreach ($tenants as $tenant)
                            <option value="{{ $tenant->id }}" @selected(old('tenant_id',$user->tenant_id)==$tenant->id)>{{ $tenant->name }}</option>
                        @endforeach
                    </select>
                    @error('tenant_id')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('users.index') }}" class="px-4 py-2 rounded border">Cancel</a>
                <button class="px-4 py-2 rounded bg-blue-600 text-white">Save</button>
            </div>
        </form>
    </div>
@endsection


