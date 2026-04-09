<x-layout-error>

    <div class="zara-error-backdrop"></div>

    <div class="zara-error-wrapper">

        <div class="zara-error-modal">

            <div class="zara-error-header">
                <h2 class="zara-error-title">
                    Errore del server
                </h2>
            </div>

            <div class="zara-error-body">
                <p class="zara-error-text">
                    Si è verificato un problema interno. Riprova più tardi.
                </p>
            </div>

            <div class="zara-error-footer">
                <a href="{{ url('/') }}" class="zara-error-btn">
                    Torna alla home
                </a>
            </div>

        </div>

    </div>

</x-layout-error>
