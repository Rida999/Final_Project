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
use App\Http\Controllers\ContactController;

// Redirect root URL to the welcome view
Route::get('/', function () {
    return view('pages.ui.index');
});


Route::get('create-blank',[WebsiteController::class,'create'])->name('create');
Route::get('list-blank',[WebsiteController::class,'list'])->name('list');

//carl
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
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


//Menu pages
Route::resource('menus', MenusController::class);
//Special Offers
Route::resource('special_offers', SpecialOffersController::class);
//Menu items
Route::resource('menu_items', MenuItemsController::class);

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');



// Logout Route (Must be a POST request)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Route::resource('users', UserController::class)->except(['show', 'create', 'store']);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::resource('stores', StoresController::class);
// Dashboard Route (Protected with auth middleware)
Route::get('/dashboard', function () {
    return redirect()->route('stores.index');
})->name('dashboard');

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


//carl
Route::get('/menu', [MenusController::class, 'showMenu'])->name('menu.show');
Route::post('/send-email', [ContactController::class, 'sendEmail'])->name('send-email');
Route::post('/menu/review', [MenusController::class, 'storeReview'])->name('menu.store.review');
Route::get('/restaurants', function () {
    $reviews = \App\Models\Reviews::with(['user', 'store'])
        ->latest()
        ->take(10)
        ->get();
    $stores = \App\Models\Stores::all();
    return view('pages.ui.restaurants', compact('reviews', 'stores'));
});

Route::middleware(['auth', 'role:restaurantOwner'])->group(function () {
    Route::get('/restaurant-owner/dashboard', [RestaurantOwnerController::class, 'dashboard'])->name('restaurant_owner.dashboard');
    Route::get('/restaurant-owner/store', [RestaurantOwnerController::class, 'store'])->name('restaurant_owner.store');
    Route::get('/restaurant-owner/menu', [MenuController::class, 'index'])->name('restaurant_owner.menu');
    Route::get('/restaurant-owner/menu-items', [MenuItemController::class, 'index'])->name('restaurant_owner.menu_items');
    Route::get('/restaurant-owner/special-offers', [SpecialOfferController::class, 'index'])->name('restaurant_owner.special_offers');
    Route::get('/restaurant-owner/dashboard', [RestaurantOwnerController::class, 'dashboard'])->name('restaurant_owner.dashboard');
});

