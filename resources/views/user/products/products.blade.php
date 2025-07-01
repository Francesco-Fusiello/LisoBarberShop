<x-layout>
  <h2 class="text-center mb-5 display-4">I Nostri Prodotti</h2>

  <div class="p-6 max-w-6xl mx-auto"
       x-data="productSearch({{ Illuminate\Support\Js::from($productsJson) }})">

    <!-- Barra di ricerca -->
    <div class="container mb-3">
      <input
        type="text"
        class="form-control"
        placeholder="Cerca per nome o descrizione..."
        x-model="query"
        @input.debounce.300ms="search()"
        autocomplete="off"
      >
    </div>

    <!-- Numero prodotti filtrati, visibile solo se ricerca attiva -->
    <template x-if="query.length > 0">
      <div class="container mb-3 text-muted fst-italic">
        <span x-text="results.length"></span> prodotto<span x-text="results.length === 1 ? '' : 'i'"></span> trovato<span x-text="results.length === 1 ? '' : 'i'"></span>
      </div>
    </template>

    <div class="container pt-3">
      <div class="row">
        <!-- Lista prodotti filtrati / iniziali -->
        <template x-for="product in results" :key="product.id">
          <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-lg rounded border-0 w-100 d-flex flex-column" style="height: 100%;">
              <img :src="'/storage/' + product.image_path" :alt="product.name" class="card-img-top" style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title font-weight-bold text-dark" x-text="product.name"></h5>
                <p class="card-text text-muted flex-grow-1" x-text="truncate(product.description, 100)"></p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                  <p class="card-text text-dark mb-0"><strong>€<span x-text="formatPrice(product.price)"></span></strong></p>
                  <a :href="`/products/${product.id}`" class="btn btn-dark btn-sm" style="border-radius: 50px;">Visualizza</a>
                </div>
              </div>
            </div>
          </div>
        </template>

        <!-- Messaggio se nessun risultato -->
        <template x-if="results.length === 0">
          <div class="col-12 text-center text-muted mb-5">
            Nessun prodotto trovato.
          </div>
        </template>
      </div>
    </div>

    <!-- Paginazione mostrata solo se ricerca vuota -->
    <div class="container pt-5" x-show="query.length === 0">
      <div class="pagination-custom">
        {{ $products->links() }}
      </div>
    </div>
  </div>
</x-layout>
