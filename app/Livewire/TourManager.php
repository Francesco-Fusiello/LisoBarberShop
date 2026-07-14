<?php

namespace App\Livewire;

use App\Models\TourItem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class TourManager extends Component
{
    use WithFileUploads;

    public $image;
    public string $city = '';
    public string $country = '';
    public string $year = '';

    public bool $confirmingDelete = false;
    public ?int $deleteId = null;

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
            'country' => strtolower($this->country),
            'year' => $this->year,
        ]);

        $this->image = null;
        $this->reset(['city', 'country', 'year']);
        $this->resetErrorBag();
        $this->resetValidation();

        session()->flash('message', 'Tappa del tour inserita con successo!');
        $this->dispatch('tour-saved');
    }

    public function confirmDelete(int $id)
    {
        $this->confirmingDelete = true;
        $this->deleteId = $id;
    }

    public function deleteConfirmed()
    {
        if ($this->deleteId) {
            $tour = TourItem::find($this->deleteId);

            if ($tour) {
                Storage::disk('public')->delete($tour->image);
                $tour->delete();
            }
        }

        $this->confirmingDelete = false;
        $this->deleteId = null;

        session()->flash('message', 'Tappa del tour eliminata con successo!');
    }


    private function getCountriesList(): array
    {
        $paths = [
            base_path('vendor/umpirsky/country-list/data/it/country.php'),
            base_path('vendor/umpirsky/country-list/data/it_IT/country.php'),
        ];

        foreach ($paths as $path) {
            if (file_exists($path)) {
                $list = include $path;
                asort($list);
                return $list;
            }
        }


        return [
            'it' => 'Italia',
            'es' => 'Spagna',
            'fr' => 'Francia',
            'de' => 'Germania',
            'gb' => 'Regno Unito',
            'us' => 'Stati Uniti',
        ];
    }

    public function render()
    {
        return view('livewire.tour-manager', [
            'tourItems' => TourItem::orderBy('year', 'desc')
                ->orderBy('id', 'desc')
                ->get(),
            'countries' => $this->getCountriesList()
        ]);
    }
}
