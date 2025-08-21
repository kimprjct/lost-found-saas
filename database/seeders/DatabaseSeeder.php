<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdmin = User::query()->firstOrCreate(
            ['email' => 'owner@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'),
                'role' => 'super_admin',
                'tenant_id' => null,
            ]
        );

        $tenant = Tenant::query()->firstOrCreate(
            ['name' => 'SNSU'],
            [
                'domain' => null,
                'logo' => null,
                'address' => 'Sample Address',
            ]
        );

        $tenantAdmin = User::query()->firstOrCreate(
            ['email' => 'admin@snsu.edu'],
            [
                'name' => 'SNSU Admin',
                'password' => Hash::make('password'),
                'role' => 'tenant_admin',
                'tenant_id' => $tenant->id,
            ]
        );
    }
}
