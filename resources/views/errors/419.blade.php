<x-layout>

    <!-- Backdrop -->
    <div class="zara-backdrop"></div>

    <!-- Modal -->
    <div class="zara-modal-wrapper">
        
        <div class="zara-modal">

            <div class="zara-header">
                <h2 class="zara-title">
                    SESSIONE SCADUTA
                </h2>
            </div>

            <div class="zara-body">
                <p class="zara-text">
                    La sessione è scaduta per inattività.  
                    Ricarica la pagina per continuare.
                </p>
            </div>

            <div class="zara-footer">
                <a href="{{ url()->current() }}" class="zara-btn">
                    Ricarica pagina
                </a>
            </div>

        </div>

    </div>

</x-layout>