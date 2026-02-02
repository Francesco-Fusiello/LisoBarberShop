<div class="container mt-4">

    {{-- Messaggio di successo --}}
    @if (session()->has('message'))
        <div class="toast-elegant d-flex align-items-center justify-content-between px-3 py-2 mb-4" style="background-color: #f8f8f8; border: 1px solid #ccc; border-radius: 4px; color: #000;">
            <span>✅</span>
            <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
            <button type="button" class="btn-close" wire:click="$set('showSuccess', false)"></button>
        </div>
    @endif

    {{-- Form caricamento immagine --}}
    <form wire:submit.prevent="create" class="mb-4 d-flex flex-column gap-3">
        <input type="file" wire:model.defer="image" class="form-control" style="border-radius: 0; border: 1px solid #ccc;">

        {{-- Feedback di caricamento --}}
        <div wire:loading wire:target="image" class="text-muted">
            ⏳ Caricamento in corso...
        </div>

        {{-- Anteprima dell'immagine selezionata --}}
        @if ($image)
            <div>
                <img src="{{ $image->temporaryUrl() }}" alt="Anteprima" style="width: 100%; max-width: 250px; border: 1px solid #ccc; object-fit: cover;">
            </div>
        @endif

        {{-- Messaggi di errore --}}
        @error('image') 
            <span class="text-danger">{{ $message }}</span> 
        @enderror

        <button type="submit" class="btn btn-dark" style="border-radius: 0; font-weight: 600; padding: 0.5rem 1rem;">
            Carica Immagine
        </button>
    </form>

    {{-- Galleria immagini --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach ($this->images as $img)
            <div class="col">
                <div class="card border-0" style="border-radius: 4px; overflow: hidden;">
                    <img src="{{ asset($img->image_path) }}" class="card-img-top" alt="Immagine" style="object-fit: cover; height: 200px; width: 100%;">
                    <div class="card-body text-center p-2">
                        <button wire:click="confirmDelete({{ $img->id }})" class="btn btn-outline-dark btn-sm" style="border-radius: 0; font-weight: 600;">
                            Elimina
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
                <div class="modal-content" style="border-radius: 4px; border: 1px solid #ccc;">
                    <div class="modal-header" style="background-color: #000; color: #fff; border-bottom: 1px solid #ccc;">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>Sei sicuro di voler eliminare questa immagine?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-light" wire:click="$set('confirmingDelete', false)" style="border-radius: 0;">
                            Annulla
                        </button>
                        <button type="button" class="btn btn-dark" wire:click="deleteConfirmed" style="border-radius: 0; font-weight: 600;">
                            Conferma Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
