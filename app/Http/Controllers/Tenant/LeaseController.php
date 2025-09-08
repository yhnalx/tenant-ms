<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Lease;
use Illuminate\Support\Facades\Auth;

class LeaseController extends Controller
{
    public function index()
    {
        // Get the logged-in user's approved lease
      $tenant = Lease::where('user_id', Auth::id())
               ->where('status', 'approved')
               ->first();

return view('leasetenant', ['tenant' => $tenant]);
    }

    public function requestRenewal($id)
    {
        $tenant = Lease::findOrFail($id);
        $tenant->renewal_requested = true;
        $tenant->save();

        return redirect()->back()->with('success', 'Lease renewal requested successfully.');
    }
}
