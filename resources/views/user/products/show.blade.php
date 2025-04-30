<x-layout>
    <div class="container py-5">
        <!-- Dettaglio prodotto -->
        <div class="row mb-5">
            <div class="col-md-6">
                <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-sm" style="object-fit: cover; width: 100%; height: 500px;">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="height: 500px;">
                <h2 class="fw-bold text-center mt-5">{{ $product->name }}</h2>
                <p class="text-muted mt-3 text-center">{{ $product->description }}</p>
                <h4 class="text-dark mt-4 text-center">€{{ number_format($product->price, 2) }}</h4>
                <button class="btn btn-dark mt-4 px-4 py-2 rounded-pill text-center">Aggiungi al carrello</button>
            </div>
        </div>

        <!-- Altri prodotti -->
        <h3 class="mb-4 fw-semibold">Scopri anche</h3>
        <div class="row">
            @foreach($otherProducts as $other)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 rounded">
                        <img src="{{ Storage::url($other->image_path) }}" class="card-img-top" alt="{{ $other->name }}" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $other->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($other->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">€{{ number_format($other->price, 2) }}</span>
                                <a href="{{ route('products.show', $other->id) }}" class="btn btn-sm btn-outline-dark rounded-pill">Dettagli</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>