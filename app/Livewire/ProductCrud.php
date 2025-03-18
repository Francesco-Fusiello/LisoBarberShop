<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads; // Per il caricamento file
use Illuminate\Support\Facades\Storage;

class ProductCrud extends Component
{
    use WithFileUploads; // Permette di gestire il caricamento di file
   
    public $name, $description, $price, $image, $productId;
    public $products;

    // Definizione delle regole di validazione
    protected $rules = [
        'name' => 'required|string|max:50', // Nome obbligatorio, massimo 50 caratteri
        'description' => 'required|string|max:300', // Descrizione obbligatoria, massimo 300 caratteri
        'price' => 'required|numeric|min:0', // Prezzo obbligatorio e numerico, minimo 0
        'image' => 'image|max:1024', // Immagine obbligatoria, massimo 1MB
        'productId' => 'required|integer', // ID prodotto obbligatorio, intero
    ];
    
    
    public function createProduct()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:1024', 
        ]);
        
        // Salva l'immagine
        // $imagePath = $this->image->store('images', 'public'); 
        if ($this->image) {
            // Salva l'immagine nella cartella 'images' e ottieni il percorso
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
       
        
        // Reset dei campi
        $this->reset();
        
    }

    public function render()
    {
        $this->products = Product::all();
       
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
