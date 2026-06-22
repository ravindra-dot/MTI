<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard Ranking</title>
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

    <div class="p-4 sm:p-6 lg:p-8 max-w-5xl mx-auto">
        <a href="{{ url('admin/dashboard') }}"
           class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-slate-400 hover:text-blue-600 transition w-fit group mb-6">
            <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i> Return Home
        </a>

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8 pb-5 border-b border-slate-100">
            <div>
                <h1 class="text-2xl lg:text-3xl font-black text-slate-900 tracking-tight">Leaderboard Ranking</h1>
                <p class="text-sm text-slate-400 mt-1">Real-time performance distribution metrics and top-performing student evaluations.</p>
            </div>
            <div class="inline-flex items-center gap-2 bg-blue-50/70 text-blue-700 px-4 py-2.5 rounded-xl font-bold text-xs uppercase tracking-wide border border-blue-100/80 shadow-sm shrink-0">
                <i class="fa-solid fa-trophy text-[11px]"></i> Active Matrix Pool
            </div>
        </div>

        <div class="bg-white border border-slate-100 rounded-2xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full border-collapse text-left text-sm text-slate-500 whitespace-nowrap">
                    <thead class="bg-slate-50/70 border-b border-slate-100 text-[11px] font-extrabold uppercase tracking-wider text-slate-400">
                        <tr>
                            <th scope="col" class="px-6 py-4.5 w-24">Rank Position</th>
                            <th scope="col" class="px-6 py-4.5 whitespace-normal">Participant Details</th>
                            <th scope="col" class="px-6 py-4.5">Evaluator Metric</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 border-t border-slate-50">
                        @foreach($participants as $p)
                            <tr class="hover:bg-slate-50/40 transition duration-150 group">

                                <td class="px-6 py-4.5 vertical-middle">
                                    @if($p->rank == 1)
                                        <span class="inline-flex items-center justify-center h-7 w-12 bg-amber-50 text-amber-700 border border-amber-200/60 font-black rounded-lg text-xs tracking-wide shadow-2xs">
                                            🥇 #1
                                        </span>
                                    @elseif($p->rank == 2)
                                        <span class="inline-flex items-center justify-center h-7 w-12 bg-slate-100 text-slate-700 border border-slate-200/60 font-black rounded-lg text-xs tracking-wide shadow-2xs">
                                            🥈 #2
                                        </span>
                                    @elseif($p->rank == 3)
                                        <span class="inline-flex items-center justify-center h-7 w-12 bg-orange-50 text-orange-800 border border-orange-200/60 font-black rounded-lg text-xs tracking-wide shadow-2xs">
                                            🥉 #3
                                        </span>
                                    @else
                                        <span class="inline-flex items-center justify-center h-7 w-12 bg-slate-50 text-slate-500 font-bold font-mono rounded-lg text-xs">
                                            #{{ $p->rank }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-6 py-4.5 whitespace-normal">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 bg-gradient-to-tr from-blue-600 to-indigo-600 text-white rounded-xl flex items-center justify-center font-extrabold shadow-sm tracking-wide shrink-0">
                                            {{ strtoupper(substr($p->user->first_name, 0, 1)) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold text-slate-800 text-sm group-hover:text-blue-600 transition-colors leading-tight">
                                                {{ $p->user->first_name }} {{ $p->user->last_name }}
                                            </span>
                                            <span class="text-xs text-slate-400 font-mono mt-1 select-all">
                                                {{ $p->user->email }}
                                            </span>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4.5">
                                    <div class="flex items-center gap-2">
                                        <div class="font-mono text-slate-900 font-black text-sm bg-slate-50 px-3 py-1 rounded-xl border border-slate-200/40 shadow-inner">
                                            {{ number_format($p->numerical_score) }}
                                        </div>
                                        <span class="text-[10px] font-extrabold uppercase tracking-widest text-slate-400">Pts</span>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>