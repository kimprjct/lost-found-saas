<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantRegistrationRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\TenantApprovedMail;

class TenantRegistrationController extends Controller
{
    public function store(Request $request)
    {
        // Minimal public form fields per requirements
        $validated = $request->validate([
            'organization_name' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'email' => 'required|email|max:255|unique:tenant_registration_requests,email',
            'phone' => 'nullable|string|max:20',
            'plan' => 'required|string|in:basic,premium,enterprise',
        ]);

        // Persist while filling optional legacy columns
        TenantRegistrationRequest::create([
            'organization_name' => $validated['organization_name'],
            'contact_person' => $validated['contact_person'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'organization_type' => 'other',
            'address' => $validated['address'],
            'website' => null,
            'plan' => $validated['plan'],
            'message' => null,
        ]);

        return redirect()->back()->with('success', 'Registration request submitted successfully! We will review your application and contact you within 24-48 hours.');
    }

    public function index()
    {
        $requests = TenantRegistrationRequest::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.registration-requests.index', compact('requests'));
    }

    public function approve(Request $request, $id)
    {
        $registrationRequest = TenantRegistrationRequest::findOrFail($id);
        
        // Create tenant
        $tenant = Tenant::create([
            'name' => $registrationRequest->organization_name,
            'address' => $registrationRequest->address,
            'domain' => null,
        ]);

        // Generate a unique identifier/subdomain slug
        $tenantSlug = Str::slug($tenant->name) . '-' . $tenant->id;
        $tenant->update(['domain' => $tenantSlug]);

        // Generate password
        $password = Str::random(12);
        
        // Create tenant admin user
        $user = User::create([
            'name' => $registrationRequest->contact_person,
            'email' => $registrationRequest->email,
            'password' => Hash::make($password),
            'role' => 'tenant_admin',
            'tenant_id' => $tenant->id,
        ]);

        // Update request status
        $registrationRequest->update([
            'status' => 'approved',
            'approved_at' => now(),
            'tenant_id' => $tenant->id,
        ]);

        // Email credentials to tenant admin
        try {
            Mail::to($registrationRequest->email)->send(new TenantApprovedMail(
                organization: $tenant->name,
                email: $user->email,
                tempPassword: $password,
                tenantSlug: $tenantSlug,
                tenantId: $tenant->id,
            ));
        } catch (\Throwable $e) {
            // Swallow email errors but still continue; surfaced via flash
        }

        // Flash credentials for Super Admin visibility once
        session()->flash('credentials', [
            'email' => $user->email,
            'password' => $password,
            'organization' => $tenant->name,
            'tenant_slug' => $tenantSlug,
            'tenant_id' => $tenant->id,
        ]);

        return redirect()->back()->with('success', 'Registration approved successfully! Tenant account created.');
    }

    public function reject(Request $request, $id)
    {
        $registrationRequest = TenantRegistrationRequest::findOrFail($id);
        
        $registrationRequest->update([
            'status' => 'rejected',
            'rejected_at' => now(),
            'rejection_reason' => $request->input('reason'),
        ]);

        return redirect()->back()->with('success', 'Registration request rejected.');
    }
}


