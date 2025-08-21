<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class TenantLayout extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.layouts.tenant-layout');
    }
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <nav>
                <a href="/admin/dashboard">Dashboard</a>
                <a href="/admin/tenants">Tenants</a>
                <a href="/admin/users">Users</a>
                <a href="/admin/settings">Settings</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>