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
    public $showFeaturedOnly = false;

    public function toggleFeatured($id)
    {
        $img = GalleryImage::findOrFail($id);

        if ($img->is_featured) {
            $img->is_featured = false;
            $img->save();

            $this->dispatch('home-incomplete');

            return;
        }

        $featuredCount = GalleryImage::where('is_featured', true)->count();

        if ($featuredCount >= 11) {
            return;
        }

        $img->is_featured = true;
        $img->save();
    }

    public function showAll()
    {
        $this->showFeaturedOnly = false;
    }

    public function showFeatured()
    {
        $this->showFeaturedOnly = true;
    }

    public function create()
    {
        $this->validate([
            'image' => 'required|image|max:20048',
        ]);

        $path = $this->image->store('gallery', 'public');

        GalleryImage::create([
            'image_path' => 'storage/' . $path,
            'is_featured' => false,
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
            Storage::disk('public')->delete(
                str_replace('storage/', '', $img->image_path)
            );

            $img->delete();
        }

        $this->confirmingDelete = false;
        $this->deleteId = null;

        return redirect()->to(request()->header('Referer'))
            ->with('message', 'Immagine eliminata con successo!');
    }

    public function getImagesProperty()
    {
        $query = GalleryImage::latest();

        if ($this->showFeaturedOnly) {
            $query->where('is_featured', true);
        }

        return $query->get();
    }

    public function getFeaturedCountProperty()
    {
        return GalleryImage::where('is_featured', true)->count();
    }

    public function render()
    {
        return view('livewire.gallery-manager');
    }
}
