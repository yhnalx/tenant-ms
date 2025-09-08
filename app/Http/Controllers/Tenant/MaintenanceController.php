<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user || !$user->isTenant()) {
            abort(403, 'Unauthorized');
        }

        $requests = $user->maintenanceRequests()->latest()->get();
        $hasPending = $requests->contains(fn ($r) => $r->status === 'Pending');

       return view('maintenant', compact('requests', 'hasPending'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:Low,Medium,High',
            'proof_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('proof_image')?->store('maintenance_proofs', 'public');

        MaintenanceRequest::create([
            'tenant_id'   => $user->id,
            'title'       => $request->title,
            'description' => $request->description,
            'priority'    => $request->priority,
            'status'      => 'Pending',
            'proof_image' => $path,
        ]);

        return redirect()->route('tenant.maintenance.index')
            ->with('success', 'Maintenance request submitted!');
    }
}
