<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->paginate(20);
        
        $stats = [
            'pendingLeads' => Lead::where('status', 'pending')->count(),
            'convertedLeads' => Lead::where('status', 'converted')->count(),
            'rejectedLeads' => Lead::where('status', 'rejected')->count(),
            'contactedLeads' => Lead::where('status', 'contacted')->count(),
        ];
        
        return view('admin.leads', compact('leads', 'stats'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'source' => 'nullable|string|max:255',
            'estimated_users' => 'nullable|integer',
            'budget_range' => 'nullable|string|max:255',
            'timeline' => 'nullable|string|max:255',
        ]);

        Lead::create($validated);

        return redirect()->route('admin.leads')->with('success', 'Lead added successfully');
    }

    public function update(Request $request, Lead $lead)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,converted,rejected',
            'notes' => 'nullable|string',
        ]);

        $lead->update($validated);

        return redirect()->route('admin.leads')->with('success', 'Lead updated successfully');
    }

    public function convertToTenant(Lead $lead)
    {
        // This would create a new tenant from the lead
        // Implementation would depend on your tenant creation logic
        
        $lead->update(['status' => 'converted']);
        
        return redirect()->route('admin.leads')->with('success', 'Lead converted to tenant');
    }
}


