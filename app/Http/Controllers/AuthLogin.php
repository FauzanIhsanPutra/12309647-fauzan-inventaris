<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AuthLogin extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string',''],
        ]);

        $staff = User::where('email', $request->email)->first();

        if ($staff && $staff->role === 'admin') {
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('admin/dashboard');
            }
        } elseif ($staff && $staff->role === 'operator') {
            if (auth()->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('staff/dashboard');
            }
        }

        return back()->with('error', 'Invalid login credentials');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
