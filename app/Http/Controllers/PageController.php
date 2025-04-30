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

    public function services(){
        return view('services');
    }

    public function products()
    {
        $products = Product::paginate(6);
        return view('user.products', compact('products'));
    }

    public function showProduct(Product $product)
    {
        return view('user.products.show', compact('product'));
    }

}
