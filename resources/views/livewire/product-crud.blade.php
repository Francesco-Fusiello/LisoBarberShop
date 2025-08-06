<div class="container py-4">
    @if (session()->has('message'))
        <div class="toast-elegant">
            <span class="toast-icon">✅</span> {{ session('message') }}
            <button type="button" class="btn-close" wire:click="$set('showSuccess', false)">&times;</button>
        </div>
    @endif

    <form
        wire:key="{{ $editingProductId ? 'edit-'.$editingProductId : 'create' }}"
        wire:submit.prevent="{{ $editingProductId ? 'update' : 'store' }}"
        enctype="multipart/form-data"
    >
        <div class="row">
            <!-- NOME -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Nome prodotto</label>
                <input wire:model="name" type="text" class="form-control" placeholder="Nome prodotto">
                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- PREZZO -->
            <div class="col-md-6 mb-3">
                <label class="form-label">Prezzo (€)</label>
                <input wire:model="price" type="number" step="0.01" min="0" class="form-control" placeholder="Prezzo">
                @error('price') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <!-- DESCRIZIONE -->
            <div class="col-12 mb-3">
                <label class="form-label">Descrizione</label>
                <textarea wire:model="description" rows="4" class="form-control"></textarea>
                @error('description') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            @if (!$editingProductId)
                <!-- IMMAGINE -->
                <div class="col-12 mb-3">
                    <label class="form-label">Immagine</label>
                    <input wire:model="image" type="file" class="form-control">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            @endif

            <div class="col-12 mb-3">
                <button class="btn btn-primary">
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
        @foreach($products as $p)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($p->image_path)
                        <img src="{{ Storage::url($p->image_path) }}" style="object-fit: cover; height:250px" class="card-img-top">
                    @else
                        <div class="bg-secondary text-white text-center py-5">Nessuna immagine</div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $p->name }}</h5>
                        <p class="card-text">{{ $p->description }}</p>
                        <strong>€{{ number_format($p->price,2) }}</strong>
                        <div class="mt-auto d-flex gap-1">
                            <button wire:click="editProduct({{ $p->id }})" class="btn btn-outline-success btn-sm flex-fill">Modifica</button>
                            <button wire:click="confirmDelete({{ $p->id }})" class="btn btn-outline-danger btn-sm flex-fill">Elimina</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

     <div class="container pt-5">
          <div class="pagination-custom">
              {{ $products->links('vendor.pagination.bootstrap-5') }}
          </div>    
      </div>

    @if($showDeleteModal)
        <div class="modal-backdrop fade show"></div>
        <div class="modal fade show d-block">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button class="btn-close" wire:click="$set('showDeleteModal', false)"></button>
                    </div>
                    <div class="modal-body">
                        Sei sicuro?
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">Annulla</button>
                        <button class="btn btn-danger" wire:click="deleteProduct">Elimina</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

