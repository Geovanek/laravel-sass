<?php

declare(strict_types = 1);

use App\Http\Controllers\Auth\MagicLinkController;
use App\Livewire\Pages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//################################################################################
#region Auth Routes
//################################################################################
Route::get('/login', Pages\Auth\Login::class)->name('login');
Route::get('/register', Pages\Auth\Register::class)->name('register');
Route::get('/password-reset', Pages\Auth\PasswordRequest::class)->name('password.request');
Route::get('/2fa/magic-link/{token}', MagicLinkController::class)->name('2fa.magic.link');
Route::match(['get', 'post'], '/logout', function (): RedirectResponse {
    session()->invalidate();
    session()->flush();

    Auth::logout();

    return redirect()->route('login');
})->name('logout');
#endregion

//################################################################################
#region Authenticated Routes
//################################################################################

Route::middleware(['auth'])->group(function (): void {
    Route::get('/dashboard', Pages\Dashboard::class)->name('dashboard');
    Route::get('/users', Pages\Users::class)->name('users');
});

#endregion
