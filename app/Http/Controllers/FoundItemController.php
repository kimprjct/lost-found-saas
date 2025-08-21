<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundItemController extends Controller
{
    public function index()
    {
        $tenantId = Auth::user()->tenant_id;
        $items = Report::where('tenant_id', $tenantId)->where('status', 'found')->latest()->paginate(15);
        return view('tenant.found.index', compact('items'));
    }

    public function create()
    {
        return view('tenant.found.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string'],
        ]);

        $data['status'] = 'found';
        $data['user_id'] = Auth::id();
        $data['tenant_id'] = Auth::user()->tenant_id;

        Report::create($data);

        return redirect()->route('tenant.found-items.index')->with('status', 'Found item recorded');
    }

    public function show(Report $found_item)
    {
        $this->authorizeTenant($found_item);
        return view('tenant.found.show', ['item' => $found_item]);
    }

    public function edit(Report $found_item)
    {
        $this->authorizeTenant($found_item);
        return view('tenant.found.edit', ['item' => $found_item]);
    }

    public function update(Request $request, Report $found_item)
    {
        $this->authorizeTenant($found_item);
        $data = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string'],
        ]);

        $found_item->update($data);

        return redirect()->route('tenant.found-items.index')->with('status', 'Found item updated');
    }

    public function destroy(Report $found_item)
    {
        $this->authorizeTenant($found_item);
        $found_item->delete();
        return redirect()->route('tenant.found-items.index')->with('status', 'Found item deleted');
    }

    private function authorizeTenant(Report $report): void
    {
        if ($report->tenant_id !== Auth::user()->tenant_id) {
            abort(403);
        }
    }
}
