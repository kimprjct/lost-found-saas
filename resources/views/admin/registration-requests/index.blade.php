@extends('layouts.admin')

@section('header')
    Registration Requests
@endsection

@section('content')
    @if(session('credentials'))
        <div class="card mb-6" style="background: #d1fae5; border: 1px solid #10b981;">
            <h3 style="color: #065f46; font-weight: 700; margin-bottom: 16px;">✅ Account Created Successfully!</h3>
            <p style="color: #047857; margin-bottom: 16px;"><strong>Organization:</strong> {{ session('credentials.organization') }}</p>
            <p style="color: #047857; margin-bottom: 8px;"><strong>Login Email:</strong> {{ session('credentials.email') }}</p>
            <p style="color: #047857; margin-bottom: 16px;"><strong>Temporary Password:</strong> <code style="background: #ecfdf5; padding: 4px 8px; border-radius: 4px;">{{ session('credentials.password') }}</code></p>
            <p style="color: #047857; font-size: 14px;">⚠️ Make sure to securely share these credentials with the organization admin.</p>
        </div>
    @endif

    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 700; color: var(--text-primary); margin-bottom: 8px;">Registration Requests</h1>
            <p style="color: var(--text-muted);">Review and approve organization registration requests</p>
        </div>
    </div>

    <!-- Process Info -->
    <div class="card mb-6" style="background: #eff6ff; border: 1px solid #3b82f6;">
        <h3 style="color: #1e40af; font-weight: 700; margin-bottom: 16px;">📋 How to Process Registration Requests</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
            <div>
                <h4 style="color: #1e40af; font-weight: 600; margin-bottom: 8px;">1. Review Request</h4>
                <p style="color: #1e3a8a; font-size: 14px;">Check organization details, contact info, and plan selection</p>
            </div>
            <div>
                <h4 style="color: #1e40af; font-weight: 600; margin-bottom: 8px;">2. Approve & Create Account</h4>
                <p style="color: #1e40af; font-size: 14px;">Click "Approve" to automatically create tenant account and admin user</p>
            </div>
            <div>
                <h4 style="color: #1e40af; font-weight: 600; margin-bottom: 8px;">3. Share Credentials</h4>
                <p style="color: #1e40af; font-size: 14px;">Credentials will be emailed to the organization admin automatically</p>
            </div>
        </div>
    </div>

    <!-- Requests Table -->
    <div class="card">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Organization</th>
                        <th>Contact Person</th>
                        <th>Type</th>
                        <th>Plan</th>
                        <th>Submitted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $request)
                    <tr>
                        <td>
                            <div>
                                <div style="font-weight: 600; color: var(--text-primary);">{{ $request->organization_name }}</div>
                                <div style="font-size: 12px; color: var(--text-muted);">{{ $request->address }}</div>
                                @if($request->website)
                                    <div style="font-size: 12px;"><a href="{{ $request->website }}" target="_blank" style="color: var(--accent);">{{ $request->website }}</a></div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div>
                                <div style="font-weight: 500; color: var(--text-primary);">{{ $request->contact_person }}</div>
                                <div style="font-size: 12px; color: var(--text-muted);">{{ $request->email }}</div>
                                @if($request->phone)
                                    <div style="font-size: 12px; color: var(--text-muted);">{{ $request->phone }}</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">{{ ucfirst($request->organization_type) }}</span>
                        </td>
                        <td>
                            <div style="font-weight: 500; color: var(--text-primary);">{{ ucfirst($request->plan) }} — One-time</div>
                        </td>
                        <td>{{ $request->created_at->format('M d, Y') }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <form method="POST" action="{{ route('admin.registration-requests.approve', $request->id) }}" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-accent" style="padding: 6px 12px; font-size: 12px;" onclick="return confirm('Approve this registration? This will create a tenant account.')">Approve</button>
                                </form>
                                <button onclick="showRejectModal({{ $request->id }})" class="btn" style="background: var(--danger); color: white; padding: 6px 12px; font-size: 12px;">Reject</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 60px;">
                            <div style="font-size: 48px; margin-bottom: 16px;">📝</div>
                            <div style="font-size: 18px; margin-bottom: 8px;">No pending registration requests</div>
                            <div style="font-size: 14px;">New organization registration requests will appear here</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" style="display: none; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
        <div style="background: white; margin: 15% auto; padding: 30px; border-radius: 12px; width: 90%; max-width: 500px;">
            <h3 style="margin-bottom: 20px;">Reject Registration Request</h3>
            <form id="rejectForm" method="POST">
                @csrf
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: 600;">Reason for rejection:</label>
                    <textarea name="reason" rows="4" style="width: 100%; padding: 12px; border: 1px solid var(--border); border-radius: 8px;" placeholder="Please provide a reason for rejecting this request..."></textarea>
                </div>
                <div style="display: flex; gap: 12px; justify-content: flex-end;">
                    <button type="button" onclick="closeRejectModal()" class="btn btn-outline">Cancel</button>
                    <button type="submit" class="btn" style="background: var(--danger); color: white;">Reject Request</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showRejectModal(requestId) {
            document.getElementById('rejectForm').action = '/admin/registration-requests/' + requestId + '/reject';
            document.getElementById('rejectModal').style.display = 'block';
        }
        
        function closeRejectModal() {
            document.getElementById('rejectModal').style.display = 'none';
        }
    </script>
@endsection
