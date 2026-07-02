<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard Framework | MyTalentIndia</title>
    <!-- favicons -->
    <link rel="icon" type="image/png" href="/assets/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon/favicon.svg" />
    <link rel="shortcut icon" href="/assets/images/favicon/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="MTI" />
    <link rel="manifest" href="/assets/images/favicon/site.webmanifest" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-gray-100 font-sans text-gray-800 flex flex-col min-h-screen">
    <nav id="smart-navbar"
        class="bg-white/95 backdrop-blur-md shadow-md sticky top-0 z-50 transform translate-y-0 transition-transform duration-300 ease-in-out border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-3 lg:py-4">

                <!-- Logo Brand Box -->
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

                <!-- Desktop Middle Navigation links (Hidden on Mobile) -->
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

                    <a href="/contact"
                        class="hover:text-orange-500 transition duration-200">
                        Contact
                    </a>

                </div>

                <div class="flex items-center space-x-4">
                    <!-- CTA Button Box -->
                    <div class="flex items-center space-x-4">
                        <span class="text-sm font-semibold text-gray-600 hidden sm:inline"><i
                                class="fa-regular fa-user mr-1"></i><span>{{ucwords(strtolower(Auth::user()->first_name ?? 'User'))}}</span></span>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-full font-bold text-xs hover:bg-gray-300 transition cursor-pointer">
                                Logout
                            </button>
                        </form>
                    </div>
                    <button id="mobile-menu-btn" class="lg:hidden text-blue-900 p-2 focus:outline-none text-xl"
                        aria-label="Toggle Menu">
                        <i id="menu-icon" class="fa-solid fa-bars"></i>
                    </button>
                </div>

            </div>
        </div>
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


                <a href="/contact"
                    class="block py-3 px-4 rounded-xl font-semibold text-gray-700 hover:bg-gray-50 hover:text-orange-500 transition">
                    Contact Us
                </a>

            </div>

        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 flex-grow w-full space-y-6">

        <!-- Global Info Banner -->
        <div
            class="bg-emerald-100 text-emerald-700 border border-emerald-200 p-4 rounded-xl flex flex-wrap items-center justify-between gap-4">
            <span class="text-xs uppercase font-black text-emerald-800">
                <i class="fa-solid fa-bullhorn mr-1"></i> Welcome back! You are active in the National Track for Theme:
                "Future India / भविष्य का भारत".
            </span>
            <div class="flex gap-2">
                <span
                    class="bg-emerald-200/60 text-emerald-900 text-xs font-bold px-3 py-1.5 rounded-lg border border-emerald-300/50 flex items-center gap-1">
                    <i class="fa-solid fa-circle-check text-emerald-700"></i> Account Verified
                </span>
            </div>
        </div>

        <!-- HERO SECTION -->
        <section
            class="bg-gradient-to-br from-blue-950 to-indigo-900 rounded-2xl shadow-xl overflow-hidden p-6 sm:p-8 text-white relative">

            <div class="absolute right-0 top-0 opacity-10 pointer-events-none transform translate-x-12 -translate-y-12">
                <i class="fa-solid fa-palette text-[240px]"></i>
            </div>

            <div class="relative z-10 grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                <!-- Left Side Welcome & Message -->
                <div class="md:col-span-7 space-y-3 text-center md:text-left">
                    <span
                        class="bg-orange-500/20 text-orange-400 border border-orange-500/30 font-black text-[10px] tracking-widest uppercase px-3 py-1 rounded-full inline-block">
                        Artist Workspace
                    </span>
                    <h1 class="text-2xl sm:text-3xl font-black tracking-tight leading-tight">
                        Welcome, <span class="u-name text-orange-400">{{ ucwords(strtolower(Auth::user()->first_name ?? 'User')) }}</span>! <br class="hidden sm:inline">
                        Shine Across the Nation, Showcase Your Creativity!
                    </h1>
                    <p class="text-xs sm:text-sm text-blue-200 max-w-xl font-medium">
                        Complete your fee transaction to unlock your official blueprint sheet layout, prepare your
                        artwork, and upload your final artwork here for judging.
                    </p>
                </div>

                <!-- Right Side Highlight Metrics / Quick Info Cards -->
                <div class="md:col-span-5 grid grid-cols-2 gap-3 w-full">
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl space-y-1">
                        <span class="text-blue-300 font-bold text-[10px] uppercase tracking-wider block">Art
                            Track</span>
                        <span class="text-sm font-black text-white block truncate">Painting 2026</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl space-y-1">
                        <span class="text-blue-300 font-bold text-[10px] uppercase tracking-wider block">Current
                            Status</span>
                        <span class="text-sm font-black text-orange-400 flex items-center gap-1">
                            <i class="fa-solid fa-circle text-[8px] animate-pulse"></i> In Progress
                        </span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl space-y-1">
                        <span class="text-blue-300 font-bold text-[10px] uppercase tracking-wider block">Submission
                            Gate</span>
                        <span id="global-gate-status" class="text-sm font-black text-emerald-400">Active</span>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl space-y-1">
                        <span class="text-blue-300 font-bold text-[10px] uppercase tracking-wider block">National Rank
                            Pool</span>
                        <span class="text-sm font-black text-white">{{ $enrollment->rank ?? 'Not Ranked' }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Master Workspace Container Target -->
        <section id="dynamic-workspace-target" class="w-full">

            <!-- STATE 1: Empty View Layout -->
            <div id="view-state-empty" class="hidden">
                <div class="bg-white p-12 text-center rounded-2xl shadow-sm border max-w-md mx-auto space-y-4 my-12">
                    <div
                        class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto text-2xl">
                        <i class="fa-regular fa-folder-open"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">No Active Contests Enrolled</h3>
                        <p class="text-sm text-gray-500 mt-1">You have not committed enrollment spaces inside active art
                            tracks yet.</p>
                    </div>
                    <a href="/#categories"
                        class="bg-orange-500 text-white font-bold px-6 py-2 rounded-full text-sm inline-block shadow hover:bg-orange-600 transition">
                        Browse Contests Catalog
                    </a>
                </div>
            </div>

            <!-- STATE 2 & 3: Active Workspace Tracking Layout (State Engine Managed) -->
            <div id="view-state-workspace" class="block">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                    <!-- MAIN WORKSPACE -->
                    <div class="lg:col-span-8 bg-white rounded-2xl shadow-sm border-gray-800 p-6 space-y-8">
                        <div
                            class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b pb-4 gap-4">
                            <div>
                                <span
                                    class="bg-blue-100 text-blue-800 font-bold uppercase tracking-wider text-[10px] px-2.5 py-1 rounded">
                                    Registered Contest Track
                                </span>
                                <h2 class="text-xl font-bold text-gray-800 mt-1">All India & Global Painting Competition
                                    2026</h2>
                            </div>
                            <div class="flex flex-wrap items-center gap-2">

                                @if($enrollment && $enrollment->payment_status)

                                <span
                                    class="bg-emerald-100 text-emerald-700 font-bold text-xs px-3 py-1 rounded-full border border-emerald-200 flex items-center">

                                    <i class="fa-solid fa-check-double mr-1"></i>
                                    Paid & Verified

                                </span>

                                @else

                                <span
                                    class="bg-red-100 text-red-700 font-bold text-xs px-3 py-1 rounded-full border border-red-200 animate-pulse">

                                    <i class="fa-solid fa-hourglass-start mr-1"></i>
                                    Fees Pending

                                </span>

                                @endif

                                <span
                                    class="bg-amber-100 text-amber-800 font-bold text-xs px-3 py-1 rounded-full border border-amber-200">

                                    <i class="fa-regular fa-clock mr-1"></i>
                                    76 Days Remaining

                                </span>

                            </div>


                        </div>


                        <!-- 5-STEP VISUAL STATUS TRACKER COMPONENT -->
                        <div class="block py-4 overflow-x-auto">

                            <div class="relative min-w-[750px] px-10">

                                <!-- Background Line -->
                                <div class="absolute top-5 left-10 right-10 h-1 bg-gray-200 z-0 translate-y-[-1px]"></div>

                                <!-- Progress Bar -->
                                <div id="roadmap-progress-bar"
                                    class="absolute top-5 left-10 h-1 bg-gradient-to-r from-emerald-500 to-blue-500 z-0 transition-all duration-500 origin-left"
                                    style="width: {{ $percentage }}%;">
                                </div>

                                <div class="relative z-10 flex justify-between text-center w-full">

                                    <!-- STEP 1: REGISTERED -->
                                    <div class="flex flex-col items-center w-28">

                                        <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 text-sm font-bold shadow
                                            {{ $progress['registered'] ? 'bg-emerald-500 text-white border-emerald-500' : 'bg-white text-gray-400 border-gray-200' }}">
                                            <i class="fa-solid fa-check"></i>
                                        </div>

                                        <span class="text-xs mt-2 font-bold
                                            {{ $progress['registered'] ? 'text-emerald-600' : 'text-gray-500' }}">
                                            Step 1: Registered
                                        </span>

                                        <span class="text-[10px] text-gray-400">
                                            {{ $progress['registered'] ? 'Completed' : 'Pending' }}
                                        </span>
                                    </div>

                                    <!-- STEP 2: PAYMENT -->
                                    <div class="flex flex-col items-center w-28">

                                        <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 shadow
                                            {{ $progress['payment'] ? 'bg-emerald-500 text-white border-emerald-500' : 'bg-white text-gray-400 border-gray-200' }}">
                                            <i class="fa-solid fa-credit-card"></i>
                                        </div>

                                        <span class="text-xs mt-2 font-medium
                                            {{ $progress['payment'] ? 'text-emerald-600 font-bold' : 'text-gray-500' }}">
                                            Step 2: Fees Payment
                                        </span>

                                        <span class="text-[10px] text-gray-400">
                                            {{ $progress['payment'] ? 'Completed' : 'Pending' }}
                                        </span>
                                    </div>

                                    <!-- STEP 3: DOWNLOAD -->
                                    <div class="flex flex-col items-center w-28">

                                        <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 shadow
                                            {{ $progress['download'] ? 'bg-blue-500 text-white border-blue-500' : 'bg-white text-gray-300 border-gray-100' }}">
                                            <i class="fa-solid fa-arrow-down"></i>
                                        </div>

                                        <span class="text-xs mt-2 font-medium
                                            {{ $progress['download'] ? 'text-blue-600 font-bold' : 'text-gray-400' }}">
                                            Step 3: Download Layout
                                        </span>

                                        <span class="text-[10px] text-gray-400">
                                            {{ $progress['download'] ? 'Completed' : 'Locked' }}
                                        </span>
                                    </div>

                                    <!-- STEP 4: SUBMISSION -->
                                    <div class="flex flex-col items-center w-28">

                                        <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 shadow
                                            {{ $progress['submitted'] ? 'bg-blue-500 text-white border-blue-500' : 'bg-white text-gray-300 border-gray-100' }}">
                                            <i class="fa-solid fa-cloud-arrow-up"></i>
                                        </div>

                                        <span class="text-xs mt-2 font-medium
                                            {{ $progress['submitted'] ? 'text-blue-600 font-bold' : 'text-gray-400' }}">
                                            Step 4: Submit Artwork
                                        </span>

                                        <span class="text-[10px] text-gray-400">
                                            {{ $progress['submitted'] ? 'Submitted' : 'Locked' }}
                                        </span>
                                    </div>

                                    <!-- STEP 5: REVIEW -->
                                    @php
                                        $status = $enrollment?->submission_status;
                                        $reviewDone = in_array($status, ['under_review', 'approved', 'rejected']);
                                    @endphp

                                    <div class="flex flex-col items-center w-28">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 shadow-inner
                                            {{ $reviewDone ? 'bg-purple-500 text-white border-purple-500' : 'bg-white text-gray-300 border-gray-100' }}">
                                            <i class="fa-solid fa-trophy"></i>
                                        </div>
                                        <span class="text-xs mt-2 font-medium
                                            {{ $reviewDone ? 'text-purple-600 font-bold' : 'text-gray-400' }}">
                                            Step 5: Review & Status
                                        </span>
                                        <span class="text-[10px] text-gray-400">
                                            {{ $enrollment?->submission_status ?? 'Pending' }}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ACTION MODULES SECTION -->
                        <div class="border-t pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- =====================================
                                BLUEPRINT DOWNLOAD SECTION
                            ====================================== -->
                            <div class="p-5 bg-slate-50 rounded-xl border border-gray-200 space-y-4 flex flex-col items-center text-center">

                                <div class="flex flex-col items-center">

                                    <div class="inline-flex p-3 bg-blue-100 text-blue-600 rounded-full mb-3 animate-bounce">
                                        <i class="fa-solid fa-file-arrow-down text-xl"></i>
                                    </div>

                                    <h4 class="font-bold text-gray-800">
                                        Contest Blueprint Sheet Layout
                                    </h4>

                                    <p class="text-xs text-gray-500 mt-1 max-w-sm">
                                        Official printable design framework and instructions.
                                    </p>

                                </div>

                                <!-- DOWNLOAD BUTTON -->
                                <div class="w-full pt-2">

                                    @if($enrollment && $enrollment->payment_status)

                                    <form action="{{ route('blueprint.download') }}"
                                        method="POST">

                                        @csrf

                                        <button type="submit"
                                            class="w-full bg-blue-900 text-white font-bold py-2.5 px-4 rounded-xl text-xs uppercase tracking-wider shadow hover:bg-blue-800 transition">

                                            <i class="fa-solid fa-download mr-1.5"></i>

                                            @if($enrollment->blueprint_downloaded)
                                            Download Again
                                            @else
                                            Download Blueprint
                                            @endif

                                        </button>

                                    </form>

                                    @else

                                    <button
                                        class="w-full bg-gray-200 text-gray-400 font-bold py-2.5 px-4 rounded-xl text-xs uppercase cursor-not-allowed"
                                        disabled>

                                        <i class="fa-solid fa-lock mr-1"></i>
                                        Locked Pending Payment

                                    </button>

                                    @endif

                                </div>
                            </div>

                            <!-- =====================================
                                ARTWORK UPLOAD SECTION
                            ====================================== -->
                            <div class="p-5 bg-slate-50 rounded-xl border border-gray-200 space-y-4 flex flex-col items-center text-center">

                                <div class="flex flex-col items-center">

                                    <div class="inline-flex p-3 bg-blue-100 text-blue-600 rounded-full mb-3 animate-bounce">
                                        <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                                    </div>

                                    <h4 class="font-bold text-gray-800">
                                        Finished Artwork Submission
                                    </h4>

                                    <p class="text-xs text-gray-500 mt-1 max-w-sm">
                                        Upload your final artwork for evaluation.
                                    </p>

                                </div>

                                <!-- UPLOAD AREA -->
                                <div class="w-full pt-2">

                                    @if($enrollment && $enrollment->payment_status)

                                        @if(!$enrollment->artwork_file)

                                            <form action="{{ route('artwork.upload') }}"
                                                method="POST"
                                                enctype="multipart/form-data"
                                                id="artwork-upload-form"
                                                class="space-y-3">

                                                @csrf

                                                <input type="file"
                                                    name="artwork_file"
                                                    id="artwork-file-input"
                                                    class="hidden"
                                                    accept="image/*,.pdf"
                                                    required>

                                                <button type="button"
                                                        id="choose-artwork-btn"
                                                        class="w-full border-2 border-dashed border-blue-300 hover:border-blue-500 bg-white text-center py-6 px-4 rounded-xl transition">

                                                    <i class="fa-solid fa-cloud-arrow-up text-blue-500 text-2xl mb-2"></i>

                                                    <span class="block text-xs font-bold text-gray-700">
                                                        Click To Select Artwork
                                                    </span>

                                                    <span class="block text-[10px] text-gray-400 mt-1">
                                                        JPG, PNG or PDF
                                                    </span>

                                                </button>

                                            </form>

                                        @else

                                            <div class="border border-green-300 bg-green-50 text-center py-6 px-4 rounded-xl text-xs text-green-600 font-bold">

                                                <i class="fa-solid fa-circle-check"></i>
                                                Artwork Already Uploaded

                                            </div>

                                        @endif

                                    @else

                                        <div class="border bg-gray-100 text-center py-6 px-4 rounded-xl text-xs text-gray-400 font-bold uppercase flex items-center justify-center gap-2">

                                            <i class="fa-solid fa-ban"></i>
                                            Upload Locked

                                        </div>

                                    @endif

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- RIGHT SIDEBAR SIDE CONTAINER -->
                    <div class="lg:col-span-4 space-y-6">
                        <!-- Payment Section Card -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 space-y-4">
                            <h3 class="font-black text-gray-800 text-sm uppercase tracking-wider border-b pb-2">
                                Payment & Benefits
                            </h3>
                            <div class="flex justify-between items-center text-sm font-medium">
                                <span class="text-gray-500">Registration Fee</span>
                                <span class="font-mono font-bold text-gray-700">₹49.00 INR</span>
                            </div>

                            @if($enrollment && $enrollment->payment_status)
                                <!-- PAYMENT SUCCESS -->
                                <div class="space-y-3">
                                    <div class="bg-emerald-50 text-emerald-800 p-3 rounded-xl border border-emerald-200 text-xs text-center font-bold flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-circle-check text-sm"></i>
                                        Registration Fee Paid
                                    </div>
                                    <!-- CERTIFICATE BUTTON (ACTIVE ONLY AFTER PAYMENT) -->
                                    <a href="{{ route('certificate.participation') }}"
                                        id="open-certificate-modal"
                                        class="w-full bg-gradient-to-r from-blue-700 to-indigo-800 text-white font-bold py-3 rounded-xl text-xs uppercase tracking-wider shadow-md hover:from-blue-800 hover:to-indigo-900 transition-all duration-200 flex items-center justify-center gap-2 group">
                                        <i class="fa-solid fa-award text-sm text-amber-400 group-hover:scale-110 transition-transform"></i>
                                        Claim Participation Certificate
                                    </a>
                                </div>
                            @else
                                <!-- PAYMENT PENDING -->
                                <form action="/demo-payment" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full bg-orange-500 text-white font-bold py-3 rounded-xl text-xs uppercase tracking-widest shadow-md hover:bg-orange-600 transition block text-center cursor-pointer">
                                        <i class="fa-solid fa-credit-card mr-1"></i>
                                        Pay Fee and Unlock Certificate
                                    </button>
                                </form>

                                <!-- LOCKED STATE INFO -->
                                <div class="text-[11px] text-gray-400 text-center">
                                    Certificate will unlock after successful payment
                                </div>

                            @endif

                        </div>
                        <!-- Terms & Conditions Card -->
                        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 space-y-4">
                            <h2
                                class="text-base font-black text-blue-950 uppercase tracking-tight flex items-center gap-2 border-b pb-2">
                                <i class="fa-solid fa-scale-balanced text-orange-500 text-sm"></i> Terms & Conditions
                            </h2>
                            <div class="space-y-3 text-xs text-gray-600">
                                <div class="flex items-start gap-2.5">
                                    <i
                                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0 text-[10px]"></i>
                                    <p>Artwork must be 100% original. Any form of plagiarism or tracing will lead to
                                        instantaneous disqualification.</p>
                                </div>
                                <div class="flex items-start gap-2.5">
                                    <i
                                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0 text-[10px]"></i>
                                    <p>Entries once fully submitted onto the dashboard system are locked final and
                                        cannot be modified under any scenarios.</p>
                                </div>
                                <div class="flex items-start gap-2.5">
                                    <i
                                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0 text-[10px]"></i>
                                    <p>The strategic decision of the authorized MyTalentIndia specialized judging panel
                                        will remain ultimate, final, and binding.</p>
                                </div>
                                <div class="flex items-start gap-2.5">
                                    <i
                                        class="fa-solid fa-circle-chevron-right text-orange-500 mt-0.5 flex-shrink-0 text-[10px]"></i>
                                    <p>By participating, you inherently grant MyTalentIndia media rights to showcases
                                        the design assets on public channels for promotion.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>
    </main>

    <div id="certificate-modal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl border border-zinc-100 overflow-hidden transform transition-all duration-300">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-blue-950 to-indigo-900 px-6 py-4 text-white flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-medal text-amber-400 text-lg"></i>
                    <h3 class="font-black tracking-wide text-xs uppercase">Configure Participation Certificate</h3>
                </div>
                <button type="button" onclick="document.getElementById('certificate-modal').classList.add('hidden')"
                    class="text-white/70 hover:text-white transition cursor-pointer text-sm">
                    <i class="fa-solid fa-xmark text-base"></i>
                </button>
            </div>

            <!-- Modal Content Form -->
            <form class="p-6 space-y-4">
                <div class="space-y-1">
                    <label for="cert-full-name" class="block text-xs font-bold text-gray-700 uppercase tracking-wide">
                        Participant Full Name
                    </label>
                    <p class="text-[11px] text-gray-400">
                        Please provide your full legal name. This spelling will be irreversibly stamped onto your printable elite certificate document.
                    </p>
                    <div class="relative mt-2">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 pointer-events-none text-xs">
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <input type="text" id="cert-full-name" required placeholder="e.g., Aarav Sharma"
                            class="block w-full pl-9 pr-3 py-2.5 text-sm bg-zinc-50 border border-zinc-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition duration-150 text-gray-800 placeholder-gray-400 font-medium" />
                    </div>
                </div>

                <!-- Action Button Footers -->
                <div class="pt-4 border-t border-zinc-100 flex items-center justify-end gap-2">
                    <button type="button" onclick="document.getElementById('certificate-modal').classList.add('hidden')"
                        class="px-4 py-2 text-xs font-bold uppercase text-zinc-500 hover:text-zinc-700 transition cursor-pointer">
                        Cancel
                    </button>
                    <button type="submit"
                        class="bg-blue-900 hover:bg-blue-800 text-white font-bold px-5 py-2 rounded-xl text-xs uppercase tracking-wider transition shadow flex items-center gap-1.5">
                        <i class="fa-solid fa-file-pdf"></i> Generate &amp; Download
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Status Gateway Modal Loader Window -->
    <div id="payment-modal"
        class="hidden fixed inset-0 bg-slate-900/80 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl max-w-sm w-full text-center space-y-4 shadow-2xl">
            <div class="w-12 h-12 border-4 border-orange-500 border-t-transparent rounded-full animate-spin mx-auto">
            </div>
            <h3 class="text-lg font-black text-blue-950">Redirecting to Payment Gateway Portal...</h3>
            <p class="text-xs text-gray-500">Securing your structural checkout validation channel</p>
        </div>
    </div>

    @include('Components.footer')

    <!-- =====================================
        ARTWORK PREVIEW MODAL
    ====================================== -->
    <div id="artwork-preview-modal"
        class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center p-4">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-xl overflow-hidden animate-fadeIn">

            <!-- HEADER -->
            <div class="flex items-center justify-between px-5 py-4 border-b">

                <h3 class="font-bold text-gray-800 text-lg">
                    Confirm Artwork Upload
                </h3>

                <button type="button"
                    id="close-preview-modal"
                    class="text-gray-400 hover:text-red-500 text-xl">

                    <i class="fa-solid fa-xmark"></i>

                </button>

            </div>

            <!-- BODY -->
            <div class="p-5 space-y-4">

                <!-- IMAGE PREVIEW -->
                <img id="preview-image"
                    class="hidden w-full max-h-[400px] object-contain rounded-xl border">

                <!-- PDF PREVIEW -->
                <div id="preview-pdf"
                    class="hidden text-center py-10 border rounded-xl bg-gray-50">

                    <i class="fa-solid fa-file-pdf text-red-500 text-6xl mb-4"></i>

                    <p class="font-bold text-gray-700">
                        PDF Ready For Upload
                    </p>

                </div>

                <!-- FILE INFO -->
                <div class="bg-slate-50 rounded-xl p-4 space-y-1">

                    <p id="preview-file-name"
                        class="text-sm font-semibold text-gray-700 break-all">
                    </p>

                    <p id="preview-file-size"
                        class="text-xs text-gray-400">
                    </p>

                </div>

            </div>

            <!-- FOOTER -->
            <div class="flex gap-3 p-5 border-t bg-gray-50">

                <button type="button"
                    id="change-file-btn"
                    class="flex-1 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold text-xs uppercase transition">

                    Change File

                </button>

                <button type="submit"
                    form="artwork-upload-form"
                    class="flex-1 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs uppercase transition">

                    Confirm Upload

                </button>

            </div>

        </div>
    </div>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>