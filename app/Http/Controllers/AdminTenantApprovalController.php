<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApprovalSubmitTenantPending;
use App\Models\Tenantman;
use Illuminate\Support\Facades\Auth;

class AdminTenantApprovalController extends Controller
{
    // Show all pending applications + approved tenants
    public function index()
    {
        $applications = ApprovalSubmitTenantPending::where('status', 'pending')->get();
        $tenants = Tenantman::where('action', 'approved')->get();

        $allRooms = range(101, 120);
        $occupiedRooms = $tenants->pluck('room_number')->toArray();
        $availableRooms = array_diff($allRooms, $occupiedRooms);

        return view('leaseman', compact('applications', 'tenants', 'availableRooms'));
    }

    // Tenant Management page
    public function tenantman()
    {
        $applications = ApprovalSubmitTenantPending::where('status', 'pending')->get();
        $tenants = Tenantman::where('action', 'approved')->get();

        return view('tenantman', compact('applications', 'tenants'));
    }

    // Approve tenant application
    public function approve($id)
    {
        $application = ApprovalSubmitTenantPending::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        $lastRoom = Tenantman::max('room_number');
        $nextRoom = $lastRoom ? ((int) $lastRoom + 1) : 101;

        Tenantman::create([
            'user_id'        => $application->user_id,
            'tenant_name'    => $application->full_name,
            'email'          => $application->email,
            'room_number'    => $nextRoom,
            'contact_number' => $application->contact_number,
            'room_type'      => $application->preferred_unit_type ?? 'Studio',
            'lease_start'    => now(),
            'lease_end'      => now()->addYear(),
            'status'         => 'occupied',
            'action'         => 'approved',
            'password'       => bcrypt('defaultpassword'),
        ]);

        return redirect()->route('tenantman')->with('success', 'Application approved successfully!');
    }

    // Reject tenant application
    public function reject($id)
    {
        $application = ApprovalSubmitTenantPending::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->route('tenantman')->with('success', 'Application rejected successfully.');
    }

    // Delete a pending application
    public function destroyApplication($id)
    {
        $application = ApprovalSubmitTenantPending::findOrFail($id);
        $application->delete();

        return redirect()->route('tenantman')->with('success', 'Application deleted successfully.');
    }

    // Delete an approved tenant
    public function destroyTenant($id)
    {
        $tenant = Tenantman::findOrFail($id);
        $tenant->delete();

        return redirect()->route('tenantman')->with('success', 'Tenant deleted successfully.');
    }
}
