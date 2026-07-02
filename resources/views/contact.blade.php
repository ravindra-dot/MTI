<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us | MyTalentIndia</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!--===================
            NAVBAR
    ==================== -->
    @include('Components.navbar')

    <!-- PAGE -->
    <section class="py-16 flex-1">
        <div class="max-w-6xl mx-auto px-4">

            <!-- Heading -->
            <div class="text-center mb-12">

                <span
                    class="inline-block bg-blue-100 text-blue-700 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full">
                    Support Center
                </span>

                <h1 class="text-4xl sm:text-5xl font-black text-blue-950 mt-5">
                    Contact Us
                </h1>

                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                    Need help regarding registration, payment, or artwork submission?
                </p>

            </div>

            <!-- GRID -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT -->
                <div class="space-y-6">

                    <div class="bg-white rounded-3xl border border-gray-200 p-6">
                        <div class="flex items-start gap-4">

                            <div
                                class="h-14 w-14 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-envelope"></i>
                            </div>

                            <div>
                                <h3 class="font-black text-blue-950 text-lg">
                                    Email Support
                                </h3>

                                <p class="text-gray-600 mt-2">
                                    support@mytalentindia.com
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="bg-white rounded-3xl border border-gray-200 p-6">
                        <div class="flex items-start gap-4">

                            <div
                                class="h-14 w-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl">
                                <i class="fa-solid fa-phone"></i>
                            </div>

                            <div>
                                <h3 class="font-black text-blue-950 text-lg">
                                    Phone Support
                                </h3>

                                <p class="text-gray-600 mt-2">
                                    +91 9833293078
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- RIGHT -->
                <div class="bg-white rounded-3xl border border-gray-200 p-8">

                    <h2 class="text-2xl font-black text-blue-950 mb-6">
                        Send Message
                    </h2>

                    <form class="space-y-5">

                        <input type="text"
                            placeholder="Full Name"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <input type="email"
                            placeholder="Email Address"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3">

                        <textarea rows="5"
                            placeholder="Write your message..."
                            class="w-full border border-gray-300 rounded-xl px-4 py-3"></textarea>

                        <button type="submit"
                            class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-xl font-bold transition">
                            Submit Message
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>