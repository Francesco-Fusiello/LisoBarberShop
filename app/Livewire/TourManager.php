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

    // Stato per la modale di conferma eliminazione
    public bool $confirmingDelete = false;
    public ?int $deleteId = null;

    public function save()
    {
        // 1. Validazione dei dati
        $this->validate([
            'image' => 'required|image|max:20048', // Max 20MB
            'city' => 'required',
            'country' => 'required',
            'year' => 'required',
        ]);

        // 2. Salvataggio DIRETTO e sicuro (esattamente come fai nella Gallery)
        // Niente manipolazioni pesanti che fanno crashare il server
        $imagePath = $this->image->store('tour', 'public');

        // 3. Creazione nel database
        TourItem::create([
            'image' => $imagePath,
            'city' => $this->city,
            'country' => $this->country,
            'year' => $this->year,
        ]);

        // 4. Svuota i campi
        $this->reset([
            'image',
            'city',
            'country',
            'year'
        ]);

        // 5. Invia i messaggi e il segnale JS per sbloccare l'interfaccia
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
        $tour = TourItem::find($this->deleteId);

        if ($tour) {
            Storage::disk('public')->delete($tour->image);
            $tour->delete();
        }

        $this->confirmingDelete = false;
        $this->deleteId = null;

        session()->flash('message', 'Tappa del tour eliminata con successo!');
    }

    public function render()
    {
        return view('livewire.tour-manager', [
            'tourItems' => TourItem::latest()->get()
        ]);
    }
}