<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenusController::class)->middleware('role:store');
Route::resource('special_offers', SpecialOffersController::class)->middleware('role:store');

