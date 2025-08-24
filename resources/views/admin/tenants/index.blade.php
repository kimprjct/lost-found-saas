@extends('layouts.admin')

@section('header')
    Tenant Management
@endsection

@section('content')
    <!-- Header Actions -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <div>
            <h1 style="font-size: 24px; font-weight: 700; color: var(--text); margin-bottom: 8px;">Manage Tenants</h1>
            <p style="color: var(--muted2);">Register and manage organizations using FoundU</p>
        </div>
        <a href="{{ route('tenants.create') }}" class="btn btn-primary">
            <span>➕</span>
            Register New Tenant
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="card mb-6">
        <div style="display: flex; gap: 16px; align-items: center;">
            <div style="flex: 1;">
                <input type="text" placeholder="Search tenants..." style="width: 100%; padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
            </div>
            <select style="padding: 12px 16px; border: 1px solid var(--ring); border-radius: 8px; font-size: 14px;">
                <option>All Status</option>
                <option>Active</option>
                <option>Suspended</option>
                <option>Expired</option>
            </select>
            <button class="btn btn-outline">Filter</button>
        </div>
    </div>

    <!-- Tenants Table -->
    <div class="card">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tenant Name</th>
                        <th>Domain</th>
                        <th>Admin Contact</th>
                        <th>Subscription</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tenants ?? [] as $tenant)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--gradient-1), var(--gradient-2)); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700;">
                                    {{ strtoupper(substr($tenant->name, 0, 2)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: var(--text);">{{ $tenant->name }}</div>
                                    <div style="font-size: 12px; color: var(--muted2);">{{ $tenant->address ?? 'No address' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $tenant->domain ?? 'N/A' }}</td>
                        <td>
                            <div>
                                <div style="font-weight: 500; color: var(--text);">{{ $tenant->admin_name ?? 'N/A' }}</div>
                                <div style="font-size: 12px; color: var(--muted2);">{{ $tenant->admin_email ?? 'N/A' }}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <div style="font-weight: 500; color: var(--text);">Premium Plan</div>
                                <div style="font-size: 12px; color: var(--muted2);">Expires: Dec 31, 2024</div>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-success">Active</span>
                        </td>
                        <td>{{ $tenant->created_at->format('M d, Y') }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="{{ route('tenants.show', $tenant) }}" class="btn btn-outline" style="padding: 6px 12px; font-size: 12px;">View</a>
                                <a href="{{ route('tenants.edit', $tenant) }}" class="btn btn-accent" style="padding: 6px 12px; font-size: 12px;">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--muted2); padding: 60px;">
                            <div style="font-size: 48px; margin-bottom: 16px;">🏢</div>
                            <div style="font-size: 18px; margin-bottom: 8px;">No tenants registered yet</div>
                            <div style="font-size: 14px; margin-bottom: 24px;">Get started by registering your first tenant organization</div>
                            <a href="{{ route('tenants.create') }}" class="btn btn-primary">Register First Tenant</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Container -->
    <div id="tenantModal" class="modal" style="display: none;">
        <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="modalTitle" tabindex="-1">
            <div class="modal-header">
                <h2 id="modalTitle">Register New Organization</h2>
                <button id="closeModalBtn" class="close-btn" aria-label="Close modal">&times;</button>
            </div>
            <form method="POST" action="{{ route('tenants.store') }}" id="tenantForm" novalidate>
                @csrf
                <div>
                    <h3>Organization Information</h3>
                    <div class="form-group">
                        <div>
                            <label for="name">Organization Name *</label>
                            <input id="name" type="text" name="name" required placeholder="e.g., SNSU, Gaisano Mall" autocomplete="organization-name" />
                        </div>
                        <div>
                            <label for="domain">Domain (Optional)</label>
                            <input id="domain" type="text" name="domain" placeholder="e.g., snsu.edu.ph" autocomplete="url" />
                        </div>
                        <div style="grid-column: 1 / -1;">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Organization address" autocomplete="street-address"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <h3>Admin Contact</h3>
                    <div class="form-group">
                        <div>
                            <label for="admin_name">Admin Name *</label>
                            <input id="admin_name" type="text" name="admin_name" required placeholder="Full name of the admin" autocomplete="name" />
                        </div>
                        <div>
                            <label for="admin_email">Admin Email *</label>
                            <input id="admin_email" type="email" name="admin_email" required placeholder="admin@organization.com" autocomplete="email" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="closeModalBtn2" class="btn btn-outline" aria-label="Cancel registration">Cancel</button>
                    <button type="submit" class="btn btn-primary" aria-label="Submit registration form">Register Tenant</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Root colors */
        :root {
            --primary-color: #4f46e5;
            --primary-color-light: #6366f1;
            --primary-color-dark: #4338ca;
            --input-border: #d1d5db;
            --text-color: #1f2937;
            --muted2: #6b7280;
            --background-color: #f9fafb;
            --card-bg: #fff;
            --shadow: rgba(0, 0, 0, 0.05);
            --border-radius: 12px;
            --transition-speed: 0.35s;
        }

        /* Global font */
        * {
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px var(--shadow);
        }

        /* Buttons */
        .btn {
            padding: 0.85rem 1.75rem;
            font-size: 1rem;
            border-radius: var(--border-radius);
            font-weight: 700;
            cursor: pointer;
            border: none;
            transition: all var(--transition-speed) ease;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.25);
            user-select: none;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background: var(--primary-color-dark);
            box-shadow: 0 7px 24px rgba(67, 56, 202, 0.4);
            outline: none;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: none;
        }

        .btn-outline:hover,
        .btn-outline:focus {
            background: var(--primary-color-light);
            color: white;
            border-color: var(--primary-color-light);
            box-shadow: 0 7px 24px rgba(99, 102, 241, 0.4);
            outline: none;
            transform: translateY(-2px);
        }

        /* Table */
        table.table thead tr {
            border-bottom: none;
        }

        .table-container {
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        tbody tr.table-row:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.15);
            transition: all 0.3s ease;
            background-color: #fafbff;
        }

        .badge-success {
            background-color: #22c55e;
            color: white;
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 14px;
            font-weight: 700;
            user-select: none;
            box-shadow: 0 0 10px #22c55e;
            transition: all 0.3s ease;
        }

        /* Small buttons in rows */
        .small-btn {
            font-size: 13px;
            padding: 6px 14px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(79, 70, 229, 0.25);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .small-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 56, 202, 0.4);
        }

        /* Modal styling and animation */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .modal.show {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-content {
            background: white;
            border-radius: var(--border-radius);
            width: 600px;
            max-width: 90vw;
            max-height: 90vh;
            overflow-y: auto;
            padding: 2.5rem 3rem;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.25);
            position: relative;
            transform: translateY(-30px);
            animation: slideIn 0.4s forwards;
        }

        @keyframes slideIn {
            to {
                transform: translateY(0);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .close-btn {
            font-size: 2.4rem;
            color: #444;
            background: transparent;
            border: none;
            cursor: pointer;
            line-height: 1;
            padding: 0;
            transition: color 0.25s;
            user-select: none;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: var(--primary-color);
            outline: none;
        }

        /* Form and inputs */
        h2, h3 {
            color: var(--primary-color);
            font-weight: 700;
        }

        h3 {
            border-bottom: 2px solid var(--primary-color-light);
            padding-bottom: 0.75rem;
            margin-bottom: 1.5rem;
            font-size: 20px;
        }

        .form-group {
            display: grid;
            gap: 1.5rem;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            margin-bottom: 2rem;
        }

        label {
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 0.85rem 1rem;
            font-size: 1rem;
            border: 2px solid var(--input-border);
            border-radius: var(--border-radius);
            transition: border-color 0.3s, box-shadow 0.3s;
            font-family: 'Poppins', sans-serif;
            resize: vertical;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.05);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary-color-light);
            box-shadow: 0 0 8px var(--primary-color-light);
            background-color: #fefefe;
        }

        textarea {
            min-height: 90px;
            font-size: 1rem;
            line-height: 1.4;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1.25rem;
            padding-top: 1.75rem;
            border-top: 1px solid var(--input-border);
        }

        /* Responsive */
        @media (max-width: 640px) {
            .modal-content {
                width: 90vw;
                padding: 1.8rem 1.5rem;
            }
            h1 {
                font-size: 22px;
            }
            h3 {
                font-size: 18px;
            }
        }
    </style>

    <script>
        // Modal logic with animation
        const modal = document.getElementById('tenantModal');
        const openBtn = document.getElementById('openModalBtn');
        const openBtnEmpty = document.getElementById('openModalBtnEmpty');
        const closeBtn1 = document.getElementById('closeModalBtn');
        const closeBtn2 = document.getElementById('closeModalBtn2');

        const openModal = () => {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden'; // disable page scroll
        };

        const closeModal = () => {
            modal.classList.remove('show');
            document.getElementById('tenantForm').reset();
            document.body.style.overflow = ''; // enable page scroll
        };

        openBtn.addEventListener('click', openModal);
        if (openBtnEmpty) {
            openBtnEmpty.addEventListener('click', openModal);
        }
        closeBtn1.addEventListener('click', closeModal);
        closeBtn2.addEventListener('click', closeModal);

        window.addEventListener('click', e => {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Optional: close modal on ESC key
        window.addEventListener('keydown', e => {
            if (e.key === 'Escape' && modal.classList.contains('show')) {
                closeModal();
            }
        });
    </script>
@endsection
