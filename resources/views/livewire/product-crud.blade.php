<div class="container py-4">
@if (session()->has('message'))
    <div class="toast-elegant">
        <span class="toast-icon">✅</span>
        <div>{{ session('message') }}</div>
        <button type="button" class="btn-close" wire:click="$set('showSuccess', false)">&times;</button>
    </div>
@endif




    <form wire:submit.prevent="{{ $editingProductId ? 'update' : 'store' }}" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Nome prodotto</label>
                <input wire:model.defer="name" type="text" id="name" class="form-control" placeholder="Nome del prodotto" />
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Prezzo (€)</label>
                <input wire:model.defer="price" type="number" step="0.01" min="0" id="price" class="form-control" placeholder="Prezzo del prodotto" />
                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <div class="col-12 mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea wire:model.defer="description" id="description" rows="4" class="form-control" placeholder="Descrizione del prodotto"></textarea>
                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            @if (!$editingProductId)
                <div class="col-12 mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input wire:model="image" type="file" id="image" class="form-control" />
                    @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
            @endif

            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary">
                    {{ $editingProductId ? 'Aggiorna prodotto' : 'Aggiungi prodotto' }}
                </button>
                @if ($editingProductId)
                    <button type="button" wire:click="resetForm" class="btn btn-secondary ms-2">Annulla</button>
                @endif
            </div>
        </div>
    </form>

    <h2 class="mt-5">Lista Prodotti</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="object-fit: cover; height: 250px;">
                    @else
                        <div class="card-img-top bg-secondary text-white text-center py-5">Nessuna immagine</div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Prezzo:</strong> €{{ number_format($product->price, 2) }}</p>
                        <div class="mt-auto d-flex justify-content-between">
                            <button wire:click="editProduct({{ $product->id }})" class="btn btn-outline-success btn-sm w-50 me-1">Modifica</button>
                            <button wire:click="confirmDelete({{ $product->id }})" class="btn btn-outline-danger btn-sm w-50 ms-1">Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $products->links() }}

   
    <div class="modal fade @if ($showDeleteModal) show d-block @endif" tabindex="-1" style="@if ($showDeleteModal) display: block; background-color: rgba(0,0,0,0.5); @endif">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Conferma eliminazione</h5>
                    <button type="button" class="btn-close" wire:click="$set('showDeleteModal', false)"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler eliminare questo prodotto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">Annulla</button>
                    <button type="button" class="btn btn-danger" wire:click="deleteProduct">Elimina</button>
                </div>
            </div>
        </div>
    </div>
</div>
