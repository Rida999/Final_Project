<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\WebsiteController;
Route::get('/', function () {
    return view('welcome');
});

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

