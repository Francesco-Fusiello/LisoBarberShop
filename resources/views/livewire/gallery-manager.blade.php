<div>
    <!-- Messaggio di successo -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form di caricamento immagine -->
    <form wire:submit.prevent="upload" class="mb-4">
        <input type="file" wire:model="image" class="form-control mb-2">
        <button class="btn btn-dark">Carica immagine</button>
    </form>

    <!-- Galleria di immagini -->
    <div class="row g-3">
        @foreach($images as $index => $img)
            <div class="col-md-3">
                <div class="position-relative">
                    <img src="{{ asset($img->image_path) }}" class="img-fluid rounded shadow" style="cursor:pointer;" wire:click="openLightbox({{ $index }})">
                    <button wire:click="delete({{ $img->id }})" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1">x</button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Lightbox -->
    @if(!is_null($selectedImageIndex))
        @php $all = $images->values(); @endphp
        <div class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-75 d-flex align-items-center justify-content-center" style="z-index:9999;">
            <button class="btn btn-light position-absolute top-0 end-0 m-3" wire:click="closeLightbox">X</button>
            <button class="btn btn-light position-absolute start-0 ms-3" wire:click="prev" style="font-size: 2rem;">‹</button>
            <img src="{{ asset($all[$selectedImageIndex]->image_path) }}" class="img-fluid rounded" style="max-height: 80vh;">
            <button class="btn btn-light position-absolute end-0 me-3" wire:click="next" style="font-size: 2rem;">›</button>
        </div>
    @endif
</div>