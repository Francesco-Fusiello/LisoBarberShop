<h2>Lista Prodotti</h2>

<h2>Lista Prodotti</h2>

<div class="container">
    <div class="row">
        @foreach($products as $product) <!-- Itera sui prodotti -->
            <div class="col-md-4 mb-4">
                <div class="card shadow rounded" style="width: 100%; height: 100%; transition: transform 0.3s ease;">
                    <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p> <!-- Limita la descrizione -->
                        <p class="card-text"><strong>Prezzo:</strong> €{{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>