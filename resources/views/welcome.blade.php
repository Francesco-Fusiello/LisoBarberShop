<x-layout>
    <section
        style="background-color: #0b2e1d; font-family: 'Playfair Display', serif; color: #d4af37; min-height: 100vh;">

        {{-- Carousel immagini --}}
        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false"
            data-bs-interval="4000" style="max-height: 600px; overflow: hidden;">
            <div class="carousel-inner">
                @foreach (['1.jpg', '2.jpg', '4.jpg'] as $index => $img)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="/images/{{ $img }}" class="d-block w-100" alt="Image {{ $index + 1 }}"
                            style="object-fit: cover; height: 600px;">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center"
                            style="background: rgba(11,46,29,0.5); top: 0; bottom: 0; left: 0; right: 0;">
                            {{-- Scritta identica per tutte le immagini --}}
                            <h1 class="display-3 fw-bold" style="color: #d4af37; text-shadow: 2px 2px 6px #000;">
                                DEDICATO ALL’UOMO</h1>
                            <h4 class="fst-italic" style="color: #e0c97a; text-shadow: 1px 1px 3px #000;">Innovazione,
                                Interpretazione e Ricerca</h4>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev" style="width: 5%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"
                    style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;"></span>
                <span class="visually-hidden">Previous</span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next" style="width: 5%;">
                <span class="carousel-control-next-icon" aria-hidden="true"
                    style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>



        {{-- Descrizione sotto carousel --}}
        <div class="container py-5 text-center" style="font-family: 'Lato', sans-serif; color: #f0e6c8;">
            <h2 class="mb-3" style="color: #d4af37; font-weight: 700;">Per la bellezza e la cura dei capelli degli
                uomini</h2>
            <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
                Gli esperti di <strong style="color: #d4af37;">Liso Barber Shop</strong> propongono nel salone di Andria
                in viale Pietro Nenni, 324 numerosi tagli classici e moderni maschili, personalizzabili e di tendenza,
                ideali per sottolineare il fascino naturale di ciascun cliente.
            </p>
            <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
                Sono disponibili inoltre trattamenti studiati per rinvigorire e nutrire la chioma o per contrastare il
                fenomeno della perdita dei capelli.
            </p>
            <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
                Gli esperti di <strong style="color: #d4af37;">Liso Barber Shop</strong> sono a completa disposizione
                per individuare la soluzione ideale per ritrovare capelli forti e sani in breve tempo.
            </p>

            <h3 class="mt-5" style="color: #d4af37; font-weight: 700; text-shadow: 1px 1px 2px #000;">
                Scarica la nostra app per prenotare subito il tuo appuntamento...
            </h3>

            <div class="d-flex justify-content-center align-items-center flex-wrap gap-4 mt-4">
                <a href="https://apps.apple.com/it/app/liso-barber-shop/id6502577739" target="_blank"
                    style="display: inline-block;">
                    <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/it-it?size=150x50"
                        alt="App Store" style="height: 50px;">
                </a>
                <a href="https://play.google.com/store/search?q=liso+barber+shop&c=apps&hl=it" target="_blank"
                    style="display: inline-block;">
                    <img src="https://play.google.com/intl/en_us/badges/static/images/badges/it_badge_web_generic.png"
                        alt="Google Play" style="height: 66px;">
                </a>
            </div>



