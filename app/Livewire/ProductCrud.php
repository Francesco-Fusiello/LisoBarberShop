<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductCrud extends Component
{
    use WithFileUploads;

    public $name, $description, $price, $image;
    public $editingProductId = null;

    protected function rules()
    {
        if ($this->editingProductId) {
            // Modifica: niente validazione immagine
            return [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
            ];
        } else {
            // Creazione: immagine richiesta
            return [
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
                'image' => 'required|image|max:1024',
            ];
        }
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

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $this->editingProductId = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->image = null; 
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

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            session()->flash('error', 'Prodotto non trovato.');
            return;
        }

        if (Storage::exists('public/' . $product->image_path)) {
            Storage::delete('public/' . $product->image_path);
        }

        $product->delete();

        session()->flash('message', 'Prodotto eliminato con successo!');
    }

    public function render()
    {
        return view('livewire.product-crud', [
            'products' => Product::all()
        ])->layout('components.layout');
    }
}
