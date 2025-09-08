<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; 
use Apps\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function dashboard()
    {
        $tenant = Auth::user();
        return view('Tenantdash', compact('tenant'));
    }

    public function leaseAgreement()
    {
        return view('lease_agreement');
    }

    public function uploadLease(Request $request)
    {
        $request->validate([
            'lease_file' => 'required|mimes:pdf,jpg,png|max:2048',
        ]);

        $path = $request->file('lease_file')->store('leases', 'public');

        $tenant = Auth::user();
        $tenant->lease_status = 'approved';
        $tenant->lease_file = $path;
        $tenant->save();

        return redirect()->route('Tenantdash')->with('success', 'Lease Agreement signed successfully!');
    }
}