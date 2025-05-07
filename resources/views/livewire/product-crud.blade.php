<div class="container py-4">
    @if (session()->has('message'))
            <div class="alert alert-success fst-italic" role="alert">
                {{ session('message') }}
            </div>
        @endif
        
    <!-- Form di creazione prodotto -->
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nome prodotto</label>
            <input wire:model="name" type="text" id="name" class="form-control" placeholder="Nome del prodotto" />
            @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione prodotto</label>
            <textarea wire:model="description" id="description" rows="4" class="form-control" placeholder="Descrizione del prodotto"></textarea>
            @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo prodotto</label>
            <input wire:model="price" type="number" step="0.01" min="0" id="price" class="form-control" placeholder="Prezzo del prodotto" />
            @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Immagine prodotto</label>
            <input wire:model="image" type="file" id="image" class="form-control" />
            @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Aggiungi prodotto</button>
        </div>
    </form>

    <!-- Lista prodotti -->
    <h2 class="mt-5">Lista Prodotti</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                    @else
                        <div class="card-img-top bg-secondary text-white text-center py-5">
                            Nessuna immagine
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Prezzo:</strong> {{ number_format($product->price, 2) }} €</p>
                        <button wire:click="deleteProduct({{ $product->id }})"
                                onclick="return confirm('Sei sicuro di voler eliminare questo prodotto?')"
                                class="btn btn-danger mt-auto">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

