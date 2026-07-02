<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants Matrix</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        /* Custom scrollbar matching professional layout interfaces */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 20px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen antialiased text-slate-800">

    <div class="p-4 sm:p-6 lg:p-8 max-w-7xl mx-auto">
        <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-blue-600 transition w-fit group">
                <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i> Back to Dashboard
            </a>

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 pb-5 border-b border-slate-100">
            <div>
                <h1 class="text-2xl lg:text-3xl font-black text-slate-900 tracking-tight">Participants Matrix</h1>
                <p class="text-sm text-slate-400 mt-1">Manage user contest enrollments, pipeline financial ledgers, and art assets verification verification protocols.</p>
            </div>
            <div class="inline-flex items-center gap-2 bg-blue-50/70 text-blue-700 px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wide border border-blue-100/80 shadow-sm shrink-0">
                <i class="fa-solid fa-database text-[11px]"></i> Total Records:
                <span class="font-black text-sm text-blue-800 ml-0.5">{{ $participants->total() }}</span>
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm p-6 mb-8">
            <div class="flex items-center gap-2 mb-4 border-b border-slate-50 pb-3">
                <div class="p-1.5 bg-slate-50 border border-slate-100 text-slate-500 rounded-lg text-xs">
                    <i class="fa-solid fa-sliders"></i>
                </div>
                <h2 class="text-xs font-extrabold uppercase tracking-widest text-slate-500">Filter Dataset Engine</h2>
            </div>

            <form method="GET" action="" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-12 gap-4 items-end">
                <div class="lg:col-span-2">
                    <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-1.5 pl-0.5">From Date</label>
                    <input type="date"
                           name="from_date"
                           value="{{ request('from_date') }}"
                           class="w-full bg-slate-50 border border-slate-200 text-slate-700 font-medium rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition shadow-inner">
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-1.5 pl-0.5">To Date</label>
                    <input type="date"
                           name="to_date"
                           value="{{ request('to_date') }}"
                           class="w-full bg-slate-50 border border-slate-200 text-slate-700 font-medium rounded-xl px-3 py-2.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition shadow-inner">
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-1.5 pl-0.5">Payment Ledger</label>
                    <div class="relative">
                        <select name="payment_status"
                                class="w-full bg-slate-50 border border-slate-200 text-slate-700 font-semibold rounded-xl pl-3 pr-8 py-2.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 appearance-none transition cursor-pointer shadow-inner">
                            <option value="">All Payments</option>
                            <option value="1" {{ request('payment_status') === '1' ? 'selected' : '' }}>🟢 Paid Only</option>
                            <option value="0" {{ request('payment_status') === '0' ? 'selected' : '' }}>🔴 Unpaid Drafts</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400 text-xs">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-1.5 pl-0.5">Submission Audit</label>
                    <div class="relative">
                        <select name="submission_status"
                                class="w-full bg-slate-50 border border-slate-200 text-slate-700 font-semibold rounded-xl pl-3 pr-8 py-2.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 appearance-none transition cursor-pointer shadow-inner">
                            <option value="">All Submissions</option>
                            <option value="pending" {{ request('submission_status') === 'pending' ? 'selected' : '' }}>🕒 Pending (Queue)</option>
                            <option value="under_review" {{ request('submission_status') === 'under_review' ? 'selected' : '' }}>🔍 Under Review</option>
                            <option value="approved" {{ request('submission_status') === 'approved' ? 'selected' : '' }}>✅ Approved (Pass)</option>
                            <option value="rejected" {{ request('submission_status') === 'rejected' ? 'selected' : '' }}>❌ Rejected (Fail)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-slate-400 text-xs">
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-2 lg:col-span-2">
                    <label class="block text-[11px] font-extrabold text-slate-400 uppercase tracking-wider mb-1.5 pl-0.5">Search Query</label>
                    <div class="relative">
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Name or email target..."
                               class="w-full bg-slate-50 border border-slate-200 text-slate-700 font-medium rounded-xl pl-8 pr-3 py-2.5 text-sm focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition shadow-inner">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400 text-xs">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>

                <div class="flex gap-2 lg:col-span-2 md:col-span-1">
                    <button type="submit"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 active:scale-[0.98] text-white font-bold text-sm rounded-xl py-2.5 shadow-sm shadow-blue-500/10 hover:shadow transition duration-150 flex items-center justify-center gap-1.5 cursor-pointer">
                        <i class="fa-solid fa-filter text-xs"></i> Filter
                    </button>
                    <a href="{{ route('admin.participants') }}"
                       class="px-3.5 bg-slate-100 hover:bg-slate-200 active:scale-[0.98] text-slate-600 font-bold text-sm rounded-xl py-2.5 text-center transition duration-150 flex items-center justify-center border border-slate-200/40"
                       title="Reset Filters System">
                        <i class="fa-solid fa-arrow-rotate-left"></i>
                    </a>
                </div>
            </form>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left text-sm text-slate-500">
                    <thead class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                        <tr>
                            <th scope="col" class="px-6 py-4.5">Participant Details</th>
                            <th scope="col" class="px-6 py-4.5">Contest & Scope</th>
                            <th scope="col" class="px-6 py-4.5">Payment Ledger</th>
                            <th scope="col" class="px-6 py-4.5">Evaluation Status</th>
                            <th scope="col" class="px-6 py-4.5 text-right">Actions Matrix</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 border-t border-slate-50">
                        @forelse($participants as $participant)
                            <tr class="hover:bg-slate-50/40 transition duration-150 group" onclick="window.location='{{ route('admin.participants.show', $participant->id) }}'">

                                <td class="px-6 py-4.5">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 bg-gradient-to-tr from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-extrabold shadow-sm tracking-wide shrink-0">
                                            {{ strtoupper(substr($participant->user->first_name, 0, 1)) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors leading-tight">
                                                {{ $participant->user->first_name }} {{ $participant->user->last_name }}
                                            </span>
                                            <span class="text-xs text-slate-400 font-mono mt-1 select-all">
                                                {{ $participant->user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4.5">
                                    <div class="flex flex-col gap-0.5">
                                        <span class="text-slate-800 font-bold text-sm leading-tight">{{ $participant->contest_name }}</span>
                                        <div class="mt-1 flex items-center">
                                            <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 bg-slate-100 px-2 py-0.5 rounded-md border border-slate-200/40">
                                                {{ $participant->category ?? 'General' }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4.5">
                                    @if($participant->payment_status)
                                        <div class="flex flex-col items-start gap-1">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200/60 uppercase tracking-wide">
                                                <span class="h-1 w-1 rounded-full bg-emerald-500"></span> Paid
                                            </span>
                                            <span class="font-mono text-slate-800 font-bold text-xs mt-0.5">
                                                ₹{{ number_format($participant->payment_amount, 2) }}
                                            </span>
                                        </div>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[10px] font-extrabold bg-rose-50 text-rose-700 border border-rose-200/60 uppercase tracking-wide">
                                            <span class="h-1 w-1 rounded-full bg-rose-500"></span> Unpaid
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4.5">
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-amber-50 text-amber-700 border-amber-200/70',
                                            'under_review' => 'bg-blue-50 text-blue-700 border-blue-200/70',
                                            'approved' => 'bg-emerald-50 text-emerald-700 border-emerald-200/70',
                                            'rejected' => 'bg-rose-50 text-rose-700 border-rose-200/70',
                                        ];
                                        $currentClass = $statusClasses[$participant->submission_status] ?? 'bg-slate-50 text-slate-700 border-slate-200';
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-bold border uppercase tracking-wider text-[10px] shadow-2xs {{ $currentClass }}">
                                        {{ str_replace('_', ' ', $participant->submission_status) }}
                                    </span>
                                </td>

                                <td class="px-6 py-4.5 text-right">
                                    <div class="flex justify-end items-center">
                                        <a href="{{ route('admin.participants.show', $participant->id) }}"
                                           class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 border border-slate-200/80 hover:bg-blue-600 hover:text-white hover:border-blue-600 text-slate-600 text-xs font-bold transition duration-150 shadow-2xs group-hover:bg-white">
                                            View Profile <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center max-w-sm mx-auto">
                                        <div class="h-12 w-12 bg-slate-50 border border-slate-100 rounded-xl flex items-center justify-center text-slate-400 text-lg mb-3 shadow-inner">
                                            <i class="fa-solid fa-folder-open"></i>
                                        </div>
                                        <span class="text-sm font-bold text-slate-800 block">No matching evaluation records found</span>
                                        <span class="text-xs text-slate-400 mt-1 leading-relaxed">No data matches your current filtering criteria. Reset system filters to start fresh.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($participants->hasPages())
                <div class="px-6 py-4.5 bg-slate-50/60 border-t border-slate-100">
                    {{ $participants->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>