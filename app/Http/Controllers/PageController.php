<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function priceList(){
        return view('priceList');
    }

    public function products()
    {
        // Recupera tutti i prodotti
        $products = Product::all();

        // Passa i prodotti alla vista
        return view('user.products', compact('products'));
    }

}
