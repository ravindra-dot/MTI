<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Rules\ReCaptchaV3;

class AuthController extends Controller
{
    private function clearOtpSession()
    {
        Session::forget([
            'otp_email',
            'otp_code',
            'otp_expires_at',
            'otp_verified'
        ]);
    }

    // SEND OTP
    public function sendOtp(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|email|unique:users,email'
            ]);

            $otp = rand(100000, 999999);

            Session::put('otp_email', $request->email);
            Session::put('otp_code', $otp);
            Session::put('otp_expires_at', now()->addMinutes(10));

            Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Email Verification OTP');
            });

            return response()->json([
                'status' => true,
                'message' => 'OTP sent successfully'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            return response()->json([
                'status' => false,
                'message' => $e->errors()['email'][0] ?? 'Validation error'
            ], 422);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => 'Server error: ' . $e->getMessage()
            ], 500);
        }
    }

    // VERIFY OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $expiresAt = Session::get('otp_expires_at');

        if (!$expiresAt || now()->gt($expiresAt)) {
            return response()->json([
                'status' => false,
                'message' => 'OTP expired or not found'
            ], 422);
        }

        if (
            Session::get('otp_email') !== $request->email ||
            Session::get('otp_code') != $request->otp
        ) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP'
            ], 422);
        }

        Session::put('otp_verified', true);

        return response()->json([
            'status' => true,
            'message' => 'OTP verified'
        ]);
    }

    // REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'first_name'      => 'required|string|max:255',
            'last_name'       => 'required|string|max:255',
            'password'        => 'required|min:8',
            'dob'             => 'required|date',
            'qualification'   => 'required|string|max:255',
            'recaptcha-token' => ['required', new ReCaptchaV3],
        ]);

        if (!Session::get('otp_verified')) {
            return back()
                ->withInput()
                ->withErrors([
                    'email' => 'Please verify your email first.'
                ]);
        }

        $email = Session::get('otp_email');

        if (!$email) {
            return back()
                ->withErrors([
                    'email' => 'Registration session expired. Please start again.'
                ]);
        }

        if (User::where('email', $email)->exists()) {

            $this->clearOtpSession();

            return back()
                ->withInput()
                ->with('active_tab', 'register')
                ->withErrors([
                    'email' => 'This email is already registered.'
                ]);
        }

        try {

            $user = User::create([
                'first_name'     => $request->first_name,
                'last_name'      => $request->last_name,
                'email'          => $email,
                'password'       => Hash::make($request->password),
                'dob'            => $request->dob,
                'qualification'  => $request->qualification,
                'email_verified' => true,
            ]);

        } catch (\Exception $e) {

            return back()
                ->withInput()
                ->withErrors([
                    'register' => 'Registration failed. Please try again.'
                ]);
        }

        $this->clearOtpSession();

        Auth::login($user);

        return redirect('/dashboard');
    }

    // LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'recaptcha-token' => ['required', new ReCaptchaV3],
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->wantsJson()) {
                return response()->json([
                    'status' => true,
                    'redirect' => '/dashboard'
                ]);
            }

            return redirect('/dashboard');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid email or password'
            ], 401);
        }

        return back()
            ->with('login_error', 'Invalid email or password')
            ->with('active_tab', 'login');
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