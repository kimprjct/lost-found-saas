<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\StaffInvitation;

class TenantSetupController extends Controller
{


    public function show()
    {
        $tenant = Auth::user()->tenant;
        
        if ($tenant->setup_completed) {
            return redirect()->route('tenant.dashboard');
        }
        
        return view('tenant.setup.show', compact('tenant'));
    }

    public function update(Request $request)
    {
        $tenant = Auth::user()->tenant;
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'nullable|string|max:20',
            'claim_process_rules' => 'required|string|max:1000',
            'verification_steps' => 'required|string|max:1000',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            if ($tenant->logo && Storage::exists($tenant->logo)) {
                Storage::delete($tenant->logo);
            }
            
            $logoPath = $request->file('logo')->store('tenant-logos', 'public');
            $validated['logo'] = $logoPath;
        }

        $tenant->update($validated);
        
        // Handle staff invitations
        if ($request->has('staff_invitations')) {
            foreach ($request->input('staff_invitations') as $invitationData) {
                $invitation = json_decode($invitationData, true);
                
                StaffInvitation::create([
                    'tenant_id' => $tenant->id,
                    'email' => $invitation['email'],
                    'name' => $invitation['name'],
                    'role' => $invitation['role'],
                    'token' => Str::random(64),
                    'expires_at' => now()->addDays(7),
                ]);
                
                // TODO: Send invitation email here
                // Mail::to($invitation['email'])->send(new StaffInvitationMail($invitation));
            }
        }
        
        // Mark setup as completed
        $tenant->update([
            'setup_completed' => true,
            'setup_completed_at' => now(),
        ]);

        return redirect()->route('tenant.dashboard')
            ->with('success', 'Organization setup completed successfully!');
    }
}
