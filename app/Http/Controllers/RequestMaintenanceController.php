<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestMaintenanceController extends Controller
{
    // Show all requests for manager
    public function index()
    {
        // Fetch all tenant maintenance requests with tenant info
        $requests = MaintenanceRequest::with('tenant')->orderBy('created_at', 'desc')->get();

        // Send to blade
        return view('mainte', compact('requests'));
    }

    // Approve or Reject
    public function updateStatus(Request $request, $id)
    {
        $user = Auth::user();

        // Optional: check if user is manager
        if (!$user || !$user->isManager()) {
            abort(403, 'Unauthorized');
        }

        $maintenance = MaintenanceRequest::findOrFail($id);
        $maintenance->status = $request->input('status'); // Approved / Rejected
        $maintenance->manager_id = $user->id;
        $maintenance->save();

        return redirect()->route('manager.maintenance.index')
                         ->with('success', 'Request updated!');
    }
}
