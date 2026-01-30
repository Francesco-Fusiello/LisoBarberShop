<x-layout>
  <div class="container py-5 mt-5">
    <!-- Dettaglio prodotto -->
    <div class="row mb-5">
        <div class="col-md-6">
            <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="img-fluid shadow-sm" style="object-fit: cover; width: 100%; height: 500px;">
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center" style="height: 500px;">
            <h2 class="fw-bold text-center mt-5" style="color: #fff">{{ $product->name }}</h2>
            <button class="btn btn-dark btn-lg px-5 mt-4"type="button"data-bs-toggle="collapse"data-bs-target="#productDetails"aria-expanded="false"aria-controls="productDetails"style="font-weight: 700 frs-italic; border-radius: 0;">
                Mostra Dettagli
            </button>

            <div class="collapse mt-3 w-100" id="productDetails">
                <div class="card card-body bg-light text-center border-0">
                    <p class="mb-2" style="color: #000">{{ $product->description }}</p>
                    <h4 class="text-dark">€{{ number_format($product->price, 2) }}</h4>
                    <h5 style="frs-italic;" class="mt-2">Tutti i nostri prodotti sono disponibili presso il nostro salone</h5>
                </div>
            </div>
        </div>
    </div>
</div>


        <!-- Altri prodotti -->

   <h3 class="mb-4 fw-semibold px-5" style="color: #fff ">Scopri anche</h3>

<div class="px-5">
    <div class="row">
        @foreach($otherProducts as $other)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0 rounded d-flex flex-column">
                <img src="{{ Storage::url($other->image_path) }}" class="card-img-top" alt="{{ $other->name }}" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $other->name }}</h5>
                    <p class="card-text text-muted flex-grow-1">
                        {{ Str::limit($other->description, 100) }}
                    </p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
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