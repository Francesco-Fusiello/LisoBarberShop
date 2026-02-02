<div class="container mt-4">

    {{-- Messaggio di successo --}}
    @if (session()->has('message'))
        <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
            <span>✅</span>
            <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
            <button type="button" class="btn-close" wire:click="$set('showSuccess', false)"></button>
        </div>
    @endif

    {{-- Form caricamento immagine --}}
    <form wire:submit.prevent="create" class="mb-4">
        <input type="file" wire:model.defer="image" class="form-control mb-2">

        {{-- Feedback di caricamento --}}
        <div wire:loading wire:target="image" class="text-muted mb-2">
            ⏳ Caricamento in corso...
        </div>

        {{-- Anteprima dell'immagine selezionata --}}
        @if ($image)
            <div class="mb-2">
                <img src="{{ $image->temporaryUrl() }}" alt="Anteprima" style="width: 100%; max-width: 250px; border: 1px solid #ccc; object-fit: cover;">
            </div>
        @endif

        {{-- Messaggi di errore --}}
        @error('image') 
            <div class="text-danger mb-2">{{ $message }}</div> 
        @enderror

        <button type="submit" class="btn btn-primary">
            Carica Immagine
        </button>
    </form>

    {{-- Galleria immagini --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach ($this->images as $img)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset($img->image_path) }}" class="card-img-top" alt="Immagine" style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="card-body text-center">
                        <button wire:click="confirmDelete({{ $img->id }})" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Elimina 
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Modale conferma eliminazione --}}
    @if ($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.3);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)"></button>
                    </div>
                    <div class="modal-body text-center">
                        Sei sicuro di voler eliminare questa immagine?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">Annulla</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteConfirmed">
                            <i class="fas fa-trash"></i> Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
