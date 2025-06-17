<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductFilter extends Component
{
    public string $search = '';

    public function updatedSearch()
    {
        $filteredIds = Product::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('description', 'like', '%' . $this->search . '%')
            ->pluck('id')
            ->toArray();

        // Emesso evento con array degli ID prodotti filtrati
        $this->emit('filteredProducts', $filteredIds);
    }

    public function render()
    {
        return view('livewire.product-filter');
    }
}
