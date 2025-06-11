<x-layout>
  <div>
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="\images\1.jpg" class="d-block w-100 h-100" alt="Image1">
        </div>
        <div class="carousel-item">
          <img src="\images\2.jpg" class="d-block w-100 h-100" alt="Image2">
        </div>
        <div class="carousel-item">
          <img src="\images\4.jpg" class="d-block w-100 h-100" alt="Image3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  <div class="container pt-5">
    <div class="row justify-content-center text-center">
      <div class="col-lg-10">
        <h1 class="pt-5">
          <b>DEDICATO ALL’UOMO</b>
        </h1>
        <h3 class="pt-3">
          INNOVAZIONE, INTERPRETAZIONE E RICERCA
        </h3>
  
        <h5 class="pt-5">
          <b>Per la bellezza e la cura dei capelli degli uomini</b> gli esperti di 
          <strong>Liso Barber Shop propongono nel salone di Andria in viale Pietro Nenni, 324</strong> 
          numerosi <b>tagli classici e moderni maschili</b>, personalizzabili e di tendenza, ideali per 
          sottolineare il fascino naturale di ciascun cliente. I parrucchieri del salone faranno 
          attenzione alle diverse richieste, cercando di interpretare al meglio e con rapidità i 
          desideri di ciascuno.
        </h5>
  
        <h5 class="pt-3">
          Sono disponibili inoltre numerosi trattamenti studiati per <b>rinvigorire e nutrire</b> la 
          chioma o <b>per contrastare il fenomeno della perdita dei capelli.</b> Gli esperti di 
          <b>Liso Barber Shop</b> sono a completa disposizione per individuare insieme al cliente la 
          soluzione ideale per <b>ritrovare capelli forti e sani in breve tempo.</b> 
        </h5>
  
        <h3 class="pt-5">
          Scarica la nostra app per prenotare subito il tuo appuntamento...
        </h3>
      </div>
    </div>
  </div>

    
    <div style="display: flex; justify-content: center; align-items: center; gap: 20px; flex-wrap: wrap; margin-top: 20px;">
      <!-- Badge App Store -->
      <a href="https://apps.apple.com/it/app/liso-barber-shop/id6502577739" target="_blank">
          <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/it-it?size=250x83" 
               alt="Scarica su App Store" 
               style="height: 60px; max-width: 100%;">
      </a>
      
      <!-- Badge Google Play -->
      <a href="https://play.google.com/store/search?q=liso+barber+shop&c=apps&hl=it" target="_blank">
          <img src="https://play.google.com/intl/en_us/badges/static/images/badges/it_badge_web_generic.png" 
               alt="Disponibile su Google Play" 
               style="height: 78px; max-width: 100%;">
      </a>
  </div>
  </div>
</div>

<div id="counter" style="font-size: 48px; margin-top: 600px; text-align: center; color: #488B49;">
  <p style="margin: 0; font-size: 20px;">Clienti Soddisfatti</p>
  <span>+<span id="counter-number">0</span></span>
</div>

{{-- Recensioni --}}

<div class="container my-5">
    <h2 class="text-center mb-4 text-success">Cosa dicono di noi</h2>

    @if ($latestReviews->count())
        <div id="carouselRecensioni" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($latestReviews as $index => $review)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="card mx-auto shadow-sm p-4" style="max-width: 600px; border-left: 5px solid #198754;">
                            <h5 class="card-title text-dark mb-2">
                                {{ $review->name }}
                                <small class="text-warning float-end">
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        ★
                                    @endfor
                                    @for ($i = $review->rating; $i < 5; $i++)
                                        ☆
                                    @endfor
                                </small>
                            </h5>
                            <p class="card-text text-muted fst-italic">"{{ $review->content }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Precedente</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselRecensioni" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Successivo</span>
            </button>
        </div>
    @else
        <p class="text-center text-muted">Ancora nessuna recensione.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ route('recensioni.form') }}" class="btn btn-success me-2">Aggiungi Recensione</a>
        <a href="{{ route('recensioni.index') }}" class="btn btn-outline-dark">Mostra Tutte</a>
    </div>
</div>

{{-- Carousel Prodotti --}}





    


 










</x-layout>