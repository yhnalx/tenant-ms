<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // ✅ Show Login Form
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegistrationForm()
    {
        return view('Registertenant');
    }

   public function customLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            

            // Kung Manager
            if ($user->role === 'manager') {
                return redirect()->route('Dashboard');
            }

            // Kung Tenant
            if ($user->role === 'tenant') {
                if ($user->status === 'approved') {
                    return redirect()->route('Tenantdash');
                } else {
                    return redirect()->route('tenantapply');
                }
            }

            // Default kung walang role
            return redirect()->route('login');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
    public function logout()
    {
        Auth::logout(); // Logs out the user
        request()->session()->invalidate(); // Invalidate session
        request()->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('/login'); // Redirect to login page
    }
}

