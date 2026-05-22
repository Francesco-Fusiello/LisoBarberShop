<x-layout>

<section class="tour-page">

    <div class="container">

        <div class="tour-hero text-center">

            <p class="tour-hero-label">
                WORLDWIDE EXPERIENCE
            </p>

            <h1 class="tour-hero-title">
                LISO ON TOUR
            </h1>

            <p class="tour-hero-text">
                Cutting hair worldwide with the identity of Liso Barber Shop.
            </p>

        </div>

        <div class="row g-5">

            @foreach($tourItems as $item)

                <div class="col-lg-6">

                    <div class="tour-card">

                        <img
                            src="{{ asset('storage/' . $item->image) }}"
                            alt=""
                        >

                        <div class="tour-card-info">

                            <p class="tour-location">
                                {{ $item->city }} — {{ $item->country }}
                            </p>

                            <span class="tour-year">
                                {{ $item->year }}
                            </span>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>

</x-layout>