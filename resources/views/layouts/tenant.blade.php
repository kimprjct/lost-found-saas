
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - {{ auth()->user()->tenant->name ?? 'Tenant' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-800 text-white">
            <div class="p-4 flex items-center space-x-2">
                @php($tenantLogo = auth()->user()->tenant->logo ?? null)
                @if ($tenantLogo)
                    <img src="{{ asset($tenantLogo) }}" alt="{{ auth()->user()->tenant->name }}" class="h-8 rounded">
                @else
                    <img src="{{ asset('images/foundu-lockup.svg') }}" alt="FoundU" class="h-8 bg-white rounded px-1">
                @endif
            </div>
            <nav class="mt-4">
                <a href="{{ route('tenant.dashboard') }}" class="block px-4 py-2 hover:bg-blue-700">Dashboard</a>
                <a href="{{ route('tenant.lost-items.index') }}" class="block px-4 py-2 hover:bg-blue-700">Lost Items</a>
                <a href="{{ route('tenant.found-items.index') }}" class="block px-4 py-2 hover:bg-blue-700">Found Items</a>
                <a href="{{ route('tenant.claims.index') }}" class="block px-4 py-2 hover:bg-blue-700">Claims</a>
                <a href="{{ route('tenant.staff.index') }}" class="block px-4 py-2 hover:bg-blue-700">Staff</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <header class="bg-white shadow">
                <div class="px-4 py-4 flex justify-between items-center">
                    <h1 class="text-2xl font-semibold text-gray-900">@yield('header')</h1>
                    <div class="flex items-center space-x-3">
                        <span class="text-gray-700 text-sm">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-sm text-red-600 hover:underline">Logout</button>
                        </form>
                    </div>
                </div>
            </header>

            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>