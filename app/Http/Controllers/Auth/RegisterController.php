<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class RegisterController extends Controller
{
    public function index()
    {
        return view('Registertenant'); 
    }

    public function register(Request $request)
    {
        $IncomingFields = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|min:6',
                'contact_number' => 'required|string|max:20', // ✅ match sa form
]);


    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'tenant',
            'status' => 'pending', // optional default
            'contact_number' => $request->contact_number, // ✅ add this
]);


        return redirect()->route('login')->with('success', 'Account created!');
    }
}
