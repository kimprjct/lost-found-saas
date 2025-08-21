
@extends('layouts.admin')

@section('header')
    Register New Tenant
@endsection

@section('content')
    <div class="card" style="max-width: 800px; margin: 0 auto;">
        <h2 style="font-size: 24px; font-weight: 700; margin-bottom: 24px; color: var(--text);">Register New Organization</h2>
        
        <form method="POST" action="{{ route('tenants.store') }}" style="display: grid; gap: 24px;">
            @csrf
            
            <!-- Organization Details -->
            <div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; color: var(--text);">Organization Information</h3>
                <div style="display: grid; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Organization Name *</label>
                        <input type="text" name="name" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;" placeholder="e.g., SNSU, Gaisano Mall">
                    </div>
                    
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Domain (Optional)</label>
                        <input type="text" name="domain" style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;" placeholder="e.g., snsu.edu.ph">
                    </div>
                    
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Address</label>
                        <textarea name="address" rows="3" style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;" placeholder="Organization address"></textarea>
                    </div>
                </div>
            </div>
            
            <!-- Admin Contact -->
            <div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; color: var(--text);">Admin Contact</h3>
                <div style="display: grid; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Admin Name *</label>
                        <input type="text" name="admin_name" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;" placeholder="Full name of the admin">
                    </div>
                    
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Admin Email *</label>
                        <input type="email" name="admin_email" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;" placeholder="admin@organization.com">
                    </div>
                </div>
            </div>
            
            <!-- Subscription Plan -->
            <div>
                <h3 style="font-size: 18px; font-weight: 600; margin-bottom: 16px; color: var(--text);">Subscription Plan</h3>
                <div style="display: grid; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Plan *</label>
                        <select name="plan" required style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
                            <option value="">Select a plan</option>
                            <option value="basic">Basic Plan - $29/month</option>
                            <option value="premium">Premium Plan - $59/month</option>
                            <option value="enterprise">Enterprise Plan - $99/month</option>
                        </select>
                    </div>
                    
                    <div>
                        <label style="display: block; font-size: 14px; font-weight: 500; color: var(--text); margin-bottom: 8px;">Billing Cycle</label>
                        <select name="billing_cycle" style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly (Save 20%)</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div style="display: flex; gap: 16px; justify-content: flex-end; padding-top: 24px; border-top: 1px solid var(--ring);">
                <a href="{{ route('tenants.index') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Register Tenant</button>
            </div>
        </form>
    </div>
@endsection