<section class="container py-5">
  <h2 class="text-center mb-4" style="color: #d4af37; font-family: 'Playfair Display', serif; font-weight: 700;">
    I nostri servizi
  </h2>

  <div class="row g-4 text-center">
    <!-- Taglio Uomo -->
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow" style="background-color: #0b2e1d; color: #fff;">
        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
          <i class="fa-solid fa-scissors fa-3x mb-3" style="color: #d4af37;"></i>
          <h5 class="card-title" style="color: #d4af37; font-family: 'Playfair Display', serif;">Taglio Uomo</h5>
          <p class="card-text" style="color: #c1b26a;">
            Valorizziamo ogni tipo di volto e stile con tagli personalizzati e tecniche avanzate.
          </p>
          <a href="{{ route('services') }}#taglio-uomo" class="btn btn-outline-warning mt-auto" style="border-radius: 50px; font-weight: 700;">
            Scopri di più
          </a>
        </div>
      </div>
    </div>

    <!-- Rasatura Tradizionale -->
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow" style="background-color: #0b2e1d; color: #fff;">
        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
          <i class="fa-solid fa-cut fa-3x mb-3" style="color: #d4af37;"></i>
          <h5 class="card-title" style="color: #d4af37; font-family: 'Playfair Display', serif;">Rasatura Tradizionale</h5>
          <p class="card-text" style="color: #c1b26a;">
            Il piacere della rasatura con panno caldo e prodotti di alta qualità per un relax autentico.
          </p>
          <a href="{{ route('services') }}#rasatura-tradizionale" class="btn btn-outline-warning mt-auto" style="border-radius: 50px; font-weight: 700;">
            Scopri di più
          </a>
        </div>
      </div>
    </div>

    <!-- Modellatura Barba -->
    <div class="col-md-4">
      <div class="card h-100 border-0 shadow" style="background-color: #0b2e1d; color: #fff;">
        <div class="card-body d-flex flex-column align-items-center justify-content-center py-4">
          <i class="fa-solid fa-user fa-3x mb-3" style="color: #d4af37;"></i>
          <h5 class="card-title" style="color: #d4af37; font-family: 'Playfair Display', serif;">Modellatura Barba</h5>
          <p class="card-text" style="color: #c1b26a;">
            Definizione, regolazione e trattamenti per una barba morbida e curata.
          </p>
          <a href="{{ route('services') }}#modellatura-barba" class="btn btn-outline-warning mt-auto" style="border-radius: 50px; font-weight: 700;">
            Scopri di più
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="text-center mt-5">
    <a href="{{ route('services') }}" class="btn btn-warning btn-lg px-5" style="border-radius: 50px; font-weight: 700;">
      Scopri tutti i servizi
    </a>
  </div>
