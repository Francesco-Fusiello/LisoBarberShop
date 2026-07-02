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

                                $delay = $loop->iteration > 2 && $loop->even ? '250' : '0';
                            @endphp


                            <div class="col-12 col-md-6 {{ $loop->even ? 'magazine-shift' : '' }}" data-aos="fade-up"
                                data-aos-delay="{{ $delay }}" {!! $loop->iteration == 1 ? 'id="first-polaroid" data-aos-anchor="#hero-section"' : '' !!} {!! $loop->iteration == 2 ? 'id="second-polaroid"' : '' !!}>

                                <div class="polaroid-card shadow-lg">

                                    <div class="polaroid-img-frame overflow-hidden">
                                        <img src="{{ asset('storage/' . $item->image) }}"
                                            class="img-fluid w-100 polaroid-img" alt="{{ $item->city }}">
                                    </div>

                                    <div class="polaroid-footer d-flex justify-content-between align-items-center">
                                        <p class="polaroid-location text-uppercase tracking-luxury mb-0">
                                            {{ $item->city }} — {{ $item->country }}
                                        </p>
                                        <span class="polaroid-year-luxury">
                                            {{ $item->year }}
                                        </span>
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
