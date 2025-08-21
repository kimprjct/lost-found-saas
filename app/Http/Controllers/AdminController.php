<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Report;
use App\Models\Claim;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = [
            'tenantCount' => Tenant::count(),
            'userCount' => User::count(),
            'itemCount' => Report::count(),
            'claimsToday' => Claim::whereDate('created_at', today())->count(),
            'pendingRequestsCount' => \App\Models\TenantRegistrationRequest::where('status', 'pending')->count(),
        ];

        return view('admin.dashboard', $data);
    }

    public function settings()
    {
        return view('admin.settings');
    }
}
