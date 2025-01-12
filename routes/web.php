<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\MenuItemsController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ListReviewsController;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoresController;

// Redirect root URL to the welcome view
Route::get('/', function () {
    return view('pages.ui.index');
});


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



// Authentication routes
Auth::routes();

// Google OAuth Routes
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Menu pages
Route::resource('menus', MenusController::class);
//Special Offers
Route::resource('special_offers', SpecialOffersController::class);
//Menu items
Route::resource('menu_items', MenuItemsController::class);

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard Route (Protected with auth middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Logout Route (Must be a POST request)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('stores', StoresController::class);


//lynn
Route::get('/about', function () {
    return view('pages.ui.about');
});
Route::get('/contacts', function () {
    return view('pages.ui.contacts');
});
Route::get('/restaurants', function () {
    return view('pages.ui.restaurants');
});
Route::get('/menu', function () {
    return view('pages.ui.menu');
});
Route::get('/home', function () {
    return view('pages.ui.index');
});



Route::get('/menu', [MenusController::class, 'showMenu'])->name('menu.show');