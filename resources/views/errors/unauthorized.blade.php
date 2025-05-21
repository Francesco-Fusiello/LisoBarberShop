<x-layout>
    <!-- Backdrop -->
    <div class="modal-backdrop fade show"></div>

    <!-- Modale statica già visibile -->
    <div class="modal fade show d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content text-center border-0 shadow-lg">
                <div class="modal-header border-0 justify-content-center">
                    <h1 class="text-danger">
                        <i class="bi bi-lock-fill me-2"></i>Accesso Riservato
                    </h1>
                </div>
                <div class="modal-body">
                    <p class="lead">Questa sezione è accessibile solo agli Amministratori.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <a href="{{ url('/') }}" class="btn btn-danger px-4">Torna alla Home</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>
