<x-layout>
    <section
        style="background-color: #ffffff; font-family: 'Playfair Display', serif; color: #000000; min-height: 100vh;">

        {{-- Carousel immagini Header --}}
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false"
            data-bs-interval="3000" style="max-height: 600px; overflow: hidden;">
            <div class="carousel-inner">
                @foreach (['home1.jpeg', 'home2.jpeg', 'home3.jpeg'] as $index => $img)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="/images/carouselHome/{{ $img }}" class="d-block w-100 carousel-img"
                            alt="Image {{ $index + 1 }}" style="object-fit: cover; height: 600px;">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                            style="background: rgba(0,0,0,0.4); top: 0; bottom: 0; left: 0; right: 0;">
                            <h1 class="display-3 fw-bold" style="color: #f5f5f5; text-shadow: 2px 2px 6px #000;">
                                DEDICATO ALL’UOMO</h1>
                            <h4 class="fst-italic" style="color: #f5f5f5;">Innovazione, Interpretazione e Ricerca</h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev" style="width: 5%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"
                    style="filter: invert(100%); background-color: transparent;"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next" style="width: 5%;">
                <span class="carousel-control-next-icon" aria-hidden="true"
                    style="filter: invert(100%); background-color: transparent;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        {{-- Descrizione sotto carousel Header --}}
        <div class="w-100 py-5" style="background-color: #ffffff; font-family: 'Lato', sans-serif;">

            <div class="text-center mx-auto px-4 force-black" style="max-width: 900px;">

                <h2 class="text-center display-5 mt-0" style="font-weight: 700;">Per la bellezza e la cura dei capelli
                    degli uomini</h2>

                <p class="lead mx-auto" style="max-width: 700px; color: #000;">
                    Gli esperti di <strong>Liso Barber Shop</strong> propongono nel salone di Andria numerosi tagli
                    classici
                    e moderni maschili, personalizzabili e di tendenza.
                </p>

                <p class="lead mx-auto" style="max-width: 700px; color: #000;">
                    Sono disponibili inoltre trattamenti studiati per rinvigorire e nutrire la chioma o per contrastare
                    il
                    fenomeno della perdita dei capelli.
                </p>

                <p class="lead mx-auto mb-5" style="max-width: 700px; color: #000;">
                    Gli esperti di <strong>Liso Barber Shop</strong> sono a disposizione per individuare la soluzione
                    ideale
                    per ritrovare capelli forti e sani in breve tempo.
                </p>

                <h3 class="mb-4" style="font-weight: 700;">
                    Scarica la nostra app per prenotare subito il tuo appuntamento
                </h3>

                <div class="d-flex justify-content-center align-items-center flex-wrap gap-4">
                    <a href="https://apps.apple.com/it/app/liso-barber-shop/id6502577739" target="_blank">
                        <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/it-it?size=150x50"
                            alt="App Store" style="height: 50px;">
                    </a>
                    <a href="https://play.google.com/store/search?q=liso+barber+shop&c=apps&hl=it" target="_blank">
                        <img src="https://play.google.com/intl/en_us/badges/static/images/badges/it_badge_web_generic.png"
                            alt="Google Play" style="height: 66px;">
                    </a>
                </div>

            </div>
        </div>






        <!-- mosaic-section.blade.php (solo la sezione) -->
        <section class="mosaic-section">
            <div class="text-center text-white">
                <h2 class="fw-bold text-uppercase display-5" style="color: #fff">Il Nostro Salone</h2>
                <p class="lead">Uno spazio curato, moderno e accogliente.</p>
            </div>
            <div class="mosaic-grid">
                <img src="/images/2.jpg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic2.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic11.png" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic4.JPG" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic9.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic6.JPG" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic5.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic7.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic8.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic10.jpeg" loading="lazy" decoding="async" alt="salone">
                <img src="/images/mosaic/Mosaic12.jpg" loading="lazy" decoding="async" alt="salone">
            </div>
            <div class="text-center mt-2">
                <a href="{{ route('user.gallery') }}" class="mosaic-cta-btn">
                    VISITA LA NOSTRA GALLERY
                </a>
            </div>
        </section>

        {{-- Servizi --}}
        <section class="container py-3">
            <h2 class="text-center display-5 mb-4" style="font-weight: 700; color:#fff ">I nostri servizi</h2>
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow" style="background-color: #fff; color: #000;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                            <img src="{{ asset('images/forbici1.png') }}" alt="Taglio Uomo" class="mb-3"
                                style="width:64px; height:64px; object-fit:contain;">
                            <h5 class="card-title" style="font-family: 'Playfair Display', serif;">Taglio Uomo</h5>
                            <p class="card-text" style="color: #000">Valorizziamo ogni tipo di volto e stile con tagli
                                personalizzati.</p>
                            <a href="{{ route('services') }}#taglio-uomo" class="btn btn-dark mt-auto"
                                style="font-weight: 700; border-radius: 0;">
                                Scopri di più
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow" style="background-color: #fff; color: #000;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                            <img src="{{ asset('images/macchinetta1.png') }}" alt="Rasatura Tradizionale"
                                class="mb-3" style="width:64px; height:64px; object-fit:contain;">
                            <h5 class="card-title" style="font-family: 'Playfair Display', serif;">Rasatura
                                Tradizionale</h5>
                            <p class="card-text" style="color: #000">Rasatura con panno caldo e prodotti di alta
                                qualità per un relax autentico.</p>
                            <a href="{{ route('services') }}#rasatura-tradizionale" class="btn btn-dark mt-auto"
                                style="font-weight: 700; border-radius: 0;">
                                Scopri di più
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow" style="background-color: #fff; color: #000;">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
                            <img src="{{ asset('images/baffi1.png') }}" alt="Rasatura Tradizionale" class="mb-3"
                                style="width:64px; height:64px; object-fit:contain;">
                            <h5 class="card-title" style="font-family: 'Playfair Display', serif;">Modellatura Barba
                            </h5>
                            <p class="card-text"style="color: #000">Definizione e trattamenti per una barba morbida e
                                curata.</p>
                            <a href="{{ route('services') }}#modellatura-barba" class="btn btn-dark mt-auto"
                                style="font-weight: 700; border-radius: 0;">
                                Scopri di più
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('services') }}" class="btn btn-dark mt-auto btn-lg px-5"
                    style="font-weight: 700; border-radius: 0; frs-italic;">
                    Scopri tutti i servizi
                </a>
            </div>
        </section>

        {{-- Counter section --}}
        <section class="container my-5 counter-section text-center px-0">
            <div class="row gx-0 px-3 px-md-0"> <!-- qui -->
                <div class="col-6 col-md-3">
                    <div class="counter-box">
                        <h3 class="counter" data-target="800">0</h3>
                        <p>Clienti Soddisfatti</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="counter-box">
                        <h3 class="counter" data-target="66351">0</h3>
                        <p>Tagli Eseguiti</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="counter-box">
                        <h3 class="counter" data-target="8">0</h3>
                        <p>Anni di Esperienza</p>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="counter-box">
                        <h3 class="counter" data-target="500">0</h3>
                        <p>Recensioni Positive</p>
                    </div>
                </div>
            </div>
        </section>


        {{-- Recensioni --}}
        <h2 class="text-center display-5 mb-4" style="font-weight: 700; color:#fff;">DICONO DI NOI</h2>
        <section class="container my-5 google-reviews-zara">

            <!-- HEADER GOOGLE -->
            <div class="google-header d-flex justify-content-between align-items-center mb-4">
                <div class="google-left d-flex align-items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3"
                        style="width:24px; height:24px; vertical-align:middle;">
                        <path fill="#4285F4"
                            d="M533.5 278.4c0-18.4-1.5-36-4.3-53.2H272v100.8h146.9c-6.3 34-25 62.8-53.2 82v68h85.9c50.2-46.2 79.9-114.7 79.9-197.6z" />
                        <path fill="#34A853"
                            d="M272 544.3c71.7 0 132-23.7 176-64.5l-85.9-68c-23.8 15.9-54.1 25.3-90.1 25.3-69 0-127.3-46.5-148.2-109.2h-88.6v68.7c44.3 87.6 135.3 148.7 236.8 148.7z" />
                        <path fill="#FBBC05"
                            d="M123.7 361.1c-10.3-30.9-10.3-64.4 0-95.3V197h-88.6C14.9 257.3 0 310.8 0 366.1s14.9 108.8 35.1 161.1l88.6-68.7z" />
                        <path fill="#EA4335"
                            d="M272 107.3c37.4-.6 71.1 12.7 97.6 36.8l73.1-73.1C403.7 31.5 341.7 0 272 0 170.5 0 79.5 61.1 35.1 148.7l88.6 68.7c20.9-62.7 79.2-109.2 148.3-109.2z" />
                    </svg>
                    <span class="google-title">Recensioni</span>
                </div>

                <div class="google-right d-flex align-items-center gap-3">
                    <div class="google-rating text-center">
                        <span class="rating-value">{{ number_format($googleStats->average_rating, 1) }}</span>
                        <div class="stars">
                            @for ($i = 0; $i < 5; $i++)
                                <i
                                    class="fas fa-star {{ $i < round($googleStats->average_rating) ? 'filled' : '' }}"></i>
                            @endfor
                        </div>
                        <span class="rating-count">({{ $googleStats->total_reviews }})</span>
                    </div>

                    <a href="https://search.google.com/local/writereview?placeid={{ env('GOOGLE_PLACE_ID') }}"
                        target="_blank" class="google-btn btn btn-outline-light"style="border-radius: 0;">
                        Lascia la tua recensione
                    </a>
                </div>
            </div>

            <!-- SLIDER -->
            <div class="reviews-slider">
                <div class="row g-4 mt-4 reviews-track">
                    @foreach ($latestReviews as $review)
                        <div class="col-md-4 review-slide">
                            <div class="review-card position-relative p-3">

                                <!-- Logo Google in alto a destra -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3"
                                    style="width:24px; height:24px; position:absolute; top:1rem; right:1rem;">
                                    <path fill="#4285F4"
                                        d="M533.5 278.4c0-18.4-1.5-36-4.3-53.2H272v100.8h146.9c-6.3 34-25 62.8-53.2 82v68h85.9c50.2-46.2 79.9-114.7 79.9-197.6z" />
                                    <path fill="#34A853"
                                        d="M272 544.3c71.7 0 132-23.7 176-64.5l-85.9-68c-23.8 15.9-54.1 25.3-90.1 25.3-69 0-127.3-46.5-148.2-109.2h-88.6v68.7c44.3 87.6 135.3 148.7 236.8 148.7z" />
                                    <path fill="#FBBC05"
                                        d="M123.7 361.1c-10.3-30.9-10.3-64.4 0-95.3V197h-88.6C14.9 257.3 0 310.8 0 366.1s14.9 108.8 35.1 161.1l88.6-68.7z" />
                                    <path fill="#EA4335"
                                        d="M272 107.3c37.4-.6 71.1 12.7 97.6 36.8l73.1-73.1C403.7 31.5 341.7 0 272 0 170.5 0 79.5 61.1 35.1 148.7l88.6 68.7c20.9-62.7 79.2-109.2 148.3-109.2z" />
                                </svg>

                                <!-- User -->
                                <div class="review-user d-flex align-items-center gap-2">
                                    <img src="{{ $review->profile_photo }}"
                                        onerror="this.src='/images/avatar-placeholder.png'"
                                        style="width:50px; height:50px; border-radius:50%; object-fit:cover;">
                                    <div class="user-meta">
                                        <strong>{{ $review->author_name }}</strong>
                                        <small>{{ $review->relative_time }}</small>
                                    </div>
                                </div>

                                <!-- Stars -->
                                <div class="stars mb-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fas fa-star {{ $i < $review->rating ? 'filled' : '' }}"></i>
                                    @endfor
                                </div>

                                <!-- Review text -->
                                <p class="review-text">
                                    {{ Str::of($review->text)->explode('.')->first() }}.
                                </p>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="https://www.google.com/search?sca_esv=01e84e26bfa42c3c&hl=it-IT&q=Liso+Barber+shop+Recensioni"
                    class="btn btn-dark mt-auto btn-lg px-5" style="font-weight: 700; border-radius: 0;">
                    Scopri tutte le recensioni
                </a>
            </div>

        </section>








        {{-- Prodotti --}}
        <section>
            <div class="container text-center py-5">
                <h2 class="text-center display-5" style="font-weight: 700; color:#fff ">Scelti per te</h2>
                <a href="{{ route('products') }}"
                    style="text-decoration: none; color: #ffffff; font-weight: 600; font-size: 1.1rem !important;">
                    ▸ La selezione completa
                </a>

                <div id="carouselProdotti" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500"
                    style="max-width: 1140px; margin: auto; margin-top: 2rem;">
                    <div class="carousel-inner">
                        @foreach (array_chunk($products->all(), 3) as $chunkIndex => $productChunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="container">
                                    <div class="row g-4">
                                        @foreach ($productChunk as $product)
                                            <div class="col-md-4 d-flex">
                                                <div class="card border-0 shadow-sm w-100 d-flex flex-column bg-light">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ Storage::url($product->image_path) }}"
                                                            class="card-img-top" alt="{{ $product->name }}"
                                                            style="height: 300px; object-fit: cover;">
                                                    </a>
                                                    <div class="card-body d-flex flex-column" style="color:#000;">
                                                        <h5 class="card-title"
                                                            style="font-family: 'Playfair Display', serif; color:#000;">
                                                            {{ $product->name }}
                                                        </h5>
                                                        <p class="card-text flex-grow-1" style="color:#000;">
                                                            {{ Str::limit($product->description, 100) }}
                                                        </p>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center mt-auto">
                                                            <p class="card-text mb-0 fw-bold" style="color:#000;">
                                                                €{{ number_format($product->price, 2) }}
                                                            </p>
                                                            <a href="{{ route('products.show', $product->id) }}"
                                                                class="btn btn-dark btn-sm" style="border-radius: 0;">
                                                                Visualizza
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdotti"
                        data-bs-slide="prev" style="width: 5%;">
                        <span class="carousel-control-prev-icon" style="filter: invert(0%);"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselProdotti"
                        data-bs-slide="next" style="width: 5%;">
                        <span class="carousel-control-next-icon" style="filter: invert(0%);"></span>
                    </button>
                </div>
        </section>





</x-layout>
