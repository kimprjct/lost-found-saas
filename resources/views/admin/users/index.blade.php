@extends('layouts.admin')

@section('header')
    Users
@endsection

@section('content')
    <div class="mb-4 flex justify-between items-center">
        <div class="text-sm text-gray-600">Manage tenant admins and staff</div>
        <a href="{{ route('users.create') }}" class="px-4 py-2 rounded bg-blue-600 text-white">New User</a>
    </div>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tenant</th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">{{ ucfirst(str_replace('_',' ',$user->role)) }}</td>
                        <td class="px-4 py-2">{{ $user->tenant->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-right space-x-2">
                            <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this user?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
@endsection


