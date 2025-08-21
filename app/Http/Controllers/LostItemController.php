<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostItemController extends Controller
{
    public function index()
    {
        $tenantId = Auth::user()->tenant_id;
        $items = Report::where('tenant_id', $tenantId)->where('status', 'lost')->latest()->paginate(15);
        return view('tenant.lost.index', compact('items'));
    }

    public function create()
    {
        return view('tenant.lost.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string'],
        ]);

        $data['status'] = 'lost';
        $data['user_id'] = Auth::id();
        $data['tenant_id'] = Auth::user()->tenant_id;

        Report::create($data);

        return redirect()->route('tenant.lost-items.index')->with('status', 'Lost item reported');
    }

    public function show(Report $lost_item)
    {
        $this->authorizeTenant($lost_item);
        return view('tenant.lost.show', ['item' => $lost_item]);
    }

    public function edit(Report $lost_item)
    {
        $this->authorizeTenant($lost_item);
        return view('tenant.lost.edit', ['item' => $lost_item]);
    }

    public function update(Request $request, Report $lost_item)
    {
        $this->authorizeTenant($lost_item);
        $data = $request->validate([
            'item_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'location' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'string'],
        ]);

        $lost_item->update($data);

        return redirect()->route('tenant.lost-items.index')->with('status', 'Lost item updated');
    }

    public function destroy(Report $lost_item)
    {
        $this->authorizeTenant($lost_item);
        $lost_item->delete();
        return redirect()->route('tenant.lost-items.index')->with('status', 'Lost item deleted');
    }

    private function authorizeTenant(Report $report): void
    {
        if ($report->tenant_id !== Auth::user()->tenant_id) {
            abort(403);
        }
    }
}
