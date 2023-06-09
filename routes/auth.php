<?php

use  MyApp\Http\Backend\Auth\Controllers\AuthenticatedSessionController;
use  MyApp\Http\Backend\Auth\Controllers\EmailVerificationNotificationController;
use  MyApp\Http\Backend\Auth\Controllers\NewPasswordController;
use  MyApp\Http\Backend\Auth\Controllers\PasswordResetLinkController;
use  MyApp\Http\Backend\Auth\Controllers\RegisteredUserController;
use  MyApp\Http\Backend\Auth\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('user.register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('user.login');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');
