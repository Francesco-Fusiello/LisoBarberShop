<x-layout>
    <h2 class="text-center mb-5 display-4">I Nostri Prodotti</h2>

    <div class="p-6 max-w-6xl mx-auto" x-data="productSearch({{ Illuminate\Support\Js::from($productsJson) }})">

<div class="container mb-3">
    <input type="text"
           class="form-control"
           placeholder="Cerca per nome o descrizione..."
           x-model="query"
           @input.debounce.300ms="search()"
           autocomplete="off"
           style="
                background-color: #f5f0d1;
                color: #0b2e1d;
                border: 2px solid #d4af37;
                border-radius: 50px;
                font-weight: 700;
                padding-left: 1.5rem;
                transition: border-color 0.3s ease, box-shadow 0.3s ease;
           "
           onfocus="this.style.borderColor='#d4af37'; this.style.boxShadow='0 0 5px rgba(212,175,55,0.6)';"
           onblur="this.style.borderColor='#d4af37'; this.style.boxShadow='none';"
    >
</div>

<template x-if="query.length > 0">
    <div class="container mb-3 text-center fst-italic"
         style="color: #d4af37; font-family: 'Lato', sans-serif; font-weight: 700;">
        <span x-text="results.length"></span>&nbsp;
        <span x-text="results.length === 1 ? 'prodotto' : 'prodotti'"></span>&nbsp;
        <span x-text="results.length === 1 ? 'trovato' : 'trovati'"></span>
    </div>
</template>


        <div class="container pt-3">
            <div class="row">
                <!-- Lista prodotti filtrati / iniziali -->
               <template x-for="product in results" :key="product.id">
    <div class="col-md-4 mb-4 d-flex">
        <div class="card shadow-lg rounded border-0 w-100 d-flex flex-column"
             style="height: 100%; background-color: rgba(11,46,29,0.8);">
            <img :src="'/storage/' + product.image_path" :alt="product.name" class="card-img-top"
                 style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title font-weight-bold" 
                    style="color: #d4af37; font-family: 'Playfair Display', serif;" x-text="product.name"></h5>
                <p class="card-text flex-grow-1" style="color: #c1b26a;" x-text="truncate(product.description, 100)"></p>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <p class="card-text mb-0" style="color: #d4af37; font-weight: 700;">
                        €<span x-text="formatPrice(product.price)"></span>
                    </p>
                    <a :href="`/products/${product.id}`" class="btn btn-outline-warning btn-sm" 
                       style="border-radius: 50px; font-weight: 700;">
                        Visualizza
                    </a>
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

        
        <div class="container pt-5" x-show="query.length === 0">
            <div class="pagination-custom">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-layout>
