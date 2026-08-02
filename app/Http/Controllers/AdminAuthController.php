<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function create()
    {
        return view('admin.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);
        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()->withErrors(['email' => 'Those credentials were not recognised.'])->onlyInput('email');
        }
        $request->session()->regenerate();
        return redirect()->intended('/admin');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
}
