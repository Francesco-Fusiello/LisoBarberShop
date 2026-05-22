<?php

namespace App\Livewire;

use App\Models\TourItem;
use Livewire\Component;
use Livewire\WithFileUploads;

class TourManager extends Component
{
    use WithFileUploads;

    public $image;
    public string $city = '';
    public string $country = '';
    public string $year = '';

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:20048',
            'city' => 'required',
            'country' => 'required',
            'year' => 'required',
        ]);

        $imagePath = $this->image->store('tour', 'public');

        TourItem::create([
            'image' => $imagePath,
            'city' => $this->city,
            'country' => $this->country,
            'year' => $this->year,
        ]);

        $this->reset([
            'image',
            'city',
            'country',
            'year'
        ]);
    }

    public function delete( int $id)
    {
        $tour = TourItem::findOrFail($id);

        $tour->delete();
    }

    public function render()
    {
        return view('livewire.tour-manager', [
            'tourItems' => TourItem::latest()->get()
        ]);
    }
}