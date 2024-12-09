<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoresController;

// Redirect root URL to the welcome view
Route::get('/', function () {
    return view('welcome');
});


// Authentication routes
Auth::routes();

// Google OAuth Routes
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Menu pages
Route::resource('menus', MenusController::class);
Route::get('/menus/add', [MenusController::class, 'create'])->name('menus.create');
Route::get('/menus/{id}/edit', [MenusController::class, 'edit'])->name('menus.edit');
Route::put('/menus/{id}', [MenusController::class, 'update'])->name('menus.update');
//Special Offers
Route::resource('special_offers', SpecialOffersController::class);
Route::get('/special_offers/add', [SpecialOffersController::class, 'create'])->name('special_offers.create');
Route::get('/special_offers/{id}/edit', [SpecialOffersController::class, 'edit'])->name('special_offers.edit');
Route::put('/special_offers/{id}', [SpecialOffersController::class, 'update'])->name('special_offers.update');




// Home Route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact'); 
});
Route::get('/menu', function () {
    return view('menu'); 
});
Route::get('/about', function () {
    return view('about'); 
});

Route::get('/service', function () {
    return view('service');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/index', function () {
    return view('index');
});
