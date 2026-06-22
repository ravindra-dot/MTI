<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | MyTalentIndia</title>
    <!-- Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome -->
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

    <!-- =========================
        HERO SECTION
    ========================= -->
    <section class="relative bg-gradient-to-br from-blue-950 via-blue-900 to-zinc-950 overflow-hidden py-20 sm:py-28">
        <!-- Background Glow Effects -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-500/20 blur-3xl rounded-full pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500/20 blur-3xl rounded-full pointer-events-none"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
            <!-- Subheading Badge -->
            <span class="inline-block bg-orange-500/20 border border-orange-500/30 text-orange-300 text-xs font-bold uppercase tracking-[0.25em] px-5 py-2 rounded-full">
                About MyTalentIndia
            </span>

            <!-- Main Headline -->
            <h1 class="mt-6 text-4xl sm:text-6xl font-black text-white leading-tight tracking-tight">
                Empowering India's
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 via-amber-400 to-yellow-300">
                    Creative Generation
                </span>
            </h1>

            <!-- Descriptive Paragraph -->
            <p class="mt-6 text-gray-300 text-base sm:text-lg leading-relaxed max-w-3xl mx-auto">
                MyTalentIndia is a national-level creative platform dedicated to discovering,
                promoting, and celebrating artistic talent from every corner of India.
                We provide students and young creators a stage to express their imagination,
                creativity, and vision through meaningful competitions.
            </p>
        </div>
    </section>
    <!-- =========================
            STATS SECTION
    ========================= -->

    <section class="py-20 bg-gray-50 border-y border-gray-200">
        <div class="max-w-6xl mx-auto px-4">

        <div class="text-center mb-14">

            <h2
                class="text-3xl sm:text-4xl font-black text-blue-950">

                Growing Creative Community

            </h2>

            <p class="text-gray-500 mt-4">

                Thousands of young artists trust MyTalentIndia.

            </p>

        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">

            <div
                class="bg-white rounded-3xl border border-gray-200 p-8 text-center shadow-sm">

                <h3 class="text-4xl font-black text-orange-500">

                    10K+

                </h3>

                <p class="text-gray-600 mt-3 font-medium">

                    Participants

                </p>

            </div>

            <div
                class="bg-white rounded-3xl border border-gray-200 p-8 text-center shadow-sm">

                <h3 class="text-4xl font-black text-blue-600">

                    28+

                </h3>

                <p class="text-gray-600 mt-3 font-medium">

                    States Covered

                </p>

            </div>

            <div
                class="bg-white rounded-3xl border border-gray-200 p-8 text-center shadow-sm">

                <h3 class="text-4xl font-black text-green-500">

                    500+

                </h3>

                <p class="text-gray-600 mt-3 font-medium">

                    Winners Recognized

                </p>

            </div>

            <div
                class="bg-white rounded-3xl border border-gray-200 p-8 text-center shadow-sm">

                <h3 class="text-4xl font-black text-purple-500">

                    100%

                </h3>

                <p class="text-gray-600 mt-3 font-medium">

                    Digital Platform

                </p>

            </div>

        </div></div>
    </section>

    <!-- =========================
        ABOUT / MISSION SECTION
    ========================== -->
    <section class="py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-start">

                <!-- LEFT COLUMN: IMAGE STICKY ANCHOR -->
                <div class="lg:sticky lg:top-10 space-y-6">
                    <div class="relative group">
                        <!-- Subtle design accent decoration behind the banner image -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-orange-500 rounded-3xl blur opacity-15 group-hover:opacity-25 transition duration-500"></div>

                        <img src="https://encrypted-tbn3.gstatic.com/licensed-image?q=tbn:ANd9GcRfBUTCt2oNEGjYhX8JmKqph3sLv2GSgdTGcXqjPAfijcjKyxWreAzHocH_V-TGs0bpLSdQ08sp8x3FPo0"
                            class="relative rounded-3xl shadow-2xl border border-gray-200 w-full object-cover z-10"
                            alt="About MyTalentIndia">
                    </div>

                    <!-- QUICK TRUST FOOTER UNDER IMAGE (Prevents left-side blank pockets) -->
                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 flex items-center gap-4">
                        <div class="h-10 w-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-flag text-sm"></i>
                        </div>
                        <p class="text-xs font-semibold text-blue-950 leading-relaxed">
                            A certified national initiative bringing together schools, educators, and young artists across India.
                        </p>
                    </div>
                </div>

                <!-- RIGHT COLUMN: NARRATIVE & STRATEGIC VISION -->
                <div class="space-y-8">

                    <!-- SECTION INTRO -->
                    <div>
                        <span class="inline-block bg-blue-100 text-blue-700 text-xs font-black uppercase tracking-[0.2em] px-4 py-2 rounded-full">
                            Who We Are
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-black text-blue-950 mt-4 leading-tight">
                            Inspiring Young Artists Across The Nation
                        </h2>
                    </div>

                    <!-- PLATFORM OVERVIEW -->
                    <div class="text-gray-600 leading-relaxed text-base space-y-4">
                        <p>
                            MyTalentIndia is dedicated to discovering and empowering creative minds from every corner of the country through meaningful artistic opportunities and national-level exposure.
                        </p>
                        <p>
                            Our platform encourages imagination, innovation, and self-expression by providing competitions, certifications, showcases, and recognition programs designed for the next generation of artists and creators.
                        </p>
                    </div>

                    <!-- CORE STRATEGY: MISSION & VISION CARDS -->
                    <div class="space-y-4 pt-2">

                        <!-- MISSION BLOCK -->
                        <div class="p-6 bg-gradient-to-br from-slate-50 to-white border border-slate-100 rounded-2xl shadow-sm space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-200">
                                    <i class="fa-solid fa-bullseye text-sm"></i>
                                </div>
                                <h4 class="font-black text-blue-950 text-base uppercase tracking-wider">Our Mission</h4>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                To build an accessible digital stage that reaches rural and urban youth alike. We aim to break down regional barriers, providing equal premium tools, certified recognition, and media exposure to cultivate creative confidence in students.
                            </p>
                        </div>

                        <!-- VISION BLOCK -->
                        <div class="p-6 bg-gradient-to-br from-slate-50 to-white border border-slate-100 rounded-2xl shadow-sm space-y-3">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 rounded-xl bg-orange-500 text-white flex items-center justify-center shadow-md shadow-orange-200">
                                    <i class="fa-solid fa-eye text-sm"></i>
                                </div>
                                <h4 class="font-black text-blue-950 text-base uppercase tracking-wider">Our Vision</h4>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed">
                                To become India’s premier creative community hub where arts, digital innovation, and early-stage talents blend together—fostering original Indian thought leadership, cultural pride, and technical artistic career paths for generations to come.
                            </p>
                        </div>

                    </div>

                    <!-- FEATURE PILLARS -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">

                        <!-- NATIONAL RECOGNITION -->
                        <div class="bg-orange-50/60 border border-orange-100/80 rounded-2xl p-5 space-y-3">
                            <div class="h-10 w-10 rounded-xl bg-orange-500 text-white flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-trophy"></i>
                            </div>
                            <h3 class="font-black text-blue-950 text-base">
                                National Recognition
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                Showcase artistic talent on a trusted national-level creative platform and gain meaningful recognition.
                            </p>
                        </div>

                        <!-- ARTISTIC GROWTH -->
                        <div class="bg-blue-50/60 border border-blue-100/80 rounded-2xl p-5 space-y-3">
                            <div class="h-10 w-10 rounded-xl bg-blue-600 text-white flex items-center justify-center text-sm shadow-sm">
                                <i class="fa-solid fa-palette"></i>
                            </div>
                            <h3 class="font-black text-blue-950 text-base">
                                Artistic Growth
                            </h3>
                            <p class="text-xs text-gray-600 leading-relaxed">
                                Encourage imagination, creativity, innovation, and fearless self-expression through engaging competitions.
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- =========================
        LEADERSHIP SECTION
    ========================= -->

    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">

            <!--STRATEGIC LEADERSHIP-->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block bg-orange-100 text-orange-600 text-xs font-black uppercase tracking-[0.25em] px-5 py-2 rounded-full">
                    Strategic Leadership
                </span>

                <h2 class="mt-6 text-3xl sm:text-5xl font-black text-blue-950 leading-tight tracking-tight">
                    Meet The Visionary Behind
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-yellow-400">
                        Creative Excellence
                    </span>
                </h2>

                <p class="mt-6 text-gray-500 text-base sm:text-lg leading-relaxed">
                    Backed by over 18 years of media leadership, national records, and high-impact public relations strategies.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

                <div class="block lg:hidden space-y-4">
                    <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-orange-100 text-blue-800 text-xs font-black uppercase tracking-[0.25em] px-5 py-2 rounded-full shadow-sm">
                        <i class="fa-solid fa-star text-orange-500"></i>
                        Media Entrepreneur • Author • PR Strategist
                    </span>
                    <h3 class="text-4xl sm:text-5xl font-black text-blue-950 leading-tight tracking-tight">
                        Mukesh Dube
                    </h3>
                    <p class="text-sm font-bold text-orange-600 uppercase tracking-widest">
                        Veteran Journalist &amp; Public Relations Strategist
                    </p>
                    <div class="h-1 w-24 rounded-full bg-gradient-to-r from-orange-500 to-blue-600"></div>
                </div>

                <!--AUTHORITY ANCHOR (IMAGE, BOOKS & ACCREDITATION) -->
                <div class="relative space-y-8 lg:sticky lg:top-8">
                    <!-- Glow Effects -->
                    <div class="absolute -top-10 -left-10 w-40 h-40 bg-orange-500/10 blur-3xl rounded-full pointer-events-none"></div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-blue-500/10 blur-3xl rounded-full pointer-events-none"></div>

                    <!-- IMAGE CARD -->
                    <div class="relative bg-gradient-to-br from-blue-950 to-zinc-900 rounded-[2rem] p-4 shadow-2xl border border-white/10 z-10">
                        <img src="{{ asset('assets/images/mukesh_dube-about.png') }}"
                            alt="Mukesh Dube"
                            loading="lazy"
                            class="w-full object-cover rounded-[1.5rem]">
                    </div>
                    <!-- PUBLISHED LITERARY WORKS-->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 space-y-4">
                        <div class="flex items-center gap-2 pb-2 border-b border-slate-200">
                            <i class="fa-solid fa-book-open text-orange-500 text-lg"></i>
                            <h4 class="font-black text-blue-950 text-sm uppercase tracking-wider">Published Literary Works</h4>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <div class="p-3 rounded-xl bg-white border border-slate-200/60 flex items-center gap-2">
                                <i class="fa-solid fa-bookmark text-orange-500 text-xs shrink-0"></i>
                                <span class="text-xs font-bold text-blue-950 leading-tight">Yoddha: Pt 1 & 2</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-slate-200/60 flex items-center gap-2">
                                <i class="fa-solid fa-bookmark text-orange-500 text-xs shrink-0"></i>
                                <span class="text-xs font-bold text-blue-950 leading-tight">Yogi Kyu Zaroori?</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-slate-200/60 flex items-center gap-2">
                                <i class="fa-solid fa-bookmark text-orange-500 text-xs shrink-0"></i>
                                <span class="text-xs font-bold text-blue-950 leading-tight">Safalta Ki Ramayan</span>
                            </div>
                            <div class="p-3 rounded-xl bg-white border border-slate-200/60 flex items-center gap-2">
                                <i class="fa-solid fa-bookmark text-orange-500 text-xs shrink-0"></i>
                                <span class="text-xs font-bold text-blue-950 leading-tight">Bharat Ke Veer</span>
                            </div>
                        </div>
                    </div>

                    <!-- TRUST ACCREDITATION & RECORDS BADGES -->
                    <div class="bg-slate-50 border border-slate-100 rounded-3xl p-6 space-y-4">
                        <div class="flex items-center gap-2 pb-2 border-b border-slate-200">
                            <i class="fa-solid fa-shield-halved text-blue-900 text-lg"></i>
                            <h4 class="font-black text-blue-950 text-sm uppercase tracking-wider">Official Records & Impact</h4>
                        </div>

                        <!-- Limca Badge -->
                        <div class="flex items-start gap-4 p-4 bg-white border border-amber-200 rounded-2xl shadow-sm">
                            <div class="h-10 w-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-medal text-lg"></i>
                            </div>
                            <div>
                                <h5 class="font-bold text-blue-950 text-xs">Limca Book of Records (2015)</h5>
                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">
                                    National record holder for the 'SAVE THE FUTURE' environment and girl child campaign run with India Post.
                                </p>
                            </div>
                        </div>

                        <!-- Government Letters -->
                        <div class="flex items-start gap-4 p-4 bg-white border border-blue-100 rounded-2xl shadow-sm">
                            <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-file-signature text-lg"></i>
                            </div>
                            <div>
                                <h5 class="font-bold text-blue-950 text-xs">Govt. Appreciation Letters</h5>
                                <p class="text-[11px] text-gray-500 mt-0.5 leading-relaxed">
                                    Official commendations from senior IAS officers and state child rights commissioners.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: NARRATIVE, VENTURES & INDUSTRY NETWORKS -->
                <div class="space-y-10 lg:pt-2">

                    <!-- DESKTOP-ONLY IDENTITY HEADER -->
                    <div class="hidden lg:block">
                        <span class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-100 to-orange-100 text-blue-800 text-xs font-black uppercase tracking-[0.25em] px-5 py-2 rounded-full shadow-sm">
                            <i class="fa-solid fa-star text-orange-500"></i>
                            Media Entrepreneur • Author • PR Strategist
                        </span>
                        <h3 class="mt-6 text-4xl sm:text-5xl font-black text-blue-950 leading-tight tracking-tight">
                            Mukesh Dube
                        </h3>
                        <p class="text-sm font-bold text-orange-600 uppercase tracking-widest mt-2">Veteran Journalist &amp; Public Relations Strategist</p>
                        <div class="mt-5 h-1 w-24 rounded-full bg-gradient-to-r from-orange-500 to-blue-600"></div>
                    </div>

                    <!-- BIOGRAPHY -->
                    <div class="space-y-4">
                        <p class="text-gray-600 leading-relaxed text-base sm:text-lg">
                            Mukesh Dube is a visionary digital media entrepreneur, celebrated author, and high-impact public relations strategist with over 18 years of leadership across digital journalism, the film industry, and social advocacy.
                        </p>
                        <p class="text-gray-600 leading-relaxed text-base">
                            Armed with an extensive digital network reaching over <strong>350 Million+ on Facebook</strong> and <strong>200 Million+ on Instagram</strong>, he stands as a formidable force driving large-scale promotions for Bollywood cinema, corporate giants, and national social campaigns. As a multi-faceted leader, Mukesh seamlessly bridges the gap between creative technology, media management, and humanitarian initiatives.
                        </p>
                    </div>

                    <!-- KEY PORTFOLIOS & VENTURES -->
                    <div class="space-y-6">
                        <h4 class="text-lg font-black text-blue-950 uppercase tracking-wide border-b border-gray-100 pb-2">
                            Key Ventures &amp; Portfolios
                        </h4>

                        <div class="space-y-4">
                            <div class="flex gap-4 items-start">
                                <div class="mt-1.5 h-2 w-2 rounded-full bg-orange-500 shrink-0"></div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    <strong class="text-blue-950 block text-base mb-0.5">Animation Galaxy &amp; International Animday Awards</strong>
                                    Pioneering platforms dedicated to discovering, mentoring, and globalizing exceptional talent in animation, gaming, visual arts, and filmmaking.
                                </p>
                            </div>
                            <div class="flex gap-4 items-start">
                                <div class="mt-1.5 h-2 w-2 rounded-full bg-orange-500 shrink-0"></div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    <strong class="text-blue-950 block text-base mb-0.5">One More News, BoomIndya &amp; WebMantra India</strong>
                                    Leading cutting-edge digital media houses and creative agencies specializing in mainstream Bollywood entertainment journalism, corporate branding, and high-conversion marketing.
                                </p>
                            </div>
                            <div class="flex gap-4 items-start">
                                <div class="mt-1.5 h-2 w-2 rounded-full bg-orange-500 shrink-0"></div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    <strong class="text-blue-950 block text-base mb-0.5">Institutional Media Strategy</strong>
                                    Heads communications as General Manager for Uttar Bhartiya Sangh (Pune) and served as Former Joint Secretary for the Society for Animation in Delhi (SAID).
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- GLOBAL FESTIVALS & RECOGNITIONS -->
                    <div class="space-y-6">
                        <h4 class="text-lg font-black text-blue-950 uppercase tracking-wide border-b border-gray-100 pb-2">
                            Global Film Festival &amp; Partnerships
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">
                            Serving as a strategic partner and jury-level supporter for premier international and domestic media events:
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1.5 bg-blue-50 text-blue-800 rounded-xl font-bold text-xs uppercase tracking-wider">SIGGRAPH (Hong Kong &amp; Japan)</span>
                            <span class="px-3 py-1.5 bg-blue-50 text-blue-800 rounded-xl font-bold text-xs uppercase tracking-wider">Animago (Germany)</span>
                            <span class="px-3 py-1.5 bg-orange-50 text-orange-800 rounded-xl font-bold text-xs uppercase tracking-wider">Mumbai Women's International Film Fest</span>
                            <span class="px-3 py-1.5 bg-blue-50 text-blue-800 rounded-xl font-bold text-xs uppercase tracking-wider">Navi Mumbai Int. Film Fest</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 shadow-sm text-center">
                            <div class="text-3xl font-black text-orange-500">18+</div>
                            <p class="text-xs text-gray-500 mt-1 font-semibold">Years Active Leadership</p>
                        </div>
                        <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 shadow-sm text-center">
                            <div class="text-3xl font-black text-blue-600">550M+</div>
                            <p class="text-xs text-gray-500 mt-1 font-semibold">Combined Social Reach</p>
                        </div>
                    </div>

                    <!-- ELITE AWARDS -->
                    <div class="space-y-4">
                        <h4 class="text-lg font-black text-blue-950 uppercase tracking-wide border-b border-gray-100 pb-2">
                            Honors &amp; Elite Recognitions
                        </h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="flex items-start gap-3 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <i class="fa-solid fa-award text-emerald-500 text-lg mt-0.5"></i>
                                <div>
                                    <h5 class="text-sm font-black text-blue-950">Nation Builder Award</h5>
                                    <p class="text-xs text-gray-500 mt-0.5">Emerging Personality of the Year</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 bg-slate-50 p-3 rounded-xl border border-slate-100">
                                <i class="fa-solid fa-award text-emerald-500 text-lg mt-0.5"></i>
                                <div>
                                    <h5 class="text-sm font-black text-blue-950">Golden Pixel Award</h5>
                                    <p class="text-xs text-gray-500 mt-0.5">Excellence in Digital Media</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- BOTTOM CALLOUT STATEMENT -->
            <div class="mt-20 border-t border-gray-100 pt-12 text-center max-w-4xl mx-auto">
                <blockquote class="text-xl font-black italic text-blue-950 leading-relaxed">
                    "Driven by a legacy of trust, verified national records, and an unparalleled digital distribution network of half a billion viewers, our properties represent the pinnacle of industry credibility."
                </blockquote>
            </div>

        </div>
    </section>

    <!-- =========================
            FOOTER
    ========================== -->
    @include('Components.footer')
    
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>