@extends('layouts.admin')

@section('header')
    User Management
@endsection

@section('content')
    <div class="card mb-6">
        <div style="display:flex; justify-content: space-between; align-items:center;">
            <div style="font-weight:600; color: var(--text-primary);">Organization Users</div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User</a>
        </div>
        <form method="GET" action="{{ route('users.index') }}" style="display:flex; gap:12px; margin-top:12px;">
            <input name="q" value="{{ request('q') }}" placeholder="Search by name or email..." style="flex:1; padding:10px 12px; border:1px solid var(--border); border-radius:8px;" />
            <select name="role" style="padding:10px 12px; border:1px solid var(--border); border-radius:8px;">
                <option value="all" {{ request('role','all')==='all' ? 'selected' : '' }}>All Roles</option>
                <option value="tenant_admin" {{ request('role')==='tenant_admin' ? 'selected' : '' }}>Tenant Admin</option>
                <option value="staff" {{ request('role')==='staff' ? 'selected' : '' }}>Staff</option>
            </select>
            <button class="btn btn-outline" type="submit">Filter</button>
        </form>
    </div>
    <div class="card">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->tenant->name ?? '-' }}</td>
                            <td>{{ ucfirst(str_replace('_',' ',$user->role)) }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="badge badge-success">Active</span></td>
                            <td>
                                <div style="display:flex; gap:8px;">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-outline" style="padding:6px 12px; font-size:12px;">Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-warning" style="padding:6px 12px; font-size:12px;">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="margin-top:16px;">{{ $users->links() }}</div>
    </div>
@endsection


