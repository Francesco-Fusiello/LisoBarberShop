<x-layout>
    <div class="container py-4">
        <div class="row">
            @foreach($images as $image)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                    <img 
                        src="{{ asset($image->image_path) }}" 
                        class="img-fluid rounded shadow-sm cursor-pointer" 
                        style="cursor: pointer;" 
                        data-image="{{ asset($image->image_path) }}" 
                        data-bs-toggle="modal" 
                        data-bs-target="#imageModal"
                    >
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-dark text-white">
          <div class="modal-body text-center position-relative">
            <button type="button" class="btn btn-light position-absolute top-50 start-0 translate-middle-y" id="prevImage">
                ‹
            </button>
            <img id="modalImage" class="img-fluid rounded" alt="Immagine selezionata">
            <button type="button" class="btn btn-light position-absolute top-50 end-0 translate-middle-y" id="nextImage">
                ›
            </button>
          </div>
        </div>
      </div>
    </div>
    
</x-layout>
