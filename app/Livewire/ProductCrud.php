<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\Storage;

class ProductCrud extends Component
{
    use WithFileUploads; 
   
    public $search = '';
    public $name, $description, $price, $image, $productId;
    public $products;

    // Definizione delle regole di validazione
    protected $rules = [
        'name' => 'required|string|max:50', 
        'description' => 'required|string|max:300', 
        'price' => 'required|numeric|min:0', 
        'image' => 'image|max:1024', 
        'productId' => 'required|integer', 
    ];
    
    
    public function createProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:1024', 
        ]);
        
       
        if ($this->image) {
           
            $imagePath = $this->image->store('images', 'public');
        } else {
            session()->flash('error', 'L\'immagine è obbligatoria');
            return;
        }
        
        
        
        // Crea il prodotto nel database
        Product::create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image_path' => $imagePath,
        ]);
        
        
        session()->flash('message', 'Prodotto creato con successo!');
       
        
        
        $this->reset();
        
    }
    public function render()
    {
        $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get();
    
        return view('livewire.product-crud')->layout('components.layout');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        // Elimina l'immagine dal disco
        if (Storage::exists('public/' . $product->image_path)) {
            Storage::delete('public/' . $product->image_path);
        }

        $product->delete();
        session()->flash('message', 'Prodotto eliminato con successo!');
    }


    
}