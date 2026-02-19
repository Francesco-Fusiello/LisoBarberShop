<x-layout>

@section('title', 'Prodotti Barbiere ad Andria | Liso Barber Shop')
@section('meta_description', 'Scopri tutti i prodotti e servizi di Liso Barber Shop ad Andria. Taglio uomo, modellatura barba, styling e tanto altro. Prenota subito!')

    <h2 class="text-center mb-5 display-4 py-5"
        style="font-family: 'Playfair Display', serif; color:#ffffff; font-weight: 700;">
        I Nostri Prodotti
    </h2>

    <div class="p-6 max-w-6xl mx-auto" x-data="productSearch({{ Illuminate\Support\Js::from($productsJson) }})">

        <div class="container mb-3">
            <input type="text" class="form-control" placeholder="Cerca per nome o descrizione..." x-model="query"
                @input.debounce.300ms="search()" autocomplete="off"
                style="
                    background-color: #ffffff;
                    color: #000;
                    border-radius: 0;
                    font-weight: 600;
                    padding-left: 1.2rem;
                    transition: all 0.3s ease;
                "
                onfocus="this.style.borderColor='#0b2e1d'; this.style.boxShadow='0 0 6px rgba(0,0,0,0.15)';"
                onblur="this.style.borderColor='#000'; this.style.boxShadow='none';">
        </div>

        <template x-if="query.length > 0">
            <div class="container mb-3 text-center fst-italic"
                style="color: #fff; font-family: 'Lato', sans-serif; font-weight: 700;">
                <span x-text="results.length"></span>&nbsp;
                <span x-text="results.length === 1 ? 'prodotto' : 'prodotti'"></span>&nbsp;
                <span x-text="results.length === 1 ? 'trovato' : 'trovati'"></span>
            </div>
        </template>


        <div class="container pt-3">
            <div class="row">
                <!-- Lista prodotti filtrati / iniziali -->
                <template x-for="product in results" :key="product.id">
                    <div class="col-6 col-md-4 mb-4 d-flex">
                        <div class="card shadow-sm border-0 w-100 d-flex flex-column"
                            style="
                                height: 100%;
                                background-color: #ffffff;
                                border-radius: 0;
                                transition: transform .2s ease;
                            "
                            onmouseover="this.style.transform='scale(1.02)'"
                            onmouseout="this.style.transform='scale(1)'">


                            <a :href="`/products/${product.id}`">
                                <img :src="'/storage/' + product.image_path" :alt="product.name" class="card-img-top"
                                    style="height: 300px; object-fit: cover; border-radius: 0;">
                            </a>

                            <div class="card-body d-flex flex-column">

                                <h5 class="card-title font-weight-bold"
                                    style="color: #000000; font-family: 'Playfair Display', serif;"
                                    x-text="product.name"></h5>

                                <p class="card-text flex-grow-1 d-none d-md-block" style="color: #333;"
                                    x-text="truncate(product.description, 100)">
                                </p>

                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <p class="card-text mb-0" style="color: #000; font-weight: 700;">
                                        €<span x-text="formatPrice(product.price)"></span>
                                    </p>

                                    <a :href="`/products/${product.id}`" class="btn btn-dark btn-sm"
                                        style="border-radius: 0; font-weight: 600;">
                                        Visualizza
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </template>

                <!-- Messaggio se nessun risultato -->
                <template x-if="results.length === 0">
                    <div class="col-12 text-center  mb-5" style="color: #fff;">
                        Nessun prodotto trovato
                    </div>
                </template>
            </div>
        </div>

        <div class="container pt-5" x-show="query.length === 0">
            <div class="pagination-custom">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</x-layout>
