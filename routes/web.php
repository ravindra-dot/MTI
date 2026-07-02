<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\AuthController as AdminController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ParticipantController;

use App\Http\Controllers\GalleryController;

/*
|--------------------------------------------------------------------------
| Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

Route::redirect('/home', '/');

Route::get('/auth', function () {
    return view('auth', [
        'recaptcha_site_key' => config('services.recaptcha.site_key')
    ]);
})->name('login');

Route::view('/terms&conditions-policy', 'terms');
Route::view('/about-us', 'aboutus');
Route::view('/contact', 'contact');
Route::view('/refund-cancellation-policy', 'refund-policy');
Route::view('/privacy-policy', 'privacy-policy');

Route::get('/gallery', [GalleryController::class, 'index'])
    ->name('gallery');
/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::post('/send-otp', [AuthController::class, 'sendOtp'])
        ->middleware('throttle:5,1');

    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
        ->middleware('throttle:10,1');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('user.login');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/blueprint/download', [DashboardController::class, 'markBlueprintDownloaded'])
        ->name('blueprint.download');

    Route::post('/artwork/upload', [DashboardController::class, 'uploadArtwork'])
        ->name('artwork.upload');

    Route::get('/certificate/participation', [DashboardController::class, 'participationCertificate'])
        ->name('certificate.participation');

    Route::get('/certificate/final', [DashboardController::class, 'finalCertificate'])
        ->name('certificate.final');

    Route::get('/checkout', [DashboardController::class, 'checkout'])
        ->name('checkout');

    Route::post('/checkout/pay', [DashboardController::class, 'processPayment'])
        ->name('checkout.pay');

});

/*
|--------------------------------------------------------------------------
| Admin Authentication
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect('/admin/login');
    });

    Route::get('/login', [AdminController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware('admin.auth')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::post('/logout', [AdminController::class, 'logout'])
            ->name('admin.logout');

        Route::get('/rankings', [AdminDashboardController::class, 'rankings'])
            ->name('admin.rankings');

        Route::get('/participants/export', [ParticipantController::class, 'export'])
            ->name('admin.participants.export');

        Route::get('/participants', [ParticipantController::class, 'index'])
            ->name('admin.participants');

        Route::get('/participants/{id}', [ParticipantController::class, 'show'])
            ->whereNumber('id')
            ->name('admin.participants.show');

        Route::put('/participants/{id}', [ParticipantController::class, 'update'])
            ->whereNumber('id')
            ->name('admin.participants.update');
    });