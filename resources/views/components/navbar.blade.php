<nav class="navbar navbar-expand-lg bg-white sticky">
  <div class="container-fluid btn">
    
  <button type="button"  data-bs-toggle="modal" data-bs-target="#loginModal" style="border: none;outline: none; background: none;">
    <img src="/images/3.jpg" style="width:120px;" alt="Logo sito">
  </button>
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Servizi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('priceList') ? 'active' : '' }}" href="{{ route('priceList') }}">Listino</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}" href="{{ route('products') }}">Prodotti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="#">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('chi-siamo') ? 'active' : '' }}" href="#">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contatti') ? 'active' : '' }}" href="#">Contatti</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>
