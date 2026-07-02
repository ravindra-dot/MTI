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