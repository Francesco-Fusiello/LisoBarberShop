<div>
    <div class="container-fluid">

        <h1>Gestione Prodotti</h1>
        
      
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

   

    <!-- Form per la creazione di un prodotto -->
    <form wire:submit.prevent="createProduct" enctype="multipart/form-data">
        <div>
            <label for="name">Nome prodotto:</label>
            <input type="text" wire:model="name" id="name" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="description">Descrizione:</label>
            <textarea wire:model="description" id="description" required></textarea>
            @error('description') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="price">Prezzo:</label>
            <input type="number" wire:model="price" id="price" required>
            @error('price') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="image">Immagine prodotto:</label>
            <input type="file" wire:model="image" id="image" required>
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Crea Prodotto</button>
    </form>
    
    <!-- Lista prodotti -->
    <h2 class="pt-5">Lista Prodotti</h2>
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>Prezzo:</strong> {{ $product->price }} €</p>
                        <button wire:click="deleteProduct({{ $product->id }})" class="btn btn-danger">Elimina</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


</div>
