<?php

use App\Livewire\ProductCrud;
use Laravel\Fortify\Features;
use App\Livewire\AdminDashboard;
use App\Livewire\GalleryManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;



Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/listino', [PageController::class, 'priceList'])->name('priceList');

Route::get('/prodotti',[PageController::class, 'products'])->name('products');

Route::get('/servizi', [PageController::class, 'services'])->name('services');

Route::get('/product-crud', ProductCrud::class);

Route::get('/products/{product}', [PageController::class, 'showProduct'])->name('products.show');

Route::get('/gallery-manager', GalleryManager::class);

Route::get('/user/gallery', [PageController::class, 'showGallery'])->name('user.gallery');

Route::get('/chi/siamo', [PageController::class, 'chiSiamo'])->name('chiSiamo');

Route::get('/contatti',[PageController::class, 'contatti'])->name('contatti');

Route::get('/admin-dashboard', AdminDashboard::class)->middleware('auth');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');








