<x-layout>

    <section class="tour-page py-5">

        <div class="container py-4">

            {{-- Aggiunto un ID all'Hero per ancorare la primissima foto --}}
            <div class="tour-hero text-center mb-5 pb-3 mt-5" id="hero-section" data-aos="fade-down">
                <p class="tour-hero-label text-uppercase tracking-widest text-white fw-bold small mb-3">
                    WORLDWIDE EXPERIENCE
                </p>
                <h1 class="tour-hero-title display-2 fw-black tracking-tighter text-uppercase mb-3 text-white">
                    LISO ON TOUR
                </h1>
                <p class="tour-hero-text lead mx-auto text-white fw-medium mt-5" style="max-width: 500px;">
                    Cutting hair worldwide with the identity of Liso Barber Shop.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10">


                    <div class="row g-5 align-items-start">
                        @foreach ($tourItems as $item)
                            @php
                                // 0 per la sinistra (dispari), 250 per la destra (pari)
                                $delay = $loop->even ? '250' : '0';
                            @endphp

                            <div class="col-12 col-md-6 {{ $loop->even ? 'magazine-shift' : '' }} {{ $loop->iteration <= 2 ? 'anchor-trigger' : '' }}"
                                data-aos="fade-up" data-aos-delay="{{ $delay }}" data-aos-duration="800"
                                data-aos-offset="50">

                                <div class="polaroid-card">
                                    <div class="polaroid-img-frame">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            class="img-fluid w-100 polaroid-img" alt="{{ $item->city }}">
                                    </div>
                                    <div class="polaroid-footer">
                                        <p class="polaroid-location">{{ $item->city }} — {{ $item->country }}</p>
                                        <span class="polaroid-year-luxury">{{ $item->year }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>

        </div>

    </section>

</x-layout>
