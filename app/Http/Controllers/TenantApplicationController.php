<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApprovalSubmitTenantPending;
use App\Models\User;
use App\Models\Tenantman;

class TenantApplicationController extends Controller
{
    public function dashboard()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to continue.');
    }

    // ✅ Kung approved na sa users table → diretso na sa Tenantdash
    if ($user->status === 'approved') {
        return redirect()->route('Tenantdash');
    }

    // Kung hindi pa approved → kuha ng latest application
    $application = ApprovalSubmitTenantPending::where('email', $user->email)->latest()->first();

    return view('tenantapply', compact('application'));
}


 public function showApplicationStatus()
{
    $user = auth()->user();

    // Kunin latest application ng user
    $application = \App\Models\Application::where('user_id', $user->id)->latest()->first();

    if (!$application) {
        $status = 'none';
    } else {
        $status = $application->status; // e.g. "pending", "approved", "rejected"
    }

    return view('application.status', compact('status'));
}

public function approveTenant($id) {
    $user = User::findOrFail($id);
    $user->status = 'approved';
    $user->save();

    return redirect()->back()->with('success', 'Tenant approved successfully.');
}


    public function index()
    {
        return view('tenantregister');
    }

    public function submitApplication(Request $request)
    {
        $IncomingFields = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:approvalsubmittenantpending,email',
            'contact_number' => 'required|string|max:20',
            'id_picture' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'current_address' => 'required|string',
            'birthdate' => 'required|date',
            'preferred_unit_type' => 'required|string',
            'preferred_movein_date' => 'required|date',
            'reason_renting' => 'required|string',
            'employment_status' => 'required|string',
            'employer_name' => 'nullable|string',
            'emergency_name' => 'required|string',
            'emergency_contact' => 'required|string',
            'emergency_relationship' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
    echo "Photo uploaded: " . $request->file('photo')->getClientOriginalName();
} else {
    echo "No photo uploaded.";
}
    $idPath = $request->file('id_picture')->store('ids', 'public');
$photoPath = $request->file('photo')->store('photos', 'public');

ApprovalSubmitTenantPending::create([
    'user_id' => Auth::id(),
    'full_name' => $request->full_name,
    'email' => $request->email,
    'contact_number' => $request->contact_number,
    'id_file' => $idPath,       // ✅ gamitin yung na-upload na file path
    'photo_file' => $photoPath, // ✅ gamitin yung na-upload na file path
    'current_address' => $request->current_address,
    'birthdate' => $request->birthdate,
    'preferred_unit_type' => $request->preferred_unit_type,
    'preferred_movein_date' => $request->preferred_movein_date,
    'reason_renting' => $request->reason_renting,
    'employment_status' => $request->employment_status,
    'employer_name' => $request->employer_name,
    'emergency_name' => $request->emergency_name,
    'emergency_contact' => $request->emergency_contact,
    'emergency_relationship' => $request->emergency_relationship,
]);



        return redirect()->route('tenantapply')->with('success', 'Your application is still under review. Please wait.');
    }
}
