<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.home');
})->name('home');

Route::get('/story', function () {
    return view('app.story');
})->name('story');

Route::get('/shop', function () {
    $categories = Category::all();
    $products = Product::paginate();
    //User
    return view('app.shop', [
        'categories' => $categories,
        'products' => $products
        ]);
})->name('shop');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
