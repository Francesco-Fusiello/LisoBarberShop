<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductFilter extends Component
{
    public string $search = '';

    public function render()
    {
        $products = Product::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.product-filter', [
            'products' => $products
        ]);
    }
}
