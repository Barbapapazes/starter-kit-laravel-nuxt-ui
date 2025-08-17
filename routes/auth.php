<?php

use App\Http\Controllers\SocialProviderController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login/{provider}/redirect', [SocialProviderController::class, 'redirectToProvider'])->name('login.provider.redirect');
    Route::get('login/{provider}/callback', [SocialProviderController::class, 'handleProviderCallback'])->name('login.provider.callback');

    Route::get('register/{provider}/redirect', [SocialProviderController::class, 'redirectToProvider'])->name('register.provider.redirect');
    Route::get('register/{provider}/callback', [SocialProviderController::class, 'handleProviderCallback'])->name('register.provider.callback');
});

