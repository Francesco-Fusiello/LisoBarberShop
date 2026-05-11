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
    <div class="modal-admin-wrapper">
        <!-- Backdrop: clicchi fuori e si chiude -->
        <div class="modal-admin-backdrop" wire:click="$set('confirmingDelete', false)"></div>

        <div class="modal-admin-content">
            <div class="modal-admin-header border-0">
                <h5 class="m-0 fw-bold" style="font-size: 1.1rem;">
                    <i class="fas fa-image me-2"></i> Elimina Immagine
                </h5>
                <button type="button" class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)" style="box-shadow: none;"></button>
            </div>

            <div class="modal-admin-body">
                <p class="fs-5 fw-bold mb-1">Confermi l'operazione?</p>
                <p class="text-muted mb-0">Sei sicuro di voler eliminare questa immagine? Non potrai più recuperarla.</p>
            </div>

            <div class="modal-admin-footer border-0">
                <button type="button" class="btn btn-light border" wire:click="$set('confirmingDelete', false)">
                    Annulla
                </button>
                <button type="button" class="btn btn-danger px-4" wire:click="deleteConfirmed">
                    <i class="fas fa-trash-alt me-2"></i> Elimina
                </button>
            </div>
        </div>
    </div>
@endif
</div>
