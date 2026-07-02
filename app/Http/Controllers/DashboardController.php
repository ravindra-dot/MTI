<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /* ===============================
        GET USER ENROLLMENT
    =============================== */

    private function getEnrollment()
    {
        return Enrollment::where('user_id', auth()->id())->first();
    }

    /* ===============================
        DASHBOARD INDEX
    =============================== */
    public function index()
    {
        $enrollment = $this->getEnrollment();

        $progress = [
            'registered' => (bool) $enrollment,
            'payment'    => $enrollment?->payment_status ?? false,
            'download'   => $enrollment?->blueprint_downloaded ?? false,
            'submitted'  => !empty($enrollment?->artwork_file),

            'review'     => $enrollment?->reviewed_at !== null,
        ];

        $steps = ['registered', 'payment', 'download', 'submitted', 'review'];

        $currentStep = 0;

        foreach ($steps as $step) {
            if (!empty($progress[$step])) {
                $currentStep++;
            } else {
                break;
            }
        }

        $percentage = (count($steps) > 0)
            ? ($currentStep / count($steps)) * 100
            : 0;

        return view('dashboard', compact(
            'enrollment',
            'progress',
            'percentage'
        ));
    }

    /* ===============================
        MARK BLUEPRINT DOWNLOADED
    =============================== */
    public function markBlueprintDownloaded()
    {
        $enrollment = $this->getEnrollment();

        if (!$enrollment) {
            return back()->with('error', 'Enrollment not found.');
        }

        $enrollment->blueprint_downloaded = true;
        $enrollment->blueprint_downloaded_at = now();
        $enrollment->save();

        return back()->with('success', 'Blueprint marked as downloaded.');
    }

    /* ===============================
        ARTWORK UPLOAD
    =============================== */
    public function uploadArtwork(Request $request)
    {
        $request->validate([
            'artwork_file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120'
        ]);

        $enrollment = $this->getEnrollment();

        if (!$enrollment) {
            return back()->with('error', 'Enrollment not found.');
        }

        if ($enrollment->artwork_file) {
        return back()->with(
            'error',
            'Artwork has already been uploaded. Multiple uploads are not allowed.'
        );
        }

        $filePath = $request->file('artwork_file')->store(
            'artworks/user_id_' . auth()->id(),
            'public'
        );

        $enrollment->artwork_file = $filePath;
        $enrollment->artwork_uploaded_at = now();
        $enrollment->save();

        return back()->with('success', 'Artwork uploaded successfully.');
    }

    /* ===============================
        DEMO PAYMENT
    =============================== */
    public function demoPayment()
    {
        $enrollment = Enrollment::firstOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'contest_name' => 'All India Painting Competition 2026',
                'theme' => 'Future India',
                'category' => 'Painting'
            ]
        );

        $enrollment->payment_status = true;
        $enrollment->payment_amount = 49;
        $enrollment->save();

        return back()->with('success', 'Demo payment successful.');
    }

    /* ===============================
        PARTICIPATION CERTIFICATE DOWNLOAD
    =============================== */


    public function participationCertificate()
    {
        $enrollment = $this->getEnrollment();

        if (!$enrollment || !$enrollment->payment_status) {
            return back()->with('error', 'Not eligible for certificate.');
        }

        $data = [
            'name' => ucwords(strtolower(Auth::user()->first_name ?? 'User')) . ' ' . ucwords(strtolower(Auth::user()->last_name ?? 'User')),
            'contest' => $enrollment->contest_name,
            'email' => auth()->user()->email,
            'user_id' => $enrollment->id,
            'date' => now()->format('d M Y'),
            'credential_id' => 'PARTICIPATION-' . strtoupper(substr(md5($enrollment->id . auth()->id()), 0, 10))
        ];

        $pdf = Pdf::loadView('certificates.participation', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('participation-certificate.pdf');
    }

    /* ===============================
        FINAL CERTIFICATE DOWNLOAD
    =============================== */
    public function finalCertificate()
    {
        $enrollment = $this->getEnrollment();

        if (!$enrollment || $enrollment->submission_status !== 'approved') {
            return back()->with('error', 'Final certificate not available yet.');
        }

        $data = [
            'name' => ucwords(strtolower(Auth::user()->first_name ?? 'User')) . ' ' . ucwords(strtolower(Auth::user()->last_name ?? 'User')),
            'contest' => $enrollment->contest_name,
            'score' => $enrollment->numerical_score ?? 'N/A',
            'rank' => $enrollment->rank ?? 'N/A',
            'date' => now()->format('d M Y')
        ];

        $pdf = Pdf::loadView('certificates.final', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('final-certificate.pdf');
    }


}