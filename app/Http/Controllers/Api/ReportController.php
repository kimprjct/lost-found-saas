<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\Tenant;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index($tenant)
    {
        $tenantId = is_numeric($tenant)
            ? (int) $tenant
            : Tenant::where('name', $tenant)->value('id');

        if (!$tenantId) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        $reports = Report::where('tenant_id', $tenantId)
            ->orderByDesc('created_at')
            ->get();

        return response()->json($reports);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:lost,found'],
            'image' => ['nullable', 'string'],
            'tenant_id' => ['required', 'exists:tenants,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $report = Report::create($data);

        return response()->json($report, 201);
    }
}
