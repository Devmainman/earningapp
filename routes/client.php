<?php

use App\Http\Controllers\Client\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Client\ProfileController;  // Update this import
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\Auth\ClientRegisteredUserController;
use App\Http\Controllers\ClientVideoController;

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware('guest:client')->group(function () {
        Route::get('register', [ClientRegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [ClientRegisteredUserController::class, 'store']);
        
        // Other routes for login, password reset, etc.
    });


    Route::middleware('guest:client')->group(function () {
        // Route::get('register', [RegisteredUserController::class, 'create'])
        //             ->name('register');
    
        // Route::post('register', [RegisteredUserController::class, 'store']);
    
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
                    ->name('login');
    
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    
    });


    Route::middleware('auth:client')->group(function () {
        Route::get('/dashboard', function () {
            return view('client.dashboard');
        })->name('dashboard');

        // Move the profile.edit route here
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/client/logout', [AuthenticatedSessionController::class, 'destroy'])->name('client.logout');
        Route::get('/client/login', [AuthenticatedSessionController::class, 'showLoginForm'])->name('client.login');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                    ->name('logout');
        // Other authenticated client routes
    });
    Route::middleware('auth:client')->group(function () {
        Route::get('/client/upload-video', [ClientVideoController::class, 'create'])->name('client.videos.create');
        // routes/web.php
        Route::post('/client/videos', [ClientVideoController::class, 'store'])->name('client.videos.store');

    });
    
});

