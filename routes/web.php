<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\SpecialOffersController;
use App\Http\Controllers\WebsiteController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('menus', MenusController::class);
Route::resource('special_offers', SpecialOffersController::class);

Route::get('create-blank',[WebsiteController::class,'create'])->name('create');
Route::get('list-blank',[WebsiteController::class,'list'])->name('list');
