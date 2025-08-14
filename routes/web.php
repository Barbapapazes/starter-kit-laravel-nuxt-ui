<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('index');
});

Route::get('/dashboard', function () {
    return inertia('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
