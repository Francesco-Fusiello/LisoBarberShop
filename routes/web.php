<?php

use App\Livewire\ProductCrud;
use Laravel\Fortify\Features;
use App\Livewire\GalleryManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/listino', [PageController::class, 'priceList'])->name('priceList');

Route::get('/prodotti',[PageController::class, 'products'])->name('products');

Route::get('/servizi', [PageController::class, 'services'])->name('services');

Route::get('/product-crud', ProductCrud::class);

Route::get('/products/{product}', [PageController::class, 'showProduct'])->name('products.show');

Route::get('/gallery', GalleryManager::class);






