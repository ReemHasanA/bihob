<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.home');
})->name('home');

Route::get('/story', function () {
    return view('app.story');
})->name('story');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
