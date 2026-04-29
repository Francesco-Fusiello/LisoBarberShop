<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ProductCrud extends Component
{
    use WithFileUploads, WithPagination;

    public string $name = '';
    public string $description = '';
    /** @var mixed */
    public $price;
    /** @var \Livewire\Features\SupportFileUploads\TemporaryUploadedFile|null */
    public $image;
    
    public ?int $editingProductId = null; // Il ? significa che può essere int oppure null
    public ?int $selectedProductId = null;
    public bool $showDeleteModal = false;
    public ?array $filteredProductIds = null;

    /** @var array */
    protected $listeners = [
        'filteredProducts' => 'applyFilter',
    ];

    protected function rules()
    {
        return $this->editingProductId
            ? [
                'name'        => 'required|string|max:255',
                'description' => 'required|string',
                'price'       => 'required|numeric|min:0',
            ]
            : [
                'name'        => 'required|string|max:255',
                'description' => 'required|string',
                'price'       => 'required|numeric|min:0',
                'image'       => 'required|image|max:2048',
            ];
    }

    public function store()
    {
        $this->validate();

        $path = $this->image->store('images', 'public');

        Product::create([
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'image_path'  => $path,
        ]);

        session()->flash('message', 'Prodotto creato con successo!');

        $this->resetForm();
        $this->resetValidation();
        $this->resetPage();

        return redirect()->to(request()->header('Referer'));
    }

    public function editProduct(int $id)
    {
        $p = Product::findOrFail($id);

        $this->editingProductId = $p->id;
        $this->name            = $p->name;
        $this->description     = $p->description;
        $this->price           = $p->price;
        $this->image           = null;

        $this->dispatch('scrollToForm');
    }

    public function update()
    {
        $this->validate();

        $p = Product::findOrFail($this->editingProductId);
        $p->update([
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
        ]);

        session()->flash('message', 'Prodotto aggiornato con successo!');

        $this->resetForm();
        $this->resetValidation();

        return redirect()->to(request()->header('Referer'));
    }

    public function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'image', 'editingProductId']);
    }

    public function confirmDelete(int $id)
    {
        $this->selectedProductId = $id;
        $this->showDeleteModal   = true;
    }

    public function deleteProduct()
    {
        $p = Product::find($this->selectedProductId);

        if ($p) {
            if ($p->image_path) {
                Storage::disk('public')->delete($p->image_path);
            }
            $p->delete();
        }

        // RESET TOTALE DELLO STATO
        $this->showDeleteModal = false;
        $this->selectedProductId = null;
        $this->resetPage(); // Importante se cancelli l'ultimo elemento di una pagina

        session()->flash('message', 'Prodotto eliminato con successo!');
    }

    public function applyFilter(array $ids)
    {
        $this->filteredProductIds = is_array($ids) && count($ids) ? $ids : null;
        $this->resetPage();
    }

    public function render()
    {
        $q = Product::query();
        if ($this->filteredProductIds) {
            $q->whereIn('id', $this->filteredProductIds);
        }

        return view('livewire.product-crud', [
            'products' => $q->latest()->paginate(50),
        ]);
    }
}
