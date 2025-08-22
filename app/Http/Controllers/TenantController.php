<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    // Tenant dashboard (for tenant users)
    public function dashboard()
    {
        $user = Auth::user();
        $tenantId = $user->tenant_id;
        $tenant = $user->tenant;

        // Redirect to setup if not completed
        if (!$tenant->setup_completed) {
            return redirect()->route('tenant.setup.show');
        }

        $lostCount = Report::where('tenant_id', $tenantId)->where('status', 'lost')->count();
        $foundCount = Report::where('tenant_id', $tenantId)->where('status', 'found')->count();
        $recentReports = Report::where('tenant_id', $tenantId)->latest()->limit(10)->get();

        return view('tenant.dashboard', [
            'lostCount' => $lostCount,
            'foundCount' => $foundCount,
            'recentReports' => $recentReports,
        ]);
    }

    // Admin: list tenants
    public function index()
    {
        $tenants = Tenant::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tenants.index', compact('tenants'));
    }

    // Admin: create tenant form
    public function create()
    {
        return view('admin.tenants.create');
    }

    // Admin: store tenant
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'admin_name' => ['required', 'string', 'max:255'],
            'admin_email' => ['required', 'email', 'max:255', 'unique:users,email'],
        ]);

        $tenant = Tenant::create([
            'name' => $data['name'],
            'domain' => $data['domain'] ?? null,
            'address' => $data['address'] ?? null,
        ]);

        // Create tenant admin with generated password
        $plainPassword = str()->password(12);
        $tenantAdmin = \App\Models\User::create([
            'name' => $data['admin_name'],
            'email' => $data['admin_email'],
            'password' => $plainPassword, // hashed via cast
            'role' => 'tenant_admin',
            'tenant_id' => $tenant->id,
        ]);

        // Flash credentials to show once
        session()->flash('credentials', [
            'email' => $tenantAdmin->email,
            'password' => $plainPassword,
        ]);

        return redirect()->route('tenants.show', $tenant)->with('status', 'Tenant created');
    }

    // Admin: show tenant
    public function show(Tenant $tenant)
    {
        return view('admin.tenants.show', compact('tenant'));
    }

    // Admin: edit tenant
    public function edit(Tenant $tenant)
    {
        return view('admin.tenants.edit', compact('tenant'));
    }

    // Admin: update tenant
    public function update(Request $request, Tenant $tenant)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'domain' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
        ]);

        $tenant->update($data);

        return redirect()->route('tenants.index')->with('status', 'Tenant updated');
    }

    // Admin: delete tenant
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('status', 'Tenant deleted');
    }
}
