<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\BluketController;

Route::get('/', [BluketController::class, 'index']); // main page

Route::get('/products', [BluketController::class, 'products']); // main page with the required products

Route::get('/products/show/{id}', [BluketController::class, 'show']); // page to show the details about a product

Route::put('/products/show/cart/{id}', [BluketController::class, 'cart'])->middleware(['auth', 'verified']); // add the product in cart

Route::get('/product/create', [BluketController::class, 'create']); // page with the form for create another product

Route::post('/product/create/insert', [BluketController::class, 'insert']); // insert the new product in the database

Route::get('/dashboard', [BluketController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard'); // cart page

Route::put('/product/remove/{id}', [BluketController::class, 'remove'])->middleware(['auth', 'verified']); // remove one product from the user cart

Route::delete('/products/delete/{id}', [BluketController::class, 'delete'])->middleware(['auth', 'verified']); // where the admin delete a item from the store

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
