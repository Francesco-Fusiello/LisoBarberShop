<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Service;


class ServiceManager extends Component
{
    /** @var \Illuminate\Database\Eloquent\Collection */
    public $services;

    public ?int $editingServiceId = null;
    public bool $creating = false;
    public string $name = '';
    public string $price = '';
    public ?int $deleteServiceId = null;
    public bool $showDeleteModal = false;

    public function mount(): void
    {
        $this->services = Service::all();
    }

    public function edit(int $id): void
    {
        $service = Service::findOrFail($id);
        $this->editingServiceId = $service->id;
        $this->creating = false;
        $this->name = $service->name;
        $this->price = (string)$service->price;
    }

    public function create(): void
    {
        $this->resetForm();
        $this->creating = true;
    }

    public function save(): void
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
            if ($service) {
                $service->update([
                    'name' => $this->name,
                    'price' => $this->price,
                ]);
                session()->flash('message', 'Servizio aggiornato con successo!');
            }
        }

        $this->services = Service::all();
        $this->resetForm();
    }

    public function resetForm(): void
    {
        $this->editingServiceId = null;
        $this->creating = false;
        $this->name = '';
        $this->price = '';
    }

    public function confirmDelete(int $id): void
    {
        $this->deleteServiceId = $id;
        $this->showDeleteModal = true;
    }

    public function deleteService(): void
    {
        $service = Service::find($this->deleteServiceId);
        if ($service) {
            $service->delete();
        }
        
        $this->services = Service::all();
        $this->showDeleteModal = false;
        $this->deleteServiceId = null; // Reset per sicurezza
        session()->flash('message', 'Servizio eliminato con successo!');
    }

    public function render()
    {
        return view('livewire.service-manager');
    }
}