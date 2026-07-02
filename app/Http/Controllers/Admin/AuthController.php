<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {

            session([
                'admin_logged_in' => true,
                'admin_name' => $admin->name
            ]);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }


    public function logout()
    {
        session()->forget([
            'admin_logged_in',
            'admin_name'
        ]);

        return redirect('/admin/login');
    }
}
