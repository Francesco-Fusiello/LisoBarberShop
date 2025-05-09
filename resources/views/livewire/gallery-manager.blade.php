<div class="container mt-4">
    <h2 class="mb-4">Gestione Galleria</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="create" class="mb-4">
        <div class="mb-3">
            <input type="file" wire:model="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Carica Immagine</button>
    </form>

    <div class="row">
        @foreach ($images as $img)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <img src="{{ asset($img->image_path) }}" class="card-img-top" alt="Immagine">
                    <div class="card-body text-center">
                        <button wire:click="delete({{ $img->id }})" class="btn btn-danger btn-sm">Elimina</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>