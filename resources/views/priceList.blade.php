<x-layout>
    <section class="py-5" style="background-color: #ffffff; font-family: 'Playfair Display', serif; color: #333;">
        <div class="container">
            <div class="text-center mb-5">
                <h1 style="font-size: 3.5rem; font-weight: 700; letter-spacing: 2px; color: #ffffff;">
                    Listino Prezzi
                </h1>
                <h4 class="fst-italic" style="color: #ffffff;">Scopri i nostri Servizi</h4>
                <p class="fst-italic fs-5" style="color: #ffffff;">
                    Benvenuti da Liso Barber Shop, dove la bellezza incontra l’eccellenza! Il nostro team di professionisti
                    è qui per offrirti servizi di alta qualità, personalizzati per soddisfare le tue esigenze. Scopri il nostro listino prezzi e regalati un’esperienza indimenticabile.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="list-group shadow-sm">
                        @foreach ([
                            ['Taglio', '12€'],
                            ['Taglio Baby (0-7 anni)', '10€'],
                            ['Rasatura a 0', '7€'],
                            ['Colore', '80€'],
                            ['Taglio e Shampoo', '17€'],
                            ['Taglio e Barba', '19€'],
                            ['Barba', '7€'],
                            ['Barba Relax (barba hipster con vapore e panno caldo)', '14€'],
                            ['Pulizia Viso', '15€'],
                            ['Taglio + Shampoo + Barba', '24€'],
                            ['Completo', '26€'],
                            ['Colore Barba', '13€'],
                            ['Meches Capelli', '25€'],
                            ['Taglio e Sopracciglia', '16€'],
                        ] as $service)
                            <div class="list-group-item d-flex justify-content-between align-items-center price-item bg-light mb-2 shadow-sm" 
                                 style="border: 1px solid #ddd; border-radius: 0; transition: all 0.3s ease; color:#000">
                                <span>{{ $service[0] }}</span>
                                <strong>{{ $service[1] }}</strong>
                            </div>
                        @endforeach
                    </div>

                    <h4 class="text-center mt-5 fs-5" style="color: #ffffff;">
                        I nostri servizi sono pensati per offrire sempre il massimo della qualità e dello stile.
                    </h4>
                </div>
            </div>

            <div class="row justify-content-center text-center mt-5">
                <div class="col-lg-10">
                    <h2 class="pt-3 fst-italic" style="color: #ffffff;">Che Aspetti!!!</h2>
                    <h2 class="fst-italic" style="color: #ffffff;">Scarica la nostra app per prenotare subito il tuo appuntamento...</h2>
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-wrap gap-3 mt-4">
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
    </section>

    <style>
        /* Hover minimal sui box dei prezzi */
        .price-item:hover {
            background-color: #e0e0e0; /* grigio leggermente più scuro */
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .price-item span,
        .price-item strong {
            transition: color 0.3s ease;
        }

        .price-item:hover span,
        .price-item:hover strong {
            color: #000;
        }
    </style>
</x-layout>
