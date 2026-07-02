<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Primary Meta Tags -->
    <title>MyTalentIndia | National & Global Art Competition 2026</title>
    <meta name="title" content="MyTalentIndia | National & Global Art Competition 2026">
    <meta name="description"
        content="Display. Compete. Shine! Join MyTalentIndia 2026—the ultimate national painting competition. Register today under the 'Future India' theme, download your blueprint, and showcase your creative artwork to the nation.">
    <meta name="keywords"
        content="MyTalentIndia, painting competition 2026, art contest India, Future India theme, national talent search, artist workspace, online art submission">
    <meta name="robots" content="index, follow">

    <!-- favicons -->
    <link rel="icon" type="image/png"
        href="{{ asset('assets/images/favicon/favicon-96x96.png') }}"
        sizes="96x96" />

    <link rel="icon" type="image/svg+xml"
        href="{{ asset('assets/images/favicon/favicon.svg') }}" />

    <link rel="shortcut icon"
        href="{{ asset('assets/images/favicon/favicon.ico') }}" />

    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}" />

    <meta name="apple-mobile-web-app-title" content="MTI" />

    <link rel="manifest"
        href="{{ asset('assets/images/favicon/site.webmanifest') }}" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.mytalentindia.com/">
    <meta property="og:title" content="MyTalentIndia | National & Global Art Competition 2026">
    <meta property="og:description"
        content="Showcase your creativity on a national stage! Register for the All India Painting Competition, unlock your workspace, and display your talent.">
    <meta property="og:image" content="https://www.mytalentindia.com/assets/images/banner/info-banner.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://www.mytalentindia.com/">
    <meta property="twitter:title" content="MyTalentIndia | National & Global Art Competition 2026">
    <meta property="twitter:description"
        content="Showcase your creativity on a national stage! Register for the All India Painting Competition, unlock your workspace, and display your talent.">
    <meta property="twitter:image" content="https://www.mytalentindia.com/assets/images/banner/info-banner.png">


    <!--css links -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="bg-gray-50 font-sans text-gray-800 flex flex-col min-h-screen">
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

    <!--Hero Section -->
    <section
        class="relative bg-gradient-to-b from-blue-900 via-blue-950 to-zinc-950 py-12 lg:py-20 overflow-hidden border-b-4 border-orange-500 min-h-[85vh] flex items-center">

        <!-- Background -->
        <div class="absolute inset-0 z-0 opacity-20 mix-blend-overlay pointer-events-none">
            <img src="{{ asset('assets/images/banner/Hero-bannerBg.jpg') }}"
                class="w-full h-full object-cover object-center"
                alt="Artistic Canvas Banner Background"
                loading="lazy">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(30,58,138,0.4),transparent_60%)] pointer-events-none z-0">
        </div>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10 w-full">

            <!-- LEFT SIDE -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">

                <span
                    class="bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full inline-block">
                    National & Global Level Event
                </span>

                @auth
                <div
                    class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest">
                    <i class="fa-solid fa-circle-check"></i>
                    Welcome Back {{ Auth::user()->first_name }}
                </div>
                @endauth

                <h1 class="text-3xl sm:text-5xl md:text-6xl font-black text-white leading-tight drop-shadow-sm">
                    ALL INDIA & GLOBAL <br>

                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-400 to-emerald-400">
                        PAINTING
                    </span>

                    COMPETITION 2026
                </h1>

                <div
                    class="bg-gradient-to-r from-green-700 to-emerald-800 text-white inline-block px-5 py-2.5 rounded-xl font-bold text-lg sm:text-2xl shadow-lg border border-green-600/30">
                    “भविष्य का भारत” | Future India
                </div>

                <p class="text-base sm:text-lg text-zinc-300 font-medium max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                    Express Your Vision. Inspire The Nation. Showcase your creativity on a premier global platform.
                </p>

                <!-- BUTTONS -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-4 pt-2">

                    @guest
                    <a href="/auth?tab=register"
                        class="bg-orange-500 text-white px-8 py-3.5 rounded-full font-bold shadow-lg hover:bg-orange-600 transition duration-200 text-sm sm:text-base w-full sm:w-auto text-center tracking-wide transform hover:-translate-y-0.5">
                        Register Now
                    </a>
                    @endguest

                    @auth
                    <a href="/dashboard"
                        class="bg-gradient-to-r from-emerald-500 to-green-600 text-white px-8 py-3.5 rounded-full font-bold shadow-lg hover:from-emerald-600 hover:to-green-700 transition duration-200 text-sm sm:text-base w-full sm:w-auto text-center tracking-wide transform hover:-translate-y-0.5">
                        Go To Dashboard
                    </a>
                    @endauth

                    <a href="#"
                        class="bg-white/10 text-white border border-white/20 px-8 py-3.5 rounded-full font-bold shadow-sm hover:bg-white/20 transition duration-200 text-sm sm:w-auto text-center w-full backdrop-blur-sm">
                        Download Brochure
                    </a>

                </div>
            </div>

            <!-- RIGHT SIDE CARD -->
            <div
                class="lg:col-span-5 bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 rounded-2xl shadow-2xl p-6 border border-white/10 text-center space-y-5 max-w-md mx-auto w-full transform transition duration-300 hover:scale-[1.01]">

                <!-- GUEST CONTENT -->
                @guest

                <div class="space-y-5">

                    <div
                        class="p-4 bg-gradient-to-r from-orange-500/10 to-amber-500/10 rounded-xl border border-orange-500/20 backdrop-blur-sm">

                        <p
                            class="text-xs sm:text-sm font-black text-orange-400 uppercase tracking-widest animate-pulse">
                            Entries Closing Soon
                        </p>

                        <div
                            class="text-2xl sm:text-3xl font-black text-white mt-1 tracking-tight drop-shadow-sm">
                            30th JULY 2026
                        </div>

                    </div>

                    <div
                        class="text-left space-y-3.5 text-xs sm:text-sm text-zinc-300 py-3 border-y border-white/10">

                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-check text-emerald-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Official Certification for All Participants
                            </span>
                        </div>

                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-check text-emerald-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Open Globally to Ages 2 to 17+ Years
                            </span>
                        </div>

                        <div class="flex items-center">
                            <i class="fa-solid fa-circle-check text-emerald-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Nominal Evaluation Fee of Just
                                <span class="text-amber-400 font-bold">₹49</span>
                            </span>
                        </div>

                    </div>

                    <div class="pt-1">
                        <a href="/auth?tab=login"
                            class="inline-block text-center text-sm font-bold text-orange-400 hover:text-orange-300 transition-colors duration-200 tracking-wide">
                            Already Registered? Go to Dashboard →
                        </a>
                    </div>

                </div>

                @endguest

                <!-- USER CONTENT -->
                @auth

                <div class="space-y-5">

                    <div
                        class="p-4 bg-gradient-to-r from-emerald-500/10 to-teal-500/10 rounded-xl border border-emerald-500/20 backdrop-blur-sm">

                        <p class="text-xs sm:text-sm font-black text-emerald-400 uppercase tracking-widest">
                            Welcome Back, Artist!
                        </p>

                        <div
                            class="text-xl sm:text-2xl font-black text-white mt-1 tracking-tight drop-shadow-sm">
                            {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </div>

                    </div>

                    <div
                        class="text-left space-y-3.5 text-xs sm:text-sm text-zinc-300 py-3 border-y border-white/10">

                        <div class="flex items-center">
                            <i class="fa-solid fa-trophy text-amber-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Complete your submission profile
                            </span>
                        </div>

                        <div class="flex items-center">
                            <i class="fa-solid fa-arrow-up-from-bracket text-blue-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Upload / Track your Painting Entry
                            </span>
                        </div>

                        <div class="flex items-center">
                            <i class="fa-solid fa-id-card text-purple-400 mr-3 text-base"></i>
                            <span class="font-medium">
                                Download ID card & Participation Receipt
                            </span>
                        </div>

                    </div>

                    <div class="grid grid-cols-2 gap-3 text-white text-xs">

                        <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                            <span class="block text-zinc-400 uppercase tracking-widest text-[10px]">
                                Status
                            </span>

                            <span class="font-black text-emerald-400">
                                Active
                            </span>
                        </div>

                        <div class="bg-white/5 border border-white/10 rounded-xl p-4">
                            <span class="block text-zinc-400 uppercase tracking-widest text-[10px]">
                                Category
                            </span>

                            <span class="font-black text-orange-400">
                                Painting
                            </span>
                        </div>

                    </div>

                    <div class="pt-1">
                        <a href="/dashboard"
                            class="bg-blue-600 hover:bg-blue-700 text-white block text-center text-sm font-bold py-3 rounded-xl transition duration-200 tracking-wide shadow-md">
                            Go to Dashboard →
                        </a>
                    </div>

                </div>

                @endauth

            </div>
        </div>
    </section>


    <!-- banner -->
    <div class="relative w-full overflow-hidden bg-cover bg-center mt-1 border border-gray-200/60"
        style="background-image: url('{{ asset('assets/images/banner/info-banner.png') }}'); aspect-ratio: 1920 / 800;">
    </div>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
            <h2 class="text-2xl sm:text-3xl font-black text-blue-950 uppercase tracking-tight">Unleash Your Creativity
                on a Global Stage</h2>
            <div class="w-20 h-1 bg-orange-500 mx-auto rounded-full"></div>
            <p class="text-sm sm:text-base text-gray-600 leading-relaxed pt-2">
                <strong>MyTalentIndia</strong> is proud to announce a premier National level painting competition. Our
                mission is to provide a platform for students, young artists, and creative visionaries to showcase their
                imagination regarding the future of our nation. Whether you are a budding artist in school or a creative
                mind in college, this is your chance to inspire the world through your strokes and colors.
            </p>
        </div>
    </section>

    <!-- How To Participate Section -->
    <section id="how-it-works" class="py-16 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-black text-center text-blue-950 uppercase mb-2">How to Participate</h2>
            <p class="text-center text-xs sm:text-sm text-gray-500 mb-10 font-medium">Simple 5-step process to global
                recognition</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Step 1 -->
                <div class="bg-white p-5 rounded-xl shadow-sm text-center relative border border-gray-200/60">
                    <div
                        class="w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm mx-auto mb-3">
                        1</div>
                    <h3 class="font-bold text-base text-gray-800 mb-1.5">Register Online</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Fill the registration form on our portal with
                        correct details.</p>
                </div>
                <!-- Step 2 -->
                <div class="bg-white p-5 rounded-xl shadow-sm text-center relative border border-gray-200/60">
                    <div
                        class="w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm mx-auto mb-3">
                        2</div>
                    <h3 class="font-bold text-base text-gray-800 mb-1.5">Nominal Fee</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Pay a minimal evaluation fee of only <span
                            class="font-bold text-gray-800">₹49</span> securely.</p>
                </div>
                <!-- Step 3 -->
                <div class="bg-white p-5 rounded-xl shadow-sm text-center relative border border-gray-200/60">
                    <div
                        class="w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm mx-auto mb-3">
                        3</div>
                    <h3 class="font-bold text-base text-gray-800 mb-1.5">Create Art</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Paint your thoughts on paper or canvas based on
                        your chosen theme.</p>
                </div>
                <!-- Step 4 -->
                <div class="bg-white p-5 rounded-xl shadow-sm text-center relative border border-gray-200/60">
                    <div
                        class="w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold text-sm mx-auto mb-3">
                        4</div>
                    <h3 class="font-bold text-base text-gray-800 mb-1.5">Upload Scan</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Take a clean, high-quality photograph and upload it
                        to your dashboard.</p>
                </div>
                <!-- Step 5 -->
                <div class="bg-white p-5 rounded-xl shadow-sm text-center relative border border-gray-200/60">
                    <div
                        class="w-8 h-8 bg-green-600 text-white rounded-full flex items-center justify-center font-bold text-sm mx-auto mb-3">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h3 class="font-bold text-base text-gray-800 mb-1.5">Get Certified</h3>
                    <p class="text-xs text-gray-500 leading-relaxed">Instantly download your official digital
                        participation certificate.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- How to participate section ends here -->

    <!--  THEMES SECTION -->
    <section id="themes" class="space-y-6">

        <!-- Center Heading -->
        <div class="flex justify-center">
            <div class="flex items-center gap-3">
                <h2
                    class="text-xl sm:text-2xl font-black text-white bg-purple-900 px-5 py-3 rounded-xl inline-block tracking-wide">
                    THEMES &amp; ARTISTIC FREEDOM
                </h2>
            </div>
        </div>

        <!-- Theme Cards -->
        <div class="flex flex-wrap justify-center gap-5">

            <!-- Card-->
            <div
                class="group w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-orange-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">

                <div
                    class="h-12 w-12 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center mb-4 text-lg shrink-0">
                    <i class="fa-solid fa-city"></i>
                </div>

                <h4 class="font-extrabold text-gray-900 text-base mb-2">
                    Future India
                </h4>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Visualize India’s progress in technology, infrastructure, innovation, or society.
                </p>
            </div>

            <!-- Card -->
            <div
                class="group w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-blue-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">

                <div
                    class="h-12 w-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center mb-4 text-lg shrink-0">
                    <i class="fa-solid fa-globe"></i>
                </div>

                <h4 class="font-extrabold text-gray-900 text-base mb-2">
                    Digital India
                </h4>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Showcase the transformation brought by the digital revolution and smart technologies.
                </p>
            </div>

            <!-- Card -->
            <div
                class="group w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-green-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">

                <div
                    class="h-12 w-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center mb-4 text-lg shrink-0">
                    <i class="fa-solid fa-leaf"></i>
                </div>

                <h4 class="font-extrabold text-gray-900 text-base mb-2">
                    Clean India
                </h4>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Highlight hygiene, cleanliness, awareness, and a litter-free nation.
                </p>
            </div>

            <!-- Card -->
            <div
                class="group w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-yellow-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">

                <div
                    class="h-12 w-12 rounded-xl bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4 text-lg shrink-0">
                    <i class="fa-solid fa-landmark"></i>
                </div>

                <h4 class="font-extrabold text-gray-900 text-base mb-2">
                    Indian Culture & Heritage
                </h4>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Celebrate traditions, festivals, monuments, and the diversity of India.
                </p>
            </div>

            <!-- Card -->
            <div
                class="group w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-emerald-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center">

                <div
                    class="h-12 w-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center mb-4 text-lg shrink-0">
                    <i class="fa-solid fa-earth-asia"></i>
                </div>

                <h4 class="font-extrabold text-gray-900 text-base mb-2">
                    Environment & Climate Change
                </h4>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Spread awareness about sustainability, nature, and protecting our planet.
                </p>
            </div>

        </div>

        <!-- Rules & Mediums Notice Block -->
        <div
            class="max-w-[95%] lg:max-w-[96%] mx-auto p-5 bg-zinc-50 border border-zinc-200 rounded-2xl space-y-4 shadow-sm">
            <div>
                <h4 class="text-xs font-bold text-zinc-700 uppercase tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-palette text-purple-600"></i> Mediums Allowed
                </h4>
                <p class="text-xs sm:text-sm text-zinc-600 mt-1 leading-relaxed font-medium">
                    Drawing, Sketching, Watercolors, Acrylics, Oil Paints, or Digital Painting tools.
                </p>
            </div>
            <div class="border-t border-zinc-200"></div>
            <div class="flex items-start gap-3">
                <span class="text-red-500 mt-0.5"><i class="fa-solid fa-triangle-exclamation"></i></span>
                <div>
                    <h5 class="text-xs font-bold text-red-700 uppercase tracking-wide">Strict Policy: No AI Art</h5>
                    <p class="text-xs sm:text-sm text-zinc-500 mt-0.5 leading-relaxed">
                        Digital Painting is allowed, but <span class="font-bold text-red-600">NO AI-generated
                            art</span>. Winners must provide layer breakdown or time-lapse video as proof.
                    </p>
                </div>
            </div>
        </div>

    </section>


    <!-- CATEGORIES SECTION -->
    <section id="categories" class="space-y-6 mt-16">

        <!-- Center Heading -->
        <div class="flex justify-center">
            <div class="flex items-center gap-3">
                <h2
                    class="text-xl sm:text-2xl font-black text-white bg-blue-900 px-5 py-3 rounded-xl inline-block tracking-wide">
                    PARTICIPATION CATEGORIES
                </h2>
            </div>
        </div>

        <!-- Category Cards -->
        <div class="flex flex-wrap justify-center gap-5">

            <!-- Group A -->
            <div
                class="w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-blue-600 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-black text-lg text-gray-900">
                        Group A
                    </h4>

                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                        Ages 2 – 4
                    </span>
                </div>

                <p class="text-sm text-gray-500 leading-relaxed">
                    For toddlers beginning their first creative journey with colors and shapes.
                </p>
            </div>

            <!-- Group B -->
            <div
                class="w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-orange-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-black text-lg text-gray-900">
                        Group B
                    </h4>

                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                        Ages 5 – 7
                    </span>
                </div>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Young artists exploring imagination and colorful storytelling.
                </p>
            </div>

            <!-- Group C -->
            <div
                class="w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-blue-600 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-black text-lg text-gray-900">
                        Group C
                    </h4>

                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                        Ages 8 – 11
                    </span>
                </div>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Primary school participants with creative ideas and expressive thinking.
                </p>
            </div>

            <!-- Group D -->
            <div
                class="w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-4 border-l-yellow-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-black text-lg text-gray-900">
                        Group D
                    </h4>

                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                        Ages 12 – 16
                    </span>
                </div>

                <p class="text-sm text-gray-500 leading-relaxed">
                    High school students ready to showcase advanced creativity and skills.
                </p>
            </div>

            <!-- Group E -->
            <div
                class="w-full sm:w-[48%] lg:w-[31%] bg-white border border-zinc-200 border-l-4 border-l-emerald-500 rounded-2xl p-5 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                <div class="flex items-center justify-between mb-4">
                    <h4 class="font-black text-lg text-gray-900">
                        Group E
                    </h4>

                    <span class="text-xs font-bold bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                        Ages 17+
                    </span>
                </div>

                <p class="text-sm text-gray-500 leading-relaxed">
                    Open category for college students and independent artists.
                </p>
            </div>

        </div>

        <!-- Institutional Note Card -->
        <div
            class="max-w-[95%] lg:max-w-[96%] mx-auto p-5 bg-amber-50 border border-amber-200 border-l-4 border-l-amber-500 rounded-2xl flex items-start gap-3 shadow-sm">
            <span class="text-amber-600 mt-0.5"><i class="fa-solid fa-building-columns text-base"></i></span>
            <div>
                <h4 class="text-xs font-bold text-amber-800 uppercase tracking-wide">Note for Institutions</h4>
                <p class="text-xs sm:text-sm text-amber-700 mt-0.5 leading-relaxed">
                    We offer specialized <span class="font-bold">School and College Group Entry</span> options to
                    facilitate easy bulk registration.
                </p>
            </div>
        </div>

    </section>

    <!--Rewards, Recognition -->
    <section id="prizes"
        class="py-16 bg-gradient-to-b from-gray-50 to-white text-zinc-800 relative border-t border-gray-100 overflow-hidden">

        <!-- Subtle Background Decorative Glows for Appeal -->
        <div
            class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[500px] h-[500px] bg-amber-400/10 rounded-full blur-3xl pointer-events-none">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            <!-- Header Section -->
            <div class="text-center space-y-2 mb-10">
                <span
                    class="text-xs font-bold uppercase text-orange-600 tracking-widest bg-orange-50 px-3 py-1 rounded-full inline-block">
                    Excellence Deserves Reward
                </span>
                <h2 class="text-2xl sm:text-3xl font-black text-blue-900 uppercase tracking-tight">Rewards & Recognition
                </h2>
                <p class="text-xs sm:text-sm text-gray-500 max-w-xl mx-auto">
                    Grand cash prizes, trophies, and premium dynamic tech kits for every category group.
                </p>
            </div>

            <!--HIGHLY APPEALING MEGA REWARD FEATURE BANNER -->
            <div
                class="mb-12 bg-gradient-to-br from-blue-950 via-indigo-950 to-slate-950 rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl border border-white/10 relative overflow-hidden group">

                <div
                    class="absolute -right-10 -bottom-10 w-60 h-60 bg-gradient-to-tr from-amber-500 to-orange-500 rounded-full blur-2xl opacity-20 group-hover:opacity-30 transition-opacity duration-500">
                </div>
                <div class="absolute -left-10 -top-10 w-40 h-40 bg-blue-500 rounded-full blur-2xl opacity-10"></div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8 items-center relative z-10">
                    <!-- Left Content Area -->
                    <div class="lg:col-span-7 space-y-4 text-center lg:text-left">
                        <div
                            class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 px-3 py-1 rounded-full text-xs font-bold text-amber-400 uppercase tracking-wider">
                            <i class="fa-solid fa-star animate-spin-slow"></i> Season Grand Prize Pool
                        </div>
                        <h3 class="text-2xl sm:text-4xl font-black text-white tracking-tight leading-tight">
                            Unleash Your Creative Potential & Win Big!
                        </h3>
                        <p class="text-xs sm:text-sm text-zinc-300 leading-relaxed max-w-2xl">
                            Compete at a national level to claim cash rewards, high-end design gadgets, and prestigious
                            physical trophies. Your talent deserves a platform that honors your hard work.
                        </p>
                        <div
                            class="flex flex-wrap gap-4 justify-center lg:justify-start pt-2 text-xs sm:text-sm text-white font-medium">
                            <span class="flex items-center gap-1.5"><i
                                    class="fa-solid fa-circle-check text-emerald-400"></i> Cash Prizes</span>
                            <span class="flex items-center gap-1.5"><i
                                    class="fa-solid fa-circle-check text-emerald-400"></i> Physical Trophies</span>
                            <span class="flex items-center gap-1.5"><i
                                    class="fa-solid fa-circle-check text-emerald-400"></i> Tech Gadgets</span>
                        </div>
                    </div>

                    <!-- Right Big Visual Highlight Area -->
                    <div
                        class="lg:col-span-5 bg-white/5 border border-white/10 rounded-2xl p-6 text-center backdrop-blur-sm shadow-inner relative overflow-hidden">
                        <div
                            class="absolute top-0 left-0 bg-amber-500 text-blue-950 font-black text-[10px] uppercase px-3 py-1 rounded-br-xl tracking-wider">
                            Mega Reward
                        </div>
                        <p class="text-xs font-bold text-zinc-400 uppercase tracking-widest mt-2">Highest Individual
                            Rank</p>
                        <div class="my-3 flex items-center justify-center gap-2">
                            <span
                                class="text-4xl sm:text-5xl font-black tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-orange-400 to-amber-200">
                                ₹51,000
                            </span>
                        </div>
                        <p class="text-xs text-amber-300 font-semibold tracking-wide">
                            <i class="fa-solid fa-trophy mr-1"></i> Mega Rank 1 Cash Prize + Premium Graphic Tablet Kit
                        </p>
                    </div>
                </div>
            </div>

            <!-- Prize Cards Grid (Rest of the ranks) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 items-stretch">

                <!-- 1st Prize Card -->
                <div
                    class="bg-white p-6 rounded-2xl border-2 border-amber-400 shadow-md hover:shadow-xl flex flex-col justify-between text-center relative overflow-hidden group transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="absolute top-0 right-0 bg-gradient-to-l from-amber-500 to-orange-500 text-white font-black text-[10px] uppercase px-3 py-1 rounded-bl-lg tracking-wider shadow-sm">
                        Mega Rank 1
                    </div>
                    <div class="space-y-4 my-auto pt-2">
                        <div class="text-4xl text-amber-500 drop-shadow-sm"><i class="fa-solid fa-trophy"></i></div>
                        <div>
                            <h4 class="text-3xl font-black tracking-tight text-blue-950">₹51,000</h4>
                            <p class="text-xs font-bold uppercase text-amber-600 tracking-wider mt-0.5">Cash Reward</p>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-medium">
                            + Winner Trophy, Official Printed Certificate & Professional Graphic Tablet
                        </p>
                    </div>
                </div>

                <!-- 2nd Prize Card -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md flex flex-col justify-between text-center relative overflow-hidden group transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="absolute top-0 right-0 bg-gray-400 text-white font-bold text-[10px] uppercase px-3 py-1 rounded-bl-lg tracking-wider">
                        Rank 2
                    </div>
                    <div class="space-y-4 my-auto pt-2">
                        <div class="text-4xl text-slate-400"><i class="fa-solid fa-award"></i></div>
                        <div>
                            <h4 class="text-3xl font-black tracking-tight text-blue-950">₹25,000</h4>
                            <p class="text-xs font-bold uppercase text-slate-500 tracking-wider mt-0.5">Cash Reward</p>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-medium">
                            + Runner Up Trophy, Printed Certificate & Slim Graphic Tablet
                        </p>
                    </div>
                </div>

                <!-- 3rd Prize Card -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md flex flex-col justify-between text-center relative overflow-hidden group transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="absolute top-0 right-0 bg-amber-700 text-white font-bold text-[10px] uppercase px-3 py-1 rounded-bl-lg tracking-wider">
                        Rank 3
                    </div>
                    <div class="space-y-4 my-auto pt-2">
                        <div class="text-4xl text-amber-700"><i class="fa-solid fa-award"></i></div>
                        <div>
                            <h4 class="text-3xl font-black tracking-tight text-blue-950">₹10,000</h4>
                            <p class="text-xs font-bold uppercase text-amber-800 tracking-wider mt-0.5">Cash Reward</p>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-medium">
                            + Second Runner Trophy, Printed Certificate & Graphic Tablet
                        </p>
                    </div>
                </div>

                <!-- Consolation Card -->
                <div
                    class="bg-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md flex flex-col justify-between text-center relative overflow-hidden group transition-all duration-300 transform hover:-translate-y-1">
                    <div
                        class="absolute top-0 right-0 bg-purple-600 text-white font-bold text-[10px] uppercase px-3 py-1 rounded-bl-lg tracking-wider">
                        Top 10
                    </div>
                    <div class="space-y-4 my-auto pt-2">
                        <div class="text-4xl text-purple-500"><i class="fa-solid fa-medal"></i></div>
                        <div>
                            <h4 class="text-3xl font-black tracking-tight text-blue-950">₹2,000</h4>
                            <p class="text-xs font-bold uppercase text-purple-600 tracking-wider mt-0.5">Consolation</p>
                        </div>
                        <p class="text-xs text-gray-600 leading-relaxed font-medium">
                            Merit Certificate for each dynamic category + Premium Art Executive Kit
                        </p>
                    </div>
                </div>
            </div>

            <!-- Participation Note -->
            <div
                class="mt-8 text-center bg-green-50 border border-green-200/60 px-6 py-4 rounded-xl max-w-2xl mx-auto shadow-sm">
                <p class="text-xs sm:text-sm text-green-800 font-medium">
                    <i class="fa-solid fa-certificate text-green-600 mr-2 text-base"></i>
                    <span class="font-bold text-green-950">Participation for All:</span> Every single participant will
                    download an official verified digital E-Certificate instantly.
                </p>
            </div>

            <!-- Fame Factor Subgrid -->
            <div class="mt-16 border-t border-gray-200 pt-12 grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="space-y-2 group">
                    <div
                        class="text-orange-500 text-2xl transition-transform duration-300 group-hover:scale-110 inline-block">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <h4 class="font-bold text-base text-blue-950">National Hall of Fame</h4>
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                        Artwork of the Top 100 participants from every single category will be permanently featured on
                        the online public gallery portal.
                    </p>
                </div>
                <div class="space-y-2 group">
                    <div
                        class="text-pink-500 text-2xl transition-transform duration-300 group-hover:scale-110 inline-block">
                        <i class="fa-solid fa-video"></i>
                    </div>
                    <h4 class="font-bold text-base text-blue-950">Social Media Spotlight</h4>
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                        Winners will be featured in exclusive video interviews, project showcases, and reels across
                        official YouTube and Instagram handles.
                    </p>
                </div>
                <div class="space-y-2 group">
                    <div
                        class="text-blue-500 text-2xl transition-transform duration-300 group-hover:scale-110 inline-block">
                        <i class="fa-solid fa-newspaper"></i>
                    </div>
                    <h4 class="font-bold text-base text-blue-950">Press & Media Coverage</h4>
                    <p class="text-xs sm:text-sm text-gray-500 leading-relaxed">
                        High-achieving winners will get showcased across prominent digital news networks and local print
                        newspapers with headshots.
                    </p>
                </div>
            </div>

            <!-- Institutional & Lucky Draw Cards Bottom -->
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Institutional Awards -->
                <div
                    class="p-5 bg-gradient-to-r from-blue-50 to-indigo-50/50 border border-blue-100 rounded-xl flex gap-4 items-start shadow-sm">
                    <div class="text-2xl text-blue-600 mt-0.5"><i class="fa-solid fa-building-columns"></i></div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-blue-950 uppercase tracking-wide">Institutional Excellence
                            Awards</h4>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            <span class="text-blue-700 font-bold">Best Institution:</span> Prestigious "Golden Trophy"
                            for maximum bulk entry count. <br>
                            <span class="text-blue-700 font-bold">Inspirational Teacher:</span> Recognition kits for
                            proactive leading educators.
                        </p>
                    </div>
                </div>

                <!-- Lucky Draw -->
                <div
                    class="p-5 bg-gradient-to-r from-purple-50 to-fuchsia-50/50 border border-purple-100 rounded-xl flex gap-4 items-start shadow-sm">
                    <div class="text-2xl text-purple-600 mt-0.5"><i class="fa-solid fa-clover"></i></div>
                    <div class="space-y-1">
                        <h4 class="text-sm font-bold text-purple-950 uppercase tracking-wide">Surprise Mega Lucky Draw
                        </h4>
                        <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                            Every participant has equal luck! For <span class="text-purple-700 font-bold">every 10,000
                                global registrations</span>, a live transparent computer draw will award premium gadgets
                            (Smartwatches / Speakers).
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Gallery Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <!-- Heading -->
        <div class="text-center mb-8">
            <h2 class="text-2xl sm:text-3xl font-black text-blue-900 mb-2 uppercase tracking-tight">
                National Hall of Fame Preview
            </h2>

            <p class="text-xs sm:text-sm text-gray-400 font-medium">
                Glance through last year's top trending exceptional entries
            </p>
        </div>

        <!--Gallery Images -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img1.jpg') }}" alt="Art 1"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img2.jpg') }}" alt="Art 2"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img3.jpg') }}" alt="Art 3"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img2.jpg') }}" alt="Art 2"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img1.jpg') }}" alt="Art 1"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

            <!-- Card -->
            <div class="group overflow-hidden rounded-2xl bg-white shadow border border-gray-200">
                <img src="{{ asset('assets/images/img-gallery/img3.jpg') }}" alt="Art 3"
                    class="w-full h-64 object-cover transition duration-500 group-hover:scale-105" loading="lazy">
            </div>

        </div>

    </section>
    <!--Timeline Section -->
    <section id="timeline" class="py-16 bg-zinc-100 border-t border-b border-gray-200/60">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl sm:text-3xl font-black text-center text-blue-950 uppercase mb-2 tracking-tight">
                Important Timeline</h2>
            <p class="text-center text-xs sm:text-sm text-gray-500 mb-10">Mark your schedules so you do not miss
                deadlines</p>

            <div class="relative border-l-2 border-orange-400 ml-4 sm:ml-32 space-y-8">
                <!-- Node 1 -->
                <div class="relative pl-6">
                    <div
                        class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-orange-500 border-4 border-white shadow-sm">
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                        <span
                            class="text-sm font-black text-orange-600 sm:absolute sm:-left-32 sm:w-24 sm:text-right">20th
                            MAY 2026</span>
                        <h4 class="font-bold text-gray-800 text-sm sm:text-base">Registration & Portal Launch</h4>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">Online entry gateway opens for all five active category
                        groups globally.</p>
                </div>
                <!-- Node 2 -->
                <div class="relative pl-6">
                    <div
                        class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-red-600 border-4 border-white shadow-sm">
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                        <span class="text-sm font-black text-red-600 sm:absolute sm:-left-32 sm:w-24 sm:text-right">30th
                            JULY 2026</span>
                        <h4 class="font-bold text-gray-800 text-sm sm:text-base">Final Submission Deadline</h4>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">All high-quality artwork scans must be fully submitted via
                        dashboards before midnight.</p>
                </div>
                <!-- Node 3 -->
                <div class="relative pl-6">
                    <div
                        class="absolute -left-[9px] top-1.5 w-4 h-4 rounded-full bg-green-600 border-4 border-white shadow-sm">
                    </div>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                        <span
                            class="text-sm font-black text-green-600 sm:absolute sm:-left-32 sm:w-24 sm:text-right">15th
                            AUGUST 2026</span>
                        <h4 class="font-bold text-gray-800 text-sm sm:text-base">Grand Result Announcement</h4>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">National winners declared live on Independence Day across
                        media networks.</p>
                </div>
            </div>
        </div>
    </section>

    <!--Terms & Conditions Checklist -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <h2
                class="text-xl sm:text-2xl font-black text-blue-950 uppercase mb-6 tracking-tight flex items-center gap-2">
                <i class="fa-solid fa-scale-balanced text-orange-500 text-lg"></i> Terms & Conditions
            </h2>
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-5 space-y-3.5 text-xs sm:text-sm text-gray-600">
                <div class="flex items-start gap-3"><i
                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0"></i>
                    <p>Artwork must be 100% original. Any form of plagiarism or tracing will lead to instantaneous
                        disqualification.</p>
                </div>
                <div class="flex items-start gap-3"><i
                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0"></i>
                    <p>Entries once fully submitted onto the dashboard system are locked final and cannot be modified
                        under any scenarios.</p>
                </div>
                <div class="flex items-start gap-3"><i
                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0"></i>
                    <p>The strategic decision of the authorized MyTalentIndia specialized judging panel will remain
                        ultimate, final, and binding.</p>
                </div>
                <div class="flex items-start gap-3"><i
                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0"></i>
                    <p>By participating, you inherently grant MyTalentIndia media rights to showcases the design assets
                        on public channels for promotion.</p>
                </div>
            </div>
        </div>
    </section>

<!-- =========================
            FOOTER
========================= -->
    @include('Components.footer')
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>