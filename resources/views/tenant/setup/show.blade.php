@extends('layouts.tenant')

@section('header')
    Organization Setup
@endsection

@section('content')
    <div class="max-w-5xl mx-auto">
        <!-- Setup Progress -->
        <div class="mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-8 shadow-sm">
                <div class="text-center mb-6">
                    <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-4">
                        <span class="text-2xl text-white">🎯</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Complete Your Organization Setup</h2>
                    <p class="text-gray-600 text-lg">Welcome to FoundU! Let's configure your organization to get started with your lost and found system.</p>
                </div>
                
                <!-- Progress Steps -->
                <div class="flex items-center justify-center space-x-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">1</div>
                        <span class="text-blue-700 font-medium">Organization Details</span>
                    </div>
                    <div class="w-12 h-0.5 bg-blue-200"></div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-semibold text-sm">2</div>
                        <span class="text-gray-500 font-medium">Rules & Processes</span>
                    </div>
                    <div class="w-12 h-0.5 bg-gray-200"></div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 font-semibold text-sm">3</div>
                        <span class="text-gray-500 font-medium">Ready to Launch</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Setup Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">
            <form action="{{ route('tenant.setup.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Organization Details Section -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">🏢</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Organization Details</h3>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-3">Organization Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $tenant->name) }}" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                            @error('name')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_email" class="block text-sm font-semibold text-gray-700 mb-3">Contact Email *</label>
                            <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $tenant->contact_email) }}" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                            @error('contact_email')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="contact_phone" class="block text-sm font-semibold text-gray-700 mb-3">Contact Phone</label>
                            <input type="tel" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $tenant->contact_phone) }}"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                            @error('contact_phone')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="logo" class="block text-sm font-semibold text-gray-700 mb-3">Organization Logo</label>
                            <div class="relative">
                                <input type="file" id="logo" name="logo" accept="image/*"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            </div>
                            <p class="text-xs text-gray-500 mt-2 flex items-center"><span class="mr-1">💡</span>Recommended: 200x200px, PNG or JPG</p>
                            @error('logo')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Rules & Processes Section -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">📋</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Rules & Processes</h3>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label for="claim_process_rules" class="block text-sm font-semibold text-gray-700 mb-3">Claim Process Rules *</label>
                            <textarea id="claim_process_rules" name="claim_process_rules" rows="4" required
                                placeholder="Describe your organization's process for claiming lost items. For example: 'Items must be claimed within 30 days. Valid ID required. Contact security desk for verification.'"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white resize-none">{{ old('claim_process_rules', $tenant->claim_process_rules) }}</textarea>
                            @error('claim_process_rules')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="verification_steps" class="block text-sm font-semibold text-gray-700 mb-3">Verification Steps *</label>
                            <textarea id="verification_steps" name="verification_steps" rows="4" required
                                placeholder="Describe the verification process for lost items. For example: '1. Item description must match exactly. 2. Location and date verification required. 3. Photo ID must be presented.'"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white resize-none">{{ old('verification_steps', $tenant->verification_steps) }}</textarea>
                            @error('verification_steps')
                                <p class="text-red-500 text-sm mt-2 flex items-center"><span class="mr-1">⚠️</span>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">👀</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Preview</h3>
                    </div>
                    
                    <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-2xl p-8 border border-gray-200">
                        <div class="flex items-center space-x-4 mb-4">
                            <div id="logoPreview" class="w-16 h-16 bg-gray-200 rounded-lg flex items-center justify-center">
                                @if($tenant->logo)
                                    <img src="{{ asset('storage/' . $tenant->logo) }}" alt="Logo" class="w-16 h-16 rounded-lg object-cover">
                                @else
                                    <span class="text-gray-400 text-2xl">🏢</span>
                                @endif
                            </div>
                            <div>
                                <h4 id="namePreview" class="text-lg font-semibold text-gray-900">{{ $tenant->name }}</h4>
                                <p id="contactPreview" class="text-gray-600">{{ $tenant->contact_email ?? 'contact@organization.com' }}</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                            <div>
                                <h5 class="font-medium text-gray-700 mb-2">Claim Process:</h5>
                                <p id="rulesPreview" class="text-gray-600">{{ $tenant->claim_process_rules ?? 'Rules will appear here...' }}</p>
                            </div>
                            <div>
                                <h5 class="font-medium text-gray-700 mb-2">Verification Steps:</h5>
                                <p id="verificationPreview" class="text-gray-600">{{ $tenant->verification_steps ?? 'Steps will appear here...' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Staff Invitations Section -->
                <div class="mb-10">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <span class="text-white text-lg">👥</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Invite Staff Members (Optional)</h3>
                    </div>
                    <p class="text-gray-600 mb-6 text-lg">You can invite staff members to help manage your lost and found system. They'll receive email invitations to join.</p>
                    
                    <div class="space-y-6">
                        <div class="flex space-x-4">
                            <input type="text" id="staffName" placeholder="Staff member name" 
                                class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                            <input type="email" id="staffEmail" placeholder="staff@organization.com" 
                                class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                            <select id="staffRole" class="px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-gray-50 hover:bg-white">
                                <option value="staff">Staff</option>
                                <option value="sub_admin">Sub-Admin</option>
                            </select>
                            <button type="button" onclick="addStaffInvitation()" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                ➕ Add
                            </button>
                        </div>
                        
                        <div id="staffInvitationsList" class="space-y-3">
                            <!-- Staff invitations will be added here -->
                        </div>
                    </div>
                </div>

                <!-- Submit Section -->
                <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                    <button type="button" onclick="previewForm()" class="px-8 py-3 border-2 border-gray-300 rounded-xl text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 font-semibold">
                        Preview
                    </button>
                    <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all duration-200 font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Complete Setup
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Live preview functionality
        function previewForm() {
            const name = document.getElementById('name').value;
            const contactEmail = document.getElementById('contact_email').value;
            const claimRules = document.getElementById('claim_process_rules').value;
            const verificationSteps = document.getElementById('verification_steps').value;

            document.getElementById('namePreview').textContent = name || 'Organization Name';
            document.getElementById('contactPreview').textContent = contactEmail || 'contact@organization.com';
            document.getElementById('rulesPreview').textContent = claimRules || 'Rules will appear here...';
            document.getElementById('verificationPreview').textContent = verificationSteps || 'Steps will appear here...';
        }

        // Logo preview
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('logoPreview');
                    preview.innerHTML = `<img src="${e.target.result}" alt="Logo" class="w-16 h-16 rounded-lg object-cover">`;
                };
                reader.readAsDataURL(file);
            }
        });

        // Auto-preview on input
        ['name', 'contact_email', 'claim_process_rules', 'verification_steps'].forEach(id => {
            document.getElementById(id).addEventListener('input', previewForm);
        });

        // Staff invitations functionality
        let staffInvitations = [];

        function addStaffInvitation() {
            const name = document.getElementById('staffName').value.trim();
            const email = document.getElementById('staffEmail').value.trim();
            const role = document.getElementById('staffRole').value;

            if (!name || !email) {
                alert('Please enter both name and email for staff member.');
                return;
            }

            if (staffInvitations.some(inv => inv.email === email)) {
                alert('This email is already in the invitation list.');
                return;
            }

            const invitation = { name, email, role };
            staffInvitations.push(invitation);

            // Add to hidden input for form submission
            addHiddenInput(invitation);

            // Display in list
            displayStaffInvitation(invitation);

            // Clear inputs
            document.getElementById('staffName').value = '';
            document.getElementById('staffEmail').value = '';
        }

        function addHiddenInput(invitation) {
            const form = document.querySelector('form');
            const nameInput = document.createElement('input');
            nameInput.type = 'hidden';
            nameInput.name = 'staff_invitations[]';
            nameInput.value = JSON.stringify(invitation);
            form.appendChild(nameInput);
        }

        function displayStaffInvitation(invitation) {
            const list = document.getElementById('staffInvitationsList');
            const div = document.createElement('div');
            div.className = 'flex items-center justify-between bg-white p-4 rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition-all duration-200';
            div.innerHTML = `
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">${invitation.name.charAt(0).toUpperCase()}</span>
                    </div>
                    <div>
                        <div class="font-semibold text-gray-900">${invitation.name}</div>
                        <div class="text-sm text-gray-600">${invitation.email}</div>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold rounded-full ${invitation.role === 'sub_admin' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800'}">${invitation.role === 'sub_admin' ? 'Sub-Admin' : 'Staff'}</span>
                </div>
                <button type="button" onclick="removeStaffInvitation('${invitation.email}')" class="w-8 h-8 bg-red-100 hover:bg-red-200 text-red-600 rounded-full flex items-center justify-center transition-all duration-200 hover:scale-110">
                    ✕
                </button>
            `;
            list.appendChild(div);
        }

        function removeStaffInvitation(email) {
            staffInvitations = staffInvitations.filter(inv => inv.email !== email);
            document.getElementById('staffInvitationsList').innerHTML = '';
            staffInvitations.forEach(inv => displayStaffInvitation(inv));
            
            // Rebuild hidden inputs
            document.querySelectorAll('input[name="staff_invitations[]"]').forEach(input => input.remove());
            staffInvitations.forEach(inv => addHiddenInput(inv));
        }
    </script>
@endsection
