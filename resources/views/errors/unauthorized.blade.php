<x-layout>

    <div class="zara-error-backdrop"></div>

    <div class="zara-error-wrapper">

        <div class="zara-error-modal">

            <div class="zara-error-header">
                <h2 class="zara-error-title">
                    ACCESSO RISERVATO
                </h2>
            </div>

            <div class="zara-error-body">
                <p class="zara-error-text">
                    Questa sezione è accessibile solo agli amministratori.
                </p>
            </div>

            <div class="zara-error-footer">
                <a href="{{ url('/') }}" class="zara-error-btn">
                    Torna alla home
                </a>
            </div>

        </div>

    </div>

</x-layout>