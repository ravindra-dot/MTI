<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Checkout | MyTalentIndia</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    @include('Components.navbar')

    <main class="flex-grow py-10 px-4">

        <div class="max-w-3xl mx-auto">

            <!-- Checkout Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-200">

                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-950 to-indigo-900 p-8 text-white">

                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                            <i class="fa-solid fa-shield-halved text-xl text-orange-400"></i>
                        </div>

                        <div>
                            <h1 class="text-2xl font-black">
                                Secure Checkout
                            </h1>

                            <p class="text-blue-200 text-sm">
                                Complete your contest registration payment
                            </p>
                        </div>
                    </div>

                </div>

                <!-- Body -->
                <div class="p-8 space-y-6">

                    <!-- User Details -->
                    <div class="grid md:grid-cols-2 gap-4">

                        <div class="bg-gray-50 rounded-xl p-4 border">
                            <p class="text-xs uppercase font-bold text-gray-500 mb-1">
                                Participant Name
                            </p>

                            <p class="font-semibold text-gray-800">
                                {{ ucwords(strtolower(Auth::user()->first_name)) }}
                                {{ ucwords(strtolower(Auth::user()->last_name)) }}
                            </p>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-4 border">
                            <p class="text-xs uppercase font-bold text-gray-500 mb-1">
                                Email Address
                            </p>

                            <p class="font-semibold text-gray-800">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                    </div>

                    <!-- Order Summary -->
                    <div class="border rounded-2xl overflow-hidden">

                        <div class="bg-gray-50 px-5 py-4 border-b">
                            <h3 class="font-bold text-gray-800">
                                Order Summary
                            </h3>
                        </div>

                        <div class="p-5 space-y-4">

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">
                                    Contest
                                </span>

                                <span class="font-semibold text-gray-800">
                                    All India Painting Competition 2026
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">
                                    Purpose
                                </span>

                                <span class="font-semibold text-gray-800">
                                    Competition Registration Fee
                                </span>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">
                                    Order ID
                                </span>

                                <span class="font-semibold text-gray-800">
                                    MTI-{{ auth()->id() }}
                                </span>
                            </div>

                            <hr>

                            <div class="flex justify-between items-center">

                                <span class="text-lg font-bold text-gray-800">
                                    Total Amount
                                </span>

                                <span class="text-3xl font-black text-orange-500">
                                    ₹49
                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- Notice -->
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">

                        <div class="flex gap-3">

                            <i class="fa-solid fa-circle-info text-blue-600 mt-1"></i>

                            <div>

                                <h4 class="font-bold text-blue-900 text-sm">
                                    Payment Information
                                </h4>

                                <p class="text-sm text-blue-700 mt-1">
                                    Registration payment unlocks blueprint download,
                                    artwork submission and participation certificate access.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Pay Button -->
                    <form action="{{ route('checkout.pay') }}" method="POST">

                        @csrf

                        <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-xl font-black uppercase tracking-wider shadow-lg transition cursor-pointer">

                            <i class="fa-solid fa-credit-card mr-2"></i>

                            Payment - ₹49

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </main>

    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>