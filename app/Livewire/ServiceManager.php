<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ServiceManager extends Component
{
    public $services;
    public $editingServiceId = null;
    public $name;
    public $price;

    public function mount()
    {
        $this->services = Service::all();
    }

    public function edit(Service $service)
    {
        $this->editingServiceId = $service->id;
        $this->name = $service->name;
        $this->price = $service->price;
    }

    public function save()
    {
        $service = Service::find($this->editingServiceId);
        $service->update([
            'name' => $this->name,
            'price' => $this->price,
        ]);

        $this->services = Service::all(); // aggiorna la lista
        $this->resetForm();
        session()->flash('message', 'Servizio aggiornato con successo!');
    }

    public function resetForm()
    {
        $this->editingServiceId = null;
        $this->name = '';
        $this->price = '';
    }

    public function render()
    {
        return view('livewire.service-manager');
    }
}
