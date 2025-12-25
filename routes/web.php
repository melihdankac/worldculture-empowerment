<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Artisan;
// Route::get('/', function () {
//     return view('website-template.home-page');
//     // return view('welcome');
// });

Route::get('/', [FrontendController::class, 'startseite'])->name('startseite');
Route::get('/entstehungsgeschichte', [FrontendController::class, 'entstehungsgeschichte'])->name('entstehungsgeschichte');
Route::get('/team', [FrontendController::class, 'team'])->name('team');
Route::get('/partnerschaften', [FrontendController::class, 'partnerschaften'])->name('partnerschaften');

Route::get('/werdeAktiv', [FrontendController::class, 'werdeAktiv'])->name('werdeAktiv');
Route::get('/spenden', [FrontendController::class, 'spenden'])->name('spenden');
Route::get('/werden-sie-mitglied', [FrontendController::class, 'werdenSieMitglied'])->name('werden-sie-mitglied');
Route::get('/kontakt', [FrontendController::class, 'kontakt'])->name('kontakt');

// Projects
Route::get('/frauenkooperative-noyanlar', [FrontendController::class, 'frauenkooperativeNoyanlar'])->name('frauenkooperative-noyanlar');
Route::get('/derTraumVomHoren', [FrontendController::class, 'derTraumVomHoren'])->name('derTraumVomHoren');
Route::get('/children-in-village', [FrontendController::class, 'childrenVillage'])->name('children-in-village');
Route::get('/autonomy-foundation', [FrontendController::class, 'autonomyFoundation'])->name('autonomy-foundation');
Route::get('/patenschaft', [FrontendController::class, 'patenschaft'])->name('patenschaft');
Route::get('/turkeiErdbebenprojekt', [FrontendController::class, 'turkeiErdbebenprojekt'])->name('turkeiErdbebenprojekt');

// Policys
Route::get('/satzung-des-vereins', [FrontendController::class, 'satzungDesVereins'])->name('satzungDesVereins');
Route::get('/impressum', [FrontendController::class, 'impressum'])->name('impressum');
Route::get('/datenschutzerklarung', [FrontendController::class, 'datenschutzerklarung'])->name('datenschutzerklarung');

// Send Contact Route
Route::post('/contact/send', [ContactController::class, 'send'])
    ->name('contact.send');

// Donation Route
Route::post('/donate', [DonationController::class, 'donateProcess'])->name('donation.process');
Route::post('/membership', [DonationController::class, 'membershipProcess'])->name('membership.process');
Route::get('/donate-success', [DonationController::class, 'success'])->name('donation.success');
Route::get('/membership-success', [DonationController::class, 'membershipSuccess'])->name('membership.success');

Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle'])
    ->withoutMiddleware([VerifyCsrfToken::class])
    ->name('stripe.webhook');

// Route::get('/__config-refresh/{token}', function ($token) {
//     abort_unless($token === 'f8a9d3e2-4a17-41b9-bc71-9f6c1c2d9a77', 403);
//     Artisan::call('config:clear');
//     Artisan::call('config:cache');

//     return 'CONFIG OK';
// });

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
