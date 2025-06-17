<?php

namespace App\Http\Controllers;


use App\Models\Review;
use App\Models\Product;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $latestReviews = Review::where('is_approved', true)
            ->latest()
            ->take(6)
            ->get();

        $products = Product::latest()->take(9)->get();

        return view('welcome', compact('latestReviews', 'products'));
    }

    public function priceList()
    {
        return view('priceList');
    }

    public function services()
    {
        return view('services');
    }

    public function products()
    {
        $products = Product::paginate(9);
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

    public function chiSiamo()
    {
        return view('chiSiamo');
    }

    public function contatti()
    {
        return view('contatti');
    }
}
