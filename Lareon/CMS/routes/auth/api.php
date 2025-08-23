<?php

use Illuminate\Support\Facades\Route;
use Lareon\CMS\App\Http\Controllers\Api\Auth\AuthenticatedSessionController;

Route::post('login',[AuthenticatedSessionController::class , 'login'])->name('auth.login');
Route::post('register',[\Lareon\CMS\App\Http\Controllers\Api\Auth\CreateUserController::class , 'post'])->name('auth.register');
