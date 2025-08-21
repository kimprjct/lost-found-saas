@extends('layouts.admin')

@section('header')
    Lead Management
@endsection

@section('content')
    <!-- Lead Stats -->
    <div class="stats-grid mb-6">
        <div class="stat-card">
            <div class="stat-icon" style="background: #fef3c7; color: var(--warning);">📋</div>
            <div class="stat-value">{{ $pendingLeads ?? 0 }}</div>
            <div class="stat-label">Pending Leads</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #dcfce7; color: var(--success);">✅</div>
            <div class="stat-value">{{ $convertedLeads ?? 0 }}</div>
            <div class="stat-label">Converted</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #fee2e2; color: var(--danger);">❌</div>
            <div class="stat-value">{{ $rejectedLeads ?? 0 }}</div>
            <div class="stat-label">Rejected</div>
        </div>
        
        <div class="stat-card">
            <div class="stat-icon" style="background: #dbeafe; color: var(--primary);">📞</div>
            <div class="stat-value">{{ $contactedLeads ?? 0 }}</div>
            <div class="stat-label">Contacted</div>
        </div>
    </div>

    <!-- Lead Management Card -->
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Organization Leads</h2>
                <div class="flex space-x-2">
                    <button class="btn btn-success" onclick="exportLeads()">
                        <span style="margin-right: 0.5rem;">📊</span>
                        Export
                    </button>
                    <button class="btn btn-primary" onclick="showAddLeadModal()">
                        <span style="margin-right: 0.5rem;">➕</span>
                        Add Lead
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filter Tabs -->
            <div class="flex space-x-1 mb-6 bg-gray-100 p-1 rounded-lg">
                <button class="btn btn-outline text-sm px-4 py-2 rounded" onclick="filterLeads('all')">All</button>
                <button class="btn btn-outline text-sm px-4 py-2 rounded" onclick="filterLeads('pending')">Pending</button>
                <button class="btn btn-outline text-sm px-4 py-2 rounded" onclick="filterLeads('contacted')">Contacted</button>
                <button class="btn btn-outline text-sm px-4 py-2 rounded" onclick="filterLeads('converted')">Converted</button>
                <button class="btn btn-outline text-sm px-4 py-2 rounded" onclick="filterLeads('rejected')">Rejected</button>
            </div>

            <!-- Leads Table -->
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Organization</th>
                            <th>Contact Person</th>
                            <th>Contact Info</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($leads) && count($leads) > 0)
                            @foreach($leads as $lead)
                                <tr>
                                    <td>
                                        <div class="font-medium">{{ $lead->organization_name }}</div>
                                        <div class="text-sm text-gray-500">{{ $lead->organization_type }}</div>
                                    </td>
                                    <td>
                                        <div class="font-medium">{{ $lead->contact_person }}</div>
                                        <div class="text-sm text-gray-500">{{ $lead->position }}</div>
                                    </td>
                                    <td>
                                        <div class="text-sm">{{ $lead->email }}</div>
                                        <div class="text-sm text-gray-500">{{ $lead->phone }}</div>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $lead->organization_type }}</span>
                                    </td>
                                    <td>
                                        @if($lead->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($lead->status === 'contacted')
                                            <span class="badge badge-info">Contacted</span>
                                        @elseif($lead->status === 'converted')
                                            <span class="badge badge-success">Converted</span>
                                        @elseif($lead->status === 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-sm">{{ $lead->created_at->format('M d, Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $lead->created_at->diffForHumans() }}</div>
                                    </td>
                                    <td>
                                        <div class="flex space-x-2">
                                            <button class="btn btn-outline text-xs" onclick="viewLead({{ $lead->id }})">View</button>
                                            <button class="btn btn-success text-xs" onclick="convertToTenant({{ $lead->id }})">Convert</button>
                                            <button class="btn btn-danger text-xs" onclick="rejectLead({{ $lead->id }})">Reject</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center py-8 text-gray-500">
                                    <div class="text-4xl mb-2">📋</div>
                                    <div>No leads found</div>
                                    <button class="btn btn-primary mt-4" onclick="showAddLeadModal()">Add First Lead</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Lead Conversion Process Info -->
    <div class="card mt-6">
        <div class="card-header">
            <h2 class="text-xl font-semibold">Lead Conversion Process</h2>
        </div>
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-blue-600 text-xl">1</span>
                    </div>
                    <h3 class="font-semibold mb-2">Lead Submission</h3>
                    <p class="text-sm text-gray-600">Organization submits inquiry through website or contact form</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-yellow-600 text-xl">2</span>
                    </div>
                    <h3 class="font-semibold mb-2">Initial Contact</h3>
                    <p class="text-sm text-gray-600">Admin contacts organization to discuss requirements and pricing</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-green-600 text-xl">3</span>
                    </div>
                    <h3 class="font-semibold mb-2">Payment & Setup</h3>
                    <p class="text-sm text-gray-600">Organization pays subscription fee and admin creates tenant account</p>
                </div>
                
                <div class="text-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-3">
                        <span class="text-purple-600 text-xl">4</span>
                    </div>
                    <h3 class="font-semibold mb-2">Go Live</h3>
                    <p class="text-sm text-gray-600">Tenant account is activated and organization can start using the system</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterLeads(status) {
            // Implement lead filtering
            console.log('Filtering leads by:', status);
        }
        
        function viewLead(leadId) {
            // Implement lead viewing
            console.log('Viewing lead:', leadId);
        }
        
        function convertToTenant(leadId) {
            if (confirm('Convert this lead to a tenant? This will create a new tenant account.')) {
                // Implement lead conversion
                console.log('Converting lead:', leadId);
            }
        }
        
        function rejectLead(leadId) {
            if (confirm('Reject this lead? This action cannot be undone.')) {
                // Implement lead rejection
                console.log('Rejecting lead:', leadId);
            }
        }
        
        function exportLeads() {
            // Implement lead export
            console.log('Exporting leads');
        }
        
        function showAddLeadModal() {
            // Implement add lead modal
            console.log('Showing add lead modal');
        }
    </script>
@endsection
