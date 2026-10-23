<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('app.home');
})->name('home');

Route::get('/story', function () {
    return view('app.story');
})->name('story');

Route::get('/shop', function (Request $request) {
    $categories = Category::all();
    $products = Product::query();
    if ($request->filled('category')) {
        $category = $categories->firstWhere('slug', $request->input('category'));
        if ($category) {
            $products->where('category_id', $category->id);
        }
    }
    $products = $products->paginate();

    return view('app.shop', [
        'categories' => $categories,
        'products' => $products
        ]);
})->name('shop');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
