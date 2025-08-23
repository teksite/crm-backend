<?php

use Illuminate\Support\Facades\Route;
use Lareon\CMS\App\Http\Controllers\Web\Panel\DashboardController;
use Lareon\CMS\App\Http\Controllers\Web\Panel\Profiles\PasswordController;
use Lareon\CMS\App\Http\Controllers\Web\Panel\Profiles\ProfileController;
use Lareon\CMS\App\Http\Controllers\Web\Panel\Profiles\SessionsAuthController;
use Lareon\CMS\App\Http\Controllers\Web\Panel\Profiles\TwoFactorAuthController;

Route::get('/', [DashboardController::class, 'show'])->name('dashboard');

Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');

    Route::get('/two-factor-authentication', [TwoFactorAuthController::class, 'index'])->name('twofactor');

   Route::prefix('change-password')->name('password.')->group(function () {
       Route::get('/', [PasswordController::class, 'edit'])->name('edit');
       Route::patch('/', [PasswordController::class, 'update'])->name('update');
   });

    Route::prefix('sessions')->name('sessions.')->group(function(){
        Route::get('/', [SessionsAuthController::class, 'index'])->name('index');
        Route::delete('/', [SessionsAuthController::class, 'destroy'])->name('destroy');
    });
});

