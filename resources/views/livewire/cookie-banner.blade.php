<div 
    x-data="{ 
        show: localStorage.getItem('cookieAccepted') !== 'true'
    }"
    x-show="show"
    style="display:none;"
>

    <!-- Overlay -->
    <div 
        class="cookie-overlay"
    ></div>


    <!-- Banner -->
    <div
        x-transition:enter="cookie-enter"
        x-transition:enter-start="cookie-enter-start"
        x-transition:enter-end="cookie-enter-end"
        x-transition:leave="cookie-leave"
        x-transition:leave-start="cookie-leave-start"
        x-transition:leave-end="cookie-leave-end"
        class="cookie-banner"
    >

        <div class="cookie-box">

            <div class="cookie-content">

                <h3>
                    Cookie
                </h3>

                <p>
                    Utilizziamo i cookie per migliorare la tua esperienza sul sito.
                </p>

            </div>


            <button
                class="cookie-button"
                @click="
                    localStorage.setItem('cookieAccepted', 'true');
                    show = false;
                    document.body.style.overflow = '';
                "
            >
                Accetta
            </button>

        </div>

    </div>

</div>