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

        {{-- LIVEWIRE LOADING --}}
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


    {{-- FILTRI GALLERIA --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

        <div>
            <h5 class="mb-1 fw-bold">
                Galleria
            </h5>

            <small class="text-muted">
                {{ $this->featuredCount }} / 11 immagini selezionate per la Home
            </small>
        </div>

        <div class="d-flex flex-wrap gap-2">

            {{-- TUTTE --}}
            <button type="button" wire:click="showAll"
                class="btn btn-sm {{ !$showFeaturedOnly ? 'btn-dark' : 'btn-outline-dark' }}">
                Tutte le immagini
            </button>

            {{-- IN HOME --}}
            <button type="button" wire:click="showFeatured"
                class="btn btn-sm {{ $showFeaturedOnly ? 'btn-warning' : 'btn-outline-warning' }}">

                <i class="fas fa-star me-1"></i>

                In Home ({{ $this->featuredCount }}/11)

            </button>

        </div>

    </div>


    {{-- GALLERIA --}}
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">

        @forelse ($this->images as $img)
            {{-- KEY UNIVOCA PER LIVEWIRE --}}
            <div class="col" wire:key="gallery-image-{{ $img->id }}">

                <div class="card h-100">

                    <div style="position:relative;">

                        <img src="{{ asset($img->image_path) }}" class="card-img-top"
                            style="object-fit:cover;height:200px;">

                        {{-- Badge IN HOME --}}
                        @if ($img->is_featured)
                            <div
                                style="
                                    position:absolute;
                                    top:10px;
                                    right:10px;
                                    background:#ffc107;
                                    color:#000;
                                    padding:5px 9px;
                                    border-radius:20px;
                                    font-size:12px;
                                    font-weight:600;
                                ">

                                <i class="fas fa-star"></i>
                                IN HOME

                            </div>
                        @endif

                    </div>


                    <div class="card-body text-center">

                        {{-- =====================================
                             GESTIONE HOME
                        ====================================== --}}

                        <button wire:click="toggleFeatured({{ $img->id }})" type="button"
                            class="btn btn-sm w-100 mb-2
                                {{ $img->is_featured ? 'btn-warning' : 'btn-outline-secondary' }}">

                            <i class="fas fa-star me-1"></i>

                            @if ($img->is_featured)
                                Rimuovi dalla Home
                            @else
                                Mostra in Home
                            @endif

                        </button>


                        {{-- =====================================
                             ELIMINA
                             SOLO NELLA VISTA "TUTTE"
                        ====================================== --}}

                        @if (!$showFeaturedOnly)
                            <button wire:click="confirmDelete({{ $img->id }})" type="button"
                                class="btn btn-danger btn-sm w-100">

                                <i class="fas fa-trash-alt me-1"></i>

                                Elimina

                            </button>
                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="text-center py-5 text-muted">

                    @if ($showFeaturedOnly)
                        <i class="fas fa-star mb-3" style="font-size:2rem;">
                        </i>

                        <p class="mb-0">
                            Nessuna immagine selezionata per la Home.
                        </p>
                    @else
                        <p class="mb-0">
                            Nessuna immagine presente nella galleria.
                        </p>
                    @endif

                </div>

            </div>
        @endforelse

    </div>


    {{-- MODALE ELIMINAZIONE --}}
    @if ($confirmingDelete)
        <div class="modal-admin-wrapper">

            <div class="modal-admin-backdrop" wire:click="$set('confirmingDelete', false)">
            </div>


            <div class="modal-admin-content">

                <div class="modal-admin-header border-0">

                    <h5 class="m-0 fw-bold" style="font-size:1.1rem;">

                        <i class="fas fa-image me-2"></i>

                        Elimina Immagine

                    </h5>

                    <button type="button" class="btn-close btn-close-white"
                        wire:click="$set('confirmingDelete', false)" style="box-shadow:none;">
                    </button>

                </div>


                <div class="modal-admin-body">

                    <p class="fs-5 fw-bold mb-1">
                        Confermi l'operazione?
                    </p>

                    <p class="text-muted mb-0">
                        Sei sicuro di voler eliminare questa immagine?
                        Non potrai più recuperarla.
                    </p>

                </div>


                <div class="modal-admin-footer border-0">

                    <button type="button" class="btn btn-light border" wire:click="$set('confirmingDelete', false)">
                        Annulla
                    </button>

                    <button type="button" class="btn btn-danger px-4" wire:click="deleteConfirmed">

                        <i class="fas fa-trash-alt me-2"></i>

                        Elimina

                    </button>

                </div>

            </div>

        </div>
    @endif

</div>
