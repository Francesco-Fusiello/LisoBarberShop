<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ProductCrud extends Component
{
    use WithFileUploads, WithPagination;

    public $name, $description, $price, $image;
    public $editingProductId = null;
    public $selectedProductId;
    public $showDeleteModal = false;

    // Qui memorizziamo gli ID filtrati o null se nessun filtro
    public $filteredProductIds = null;

    // Ascoltiamo l'evento dal filtro
    protected $listeners = ['filteredProducts' => 'applyFilter'];

    protected function rules()
    {
        return $this->editingProductId
            ? [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
            ]
            : [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'required|image|max:2048',
            ];
    }

    public function store()
    {
        $this->validate();

        $imagePath = $this->image->store('images', 'public');

        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image_path' => $imagePath,
        ]);

        session()->flash('message', 'Prodotto creato con successo!');
        $this->resetForm();
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        $this->editingProductId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->image = null;

        $this->dispatch('scrollToForm');
    }

    public function update()
    {
        $this->validate();

        $product = Product::findOrFail($this->editingProductId);

        $product->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Prodotto aggiornato con successo!');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'image', 'editingProductId']);
    }

    public function confirmDelete($id)
    {
        $this->selectedProductId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteProduct()
    {
        $product = Product::find($this->selectedProductId);

        if (!$product) {
            session()->flash('error', 'Prodotto non trovato.');
            return;
        }

        if (Storage::exists('public/' . $product->image_path)) {
            Storage::delete('public/' . $product->image_path);
        }

        $product->delete();

        $this->showDeleteModal = false;
        $this->selectedProductId = null;

        session()->flash('message', 'Prodotto eliminato con successo!');
    }

    // Metodo chiamato quando riceviamo l'array degli ID filtrati
    public function applyFilter($ids)
    {
        $this->filteredProductIds = is_array($ids) && count($ids) > 0 ? $ids : null;
        $this->resetPage(); // Reset paginazione quando filtro cambia
    }

    public function render()
    {
        $query = Product::query();

        if ($this->filteredProductIds !== null) {
            $query->whereIn('id', $this->filteredProductIds);
        }

        return view('livewire.product-crud', [
            'products' => $query->latest()->paginate(6)
        ]);
    }
}
