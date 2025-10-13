<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('website-template.home-page');
//     // return view('welcome');
// });

Route::get('/', [FrontendController::class, 'startseite'])->name('startseite');
Route::get('/entstehungsgeschichte', [FrontendController::class, 'entstehungsgeschichte'])->name('entstehungsgeschichte');
Route::get('/vorstand', [FrontendController::class, 'vorstand'])->name('vorstand');
Route::get('/derTraumVomHoren', [FrontendController::class, 'derTraumVomHoren'])->name('derTraumVomHoren');
Route::get('/turkeiErdbebenprojekt', [FrontendController::class, 'turkeiErdbebenprojekt'])->name('turkeiErdbebenprojekt');
Route::get('/werdeAktiv', [FrontendController::class, 'werdeAktiv'])->name('werdeAktiv');
Route::get('/spenden', [FrontendController::class, 'spenden'])->name('spenden');
Route::get('/kontakt', [FrontendController::class, 'kontakt'])->name('kontakt');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
