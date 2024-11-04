<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenusController::class);
Route::resource('special_offers', SpecialOffersController::class);

