<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;

class ServiceManager extends Component
{
    public $services;
    public $editingServiceId = null;
    public $creating = false;
    public $name = '';
    public $price = '';
    public $deleteServiceId = null;
    public $showDeleteModal = false;

    public function mount()
    {
        $this->services = Service::all();
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $this->editingServiceId = $service->id;
        $this->creating = false;
        $this->name = $service->name;
        $this->price = $service->price;
    }

    public function create()
    {
        $this->resetForm();
        $this->creating = true;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:20',
        ]);

        if ($this->creating) {
            Service::create([
                'name' => $this->name,
                'price' => $this->price,
            ]);
            session()->flash('message', 'Servizio creato con successo!');
        } else {
            $service = Service::find($this->editingServiceId);
            $service->update([
                'name' => $this->name,
                'price' => $this->price,
            ]);
            session()->flash('message', 'Servizio aggiornato con successo!');
        }

        $this->services = Service::all();
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->editingServiceId = null;
        $this->creating = false;
        $this->name = '';
        $this->price = '';
    }

    public function confirmDelete($id)
    {
        $this->deleteServiceId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteService()
    {
        Service::find($this->deleteServiceId)->delete();
        $this->services = Service::all();
        $this->showDeleteModal = false;
        session()->flash('message', 'Servizio eliminato con successo!');
    }

    public function render()
    {
        return view('livewire.service-manager');
    }
}
