<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MyTalentIndia</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-white/95 min-h-screen antialiased text-slate-800">
    <nav class="bg-white/95 text-slate-800 border-b border-slate-100 sticky top-0 z-50 px-4 py-3 shadow-sm lg:hidden backdrop-blur-sm">
        <div class="flex items-center justify-between">
            <!-- Logo Area -->
            <div class="flex items-center gap-3 group">
                <img class="h-10 w-10 sm:h-11 sm:w-11 transition-transform duration-300 group-hover:scale-105"
                    src="{{ asset('assets/images/logo-icon.png') }}"
                    alt="MyTalentIndia Logo">

                <div class="leading-tight">
                    <h2 class="text-base sm:text-lg font-black text-slate-900 tracking-tight">
                        My<span class="text-orange-500">Talent</span>India
                    </h2>
                    <span class="text-[9px] text-slate-400 tracking-[0.25em] uppercase font-bold block mt-0.5">
                        Display. Compete. Shine.
                    </span>
                </div>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <button onclick="toggleMobileNavigation()" type="button"
                    class="h-9 w-9 bg-slate-50 border border-slate-200 rounded-xl flex items-center justify-center text-slate-600 hover:text-slate-900 transition cursor-pointer focus:outline-none">
                <i id="mobileMenuIcon" class="fa-solid fa-bars text-sm"></i>
            </button>
        </div>

        <!-- Dropdown Mobile Menu Panel -->
        <div id="mobileNavigationGrid" class="hidden mt-4 pt-3 border-t border-slate-100 space-y-1.5">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }}">
                <i class="fa-solid fa-chart-pie text-sm"></i> Dashboard
            </a>
            <a href="{{ route('admin.participants') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.participants*') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }}">
                <i class="fa-solid fa-users text-sm"></i> Participants
            </a>
            <a href="{{ route('admin.rankings') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.rankings*') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }}">
                <i class="fa-solid fa-trophy text-sm"></i> Rankings
            </a>
            <a href="{{ route('admin.participants.export') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.participants.export') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }}">
                <i class="fa-solid fa-file-arrow-up text-sm"></i> Exports
            </a>

            <!-- User Profile & Session Controls Container -->
            <div class="border-t border-slate-100 my-2 pt-3 flex items-center justify-between px-2">
                <div class="flex items-center gap-2.5">
                    <div class="h-8 w-8 bg-slate-100 rounded-full border border-slate-200 flex items-center justify-center text-xs font-bold text-slate-700 uppercase">
                        {{ substr(session('admin_name', 'A'), 0, 1) }}
                    </div>
                    <div class="leading-tight">
                        <p class="text-xs font-bold text-slate-800">{{ session('admin_name', 'System Admin') }}</p>
                        <p class="text-[10px] text-slate-400 font-mono">Super Admin</p>
                    </div>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-600 transition flex items-center gap-1.5 cursor-pointer bg-transparent border-none">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <div class="flex min-h-screen">
        <aside class="w-72 bg-white text-slate-800 p-6 flex flex-col justify-between border-r border-slate-100 sticky top-0 h-screen hidden lg:flex">
            <div>
                <!-- Brand Header Logo Container -->
                <div class="flex items-center gap-3 mb-10 pl-2">
                    <div class="flex items-center gap-3 group">
                        <img class="h-11 w-11 transition-transform duration-300 group-hover:scale-105"
                            src="{{ asset('assets/images/logo-icon.png') }}"
                            alt="MyTalentIndia Logo">

                        <div class="leading-tight">
                            <h2 class="text-base font-black text-slate-900 tracking-tight">
                                My<span class="text-orange-500">Talent</span>India
                            </h2>
                            <span class="text-[9px] text-slate-400 tracking-[0.25em] uppercase font-bold block mt-0.5">
                                Display. Compete. Shine.
                            </span>
                        </div>
                    </div>
                </div>

                <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400 mb-4 pl-2">Core Monitor</p>

                <!-- Navigation Links Stack -->
                <nav class="space-y-1.5">
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-semibold' }}">
                        <i class="fa-solid fa-chart-pie text-sm"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.participants') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition group {{ request()->routeIs('admin.participants*') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-semibold' }}">
                        <i class="fa-solid fa-users text-sm group-hover:text-blue-600 transition"></i>
                        Participants
                    </a>

                    <a href="{{ route('admin.rankings') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition group {{ request()->routeIs('admin.rankings*') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-semibold' }}">
                        <i class="fa-solid fa-trophy text-sm group-hover:text-yellow-500 transition"></i>
                        Rankings
                    </a>

                    <a href="{{ route('admin.participants.export') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition group {{ request()->routeIs('admin.participants.export') ? 'bg-blue-600 font-bold text-white shadow-md shadow-blue-600/10' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50 font-semibold' }}">
                        <i class="fa-solid fa-file-arrow-up text-sm group-hover:text-emerald-500 transition"></i>
                        Exports
                    </a>
                </nav>
            </div>

            <!-- User Identity Block -->
            <div class="border-t border-slate-100 pt-4 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="h-9 w-9 bg-slate-50 rounded-full border border-slate-200 flex items-center justify-center text-sm font-bold text-slate-700 uppercase">
                        {{ substr(session('admin_name', 'A'), 0, 1) }}
                    </div>
                    <div class="leading-tight">
                        <p class="text-xs font-bold text-slate-800">{{ session('admin_name', 'System Admin') }}</p>
                        <p class="text-[10px] text-slate-400 font-mono">Role: Super Admin</p>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Main Workspace Application Stage Area -->
        <main class="flex-1 p-6 md:p-10 max-w-[1600px] mx-auto w-full overflow-x-hidden">

            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-10 border-b border-slate-100 pb-6">
                <div>
                    <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight">
                        Analytics Dashboard
                    </h1>
                    <p class="text-sm text-slate-400 mt-1 flex items-center gap-1.5 font-medium">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Welcome back workspace operator, <span class="text-slate-700 font-bold">{{ session('admin_name', 'Operator') }}</span>
                    </p>
                </div>

                <div class="hidden sm:flex items-center gap-3">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button class="bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:text-red-600 px-4 py-2.5 rounded-xl text-sm font-bold shadow-sm transition flex items-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-right-from-bracket text-xs"></i> Logout Session
                        </button>
                    </form>
                </div>
            </div>

            <!-- Stats Metrics Panel Blueprint Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-5 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Registered Users</span>
                        <div class="h-8 w-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center text-xs"><i class="fa-solid fa-users"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">{{ $totalUsers }}</h2>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-5 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Contest Entries</span>
                        <div class="h-8 w-8 bg-purple-50 text-purple-600 rounded-lg flex items-center justify-center text-xs"><i class="fa-solid fa-cubes"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">{{ $totalEnrollments }}</h2>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-5 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Paid Competitors</span>
                        <div class="h-8 w-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-xs"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">{{ $paidUsers }}</h2>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-5 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Artwork Assets</span>
                        <div class="h-8 w-8 bg-orange-50 text-orange-600 rounded-lg flex items-center justify-center text-xs"><i class="fa-solid fa-image"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">{{ $submittedArtworks }}</h2>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-5 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-wider">Submission Rate</span>
                        <div class="h-8 w-8 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center text-xs"><i class="fa-solid fa-chart-line"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-slate-900 mt-4 tracking-tight">{{ $submissionRate }}%</h2>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-md p-5 bg-gradient-to-b from-white to-emerald-50/20 border-emerald-100 hover:scale-[1.02] transition duration-200 flex flex-col justify-between">
                    <div class="flex items-center justify-between">
                        <span class="text-emerald-700/70 text-xs font-bold uppercase tracking-wider">Total Revenue</span>
                        <div class="h-8 w-8 bg-emerald-600 text-white rounded-lg flex items-center justify-center text-xs shadow-md shadow-emerald-600/10"><i class="fa-solid fa-indian-rupee-sign"></i></div>
                    </div>
                    <h2 class="text-3xl font-black text-emerald-700 mt-4 tracking-tight">₹{{ number_format($totalRevenue) }}</h2>
                </div>
            </div>

            <!-- Pipeline Workflow Summary Blocks -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-6">
                <div class="bg-white border border-slate-100 p-4 rounded-xl shadow-sm flex items-center gap-3.5">
                    <div class="h-3 w-3 rounded-full bg-slate-400"></div>
                    <div class="leading-tight"><p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Pending</p><h4 class="text-xl font-black text-slate-800 mt-0.5">{{ $pendingCount }}</h4></div>
                </div>
                <div class="bg-white border border-slate-100 p-4 rounded-xl shadow-sm flex items-center gap-3.5">
                    <div class="h-3 w-3 rounded-full bg-amber-500 animate-pulse"></div>
                    <div class="leading-tight"><p class="text-xs text-amber-600 font-bold uppercase tracking-wider">Reviewing</p><h4 class="text-xl font-black text-slate-800 mt-0.5">{{ $underReviewCount }}</h4></div>
                </div>
                <div class="bg-white border border-slate-100 p-4 rounded-xl shadow-sm flex items-center gap-3.5">
                    <div class="h-3 w-3 rounded-full bg-emerald-500"></div>
                    <div class="leading-tight"><p class="text-xs text-emerald-600 font-bold uppercase tracking-wider">Approved</p><h4 class="text-xl font-black text-slate-800 mt-0.5">{{ $approvedCount }}</h4></div>
                </div>
                <div class="bg-white border border-slate-100 p-4 rounded-xl shadow-sm flex items-center gap-3.5">
                    <div class="h-3 w-3 rounded-full bg-red-500"></div>
                    <div class="leading-tight"><p class="text-xs text-red-600 font-bold uppercase tracking-wider">Rejected</p><h4 class="text-xl font-black text-slate-800 mt-0.5">{{ $rejectedCount }}</h4></div>
                </div>
            </div>

            <!-- Stream Log Realtime Data Feeds -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-5 border-b border-slate-50 pb-3">
                            <h3 class="font-bold text-slate-800 text-base tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-user-plus text-blue-500 text-sm"></i> Recent Registrations
                            </h3>
                            <span class="text-[10px] font-mono bg-blue-50 text-blue-600 px-2 py-0.5 rounded font-bold">Live Stream</span>
                        </div>

                        <div class="h-[285px] overflow-y-auto pr-2 space-y-3.5 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                            @forelse($recentUsers as $user)
                                <div class="flex justify-between items-center gap-4 group transition min-w-0 mr-1">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="h-9 w-9 bg-slate-50 border border-slate-100 text-slate-600 font-bold rounded-xl flex items-center justify-center text-xs group-hover:bg-blue-50 group-hover:text-blue-600 transition shrink-0">
                                            {{ substr($user->first_name, 0, 1) }}
                                        </div>
                                        <div class="leading-tight min-w-0">
                                            <p class="font-bold text-sm text-slate-800 group-hover:text-blue-600 transition truncate">
                                                {{ $user->first_name }} {{ $user->last_name }}
                                            </p>
                                            <p class="text-xs text-slate-400 font-mono mt-0.5 truncate" title="{{ $user->email }}">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                    <span class="text-xs text-slate-400 font-medium whitespace-nowrap shrink-0">
                                        {{ $user->created_at->format('d M Y') }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <p class="text-sm text-slate-400 font-medium">No registrations yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-5 border-b border-slate-50 pb-3">
                            <h3 class="font-bold text-slate-800 text-base tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-file-circle-check text-indigo-500 text-sm"></i> Recent Creative Uploads
                            </h3>
                        </div>

                        <div class="h-[285px] overflow-y-auto pr-2 space-y-3.5 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                            @forelse($recentSubmissions as $submission)
                                <div class="flex justify-between items-center gap-4 mr-1">
                                    <div class="leading-tight truncate min-w-0">
                                        <p class="font-bold text-sm text-slate-800 truncate">
                                            {{ $submission->user->first_name ?? 'Competitor' }} {{ $submission->user->last_name ?? '' }}
                                        </p>
                                        <p class="text-xs text-slate-400 truncate mt-0.5">{{ $submission->contest_name }}</p>
                                    </div>

                                    <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold uppercase tracking-wider whitespace-nowrap shadow-sm shrink-0
                                        {{ $submission->submission_status === 'approved' ? 'bg-emerald-50 text-emerald-700 border border-emerald-100' :
                                        ($submission->submission_status === 'under_review' ? 'bg-amber-50 text-amber-700 border border-amber-100' :
                                        ($submission->submission_status === 'rejected' ? 'bg-red-50 text-red-700 border border-red-100' :
                                            'bg-slate-50 text-slate-600 border border-slate-100')) }}">
                                        {{ str_replace('_', ' ', $submission->submission_status) }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <p class="text-sm text-slate-400 font-medium">No submissions yet.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-5 border-b border-slate-50 pb-3">
                            <h3 class="font-bold text-slate-800 text-base tracking-tight flex items-center gap-2">
                                <i class="fa-solid fa-receipt text-emerald-600 text-sm"></i> Income Ledger Flow
                            </h3>
                        </div>

                        <div class="h-[285px] overflow-y-auto pr-2 space-y-3.5 scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-transparent">
                            @forelse($recentTransactions as $transaction)
                                <div class="flex justify-between items-center gap-4 mr-1">
                                    <div class="leading-tight min-w-0">
                                        <p class="font-bold text-sm text-slate-800 truncate">
                                            {{ $transaction->user->first_name ?? 'User' }} {{ $transaction->user->last_name ?? '' }}
                                        </p>
                                        <p class="text-xs font-black text-emerald-600 font-mono mt-0.5">₹{{ number_format($transaction->payment_amount, 2) }}</p>
                                    </div>
                                    <span class="text-xs text-slate-400 font-mono whitespace-nowrap shrink-0">{{ $transaction->created_at->format('d M H:i') }}</span>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <p class="text-sm text-slate-400 font-medium">No transactions found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pipeline Action Launchpads -->
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">
                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6">
                    <h3 class="font-bold text-slate-800 text-base tracking-tight mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-bolt text-amber-500 text-sm"></i> Fast Pipelines Action
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <a href="/admin/participants" class="bg-slate-50 border border-slate-200 hover:bg-blue-50 hover:border-blue-200 text-slate-700 hover:text-blue-700 p-3.5 rounded-xl font-bold text-xs text-center transition flex flex-col items-center gap-2">
                            <i class="fa-solid fa-users text-sm"></i> View Users
                        </a>
                        <a href="/admin/reviews" class="bg-slate-50 border border-slate-200 hover:bg-amber-50 hover:border-amber-200 text-slate-700 hover:text-amber-700 p-3.5 rounded-xl font-bold text-xs text-center transition flex flex-col items-center gap-2">
                            <i class="fa-solid fa-user-check text-sm"></i> Audit Art
                        </a>
                        <a href="/admin/rankings" class="bg-slate-50 border border-slate-200 hover:bg-emerald-50 hover:border-emerald-200 text-slate-700 hover:text-emerald-700 p-3.5 rounded-xl font-bold text-xs text-center transition flex flex-col items-center gap-2">
                            <i class="fa-solid fa-trophy text-sm"></i> Standings
                        </a>
                    </div>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 xl:col-span-2">
                    <h3 class="font-bold text-slate-800 text-base tracking-tight mb-5 flex items-center gap-2">
                        <i class="fa-solid fa-chart-bar text-purple-600 text-sm"></i> Analytics Summary Metrics
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="bg-slate-50/50 border border-slate-100 p-4 rounded-xl">
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Enrollment Pipeline</p>
                            <h3 class="text-2xl font-black text-slate-800 mt-2 tracking-tight">{{ $totalEnrollments }} <span class="text-xs text-slate-400 font-medium">Enrolled</span></h3>
                        </div>
                        <div class="bg-slate-50/50 border border-slate-100 p-4 rounded-xl">
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Conversion Ratio</p>
                            <h3 class="text-2xl font-black text-emerald-600 mt-2 tracking-tight">{{ $paidUsers }} <span class="text-xs text-slate-400 font-medium">Paid Profiles</span></h3>
                        </div>
                        <div class="bg-slate-50/50 border border-slate-100 p-4 rounded-xl">
                            <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Fulfillment Assets</p>
                            <h3 class="text-2xl font-black text-blue-600 mt-2 tracking-tight">{{ $submittedArtworks }} <span class="text-xs text-slate-400 font-medium">Finished Designs</span></h3>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Toggle Handling Script Engine -->
    <script>
        function toggleMobileNavigation() {
            const mobileGrid = document.getElementById('mobileNavigationGrid');
            const icon = document.getElementById('mobileMenuIcon');

            mobileGrid.classList.toggle('hidden');

            if (mobileGrid.classList.contains('hidden')) {
                icon.className = "fa-solid fa-bars text-sm";
            } else {
                icon.className = "fa-solid fa-xmark text-sm";
            }
        }
    </script>
</body>

</html>