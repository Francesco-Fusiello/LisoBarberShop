<x-layout>

    <div class="py-3">
        <h1 class="text-center" style="font-size: 3.5rem; font-weight: 700; letter-spacing: 2px; color: #ffffff;">
            LA NOSTRA GALLERY
        </h1>
    </div>

    <div class="social-section text-center mt-3">
    <p class="social-text fst-italic text-white mb-2">
        Seguici sui nostri canali social per rimanere sempre connesso!
    </p>

    <!-- Icone sempre in fila -->
    <div class="social-icons d-flex justify-content-center align-items-center gap-3">
        <a href="https://www.instagram.com/lisobarbershop/" target="_blank" aria-label="Instagram" class="social-icon instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>

        <a href="https://www.facebook.com/lisogianfranco?locale=it_IT" target="_blank" aria-label="Facebook" class="social-icon facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="https://www.tiktok.com/@lisobarbershop?lang=it" target="_blank" aria-label="TikTok" class="social-icon tiktok">
            <i class="fa-brands fa-tiktok"></i>
        </a>

        <a href="https://www.google.com/search?q=lisobarbershop" target="_blank" aria-label="Google" class="social-icon google">
            <i class="fa-brands fa-google"></i>
        </a>
    </div>
</div>




    <div class="container">
        <div class="row gallery">
            @foreach ($images as $image)
                <div class="col-4 col-md-4 col-lg-3 mb-2">
                    <img src="{{ asset($image->image_path) }}"class="img-fluid gallery-img cursor-pointer"
                        data-image="{{ asset($image->image_path) }}" data-bs-toggle="modal"
                        data-bs-target="#imageModal">
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-body text-center position-relative">
                    <button type="button" class="btn btn-light position-absolute top-50 start-0 translate-middle-y"
                        id="prevImage">
                        ‹
                    </button>
                    <img id="modalImage" class="img-fluid rounded"
                        style="max-height: 80vh; max-width: 100%; object-fit: contain;" alt="Immagine selezionata">
                    <button type="button" class="btn btn-light position-absolute top-50 end-0 translate-middle-y"
                        id="nextImage">
                        ›
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
