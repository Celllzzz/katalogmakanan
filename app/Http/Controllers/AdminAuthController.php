<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    // Tampilkan form login admin
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Simpan admin_id ke session
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors([
                'email' => 'Email atau Password salah!'
            ])->withInput();
        }
    }

    // Logout admin
    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('admin.login');
    }

    // Tampilkan halaman dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
