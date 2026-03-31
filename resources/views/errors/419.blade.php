<x-layout>

    <div class="zara-error-backdrop"></div>

    <div class="zara-error-wrapper">

        <div class="zara-error-modal">

            <h2 class="zara-error-title">
                SESSIONE SCADUTA
            </h2>

            <p class="zara-error-text">
                La sessione è scaduta. Ricarica la pagina per continuare.
            </p>

            <a href="{{ url()->current() }}" class="zara-error-btn">
                RICARICA PAGINA
            </a>

        </div>

    </div>

</x-layout>