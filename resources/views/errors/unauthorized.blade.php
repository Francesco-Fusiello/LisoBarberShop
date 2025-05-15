<x-layout>
    <div class="container py-5 text-center">
        {{-- Contenuto opzionale --}}
    </div>

    <!-- Modale Bootstrap elegante -->
    <div class="modal fade show" id="unauthorizedModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg rounded-4 border-0">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title w-100 text-center">
                        <i class="bi bi-shield-lock-fill text-danger fs-3 me-2"></i>
                        <span class="text-danger">Accesso Riservato</span>
                    </h5>
                </div>
                <div class="modal-body text-center">
                    <p class="lead">Questa sezione è accessibile solo agli amministratori.</p>
                    <img src="https://cdn-icons-png.flaticon.com/512/595/595067.png" alt="Blocco accesso" width="100" class="my-3">
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">Torna alla Home</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Backdrop -->
    <div class="modal-backdrop fade show"></div>
</x-layout>
