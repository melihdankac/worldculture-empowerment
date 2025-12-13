<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;
use App\Models\Donation;

// Route::get('/', function () {
//     return view('website-template.home-page');
//     // return view('welcome');
// });

Route::get('/', [FrontendController::class, 'startseite'])->name('startseite');
Route::get('/entstehungsgeschichte', [FrontendController::class, 'entstehungsgeschichte'])->name('entstehungsgeschichte');
Route::get('/vorstand', [FrontendController::class, 'vorstand'])->name('vorstand');
Route::get('/team', [FrontendController::class, 'team'])->name('team');

Route::get('/derTraumVomHoren', [FrontendController::class, 'derTraumVomHoren'])->name('derTraumVomHoren');
Route::get('/turkeiErdbebenprojekt', [FrontendController::class, 'turkeiErdbebenprojekt'])->name('turkeiErdbebenprojekt');
Route::get('/patenschaft', [FrontendController::class, 'patenschaft'])->name('patenschaft');

Route::get('/werdeAktiv', [FrontendController::class, 'werdeAktiv'])->name('werdeAktiv');
Route::get('/spenden', [FrontendController::class, 'spenden'])->name('spenden');
Route::get('/kontakt', [FrontendController::class, 'kontakt'])->name('kontakt');

Route::get('/satzungDesVereins', [FrontendController::class, 'satzungDesVereins'])->name('satzungDesVereins');
Route::get('/impressum', [FrontendController::class, 'impressum'])->name('impressum');
Route::get('/datenschutzerklarung', [FrontendController::class, 'datenschutzerklarung'])->name('datenschutzerklarung');


// Donation Route
Route::post('/donate', [DonationController::class, 'process'])->name('donation.process');
Route::post('/donate-success', [DonationController::class, 'success'])->name('donation.success');
Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle'])
    ->withoutMiddleware([VerifyCsrfToken::class])
    ->name('stripe.webhook');

Route::get('/test-mail', function () {
    $donation = Donation::first();
    Mail::to('melihdankac@gmail.com')->send(new DonationReceipt($donation));
    return response()->json(['message' => 'Test mail gönderildi!']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->name('wcepanel.')->prefix('wcepanel')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin-template.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
