<x-layout>

    <section class="py-5" style="background-color: #ffffff; font-family: 'Playfair Display', serif; color: #333;"
        data-aos="fade-up">

        <div class="container">

            <!-- HEADER -->
            <div class="text-center mb-5">

                <h1 class="text-center gallery-title">
                    IL NOSTRO LISTINO PREZZI
                </h1>

                <p class="gallery-subtitle">
                    Stile • Precisione • Identità
                </p>

            </div>


            <!-- LISTINO -->
            <div class="row justify-content-center">

                <div class="col-md-12 col-lg-8">

                    <div class="list-group shadow-sm">

                        @foreach ($services as $service)
                            <div class="list-group-item d-flex justify-content-between align-items-center price-item bg-white mb-2 shadow-sm"
                                style="border: 1px solid #fff; border-radius: 0; transition: all 0.3s ease; color:#000">

                                <span>
                                    {{ $service->name }}
                                </span>

                                <strong>
                                    da {{ $service->price }}€
                                </strong>

                            </div>
                        @endforeach

                    </div>


                    <!-- APP SECTION -->

                    <div class="text-center mt-5 pt-4 mb-4">

                        <h2
                            style="font-family: 'Playfair Display', serif;
                                   color: #fff;
                                   font-weight: 700;
                                   text-transform: uppercase;
                                   letter-spacing: 3px;">

                            Liso Barber Shop

                        </h2>

                        <div class="luxury-hr-line bg-white"></div>

                        <p
                            style="font-family: 'Lato', sans-serif;
                                   color: #fff;
                                   font-size: 1rem;
                                   font-weight: 300;
                                   letter-spacing: 1px;
                                   margin-top: 20px;">

                            Prenota il tuo appuntamento direttamente dalla nostra app.

                        </p>

                    </div>


                    <!-- APP BADGES -->

                    <div class="app-badges d-flex justify-content-center align-items-center flex-wrap gap-4">

                        <a href="https://apps.apple.com/it/app/liso-barber-shop/id6502577739" target="_blank"
                            class="store-badge">

                            <img src="https://tools.applemediaservices.com/api/badges/download-on-the-app-store/black/it-it?size=150x50"
                                alt="Scarica Liso Barber Shop su App Store">

                        </a>


                        <a href="https://play.google.com/store/search?q=liso+barber+shop&c=apps&hl=it" target="_blank"
                            class="store-badge">

                            <img src="https://play.google.com/intl/en_us/badges/static/images/badges/it_badge_web_generic.png"
                                alt="Scarica Liso Barber Shop su Google Play">

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <style>
        /* ========================================
           HOVER PREZZI
        ======================================== */

        .price-item:hover {
            background-color: #e0e0e0;
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
