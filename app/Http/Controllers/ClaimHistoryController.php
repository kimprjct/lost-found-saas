<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For now, return the view with sample data
        // Later this should fetch from database
        return view('tenant.claim-history.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenant.claim-history.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'claim_id' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'claimant' => 'required|string|max:255',
            'claim_date' => 'required|date',
            'claim_status' => 'required|in:completed,pending,cancelled',
        ]);

        // For now, just redirect back with success message
        // Later this should save to database
        return redirect()->route('tenant.claim-history.index')
            ->with('success', 'Claim history record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // For now, redirect to index
        // Later this should show individual claim history details
        return redirect()->route('tenant.claim-history.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // For now, return the edit view with sample data
        // Later this should fetch the claim history from database
        $claimHistory = (object) [
            'id' => $id,
            'claim_id' => '1',
            'item_name' => 'Sample Item',
            'claimant' => 'Sample Claimant',
            'claim_date' => '2024-09-24',
            'claim_status' => 'completed'
        ];
        
        return view('tenant.claim-history.edit', compact('claimHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'claim_id' => 'required|string|max:255',
            'item_name' => 'required|string|max:255',
            'claimant' => 'required|string|max:255',
            'claim_date' => 'required|date',
            'claim_status' => 'required|in:completed,pending,cancelled',
        ]);

        // For now, just redirect back with success message
        // Later this should update the database
        return redirect()->route('tenant.claim-history.index')
            ->with('success', 'Claim history record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // For now, just redirect back with success message
        // Later this should delete from database
        return redirect()->route('tenant.claim-history.index')
            ->with('success', 'Claim history record deleted successfully.');
    }
}
