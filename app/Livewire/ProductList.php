<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public $filteredProductIds = null;

    protected $listeners = ['filteredProducts' => 'applyFilter'];

    public function applyFilter($ids)
    {
        $this->filteredProductIds = is_array($ids) && count($ids) > 0 ? $ids : null;
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->filteredProductIds !== null) {
            $query->whereIn('id', $this->filteredProductIds);
        }

        return view('livewire.product-list', [
            'products' => $query->latest()->paginate(6)
        ]);
    }
}
