<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For now, return the view with sample data
        // Later this should fetch from database
        return view('tenant.user-management.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.user-management.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255|unique:users,user_id',
            'name' => 'required|string|max:255',
            'department' => 'required|string|in:COT,CEIT,CAS,CTE',
            'email' => 'required|email|max:255|unique:users,email',
            'contact_number' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // For now, just redirect back with success message
        // Later this should save to database
        return redirect()->route('tenant.user-management.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // For now, redirect to index
        // Later this should show individual user details
        return redirect()->route('tenant.user-management.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // For now, return the edit view with sample data
        // Later this should fetch the user from database
        $user = (object) [
            'id' => $id,
            'user_id' => '2021-00001',
            'name' => 'Sample User',
            'department' => 'CEIT',
            'email' => 'sample@ssct.edu.ph',
            'contact_number' => '09123456789'
        ];
        
        return view('tenant.user-management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|string|max:255|unique:users,user_id,' . $id,
            'name' => 'required|string|max:255',
            'department' => 'required|string|in:COT,CEIT,CAS,CTE',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'contact_number' => 'required|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // For now, just redirect back with success message
        // Later this should update the database
        return redirect()->route('tenant.user-management.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // For now, just redirect back with success message
        // Later this should delete from database
        return redirect()->route('tenant.user-management.index')
            ->with('success', 'User deleted successfully.');
    }
}
