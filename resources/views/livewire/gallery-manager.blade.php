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