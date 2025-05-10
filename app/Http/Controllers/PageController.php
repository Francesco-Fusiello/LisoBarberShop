<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\GalleryImage;
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
        return view('user.products.products', compact('products'));
    }

    public function showProduct(Product $product)
    {
        $otherProducts = Product::where('id', '!=', $product->id)->take(3)->get();
        return view('user.products.show', compact('product', 'otherProducts'));
    }

    public function showGallery()
    {        
        $images = GalleryImage::all();
        return view('user.gallery', compact('images'));
    }

}
