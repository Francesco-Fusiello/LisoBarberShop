<?php

namespace App\Http\Controllers;


use App\Models\GalleryImage;
use App\Models\GoogleReview;
use App\Models\GoogleReviewStat;
use App\Models\Product;
use App\Models\Service;



class PageController extends Controller
{
    public function home()
    {
        $latestReviews = GoogleReview::latest()->take(5)->get();
        $googleStats   = GoogleReviewStat::first();

        $products = Product::latest()->take(9)->get();

        return view('welcome', compact('latestReviews', 'googleStats', 'products'));
    }

    public function priceList()
    {
        $services = Service::all();
        return view('priceList', compact('services'));
    }


    public function services()
    {
        return view('services');
    }

    public function products()
    {
        $products = Product::paginate(50);
        $productsJson = $products->items();

        return view('user.products.products', compact('products', 'productsJson'));
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
