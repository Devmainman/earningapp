<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserVideoController;
use App\Http\Controllers\LinkedInPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\BalanceController;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// routes/web.php

Route::get('/load/{page}', function ($page) {
    if (view()->exists($page)) {
        return view($page);
    }

    abort(404); // Return 404 if view does not exist
});



// Dashboard route for regular users
Route::get('/dashboard', [ProfileController::class, 'index'])
    ->middleware(['auth']) // Ensures only authenticated users can access
    ->name('dashboard');

// Profile routes for regular users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Client Routes (Restricted to clients only)
Route::middleware(['auth:client'])->group(function () {
    Route::post('/client/videos', [UserVideoController::class, 'store'])->name('client.videos.store');
});

// Route for marking videos as watched by regular users
Route::middleware(['auth'])->group(function () {
    Route::post('/videos/{videoId}/watched', [UserVideoController::class, 'markAsWatched'])->name('videos.watched');
    Route::post('/videos/{videoId}/increase-balance', [UserVideoController::class, 'increaseBalance']);

   // LinkedIn post routes
Route::middleware(['auth'])->group(function () {
    Route::post('/linkedin-posts', [LinkedInPostController::class, 'store'])->name('linkedin.store');
    Route::get('/linkedin-posts', [LinkedInPostController::class, 'index'])->name('linkedin.index');
});


// Wallet Route
Route::get('/wallet', [WalletController::class, 'index'])->name('wallet');

// Profile Route
Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');

});

Route::post('/balance/update', [BalanceController::class, 'updateBalance'])->name('balance.update');

// Load additional route files
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/client.php';
