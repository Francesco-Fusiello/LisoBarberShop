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

    // Regole di validazione usate direttamente da validate()
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|max:1024',
    ];

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

        $this->reset();
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
