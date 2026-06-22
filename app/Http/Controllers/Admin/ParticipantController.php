<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;
 use Symfony\Component\HttpFoundation\StreamedResponse;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = Enrollment::with('user');

        // Default Last 15 Days
        if (
            !$request->filled('from_date') &&
            !$request->filled('to_date')
        ) {
            $query->whereDate(
                'created_at',
                '>=',
                now()->subDays(15)
            );
        }

        // Search Name / Email
        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('user', function ($q) use ($search) {

                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        // Payment Filter
        if ($request->filled('payment_status')) {

            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        // Submission Filter
        if ($request->filled('submission_status')) {

            $query->where(
                'submission_status',
                $request->submission_status
            );
        }

        // From Date
        if ($request->filled('from_date')) {

            $query->whereDate(
                'created_at',
                '>=',
                $request->from_date
            );
        }

        // To Date
        if ($request->filled('to_date')) {

            $query->whereDate(
                'created_at',
                '<=',
                $request->to_date
            );
        }

        $participants = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.participants',
            compact('participants')
        );
    }

    // show participant details
    public function show($id)
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $participant = Enrollment::with([
            'user',
            'reviewer'
        ])->findOrFail($id);


        return view(
            'admin.participant-show',
            compact('participant')
        );
    }

    // update review status and remark
    public function update(Request $request, $id)
    {
        $request->validate([
            'submission_status' => 'required|in:pending,under_review,approved,rejected',
            'admin_remark' => 'nullable|string',
            'numerical_score' => 'nullable|integer|min:0|max:100',

        ]);

        $participant = Enrollment::findOrFail($id);

        $participant->update([
                'submission_status' => $request->submission_status,
                'admin_remark' => $request->admin_remark,
                'numerical_score' => $request->numerical_score,
                'reviewed_by' => session('admin_id'),
                'reviewed_at' => now(),
            ]);

            $participants = Enrollment::whereNotNull('numerical_score')
                ->orderByDesc('numerical_score')
                ->get();

            $rank = 1;

            foreach ($participants as $item) {

                $item->update([
                    'rank' => $rank
                ]);

                $rank++;
            }

            return redirect()
                ->route('admin.participants.show', $participant->id)
                ->with('success', 'Evaluation updated successfully.');

    }



public function export()
{
    $fileName = 'participants.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => "attachment; filename={$fileName}",
    ];

    $callback = function () {

        $file = fopen('php://output', 'w');

        fputcsv($file, [
            'ID',
            'Name',
            'Email',
            'Contest',
            'Payment Status',
            'Submission Status',
            'Score',
            'Rank'
        ]);

        $participants = Enrollment::with('user')->get();

        foreach ($participants as $participant) {

            fputcsv($file, [
                $participant->id,
                $participant->user->first_name . ' ' . $participant->user->last_name,
                $participant->user->email,
                $participant->contest_name,
                $participant->payment_status ? 'Paid' : 'Unpaid',
                $participant->submission_status,
                $participant->numerical_score,
                $participant->rank,
            ]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}

}