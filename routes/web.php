<?php

use App\Livewire\ProductCrud;
use Laravel\Fortify\Features;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;



Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/listino', [PageController::class, 'priceList'])->name('priceList');

Route::get('/prodotti',[PageController::class, 'products'])->name('products');

Route::get('/servizi', [PageController::class, 'service'])->name('service');

Route::get('/product-crud', ProductCrud::class);

// Route::middleware(['guest'])->group(function () {
//     Route::get('admin/login', [AuthenticatedSessionController::class, 'create'])
//         ->name('admin.login');
// });



