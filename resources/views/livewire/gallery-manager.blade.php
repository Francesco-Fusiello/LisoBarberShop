<div class="container mt-4">

    @if (session()->has('message'))
        <div class="toast-elegant">
            <span class="toast-icon">✅</span>
            <div>{{ session('message') }}</div>
            <button type="button" class="btn-close" wire:click="$set('showSuccess', false)">&times;</button>
        </div>
    @endif

    <form wire:submit.prevent="create" class="mb-4">
        <div class="mb-3">
            <input type="file" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Carica Immagine</button>
    </form>

    <div class="row">
        @foreach ($this->images as $img)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset($img->image_path) }}" class="card-img-top" alt="Immagine">
                    <div class="card-body text-center">
                        <button wire:click="confirmDelete({{ $img->id }})" class="btn btn-danger btn-sm">Elimina</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($confirmingDelete)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-warning">
                    <div class="modal-header" style="background-color: #0b2e1d; color: #fff;">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)"></button>
                    </div>
                    <div class="modal-body">
                        <p>Sei sicuro di voler eliminare questa immagine?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">Annulla</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteConfirmed">Conferma Elimina</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
