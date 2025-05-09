<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GalleryImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $image;

    public function create()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $this->image->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => 'storage/' . $path,
        ]);

        $this->reset('image');
        session()->flash('message', 'Immagine caricata con successo!');
    }

    public function delete($id)
    {
        $img = GalleryImage::find($id);
        if ($img) {
            Storage::disk('public')->delete(str_replace('storage/', '', $img->image_path));
            $img->delete();
        }
    }

    public function render()
    {
        return view('livewire.gallery-manager', [
            'images' => GalleryImage::latest()->get(),
        ])->layout('components.layout');
    }
}

