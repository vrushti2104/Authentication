<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomRegisterController extends Controller
{
    public function showCustomerRegistrationForm()
    {
        return view('auth.register-customer');
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);
        $user->sendEmailVerificationNotification();


        return redirect()->route('login')->with('success', 'Customer registered successfully!');
    }

    public function showAdminRegistrationForm()
    {
        return view('auth.register-admin');
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);
        $user->sendEmailVerificationNotification();

        return redirect()->route('admin.login')->with('success', 'Admin registered successfully!');
    }
}
