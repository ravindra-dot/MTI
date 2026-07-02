<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Enrollment;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $totalUsers = User::count();

        $totalEnrollments = Enrollment::count();

        $paidUsers = Enrollment::where('payment_status', true)->count();

        $submittedArtworks = Enrollment::whereNotNull('artwork_file')->count();

        $submissionRate = $paidUsers > 0
            ? round(($submittedArtworks / $paidUsers) * 100)
            : 0;

        $recentUsers = User::latest()
            ->take(5)
            ->get();

        $recentSubmissions = Enrollment::with('user')
            ->whereNotNull('artwork_file')
            ->latest()
            ->take(10)
            ->get();
        $recentTransactions = Enrollment::where('payment_status', true)
            ->latest()
            ->take(10)
            ->get();

        $pendingCount = Enrollment::where('submission_status','pending')->count();

        $underReviewCount = Enrollment::where('submission_status','under_review')->count();

        $approvedCount = Enrollment::where('submission_status','approved')->count();

        $rejectedCount = Enrollment::where('submission_status','rejected')->count();

        $totalRevenue = Enrollment::where('payment_status', true)
            ->sum('payment_amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalEnrollments',
            'paidUsers',
            'submittedArtworks',
            'submissionRate',
            'recentUsers',
            'recentSubmissions',
            'pendingCount',
            'underReviewCount',
            'approvedCount',
            'rejectedCount',
            'recentTransactions',
            'totalRevenue'
        ));
    }

    public function rankings()
    {
        $participants = Enrollment::with('user')
            ->whereNotNull('numerical_score')
            ->orderBy('rank', 'asc')
            ->get();

        return view('admin.rankings', compact('participants'));
    }
}