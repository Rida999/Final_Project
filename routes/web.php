<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ListReviewsController;

use App\Http\Controllers\OrdersController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenusController::class);
Route::resource('special_offers', SpecialOffersController::class);

Route::get('create-blank',[WebsiteController::class,'create'])->name('create');
Route::get('list-blank',[WebsiteController::class,'list'])->name('list');

Route::get('create-reviews', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/list-reviews', [ListReviewsController::class, 'index'])->name('list.reviews');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
// Route::put('reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');
Route::put('reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');



Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}/edit', [OrdersController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{id}', [OrdersController::class, 'update'])->name('orders.update');
Route::delete('/orders/{id}', [OrdersController::class, 'destroy'])->name('orders.destroy');



