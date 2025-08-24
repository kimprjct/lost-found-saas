<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoundRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For now, return the view with sample data
        // Later this should fetch from database
        return view('tenant.found-requests.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.found-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'found_by' => 'required|string|max:255',
            'location_found' => 'nullable|string|max:255',
            'contact_info' => 'nullable|string|max:255',
            'date_found' => 'nullable|date',
        ]);

        // For now, just redirect back with success message
        // Later this should save to database
        return redirect()->route('tenant.found-requests.index')
            ->with('success', 'Found request created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // For now, redirect to index
        // Later this should show individual found request details
        return redirect()->route('tenant.found-requests.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // For now, return the edit view with sample data
        // Later this should fetch the found request from database
        $foundRequest = (object) [
            'id' => $id,
            'item_name' => 'Sample Item',
            'description' => 'Sample description',
            'found_by' => 'Sample Finder',
            'location_found' => 'Sample Location',
            'contact_info' => 'Sample Contact',
            'date_found' => '2024-09-29',
            'verification_status' => 'pending'
        ];
        
        return view('tenant.found-requests.edit', compact('foundRequest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'found_by' => 'required|string|max:255',
            'location_found' => 'nullable|string|max:255',
            'contact_info' => 'nullable|string|max:255',
            'date_found' => 'nullable|date',
            'verification_status' => 'required|in:pending,verified,rejected',
        ]);

        // For now, just redirect back with success message
        // Later this should update the database
        return redirect()->route('tenant.found-requests.index')
            ->with('success', 'Found request updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // For now, just redirect back with success message
        // Later this should delete from database
        return redirect()->route('tenant.found-requests.index')
            ->with('success', 'Found request deleted successfully.');
    }
}
