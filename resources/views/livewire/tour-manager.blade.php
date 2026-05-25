<div class="container mt-4">

    {{-- Messaggio di successo Elegante (Asincrono) --}}
    @if (session()->has('message'))
        <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
            <span>✅</span>
            <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
        </div>
    @endif

    {{-- Form di caricamento con ID per il JavaScript --}}
    <form wire:submit.prevent="save" class="mb-5" id="tourUploader">

        <div class="mb-3">
            <label class="form-label fw-bold small">Immagine Tappa Tour</label>
            
            {{-- IMPORTANTE: Senza wire:model. Il JS intercetta il file, lo comprime e lo passa a Livewire --}}
            <input type="file" id="tourImageInput" class="form-control mb-2" accept="image/*">

            {{-- PROGRESS UI (Gestita dal file JS esterno) --}}
            <div id="tourUploadBox" class="mb-3" style="display:none;">
                <div class="d-flex justify-content-between mb-1">
                    <small class="text-muted">Compressione e caricamento...</small>
                    <small id="tourUploadPercent" class="fw-bold text-primary">0%</small>
                </div>
                <div class="progress" style="height: 8px;">
                    <div id="tourUploadBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width: 0%;"></div>
                </div>
            </div>

            @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        {{-- Anteprima temporanea dell'immagine dopo la compressione e l'upload --}}
        @if ($image)
            <div class="mb-3">
                <p class="small text-muted mb-1">Anteprima immagine ottimizzata:</p>
                <img src="{{ $image->temporaryUrl() }}"
                     style="width:100%; max-width:250px; height:150px; object-fit:cover; border:1px solid #ccc; border-radius: 4px;">
            </div>
        @endif

        {{-- Campi del Tour --}}
        <div class="mb-3">
            <label class="form-label fw-bold small">Città</label>
            <input type="text" wire:model="city" class="form-control" placeholder="es. Milan">
            @error('city') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold small">Paese</label>
            <input type="text" wire:model="country" class="form-control" placeholder="es. Italy">
            @error('country') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold small">Anno</label>
            <input type="text" wire:model="year" class="form-control" placeholder="es. 2026">
            @error('year') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-dark w-100">
            Add Tour Item
        </button>

    </form>

    <hr class="my-5">

    {{-- Griglia degli elementi Tour presenti (Immagini mostrate piccole e ordinate) --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
        @foreach($tourItems as $item)
            <div class="col">
                <div class="card h-100 shadow-sm border">
                    {{-- Immagine renderizzata leggera dal CSS --}}
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top"
                         style="object-fit: cover; height: 200px; width: 100%;">

                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div>
                            <h5 class="fw-bold m-0" style="font-size: 1.1rem;">{{ $item->city }}</h5>
                            <p class="text-muted mb-1 small">{{ $item->country }}</p>
                            <small class="badge bg-secondary mb-2">{{ $item->year }}</small>
                        </div>
                        
                        <div class="mt-3">
                            {{-- Tasto Elimina che innesca la modale --}}
                            <button wire:click="confirmDelete({{ $item->id }})" class="btn btn-danger btn-sm w-100">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- MODALE DI CONFERMA ELIMINAZIONE (Stile Gallery) --}}
    @if ($confirmingDelete)
        <div class="modal-admin-wrapper">
            {{-- Backdrop per chiudere al click esterno --}}
            <div class="modal-admin-backdrop" wire:click="$set('confirmingDelete', false)"></div>

            <div class="modal-admin-content">
                <div class="modal-admin-header border-0">
                    <h5 class="m-0 fw-bold" style="font-size: 1.1rem;">
                        <i class="fas fa-trash-alt me-2"></i> Elimina Tappa Tour
                    </h5>
                    <button type="button" class="btn-close btn-close-white" wire:click="$set('confirmingDelete', false)" style="box-shadow: none;"></button>
                </div>

                <div class="modal-admin-body text-start">
                    <p class="fs-5 fw-bold mb-1">Confermi l'operazione?</p>
                    <p class="text-muted mb-0">Sei sicuro di voler eliminare questa tappa? Questa azione rimuoverà permanentemente i dettagli e l'immagine dal server.</p>
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