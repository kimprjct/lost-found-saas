
@extends('layouts.admin')

@section('header')
    Tenant Details
@endsection

@section('content')
    <div class="bg-white rounded-lg shadow p-6 max-w-3xl">
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <dt class="text-sm text-gray-500">Name</dt>
                <dd class="text-lg">{{ $tenant->name }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Domain</dt>
                <dd class="text-lg">{{ $tenant->domain ?? '-' }}</dd>
            </div>
            <div class="md:col-span-2">
                <dt class="text-sm text-gray-500">Address</dt>
                <dd class="text-lg">{{ $tenant->address ?? '-' }}</dd>
            </div>
        </dl>
        @if (session('credentials'))
            <div class="mt-6 bg-blue-50 border border-blue-200 text-blue-800 rounded p-4">
                <div class="font-semibold">Tenant Admin Credentials (copy now)</div>
                <div class="text-sm">Email: <span class="font-mono">{{ session('credentials.email') }}</span></div>
                <div class="text-sm">Password: <span class="font-mono">{{ session('credentials.password') }}</span></div>
            </div>
        @endif
        <div class="mt-6">
            <a href="{{ route('tenants.edit', $tenant) }}" class="px-4 py-2 rounded bg-blue-600 text-white">Edit</a>
            <a href="{{ route('tenants.index') }}" class="px-4 py-2 rounded border ml-2">Back</a>
        </div>
    </div>
@endsection
