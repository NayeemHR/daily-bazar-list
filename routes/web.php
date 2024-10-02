<?php

use App\Http\Controllers\BazarListController;
use App\Http\Controllers\BazarListItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Product Routes
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//hlo
// Bazar List Routes
Route::resource('bazar_lists', BazarListController::class);
Route::post('bazar_lists/{bazar_list}/items', [BazarListItemController::class, 'store'])->name('bazar_list_items.store');
Route::delete('bazar_lists/{bazar_list}/items/{item}', [BazarListItemController::class, 'destroy'])->name('bazar_list_items.destroy');

require __DIR__ . '/auth.php';
