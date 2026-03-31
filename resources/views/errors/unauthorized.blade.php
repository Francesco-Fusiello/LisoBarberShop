<x-layout>

    <!-- Backdrop -->
    <div class="zara-backdrop"></div>

    <!-- Modal -->
    <div class="zara-modal-wrapper">
        
        <div class="zara-modal">

            <div class="zara-header">
                <h2 class="zara-title">
                    ACCESSO RISERVATO
                </h2>
            </div>

            <div class="zara-body">
                <p class="zara-text">
                    Questa sezione è accessibile solo agli amministratori.
                </p>
            </div>

            <div class="zara-footer">
                <a href="{{ url('/') }}" class="zara-btn">
                    Torna alla home
                </a>
            </div>

        </div>

    </div>

</x-layout>