<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\ReCaptchaV3;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'dob' => 'required',
            'qualification' => 'required',
            'recaptcha-token' => ['required', new ReCaptchaV3],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'qualification' => $request->qualification,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // LOGIN
    public function login(Request $request)
    {
        // pure request credentials validate karne ke liye array merge kiya hai
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'recaptcha-token' => ['required', new ReCaptchaV3], // reCAPTCHA validation here
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}