</section>









            {{-- Counter section --}}
            <section class="container my-5 section-divider counter-section">
                <div class="row text-center text-warning">
                    <div class="col-6 col-md-3 mb-4 counter-box">
                        <h3 class="display-6 fw-bold counter" data-target="800" style="text-shadow: 1px 1px 3px #000;">0
                        </h3>
                        <p>Clienti Soddisfatti</p>
                    </div>
                    <div class="col-6 col-md-3 mb-4 counter-box">
                        <h3 class="display-6 fw-bold counter" data-target="66351"
                            style="text-shadow: 1px 1px 3px #000;">0
                        </h3>
                        <p>Tagli Eseguiti</p>
                    </div>
                    <div class="col-6 col-md-3 mb-4 counter-box">
                        <h3 class="display-6 fw-bold counter" data-target="8" style="text-shadow: 1px 1px 3px #000;">0
                        </h3>
                        <p>Anni di Esperienza</p>
                    </div>
                    <div class="col-6 col-md-3 mb-4 counter-box">
                        <h3 class="display-6 fw-bold counter" data-target="500" style="text-shadow: 1px 1px 3px #000;">0
                        </h3>
                        <p>Recensioni Positive</p>
                    </div>
                </div>
            </section>



            {{-- Recensioni --}}
 <section class="container my-5">
    <h2 class="text-center mb-3 display-4"
        style="color: #d4af37; font-family: 'Playfair Display', serif; font-weight: 700;">
        Cosa dicono di noi
    </h2>

    @if ($latestReviews->count())
        <div id="carouselRecensioni" class="carousel slide" data-bs-ride="carousel"
            style="max-width: 750px; margin: auto;">
            <div class="carousel-inner">
                @foreach ($latestReviews as $index => $review)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="card shadow-lg d-flex align-items-center"
                             style="background-color: #000; border: 4px solid #d4af37; color: #fff; border-radius: 10px; gap: 25px; flex-direction: row; max-width: 700px; margin: auto; padding: 20px 30px;">

                            <!-- Palo laterale -->
                            <div style="font-size: 4.5rem; color: #d4af37; user-select: none; flex-shrink: 0;margin-right: 15px;">
                                💈
                            </div>

                            <!-- Contenuto recensione -->
                            <div style="text-align: center; flex: 1;">

                                <!-- Nome -->
                                <h5 class="mb-2" style="color: #fff; font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 8px;">
                                    {{ $review->name }}
                                </h5>

                                <!-- Stelle -->
                                <div class="mb-3" style="font-size: 1.4rem; letter-spacing: 1px;">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <span style="color: #d4af37;">&#9733;</span>
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        <span style="color: #555;">&#9734;</span>
                                    @endfor
                                </div>

                                <!-- Data -->
                                <small class="fst-italic d-block mb-3" style="color: #aaa; font-size: 0.9rem;">
                                    {{ $review->created_at->format('d M Y') }}
                                </small>

                                <!-- Testo -->
                                <p class="mb-0" style="color: #fff; font-size: 1.15rem; font-family: 'Lato', sans-serif; line-height: 1.5;">
                                    {{ $review->content }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Frecce -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecensioni"
                data-bs-slide="prev" style="width: 5%;">
                <span class="carousel-control-prev-icon" aria-hidden="true"
                      style="filter: invert(80%) sepia(60%) saturate(400%) hue-rotate(5deg);"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRecensioni"
                data-bs-slide="next" style="width: 5%;">
                <span class="carousel-control-next-icon" aria-hidden="true"
                      style="filter: invert(80%) sepia(60%) saturate(400%) hue-rotate(5deg);"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @else
        <p class="text-center fst-italic" style="color: #d4af37;">Nessuna recensione disponibile.</p>
    @endif
</section>





            {{-- Pulsanti per aprire/chiudere drawer --}}
            <div class="container d-flex justify-content-center gap-4"
                style="font-family: 'Playfair Display', serif; margin-top: -1.5rem;">
                <a href="#" id="openReviewDrawer"
                    style="color: #c1b26a; font-weight: 600; text-decoration: none; font-size: 1.2rem;"
                    onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#c1b26a'">
                    ✂️ Racconta la tua esperienza
                </a>

                <a href="{{ route('recensioni.index') }}"
                    style="color: #c1b26a; font-weight: 600; text-decoration: none; font-size: 1.2rem;"
                    onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#c1b26a'">
                    💈 Cosa dicono i nostri clienti
                </a>
            </div>


            {{-- Drawer recensioni laterale --}}
            <div id="reviewDrawer" class="review-drawer" aria-hidden="true" tabindex="-1" role="dialog"
                aria-label="Form recensione">
                <div class="drawer-header d-flex justify-content-between align-items-center">
                    <h5 style="color: #d4af37; font-weight: 700;">✂️ Lascia la tua recensione</h5>
                    <button id="closeDrawerBtn" class="btn-close btn-close-white" aria-label="Chiudi"></button>
                </div>
                <div class="drawer-body mt-3" style="flex-grow:1; overflow-y:auto;">
                    @livewire('review-form')
                </div>
            </div>

            {{-- Overlay --}}
            <div id="drawerOverlay" class="review-overlay" aria-hidden="true"></div>







            {{-- Carosello Prodotti --}}
            <div class="container d-flex justify-content-center align-items-center flex-wrap text-center"
                style="max-width: 1140px; margin: auto; padding: 5rem 0 1rem 0;">

                <h2 class="mb-0 display-5 flex-grow-1"
                    style="color: #d4af37; font-family: 'Playfair Display', serif; font-weight: 700; min-width: 0;">
                    Scelti per te
                </h2>

                <a href="{{ route('products') }}" class="w-100 w-md-auto mt-2 mt-md-0"
                    style="font-size: 1.2rem; color: #c1b26a; text-decoration: none; font-family: 'Lato', sans-serif; font-weight: 600; white-space: nowrap;"
                    onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#c1b26a'">
                    ▸ La selezione completa
                </a>

            </div>





            <div id="carouselProdotti" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500"
                style="max-width: 1140px; margin: auto;">
                <div class="carousel-inner">
                    @foreach (array_chunk($products->all(), 3) as $chunkIndex => $productChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="container" style="padding-top: 0; margin-top: 0;"> {{-- NIENTE padding --}}
                                <div class="row g-4"> {{-- g-4 per un po’ di spazio tra le card --}}
                                    @foreach ($productChunk as $product)
                                        <div class="col-md-4 d-flex">
                                            <div class="card shadow-lg rounded border-0 w-100 d-flex flex-column"
                                                style="height: 100%; background-color: rgba(11,46,29,0.8);">
                                                <img src="{{ Storage::url($product->image_path) }}"
                                                    class="card-img-top" alt="{{ $product->name }}"
                                                    style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title font-weight-bold"
                                                        style="color: #d4af37; font-family: 'Playfair Display', serif;">
                                                        {{ $product->name }}
                                                    </h5>
                                                    <p class="card-text flex-grow-1" style="color: #c1b26a;">
                                                        {{ Str::limit($product->description, 100) }}
                                                    </p>
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mt-auto">
                                                        <p class="card-text mb-0"
                                                            style="color: #d4af37; font-weight: 700;">
                                                            €{{ number_format($product->price, 2) }}
                                                        </p>
                                                        <a href="{{ route('products.show', $product->id) }}"
                                                            class="btn btn-outline-warning btn-sm"
                                                            style="border-radius: 50px; font-weight: 700;">
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
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;">
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselProdotti"
                    data-bs-slide="next" style="width: 5%;">
                    <span class="carousel-control-next-icon" aria-hidden="true"
                        style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;">
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>






</x-layout>
