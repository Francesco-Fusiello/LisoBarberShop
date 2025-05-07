<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $images = [];
    public $image;
    public $selectedImageIndex = null;

    
    public function upload()
    {
        // // Validazione dell'immagine
        // $this->validate([
        //     'image' => 'image|max:2048', // Limite di dimensione dell'immagine
        // ]);
        dd('Metodo upload chiamato!');

        // Salvataggio dell'immagine nella cartella gallery
        $path = $this->image->store('gallery', 'public');

        // Aggiunta dell'immagine al database
        Gallery::create([
            'image_path' => 'storage/' . $path,
        ]);

        // Messaggio di successo
        session()->flash('message', 'Immagine caricata con successo!');

        // Reset del campo immagine
        $this->reset('image');
    }

    // Metodo per eliminare un'immagine
    public function delete($id)
    {
        $img = Gallery::find($id);
        if ($img) {
            // Elimina il file dalla cartella public
            Storage::disk('public')->delete(str_replace('storage/', '', $img->image_path));
            $img->delete();
        }
    }

    // Metodo per aprire il lightbox
    public function openLightbox($index)
    {
        $this->selectedImageIndex = $index;
    }

    // Metodo per chiudere il lightbox
    public function closeLightbox()
    {
        $this->selectedImageIndex = null;
    }

    // Metodo per la navigazione tra le immagini nel lightbox
    public function prev()
    {
        if ($this->selectedImageIndex > 0) {
            $this->selectedImageIndex--;
        }
    }

    public function next()
    {
        if ($this->selectedImageIndex < $this->images->count() - 1) {
            $this->selectedImageIndex++;
        }
    }

    // Recupera tutte le immagini
    public function getImagesProperty()
    {
        return Gallery::latest()->get();
    }

    public function render()
    {
        return view('livewire.gallery-manager')->layout('components.layout');
    }
}
