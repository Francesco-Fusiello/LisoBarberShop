<x-layout>

    <div class="py-5">
        <h1 class="text-center" style="font-size: 3.5rem; font-weight: 700; letter-spacing: 2px; color: #ffffff;">
            LA NOSTRA GALLERY
        </h1>

    </div>


    <div class="container">
        <div class="row gallery">
            @foreach ($images as $image)
                  <div class="col-4 col-md-4 col-lg-3 mb-2">
                    <img src="{{ asset($image->image_path) }}"class="img-fluid gallery-img cursor-pointer"
                        data-image="{{ asset($image->image_path) }}" data-bs-toggle="modal" data-bs-target="#imageModal">
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
