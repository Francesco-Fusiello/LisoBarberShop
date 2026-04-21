<div class="container mt-4">

    {{-- Messaggio di successo --}}
    @if (session()->has('message'))
        <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
            <span>✅</span>
            <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
        </div>
    @endif

    {{-- Form caricamento immagine --}}
    <form wire:submit.prevent="create" class="mb-4" id="galleryUploader">

        <input type="file" id="imageInput" class="form-control mb-2">

        {{-- PROGRESS UI --}}
        <div id="uploadBox" class="mb-3" style="display:none;">
            <div class="d-flex justify-content-between mb-1">
                <small>Caricamento...</small>
                <small id="uploadPercent">0%</small>
            </div>

            <div class="progress" style="height: 8px;">
                <div id="uploadBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%;">
                </div>
            </div>
        </div>

        {{-- LIVEWIRE LOADING (fallback) --}}
        <div wire:loading wire:target="image" class="text-muted mb-2">
            ⏳ Upload in corso...
        </div>

        {{-- Anteprima --}}
        @if ($image)
            <div class="mb-2">
                <img src="{{ $image->temporaryUrl() }}"
                    style="width:100%;max-width:250px;border:1px solid #ccc;object-fit:cover;">
            </div>
        @endif

        @error('image')
            <div class="text-danger mb-2">{{ $message }}</div>
        @enderror

        <button type="submit" id="uploadBtn" class="btn btn-primary w-100">
            Carica Immagine
        </button>
    </form>

    {{-- Galleria --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach ($this->images as $img)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset($img->image_path) }}" class="card-img-top"
                        style="object-fit: cover; height: 200px;">

                    <div class="card-body text-center">
                        <button wire:click="confirmDelete({{ $img->id }})" class="btn btn-danger btn-sm">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- MODALE --}}
    @if ($confirmingDelete)
        <div class="modal fade show d-block" style="background:rgba(0,0,0,.3)">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5>Conferma eliminazione</h5>
                        <button class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)"></button>
                    </div>

                    <div class="modal-body text-center">
                        Sei sicuro di voler eliminare questa immagine?
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="$set('confirmingDelete', false)">
                            Annulla
                        </button>

                        <button class="btn btn-danger" wire:click="deleteConfirmed">
                             <i class="fas fa-trash"></i> Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
