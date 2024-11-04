<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenusController::class);
Route::resource('special_offers', SpecialOffersController::class);

