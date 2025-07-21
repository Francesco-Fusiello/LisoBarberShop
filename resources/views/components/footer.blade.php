<footer style="background:#000; color:#D9C59B; padding:4rem 1rem; font-family: 'Lato', sans-serif;">
  <div style="max-width:1200px; margin:auto; display:flex; flex-wrap:wrap; justify-content:space-between; gap:3rem;">

    <!-- Logo & Descrizione -->
    <div style="flex:1 1 300px; min-width:280px;">
      <img src="{{ asset('images/3.jpg') }}" alt="Logo" style="width:160px; margin-bottom:1rem;">
      <p style="opacity:0.85; font-size:1rem; line-height:1.6; color:#C9B48F;">
        Liso Barber Shop – Tradizione e stile, cura e passione per un look che parla di te.
      </p>
    </div>

    <!-- Link Utili -->
    <div style="flex:1 1 200px; min-width:180px;">
      <h3 style="font-weight:700; font-size:1.3rem; margin-bottom:1rem; color:#D9C59B;">Link Utili</h3>
      <ul style="list-style:none; padding:0; margin:0; font-size:1rem;">
        <li style="margin-bottom:0.6rem;">
          <a href="{{ route('home') }}" style="color:#D9C59B; text-decoration:none; transition:color 0.3s ease;">Home</a>
        </li>
        <li style="margin-bottom:0.6rem;">
          <a href="{{ route('services') }}" style="color:#D9C59B; text-decoration:none; transition:color 0.3s ease;">Servizi</a>
        </li>
        <li style="margin-bottom:0.6rem;">
          <a href="{{ route('priceList') }}" style="color:#D9C59B; text-decoration:none; transition:color 0.3s ease;">Listino</a>
        </li>
        <li>
          <a href="{{ route('contatti') }}" style="color:#D9C59B; text-decoration:none; transition:color 0.3s ease;">Contatti</a>
        </li>
      </ul>
    </div>

    <!-- Contatti -->
    <div style="flex:1 1 260px; min-width:220px;">
      <h3 style="font-weight:700; font-size:1.3rem; margin-bottom:1rem; color:#D9C59B;">Contatti</h3>
      <p style="font-size:1rem; line-height:1.6; color:#C9B48F;">
        Via Roma 123, Napoli<br>
        Tel: +39 081 1234567<br>
        Email: info@lisobarbershop.it
      </p>
    </div>

    <!-- Social -->
    <div style="flex:1 1 220px; min-width:180px; display:flex; flex-direction:column; align-items:center;">
      <h3 style="font-weight:700; font-size:1.3rem; margin-bottom:1rem; color:#D9C59B;">Seguici</h3>
      <div style="display:flex; gap:1.5rem;">

        <!-- Instagram -->
        <a href="https://www.instagram.com/tuoprofilo" target="_blank" aria-label="Instagram" style="display:inline-block; width:36px; height:36px; transition: transform 0.3s ease;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#E1306C" style="width:100%; height:100%;">
            <path d="M7.75 2C4.11 2 2 4.11 2 7.75v8.5C2 19.89 4.11 22 7.75 22h8.5c3.64 0 5.75-2.11 5.75-5.75v-8.5C22 4.11 19.89 2 16.25 2h-8.5zm0 2h8.5c2.02 0 3.75 1.73 3.75 3.75v8.5c0 2.02-1.73 3.75-3.75 3.75h-8.5c-2.02 0-3.75-1.73-3.75-3.75v-8.5c0-2.02 1.73-3.75 3.75-3.75z"/>
            <path d="M12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
            <circle cx="17.5" cy="6.5" r="1.5" fill="#E1306C"/>
          </svg>
        </a>

        <!-- Facebook -->
        <a href="https://www.facebook.com/tuoprofilo" target="_blank" aria-label="Facebook" style="display:inline-block; width:36px; height:36px; transition: transform 0.3s ease;">
          <svg xmlns="http://www.w3.org/2000/svg" fill="#1877F2" viewBox="0 0 24 24" style="width:100%; height:100%;">
            <path d="M22.675 0H1.325C.593 0 0 .593 0 1.326v21.348C0 23.406.593 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24h-1.918c-1.504 0-1.796.715-1.796 1.764v2.313h3.587l-.467 3.622h-3.12V24h6.116c.73 0 1.324-.594 1.324-1.326V1.326C24 .593 23.406 0 22.675 0z"/>
          </svg>
        </a>

        <!-- TikTok bianca -->
        <a href="https://www.tiktok.com/@tuoprofilo" target="_blank" aria-label="TikTok" style="display:inline-block; width:36px; height:36px; transition: transform 0.3s ease;">
          <svg xmlns="http://www.w3.org/2000/svg" fill="#FFF" viewBox="0 0 24 24" style="width:100%; height:100%;">
            <path d="M9.75 3.083v14.556a4.5 4.5 0 1 1-4.5-4.5"/>
            <path d="M14.812 3.75a6.375 6.375 0 0 0 3.814 1.416v2.806a9.75 9.75 0 0 1-3.5-1.028v10.1a4.5 4.5 0 1 1-4.5-4.5"/>
          </svg>
        </a>

        <!-- Google -->
        <a href="https://g.page/tuoprofilo" target="_blank" aria-label="Google" style="display:inline-block; width:36px; height:36px; transition: transform 0.3s ease;">
          <svg xmlns="http://www.w3.org/2000/svg" fill="#4285F4" viewBox="0 0 24 24" style="width:100%; height:100%;">
            <path d="M21.805 10.023h-9.427v3.975h5.918c-.255 1.47-1.648 4.309-5.918 4.309-3.566 0-6.47-2.958-6.47-6.59s2.903-6.59 6.47-6.59c2.034 0 3.395.873 4.182 1.63l2.847-2.73C17.838 5.06 15.77 4.125 13.06 4.125 7.34 4.125 3 8.722 3 14.334s4.34 10.208 10.06 10.208c5.8 0 9.67-4.067 9.67-9.8 0-.665-.075-1.1-.924-4.718z"/>
          </svg>
        </a>

      </div>
    </div>
  </div>

  <div style="text-align:center; margin-top:3rem; font-size:0.85rem; color:#C9B48F; opacity:0.9;">
    © {{ date('Y') }} Liso Barber Shop. Tutti i diritti riservati.<br>
    Realizzato con <span style="color:#D9C59B;">❤️</span> da 
    <a href="https://webdesignstudiopro.it" target="_blank" style="color:#D9C59B; text-decoration:none; font-weight:600;">
      WebDesign Studio Pro
    </a>
  </div>

  <style>
    footer a {
      transition: transform 0.3s ease;
      display: inline-block;
    }
    footer a:hover {
      transform: scale(1.15);
      color: #fff !important;
    }
    @media (max-width: 767.98px) {
      footer div[style*="flex-wrap"] {
        flex-direction: column !important;
        align-items: center !important;
        text-align: center !important;
      }
      footer div[style*="flex-wrap"] > div {
        min-width: auto !important;
        margin-bottom: 2rem;
      }
    }
  </style>
</footer>
