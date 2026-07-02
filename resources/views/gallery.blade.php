<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | MyTalentIndia</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- GLightbox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
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

    <!--===================
        GALLERY CONTENT
    ==================== -->
    <section aria-labelledby="photo-gallery-heading" class="mb-20">
        <div class="border-b border-gray-200 pb-5 mb-8">
            <h2 id="photo-gallery-heading" class="text-2xl font-black text-blue-950 flex items-center gap-3">
                <span class="text-orange-500"><i class="fa-solid fa-camera"></i></span> Photo Gallery
            </h2>
        </div>

        @if(count($images) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($images as $image)
                    @php $imagePath = asset('assets/MK/Images/' . $image->getFilename()); @endphp
                    <div class="group relative overflow-hidden rounded-2xl shadow-md border border-gray-100 bg-white aspect-square">
                        <a href="{{ $imagePath }}" class="glightbox block w-full h-full" data-gallery="photos">
                            <img src="{{ $imagePath }}" alt="Gallery Showcase" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy">
                            <div class="absolute inset-0 bg-blue-950/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white bg-orange-500 p-3.5 rounded-full shadow-lg transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                                    <i class="fa-solid fa-magnifying-glass-plus text-lg"></i>
                                </span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 mx-auto max-w-xs">
                {{ $images->appends(['books_page' => request('books_page')])->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400 bg-white border border-gray-200 border-dashed rounded-2xl">
                No photos found.
            </div>
        @endif
    </section>

    <!-- --- Books Section --- -->
    <section aria-labelledby="books-heading">
        <div class="border-b border-gray-200 pb-5 mb-8">
            <h2 id="books-heading" class="text-2xl font-black text-blue-950 flex items-center gap-3">
                <span class="text-orange-500"><i class="fa-solid fa-book-open"></i></span> Books & Publications
            </h2>
        </div>

        @if(count($books) > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($books as $book)
                    @php $bookPath = asset('assets/MK/Books/' . $book->getFilename()); @endphp
                    <div class="group relative overflow-hidden rounded-2xl shadow-md border border-gray-100 bg-white aspect-[3/4]">
                        <a href="{{ $bookPath }}" class="glightbox block w-full h-full" data-gallery="books">
                            <img src="{{ $bookPath }}" alt="Book Cover" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500 ease-out" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-950/90 via-blue-950/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-4">
                                <span class="text-white text-[10px] font-bold uppercase tracking-wider bg-orange-500 self-start px-2 py-1 rounded-md mb-2 shadow">View Publication</span>
                                <p class="text-white text-sm font-bold truncate">{{ pathinfo($book->getFilename(), PATHINFO_FILENAME) }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 mx-auto max-w-xs">
                {{ $books->appends(['photos_page' => request('photos_page')])->links() }}
            </div>
        @else
            <div class="text-center py-16 text-gray-400 bg-white border border-gray-200 border-dashed rounded-2xl">
                No books available.
            </div>
        @endif
    </section>

    <!--===================
            FOOTER
    ==================== -->
    @include('Components.footer')

    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- GLightbox Initialization JS -->
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lightbox = GLightbox({
                touchNavigation: true,
                loop: true,
                zoomable: true,
                autoplayVideos: false,
                openEffect: 'zoom',
                closeEffect: 'zoom'
            });
        });
    </script>
</body>

</html>