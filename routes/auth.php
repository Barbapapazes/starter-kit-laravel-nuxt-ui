<?php

use App\Http\Controllers\SocialProviderController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('auth/{provider}/redirect', [SocialProviderController::class, 'redirectToProvider'])->name('auth.provider.redirect');
    Route::get('auth/{provider}/callback', [SocialProviderController::class, 'handleProviderCallback'])->name('auth.provider.callback');
  
});

