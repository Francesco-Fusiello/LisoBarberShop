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
    public $confirmingDelete = false;
    public $deleteId = null;

    public function create()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $path = $this->image->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => 'storage/' . $path,
        ]);

        return redirect()->to(request()->header('Referer'))
                         ->with('message', 'Immagine caricata con successo!');
    }

    public function confirmDelete($id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        $img = GalleryImage::find($this->deleteId);
        if ($img) {
            Storage::disk('public')->delete(str_replace('storage/', '', $img->image_path));
            $img->delete();
        }

        $this->confirmingDelete = false;
        $this->deleteId = null;

        return redirect()->to(request()->header('Referer'))
                         ->with('message', 'Immagine eliminata con successo!');
    }

    public function getImagesProperty()
    {
        return GalleryImage::latest()->get();
    }

    public function render()
    {
        return view('livewire.gallery-manager');
    }
}
