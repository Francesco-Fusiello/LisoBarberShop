<x-layout>
  <section style="background-color: #0b2e1d; font-family: 'Playfair Display', serif; color: #d4af37; min-height: 100vh;">

    {{-- Carousel immagini --}}
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false" data-bs-interval="4000" style="max-height: 600px; overflow: hidden;">
      <div class="carousel-inner">
        @foreach(['1.jpg', '2.jpg', '4.jpg'] as $index => $img)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <img src="/images/{{ $img }}" class="d-block w-100" alt="Image {{ $index + 1 }}" style="object-fit: cover; height: 600px;">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center" style="background: rgba(11,46,29,0.5); top: 0; bottom: 0; left: 0; right: 0;">
              @if($index === 0)
                <h1 class="display-3 fw-bold" style="color: #d4af37; text-shadow: 2px 2px 6px #000;">DEDICATO ALL’UOMO</h1>
                <h4 class="fst-italic" style="color: #e0c97a; text-shadow: 1px 1px 3px #000;">Innovazione, Interpretazione e Ricerca</h4>
              @endif
            </div>
          </div>
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="width: 5%;">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;"></span>
        <span class="visually-hidden">Previous</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="width: 5%;">
        <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(79%) sepia(68%) saturate(3384%) hue-rotate(6deg) brightness(98%) contrast(86%); background-color: transparent;"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    {{-- Descrizione sotto carousel --}}
    <div class="container py-5 text-center" style="font-family: 'Lato', sans-serif; color: #f0e6c8;">
      <h2 class="mb-3" style="color: #d4af37; font-weight: 700;">Per la bellezza e la cura dei capelli degli uomini</h2>
      <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
        Gli esperti di <strong style="color: #d4af37;">Liso Barber Shop</strong> propongono nel salone di Andria in viale Pietro Nenni, 324 numerosi tagli classici e moderni maschili, personalizzabili e di tendenza, ideali per sottolineare il fascino naturale di ciascun cliente. 
      </p>
      <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
        Sono disponibili inoltre trattamenti studiati per rinvigorire e nutrire la chioma o per contrastare il fenomeno della perdita dei capelli.
      </p>
      <p class="lead mx-auto" style="max-width: 700px; color: #c1b26a;">
        Gli esperti di <strong style="color: #d4af37;">Liso Barber Shop</strong> sono a completa disposizione per individuare la soluzione ideale per ritrovare capelli forti e sani in breve tempo.
      </p>

      <h3 class="mt-5" style="color: #d4af37; font-weight: 700; text-shadow: 1px 1px 2px #000;">
        Scarica la nostra app per prenotare subito il tuo appuntamento...
      </h3>

      <div class="d-flex justify-content-center align-items-center flex-wrap gap-4 mt-4">
        <a href="https://apps.apple.com/it/app/liso-barber-shop/id6502577739" target="_blank" class="btn btn-outline-warning shadow" style="font-weight: 700; border-radius: 8px; padding: 0.3rem 1rem;">
          <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/it-it?size=150x50" alt="App Store" style="height: 50px;">
        </a>
        <a href="https://play.google.com/store/search?q=liso+barber+shop&c=apps&hl=it" target="_blank" class="btn btn-outline-warning shadow" style="font-weight: 700; border-radius: 8px; padding: 0.3rem 1rem;">
          <img src="https://play.google.com/intl/en_us/badges/static/images/badges/it_badge_web_generic.png" alt="Google Play" style="height: 50px;">
        </a>
      </div>
    </div>

    {{-- Counter section --}}
    <section class="container my-5">
      <div class="row text-center text-warning">
        <div class="col-6 col-md-3 mb-4">
          <h3 class="display-6 fw-bold" style="text-shadow: 1px 1px 3px #000;">+800</h3>
          <p>Clienti Soddisfatti</p>
        </div>
        <div class="col-6 col-md-3 mb-4">
          <h3 class="display-6 fw-bold" style="text-shadow: 1px 1px 3px #000;">+1200</h3>
          <p>Tagli Eseguiti</p>
        </div>
        <div class="col-6 col-md-3 mb-4">
          <h3 class="display-6 fw-bold" style="text-shadow: 1px 1px 3px #000;">+15</h3>
          <p>Anni di Esperienza</p>
        </div>
        <div class="col-6 col-md-3 mb-4">
          <h3 class="display-6 fw-bold" style="text-shadow: 1px 1px 3px #000;">+500</h3>
          <p>Recensioni Positive</p>
        </div>
      </div>
    </section>

    {{-- Recensioni --}}
    <section class="container my-5" style="color: #d4af37;">
      <h2 class="text-center mb-4" style="font-family: 'Playfair Display', serif; font-weight: 700; text-shadow: 1px 1px 3px #000;">Cosa dicono di noi</h2>

      @if ($latestReviews->count())
      <div id="carouselRecensioni" class="carousel slide" data-bs-ride="carousel" style="max-width: 700px; margin: auto;">
        <div class="carousel-inner">
          @foreach ($latestReviews as $index => $review)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="card bg-black bg-opacity-75 shadow rounded-3 p-4">
              <h5 class="card-title mb-1" style="color: #e0c97a;">
                {{ $review->name }}
                <small class="float-end" style="color: #d4af37; font-size: 1.3rem;">
                  @for ($i = 0; $i < $review->rating; $i++) ★ @endfor
                  @for ($i = $review->rating; $i < 5; $i++) ☆ @endfor
                </small>
              </h5>
              <small class="fst-italic d-block mb-2" style="color: #aaa;">{{ $review->created_at->format('d M Y') }}</small>
              <p class="fst-italic" style="color: #ccc;">{{ $review->review }}</p>
            </div>
          </div>
          @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(90%) sepia(90%) saturate(300%) hue-rotate(20deg) brightness(95%) contrast(85%);"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(90%) sepia(90%) saturate(300%) hue-rotate(20deg) brightness(95%) contrast(85%);"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      @else
      <p class="text-center fst-italic">Nessuna recensione disponibile.</p>
      @endif
    </section>

    {{-- Carosello Prodotti --}}
    <section class="container my-5 text-center" style="color: #d4af37;">
      <h2 class="mb-4" style="font-family: 'Playfair Display', serif; font-weight: 700;">I Nostri Prodotti</h2>
      <div id="carouselProdotti" class="carousel slide" data-bs-ride="carousel" style="max-width: 900px; margin: auto;">
        <div class="carousel-inner">
          @foreach($products as $index => $product)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
            <div class="card bg-black bg-opacity-50 rounded-3 shadow p-3">
              <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
              <div class="card-body">
                <h5 class="card-title" style="color: #d4af37;">{{ $product->name }}</h5>
                <p class="card-text" style="color: #c1b26a;">{{ $product->description }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProdotti" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(90%) sepia(90%) saturate(300%) hue-rotate(20deg) brightness(95%) contrast(85%);"></span>
          <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselProdotti" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(90%) sepia(90%) saturate(300%) hue-rotate(20deg) brightness(95%) contrast(85%);"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

  </section>
</x-layout>
