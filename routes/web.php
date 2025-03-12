<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/listino', [PageController::class, 'priceList'])->name('priceList');

Route::resource('shops',ShopController::class);



