<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('name')->get();
        $users = User::with('tenant')->orderByDesc('created_at')->paginate(20);
        return view('admin.users.index', compact('users', 'tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::orderBy('name')->get();
        return view('admin.users.create', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'role' => ['required', 'in:tenant_admin,staff'],
            'tenant_id' => ['required', 'exists:tenants,id'],
        ]);

        $plainPassword = str()->password(12);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $plainPassword,
            'role' => $data['role'],
            'tenant_id' => $data['tenant_id'],
        ]);

        return redirect()->route('users.index')->with('status', 'User created. Temp password: '.$plainPassword);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $tenants = Tenant::orderBy('name')->get();
        return view('admin.users.edit', compact('user', 'tenants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'role' => ['required', 'in:tenant_admin,staff,super_admin'],
            'tenant_id' => ['nullable', 'exists:tenants,id'],
        ]);
        $user->update($data);
        return redirect()->route('users.index')->with('status', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index')->with('status', 'User deleted');
    }
}
