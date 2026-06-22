<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Participant - {{ $participant->user->first_name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen antialiased text-slate-800">

    <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">

        <div class="flex flex-col gap-3 mb-8 border-b border-slate-100 pb-5">
            <a href="{{ route('admin.participants') }}"
               class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-blue-600 transition w-fit group">
                <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i> Back to Participants Matrix
            </a>
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <h1 class="text-2xl lg:text-3xl font-black text-slate-900 tracking-tight">
                    Profile Action: <span class="text-blue-600 font-extrabold">{{ $participant->user->first_name }} {{ $participant->user->last_name }}</span>
                </h1>
                <div class="flex items-center gap-2 self-start sm:self-center">
                    <span class="px-3 py-1 bg-slate-100 border border-slate-200 text-slate-600 font-mono text-xs font-semibold rounded-lg shadow-sm">
                        ID: #{{ $participant->id }}
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 transition-all duration-200 hover:shadow-md/50">
                    <div class="flex items-center gap-2.5 mb-5 border-b border-slate-50 pb-3">
                        <div class="p-2 bg-blue-50 text-blue-600 rounded-xl text-sm">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                        <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">User Identification</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-5 gap-x-6 text-sm">
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Full Name</span>
                            <span class="font-bold text-slate-800 mt-1 block text-base">{{ $participant->user->first_name }} {{ $participant->user->last_name }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Email Address</span>
                            <span class="font-mono text-slate-700 mt-1 block break-all font-medium select-all">{{ $participant->user->email }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Date of Birth (DOB)</span>
                            <span class="text-slate-800 mt-1 block font-semibold">
                                {{ $participant->user->dob ? \Carbon\Carbon::parse($participant->user->dob)->format('d M, Y') : 'Not Provided' }}
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Educational Qualification</span>
                            <span class="text-slate-800 mt-1 block font-semibold">{{ $participant->user->qualification ?? 'Undergraduate' }}</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 flex flex-col justify-between transition-all duration-200 hover:shadow-md/50">
                        <div>
                            <div class="flex items-center gap-2.5 mb-4 border-b border-slate-50 pb-3">
                                <div class="p-1.5 bg-amber-50 text-amber-500 rounded-lg text-xs">
                                    <i class="fa-solid fa-trophy"></i>
                                </div>
                                <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Contest Enrollment</h2>
                            </div>
                            <div class="space-y-4 text-sm">
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Contest Name</span>
                                    <span class="font-bold text-slate-800 block mt-0.5 text-base leading-tight">{{ $participant->contest_name }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Selected Theme</span>
                                    <span class="font-semibold text-slate-700 block mt-0.5">{{ $participant->theme ?? 'Standard Custom Theme' }}</span>
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Category Scope</span>
                                    <span class="inline-block bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-md font-bold border border-slate-200/60 shadow-xs">
                                        {{ $participant->category ?? 'General Tier' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-slate-50 pt-3 mt-5 text-xs text-slate-400 flex items-center justify-between">
                            <span>Enrolled On:</span>
                            <span class="font-mono font-bold text-slate-600">{{ $participant->created_at->format('d M Y, h:i A') }}</span>
                        </div>
                    </div>

                    <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 flex flex-col justify-between transition-all duration-200 hover:shadow-md/50">
                        <div>
                            <div class="flex items-center gap-2.5 mb-4 border-b border-slate-50 pb-3">
                                <div class="p-1.5 bg-emerald-50 text-emerald-600 rounded-lg text-xs">
                                    <i class="fa-solid fa-credit-card"></i>
                                </div>
                                <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Payment Ledger</h2>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-1.5">Gateway Status</span>
                                    <!-- FIXED: Changed @uses parsing error to standard native directive layout -->
                                    @if($participant->payment_status)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl text-xs font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-xs">
                                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span> Paid (Demo Mode)
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl text-xs font-extrabold bg-rose-50 text-rose-700 border border-rose-200 shadow-xs">
                                            <span class="h-2 w-2 rounded-full bg-rose-500"></span> Unpaid / Draft
                                        </span>
                                    @endif
                                </div>
                                <div>
                                    <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Fee Paid Amount</span>
                                    <span class="text-3xl font-black text-slate-900 block mt-0.5 tracking-tight">
                                        &#8377;{{ number_format($participant->payment_amount ?? 0, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-slate-50 pt-3 mt-5 text-xs text-slate-400 flex flex-col gap-0.5">
                            <span class="text-[10px] uppercase tracking-wider font-bold">Transactional Code:</span>
                            <span class="font-mono text-slate-600 font-bold break-all">TXN_DEMO_{{ $participant->id }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-950 rounded-2xl shadow-sm p-5 text-white flex flex-col sm:flex-row sm:items-center justify-between gap-4 border border-slate-800">
                    <div class="flex items-center gap-3.5">
                        <div class="h-11 w-11 bg-white/10 border border-white/5 rounded-xl flex items-center justify-center text-lg text-blue-400 shadow-inner shrink-0">
                            <i class="fa-solid fa-compass-drafting"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm tracking-wide text-slate-100">Artwork Blueprint Download Status</h3>
                            <p class="text-xs text-slate-400 mt-0.5">Tracks if the baseline layout template file was generated by user.</p>
                        </div>
                    </div>
                    <div class="text-left sm:text-right sm:border-l sm:border-white/10 sm:pl-6 shrink-0">
                        @if($participant->blueprint_downloaded ?? false)
                            <span class="inline-block bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 text-[11px] px-2.5 py-0.5 rounded-lg font-bold uppercase tracking-wider">
                                <i class="fa-solid fa-circle-check mr-1 text-xs"></i> Downloaded
                            </span>
                            <span class="block text-[11px] text-slate-400 font-mono mt-1.5 font-semibold">
                                {{ \Carbon\Carbon::parse($participant->blueprint_downloaded_at)->format('d M, h:i A') }}
                            </span>
                        @else
                            <span class="inline-block bg-amber-500/20 text-amber-400 border border-amber-500/30 text-[11px] px-2.5 py-0.5 rounded-lg font-bold uppercase tracking-wider">
                                <i class="fa-solid fa-clock mr-1 text-xs"></i> Not Downloaded
                            </span>
                        @endif
                    </div>
                </div>

                <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-3 mb-5 border-b border-slate-50 pb-3">
                        <div class="flex items-center gap-2.5">
                            <div class="p-1.5 bg-indigo-50 text-indigo-600 rounded-lg text-xs">
                                <i class="fa-solid fa-palette"></i>
                            </div>
                            <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Submitted Project File</h2>
                        </div>
                        @if($participant->artwork_file)
                            <span class="text-xs text-slate-400 font-mono bg-slate-50 border border-slate-100 px-2.5 py-1 rounded-lg">
                                Uploaded: <span class="font-bold text-slate-600">{{ $participant->artwork_uploaded_at ? \Carbon\Carbon::parse($participant->artwork_uploaded_at)->format('d M Y, h:i A') : $participant->updated_at->format('d M Y') }}</span>
                            </span>
                        @endif
                    </div>

                    @if($participant->artwork_file)
                        <div class="space-y-4">
                            <div class="bg-slate-950 rounded-xl overflow-hidden border border-slate-800 shadow-inner group relative max-h-[500px] flex items-center justify-center p-2 bg-[radial-gradient(#1e293b_1px,transparent_1px)] [background-size:16px_16px]">
                                <img src="{{ asset('storage/' . $participant->artwork_file) }}"
                                     alt="Participant Creative Artwork"
                                     class="object-contain max-h-[480px] w-full rounded-lg transition duration-300 group-hover:scale-[1.005]">

                                <div class="absolute top-3 left-3 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <span class="text-[11px] font-semibold text-white/95 backdrop-blur-md bg-black/40 border border-white/10 px-2.5 py-1 rounded-lg shadow-sm">
                                        <i class="fa-solid fa-expand mr-1 text-[10px]"></i> Hover Preview Mode
                                    </span>
                                </div>
                            </div>

                            <a href="{{ asset('storage/' . $participant->artwork_file) }}" download
                               class="w-full bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm py-3.5 px-4 rounded-xl flex items-center justify-center gap-2 transition-all duration-150 shadow-sm hover:shadow active:scale-[0.99] cursor-pointer">
                                <i class="fa-solid fa-cloud-arrow-down text-base"></i> Download Master Artwork File
                            </a>
                        </div>
                    @else
                        <div class="border-2 border-dashed border-slate-200 rounded-2xl p-12 text-center bg-slate-50/30">
                            <div class="h-14 w-14 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl shadow-inner border border-slate-200/50">
                                <i class="fa-solid fa-file-image"></i>
                            </div>
                            <h3 class="text-base font-bold text-slate-700">No Asset Uploaded</h3>
                            <p class="text-xs text-slate-400 mt-1 max-w-xs mx-auto leading-relaxed">The competitor hasn't uploaded their finished artwork solution for audit yet.</p>
                        </div>
                    @endif
                </div>

            </div>

            <div class="lg:sticky lg:top-6">
                <form action="{{ route('admin.participants.update', $participant->id) }}" method="POST"
                    class="bg-white border border-slate-100 rounded-2xl shadow-sm hover:shadow-md p-6 border-t-4 border-t-blue-600 transition-shadow duration-200">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center gap-2.5 mb-5 border-b border-slate-50 pb-3">
                        <div class="p-1.5 bg-blue-50 text-blue-600 rounded-lg text-xs">
                            <i class="fa-solid fa-gavel"></i>
                        </div>
                        <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Evaluation Pipeline</h2>
                    </div>

                    @if(session('success'))
                        <div class="bg-emerald-50 text-emerald-800 p-3.5 rounded-xl border border-emerald-200/60 text-xs font-bold mb-5 flex items-center gap-2.5 shadow-xs">
                            <i class="fa-solid fa-circle-check text-emerald-600 text-sm"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if(!$participant->artwork_file)
                        <div class="bg-amber-50/60 border border-amber-200/70 rounded-xl p-4 mb-5 text-amber-900 text-xs">
                            <div class="flex items-start gap-2.5">
                                <i class="fa-solid fa-triangle-exclamation text-amber-600 text-sm mt-0.5 shrink-0"></i>
                                <div class="leading-relaxed">
                                    <strong class="font-bold block text-amber-800 mb-0.5">Pipeline Locked</strong>
                                    This evaluation matrix cannot be updated or processed until the competitor uploads their project file asset.
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-5">
                        <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2 pl-0.5">
                            Submission Evaluation Status
                        </label>
                        <div class="relative">
                            <select name="submission_status"
                                    {{ !$participant->artwork_file ? 'disabled' : '' }}
                                    class="w-full bg-slate-50 border border-slate-200 text-slate-800 font-semibold rounded-xl pl-4 pr-10 py-3 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 appearance-none transition disabled:opacity-60 disabled:cursor-not-allowed shadow-inner">
                                <option value="pending" {{ $participant->submission_status === 'pending' ? 'selected' : '' }}>🕒 Pending (Queue)</option>
                                <option value="under_review" {{ $participant->submission_status === 'under_review' ? 'selected' : '' }}>🔍 Under Review</option>
                                <option value="approved" {{ $participant->submission_status === 'approved' ? 'selected' : '' }}>✅ Approved (Pass)</option>
                                <option value="rejected" {{ $participant->submission_status === 'rejected' ? 'selected' : '' }}>❌ Rejected (Fail)</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400 text-xs">
                                <i class="fa-solid fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2 pl-0.5">
                            Numerical Score (0 - 100)
                        </label>
                        <input
                            type="number"
                            name="numerical_score"
                            min="0"
                            max="100"
                            value="{{ $participant->numerical_score }}"
                            placeholder="Enter score"
                            {{ !$participant->artwork_file ? 'disabled' : '' }}
                            class="w-full bg-slate-50 border border-slate-200 text-slate-800 font-semibold rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 shadow-inner disabled:opacity-60 disabled:cursor-not-allowed">
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-5 border-t border-b border-slate-50 py-3">
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Current Score</span>
                            <span class="font-bold text-slate-800 mt-1 block text-base">
                                {{ $participant->numerical_score ?? 'N/A' }}/100
                            </span>
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-slate-400 uppercase tracking-wider">Leaderboard Rank</span>
                            <span class="font-bold text-slate-800 mt-1 block text-base">
                                {{ $participant->rank ? '#' . $participant->rank : 'N/A' }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-2 pl-0.5">
                            Internal Auditor Remarks / Feedback
                        </label>
                        <textarea name="admin_remark"
                                rows="6"
                                placeholder="Write professional assessment logs or specific reasons for failure/approval parameters..."
                                {{ !$participant->artwork_file ? 'disabled' : '' }}
                                class="w-full bg-slate-50 border border-slate-200 text-slate-800 text-sm rounded-xl p-4 focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 placeholder-slate-400 resize-none transition-all duration-150 shadow-inner font-medium leading-relaxed disabled:opacity-60 disabled:cursor-not-allowed">{{ $participant->admin_remark }}</textarea>
                    </div>

                    @if($participant->artwork_file)
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-bold text-sm py-3.5 px-4 rounded-xl shadow-sm shadow-blue-500/10 hover:shadow-md transition-all duration-150 flex items-center justify-center gap-2 cursor-pointer">
                            <i class="fa-solid fa-floppy-disk text-base"></i> Save Evaluation Record
                        </button>
                    @else
                        <button type="button" disabled
                                class="w-full bg-slate-100 text-slate-400 border border-slate-200 font-bold text-sm py-3.5 px-4 rounded-xl flex items-center justify-center gap-2 cursor-not-allowed">
                            <i class="fa-solid fa-lock text-xs"></i> Awaiting Submission Asset
                        </button>
                    @endif
                </form>
            </div>

        </div>
    </div>

</body>
</html>