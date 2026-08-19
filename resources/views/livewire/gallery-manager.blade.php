<div class="container mt-4">

    {{-- ALERT HOME INCOMPLETA --}}
    @if ($this->featuredCount < 11)
        <div
            style="position:fixed;top:20px;left:50%;transform:translateX(-50%);z-index:99999;width:92%;max-width:480px;">

            <div class="shadow-lg"
                style="background:#111;color:#fff;border-left:5px solid #dc3545;padding:18px 20px;border-radius:6px;">

                <div class="d-flex align-items-center">

                    <div class="me-3"
                        style="width:42px;height:42px;min-width:42px;border:2px solid #dc3545;color:#dc3545;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:20px;font-weight:700;">
                        !
                    </div>

                    <div style="flex:1;">

                        <div style="font-size:13px;font-weight:700;letter-spacing:.8px;text-transform:uppercase;">
                            Home incompleta
                        </div>

                        <div style="font-size:13px;color:#ccc;margin-top:4px;line-height:1.4;">
                            Devi selezionare un'altra immagine per completare la Home.
                        </div>

                    </div>

                    <div style="margin-left:15px;font-size:20px;font-weight:700;color:#fff;white-space:nowrap;">
                        {{ $this->featuredCount }}/11
                    </div>

                </div>

            </div>

        </div>
    @endif

    {{-- MESSAGGIO --}}
    @if (session()->has('message'))
        <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
            <span>✅</span>

            <div class="mx-2" style="flex-grow:1;">
                {{ session('message') }}
            </div>
        </div>
    @endif


    {{-- FORM CARICAMENTO --}}
    <form wire:submit.prevent="create" class="mb-4" id="galleryUploader">

        <input type="file" id="imageInput" class="form-control mb-2">

        <div id="uploadBox" class="mb-3" style="display:none;">

            <div class="d-flex justify-content-between mb-1">
                <small>Caricamento...</small>
                <small id="uploadPercent">0%</small>
            </div>

            <div class="progress" style="height:8px;">
                <div id="uploadBar" class="progress-bar progress-bar-striped progress-bar-animated" style="width:0%;">
                </div>
            </div>

        </div>

        <div wire:loading wire:target="image" class="text-muted mb-2">
            ⏳ Upload in corso...
        </div>

        @if ($image)
            <div class="mb-2">

                <img src="{{ $image->temporaryUrl() }}"
                    style="
                        width:100%;
                        max-width:250px;
                        border:1px solid #ccc;
                        object-fit:cover;
                    ">

            </div>
        @endif

        @error('image')
            <div class="text-danger mb-2">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" id="uploadBtn" class="btn btn-primary w-100">
            Carica Immagine
        </button>

    </form>


    {{-- FILTRI --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">

        <div>

            <h5 class="mb-1 fw-bold">
                Galleria
            </h5>

            <small class="text-muted">
                {{ $this->featuredCount }}/11 immagini selezionate per la Home
            </small>

        </div>

        <div class="d-flex flex-wrap gap-2">

            <button type="button" wire:click="showAll"
                class="btn btn-sm {{ !$showFeaturedOnly ? 'btn-dark' : 'btn-outline-dark' }}">
                Tutte le immagini
            </button>

            <button type="button" wire:click="showFeatured"
                class="btn btn-sm {{ $showFeaturedOnly ? 'btn-warning' : 'btn-outline-warning' }}">
                <i class="fas fa-star me-1"></i>
                In Home ({{ $this->featuredCount }}/11)
            </button>

        </div>

    </div>


    {{-- GALLERIA --}}
    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">

        @forelse ($this->images as $img)
            <div class="col" wire:key="gallery-image-{{ $img->id }}">

                <div class="card h-100">

                    <div style="position:relative;">

                        <img src="{{ asset($img->image_path) }}" class="card-img-top"
                            style="object-fit:cover;height:200px;">

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

                        <button wire:click="toggleFeatured({{ $img->id }})" type="button"
                            class="btn btn-sm w-100 mb-2 {{ $img->is_featured ? 'btn-warning' : 'btn-outline-secondary' }}"
                            style=" height:42px; display:flex; align-items:center; justify-content:center; white-space:nowrap;">
                            <i class="fas fa-star me-1"></i>

                            @if ($img->is_featured)
                                Rimuovi dalla Home
                            @else
                                Mostra in Home
                            @endif
                        </button>


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
                        <i class="fas fa-star mb-3" style="font-size:2rem;"></i>

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

            <div class="modal-admin-backdrop" wire:click="$set('confirmingDelete', false)"></div>

            <div class="modal-admin-content">

                <div class="modal-admin-header border-0">

                    <h5 class="m-0 fw-bold" style="font-size:1.1rem;">
                        <i class="fas fa-image me-2"></i>
                        Elimina Immagine
                    </h5>

                    <button type="button" class="btn-close btn-close-white"
                        wire:click="$set('confirmingDelete', false)" style="box-shadow:none;"></button>

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
