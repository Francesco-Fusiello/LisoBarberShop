<?php

use App\Livewire\ProductCrud;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/listino', [PageController::class, 'priceList'])->name('priceList');

Route::get('/prodotti',[PageController::class, 'products'])->name('products');

Route::get('/product-crud', ProductCrud::class);



