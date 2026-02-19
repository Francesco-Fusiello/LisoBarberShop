<x-layout>

    
@section('title', $product->name . ' | Prodotti Liso Barber Shop ad Andria')
@section('meta_description', 'Scopri ' . $product->name . ': ' . Str::limit($product->description, 150) . '. Prenota subito da Liso Barber Shop ad Andria!')

  <div class="container py-5 mt-5">

    <!-- Dettaglio prodotto -->
    <div class="row mb-5">

        <div class="col-md-6">
            <img src="{{ Storage::url($product->image_path) }}"
                 alt="{{ $product->name }}"
                 class="img-fluid shadow-sm"
                 style="object-fit: cover; width: 100%; height: 500px;">
        </div>

        <div class="col-md-6 d-flex flex-column justify-content-center align-items-center text-center"
             style="height: 500px;">

            <h2 class="fw-bold mb-4" style="color: #fff;">
                {{ $product->name }}
            </h2>

            <p class="product-description mb-4">
                {{ $product->description }}
            </p>

            <h4 class="product-price mb-3">
                €{{ number_format($product->price, 2) }}
            </h4>

            <h6 class="product-note">
                Tutti i nostri prodotti sono disponibili presso il nostro salone
            </h6>

        </div>
    </div>
  </div>

  <!-- Altri prodotti -->

  <h3 class="mb-4 fw-semibold px-5" style="color: #fff;">
      Scopri anche
  </h3>

  <div class="px-5">
      <div class="row">
          @foreach($otherProducts as $other)
          <div class="col-md-4 mb-4">
              <div class="card h-100 shadow-sm border-0 d-flex flex-column">

                  <img src="{{ Storage::url($other->image_path) }}"
                       class="card-img-top"
                       alt="{{ $other->name }}"
                       style="height: 300px; object-fit: cover;">

                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title" style="font-size: 1.10rem;">
                          {{ $other->name }}
                      </h5>

                      <div class="d-flex justify-content-between align-items-center mt-auto">
                          <span class="fw-bold">
                              €{{ number_format($other->price, 2) }}
                          </span>

                          <a href="{{ route('products.show', $other->id) }}"
                             class="btn btn-sm btn-outline-dark"
                             style="border-radius: 0;">
                              Dettagli
                          </a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
      </div>
  </div>

</x-layout>
