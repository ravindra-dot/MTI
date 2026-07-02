<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication Portal | MyTalentIndia</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="MTI" />
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
</head>

<body class="bg-blue-50 font-sans text-gray-800 flex flex-col min-h-screen">
    @php
        $activeTab = session('active_tab', 'login');
    @endphp

    <nav class="bg-white shadow-sm py-4 px-8 flex justify-between items-center">
        <a href="/" class="flex items-center gap-3 group">
            <img class="h-12 w-12 sm:h-14 sm:w-14 transition-transform duration-300 group-hover:scale-105"
                src="{{ asset('assets/images/logo-icon.png') }}" alt="MyTalentIndia Logo">
            <div class="leading-tight">
                <h2 class="text-base sm:text-lg font-black text-blue-950 tracking-tight">
                    My<span class="text-orange-500">Talent</span>India
                </h2>
                <span class="text-[9px] text-gray-400 tracking-[0.25em] uppercase font-bold">
                    Display. Compete. Shine.
                </span>
            </div>
        </a>
        <a href="/" class="text-sm font-semibold text-gray-500 hover:text-gray-800 transition">&larr; Return to Home</a>
    </nav>

    <section class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="p-8 space-y-6">
                <form id="form-login"
                    method="POST"
                    action="/login"
                    class="space-y-4 {{ $activeTab === 'login' ? '' : 'hidden' }}">
                    @csrf
                    @if(session('login_error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm">
                            {{ session('login_error') }}
                        </div>
                    @endif

                    <input type="hidden" class="recaptcha-token-field" name="recaptcha-token">

                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Registered Email</label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Password</label>
                        <div class="relative">
                            <input id="login-password" type="password" name="password" required
                                class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-900 outline-none pr-10">
                            <button type="button" onclick="togglePassword('login-password', 'login-eye-icon')"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                                <i id="login-eye-icon" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-blue-950 text-white font-bold py-3 rounded text-sm uppercase tracking-wider hover:bg-blue-900 transition cursor-pointer">
                        Access User Dashboard
                    </button>

                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span
                            class="flex-shrink mx-4 text-gray-400 text-xs uppercase tracking-wider font-semibold">or</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <button type="button"
                        class="w-full flex items-center justify-center gap-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-4 rounded text-sm transition shadow-sm cursor-pointer">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" width="100%" height="100%"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                fill="#4285F4" />
                            <path
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                fill="#34A853" />
                            <path
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                                fill="#FBBC05" />
                            <path
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"
                                fill="#EA4335" />
                        </svg>
                        Sign in with Google
                    </button>
                    <div class="text-[11px] text-gray-500 text-center pt-1">
                        This site is protected by reCAPTCHA v3 and the Google
                        <a href="https://policies.google.com/privacy" class="text-blue-700 hover:underline"
                            target="_blank">Privacy Policy</a> and
                        <a href="https://policies.google.com/terms" class="text-blue-700 hover:underline"
                            target="_blank">Terms of Service</a> apply.
                    </div>

                    <div class="text-center pt-2">
                        <p class="text-sm text-gray-600">
                            Don't have an account?
                            <button type="button" onclick="switchAuthTab('register')"
                                class="text-blue-900 font-bold hover:underline cursor-pointer">Create Account</button>
                        </p>
                    </div>
                </form>

                <form id="form-register"
                    action="/register"
                    method="POST"
                    class="space-y-4 {{ $activeTab === 'register' ? '' : 'hidden' }}">
                    @csrf
                    @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm">
                        {{ session('error') }}
                    </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded text-sm">
                            <ul class="list-disc ml-5">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" class="recaptcha-token-field" name="recaptcha-token">


                    <div id="step-email" class="space-y-3">
                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">
                            Email Address
                        </label>
                        <input type="email" id="reg-email" required
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                        <div id="email-error" class="text-red-500 text-xs mt-1"></div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{ $message }}
                            </p>
                        @enderror

                        <button type="button" onclick="sendOtp()"
                            class="w-full bg-blue-900 text-white py-2 mt-3 rounded hover:bg-blue-800 transition cursor-pointer">
                            Send OTP
                        </button>
                    </div>

                    <div id="step-otp" class="hidden space-y-3">
                        <p class="text-sm text-gray-600 mb-2">
                            OTP sent to: <span id="otp-email" class="font-semibold text-blue-900"></span>
                        </p>

                        <label class="block text-xs font-bold uppercase text-gray-500 mb-1">
                            Enter OTP
                        </label>
                        <input type="text" id="otp" maxlength="6"
                            class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                        <div id="otp-error" class="text-red-500 text-xs mt-1"></div>

                        <button type="button" onclick="verifyOtp()"
                            class="w-full bg-green-600 text-white py-2 mt-3 rounded hover:bg-green-700 transition cursor-pointer">
                            Verify OTP
                        </button>

                        <button type="button" onclick="sendOtp(true)"
                            class="text-blue-600 text-sm mt-2 underline block mx-auto">
                            Resend OTP
                        </button>
                    </div>

                    <div id="step-register" class="hidden space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-1">First Name</label>
                                <input type="text" name="first_name" required
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Last Name</label>
                                <input type="text" name="last_name" required
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Password</label>
                            <div class="relative">
                                <input id="reg-password" type="password" name="password" required
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none pr-10">
                                <button type="button" onclick="togglePassword('reg-password', 'register-eye-icon')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-700">
                                    <i id="register-eye-icon" class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Password must be at least 8
                                characters long.</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-1">Date of
                                    Birth</label>
                                <input type="date" name="dob" required
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                            </div>
                            <div>
                                <label
                                    class="block text-xs font-bold uppercase text-gray-500 mb-1">Qualifications</label>
                                <input type="text" name="qualification" required placeholder="e.g. Class 10"
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm outline-none">
                            </div>
                        </div>

                        <div class="text-[11px] text-gray-500 text-center pt-1">
                            This site is protected by reCAPTCHA v3 and the Google
                            <a href="https://policies.google.com/privacy" class="text-blue-700 hover:underline"
                                target="_blank">Privacy Policy</a> and
                            <a href="https://policies.google.com/terms" class="text-blue-700 hover:underline"
                                target="_blank">Terms of Service</a> apply.
                        </div>

                        <button type="submit"
                            class="w-full bg-blue-950 text-white font-bold py-3 rounded text-sm uppercase tracking-wider hover:bg-blue-900 transition cursor-pointer">
                            Proceed & Register
                        </button>
                    </div>

                    <div class="space-y-4 pt-2">
                        <div class="relative flex items-center py-1">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span
                                class="flex-shrink mx-4 text-gray-400 text-xs uppercase tracking-wider font-semibold">or</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <button type="button"
                            class="w-full flex items-center justify-center gap-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-semibold py-2.5 px-4 rounded text-sm transition shadow-sm cursor-pointer">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" width="100%" height="100%"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"
                                    fill="#4285F4" />
                                <path
                                    d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"
                                    fill="#34A853" />
                                <path
                                    d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"
                                    fill="#FBBC05" />
                                <path
                                    d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.53 12-4.53z"
                                    fill="#EA4335" />
                            </svg>
                            Sign up with Google
                        </button>

                        <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Already have an account?
                                <button type="button" onclick="switchAuthTab('login')"
                                    class="text-blue-900 font-bold hover:underline cursor-pointer">Sign In</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
<script>
window.appConfig = {
    csrfToken: "{{ csrf_token() }}",
    recaptchaSiteKey: "{{ config('services.recaptcha.site_key') }}",
    hasErrors: {{ ($errors->any() || session('error')) ? 'true' : 'false' }}
};
</script>

<script src="{{ asset('assets/js/auth.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

@if($errors->any() || session('error'))
<script>
document.addEventListener('DOMContentLoaded', () => switchAuthTab('register'));
</script>
@endif

<script>
document.addEventListener('submit', function (e) {
    const form = e.target;

    if (!['form-login', 'form-register'].includes(form.id)) return;

    e.preventDefault();

    grecaptcha.ready(() => {
        grecaptcha.execute("{{ env('RECAPTCHA_SITE_KEY') }}", {
            action: form.id === 'form-login' ? 'login' : 'register'
        }).then(token => {
            form.querySelector('.recaptcha-token-field').value = token;
            form.submit();
        });
    });
});
</script>
</body>

</html>