<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Terms & Conditions | MyTalentIndia</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!--===================
            NAVBAR
    ==================== -->
    <nav id="smart-navbar"
        class="bg-white/95 backdrop-blur-md shadow-md sticky top-0 z-50 border-b border-gray-100">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between py-3 lg:py-4">

                <!-- LOGO -->
                <a href="/"
                    class="flex items-center gap-3 group">

                    <img class="h-12 w-12 sm:h-14 sm:w-14 transition-transform duration-300 group-hover:scale-105"
                        src="{{ asset('assets/images/logo-icon.png') }}"
                        alt="MyTalentIndia Logo">

                    <div class="leading-tight">

                        <h2 class="text-base sm:text-lg font-black text-blue-950 tracking-tight">
                            My<span class="text-orange-500">Talent</span>India
                        </h2>

                        <span
                            class="text-[9px] text-gray-400 tracking-[0.25em] uppercase font-bold">
                            Display. Compete. Shine.
                        </span>

                    </div>

                </a>

                <!-- DESKTOP NAV -->
                <div
                    class="hidden lg:flex items-center gap-7 font-bold text-[13px] uppercase tracking-wider text-gray-600">

                    <a href="/"
                        class="hover:text-orange-500 transition duration-200">
                        Home
                    </a>

                    <a href="/about-us"
                        class="hover:text-orange-500 transition duration-200">
                        About Us
                    </a>

                    <a href="/gallery"
                        class="hover:text-orange-500 transition duration-200">
                        Gallery
                    </a>

                    <a href="/contact"
                        class="hover:text-orange-500 transition duration-200">
                        Contact
                    </a>

                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-3">

                    <!-- GUEST -->
                    @guest

                    <a href="/auth"
                        class="hidden lg:inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 via-amber-500 to-orange-500 text-white text-sm font-bold px-5 py-2.5 rounded-full shadow-lg shadow-orange-500/20 hover:scale-[1.03] active:scale-95 transition-all duration-300">

                        <i class="fa-solid fa-user"></i>

                        Login / Register

                    </a>

                    @endguest

                    <!-- USER -->
                    @auth

                    <!-- <a href="/dashboard"
                            class="hidden lg:flex items-center gap-3 bg-white border border-gray-200 rounded-full py-1.5 pl-2 pr-4 shadow-sm hover:shadow-md transition-all duration-300">

                            <div class="h-11 w-11 rounded-full overflow-hidden">
                                <img src="{{ asset('assets/images/logo-icon.png') }}"
                                    class="h-full w-full object-cover">
                            </div>

                            <div class="hidden sm:flex flex-col leading-tight">
                                <span class="text-xs text-gray-500">
                                    Welcome
                                </span>

                                <span class="text-sm font-bold text-blue-950">
                                    {{ Auth::user()->first_name }}
                                </span>
                            </div>

                        </a> -->

                    <a id="profile" href="/dashboard"
                        class="group relative flex items-center gap-3 bg-white/80 backdrop-blur-md border border-blue-100 rounded-full pr-4 pl-2 py-1.5 shadow-md hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">

                        <!-- Avatar -->
                        <div
                            class="relative h-11 w-11 rounded-full overflow-hidden ring-2 ring-blue-500/30 group-hover:ring-blue-500 transition-all duration-300">
                            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="Dashboard"
                                class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300"
                                loading="lazy">
                        </div>

                        <!-- User Text -->
                        <div class="hidden sm:flex flex-col leading-tight">
                            <span class="text-xs text-gray-500">Welcome</span>
                            <span class="text-sm font-semibold text-blue-900">
                                {{ Auth::user()->first_name }}
                            </span>
                        </div>

                        <!-- Arrow -->
                        <i
                            class="fa-solid fa-chevron-right text-xs text-blue-700 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>

                    @endauth

                    <!-- MOBILE BUTTON -->
                    <button id="mobile-menu-btn"
                        class="lg:hidden h-11 w-11 rounded-full bg-white border border-gray-200 shadow-sm flex items-center justify-center text-blue-950">

                        <i id="menu-icon"
                            class="fa-solid fa-bars text-lg"></i>

                    </button>

                </div>

            </div>

        </div>

        <!-- MOBILE MENU -->
        <div id="mobile-dropdown-menu"
            class="hidden lg:hidden bg-white border-t border-gray-100 shadow-inner">

            <div class="px-4 py-5 space-y-3">

                <!-- MOBILE LINKS -->
                <a href="/"
                    class="block py-3 px-4 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 hover:text-orange-500 transition">
                    Home
                </a>

                <a href="/about-us"
                    class="block py-3 px-4 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 hover:text-orange-500 transition">
                    About US
                </a>

                <a href="/gallery"
                    class="block py-3 px-4 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 hover:text-orange-500 transition">
                    Gallery
                </a>

                <a href="/contact"
                    class="block py-3 px-4 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 hover:text-orange-500 transition">
                    Contact Us
                </a>

                <!-- MOBILE GUEST -->
                @guest

                <div class="pt-2">

                    <a href="/auth"
                        class="w-full inline-flex justify-center items-center gap-2 bg-gradient-to-r from-orange-500 via-amber-500 to-orange-500 text-white text-sm font-bold px-5 py-3 rounded-xl shadow-lg shadow-orange-500/20">

                        <i class="fa-solid fa-user"></i>

                        Login / Register

                    </a>

                </div>

                @endguest

                <!-- MOBILE USER -->
                @auth

                <div class="pt-2">

                    <a href="/dashboard"
                        class="w-full inline-flex justify-center items-center gap-2 bg-blue-950 text-white text-sm font-bold px-5 py-3 rounded-xl">

                        <i class="fa-solid fa-user"></i>

                        Go To Dashboard

                    </a>

                </div>

                @endauth

            </div>

        </div>

    </nav>
    <!-- navbar ends here -->

    <!-- PAGE -->
    <section class="py-16 flex-1">
        <div class="max-w-5xl mx-auto px-4">

            <!-- HEADING -->
            <div class="text-center mb-12">

                <span
                    class="inline-block bg-orange-100 text-orange-600 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full">
                    Legal Information
                </span>

                <h1 class="text-4xl sm:text-5xl font-black text-blue-950 mt-5">
                    Terms & Conditions
                </h1>

                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">
                    Please read these terms carefully before using the platform.
                </p>

            </div>

            <!-- CARD -->
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-10 space-y-8">

                <div>
                    <h2 class="text-xl font-black text-blue-950 mb-3">
                        1. Participation Rules
                    </h2>

                    <p class="text-gray-600 leading-relaxed">
                        All artworks submitted must be completely original and created by the participant.
                        Any copied, traced, or AI-generated artwork may lead to direct disqualification.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-black text-blue-950 mb-3">
                        2. Submission Policy
                    </h2>

                    <p class="text-gray-600 leading-relaxed">
                        Once the artwork is submitted successfully, entries cannot be edited or replaced.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-black text-blue-950 mb-3">
                        3. Judging Decision
                    </h2>

                    <p class="text-gray-600 leading-relaxed">
                        Decisions made by the MyTalentIndia judging panel shall remain final and binding.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-black text-blue-950 mb-3">
                        4. Media Usage Rights
                    </h2>

                    <p class="text-gray-600 leading-relaxed">
                        Participants grant permission to MyTalentIndia to use submitted artwork
                        for promotional and educational purposes.
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-black text-blue-950 mb-3">
                        5. Account Suspension
                    </h2>

                    <p class="text-gray-600 leading-relaxed">
                        MyTalentIndia reserves the right to suspend accounts involved in suspicious,
                        abusive, or fraudulent activities.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER -->
    @include('Components.footer')
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>