@extends('layouts.admin')

@section('header')
    System Settings
@endsection

@section('content')
    <div class="grid grid-cols-2 gap-6">
        <!-- Global Notifications -->
        <div class="card">
            <div style="font-weight:700; margin-bottom:12px;">Global Notifications</div>
            <form method="POST" action="#" style="display:grid; gap:14px;">
                @csrf
                <label style="display:flex; align-items:center; gap:10px;">
                    <input type="checkbox" />
                    <span>Email notifications for new registrations</span>
                </label>
                <label style="display:flex; align-items:center; gap:10px;">
                    <input type="checkbox" />
                    <span>Weekly activity summary</span>
                </label>
                <button class="btn btn-primary" style="width:max-content;">Save Notifications</button>
            </form>
        </div>

        <!-- Data Retention -->
        <div class="card">
            <div style="font-weight:700; margin-bottom:12px;">Data Retention</div>
            <form method="POST" action="#" style="display:grid; gap:14px;">
                @csrf
                <label>Keep resolved claims for</label>
                <select style="padding:10px 12px; border:1px solid var(--border); border-radius:8px; max-width:220px;">
                    <option value="3">3 months</option>
                    <option value="6">6 months</option>
                    <option value="12" selected>12 months</option>
                    <option value="24">24 months</option>
                </select>
                <button class="btn btn-primary" style="width:max-content;">Save Retention</button>
            </form>
        </div>

        <!-- Integrations -->
        <div class="card" style="grid-column: span 2;">
            <div style="font-weight:700; margin-bottom:12px;">Integrations</div>
            <div class="grid grid-cols-3 gap-6">
                <div>
                    <div style="font-weight:600; margin-bottom:6px;">SMS</div>
                    <form method="POST" action="#" style="display:grid; gap:10px;">
                        @csrf
                        <input placeholder="Provider API Key" />
                        <input placeholder="Sender ID" />
                        <button class="btn btn-outline" style="width:max-content;">Save</button>
                    </form>
                </div>
                <div>
                    <div style="font-weight:600; margin-bottom:6px;">Email</div>
                    <form method="POST" action="#" style="display:grid; gap:10px;">
                        @csrf
                        <input placeholder="SMTP Host" />
                        <input placeholder="SMTP Username" />
                        <button class="btn btn-outline" style="width:max-content;">Save</button>
                    </form>
                </div>
                <div>
                    <div style="font-weight:600; margin-bottom:6px;">Payments</div>
                    <form method="POST" action="#" style="display:grid; gap:10px;">
                        @csrf
                        <input placeholder="Gateway Key" />
                        <input placeholder="Webhook Secret" />
                        <button class="btn btn-outline" style="width:max-content;">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


