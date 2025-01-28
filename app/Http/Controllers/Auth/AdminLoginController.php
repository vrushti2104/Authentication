<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user);
            if ($user->role->name === 'admin') {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->back()->withErrors('You are not allowed to login from here.');
            }
        }

        return redirect()->back()->withErrors('Invalid credentials.');
    }
}
