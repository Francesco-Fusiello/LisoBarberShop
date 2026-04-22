<x-layout>

@section('title', 'Gallery Liso Barber Shop ad Andria | Tagli, Barbe e Stile')
@section('meta_description',
    'Sfoglia la gallery di Liso Barber Shop ad Andria: stile, tagli uomo e cura dei dettagli.')

<div class="gallery-page" data-aos="fade-up">

    {{-- HEADER --}}
    <div class="gallery-header text-center">

        <h1 class="gallery-title">
            LA NOSTRA GALLERY
        </h1>

        <p class="gallery-subtitle">
            Stile • Precisione • Identità
        </p>

    </div>

    {{-- SOCIAL --}}
    <div class="social-section text-center">

        <div class="social-icons">

            <a href="https://www.instagram.com/lisobarbershop/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>

            <a href="https://www.facebook.com/lisogianfranco?locale=it_IT" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>

            <a href="https://www.tiktok.com/@lisobarbershop" target="_blank">
                <i class="fa-brands fa-tiktok"></i>
            </a>

            <a href="https://www.google.com/search?q=lisobarbershop" target="_blank">
                <i class="fa-brands fa-google"></i>
            </a>

        </div>

    </div>

    {{-- GALLERY --}}
    <div class="gallery-masonry container">

        @foreach ($images as $image)
            <div class="gallery-item">

                <img src="{{ asset($image->image_path) }}"
                     class="gallery-img"
                     data-bs-toggle="modal"
                     data-bs-target="#imageModal"
                     data-image="{{ asset($image->image_path) }}"
                     loading="lazy">

            </div>
        @endforeach

    </div>

</div>

{{-- MODAL --}}
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content custom-modal">

            <div class="modal-body text-center position-relative">

                <button class="nav-btn left" id="prevImage">‹</button>

                <img id="modalImage" class="modal-img">

                <button class="nav-btn right" id="nextImage">›</button>

            </div>

        </div>
    </div>
</div>

</x-layout>