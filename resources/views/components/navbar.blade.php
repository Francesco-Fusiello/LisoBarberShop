<nav class="navbar navbar-expand-lg bg-white sticky">
  <div class="container-fluid">

    
    <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" style="border: none; outline: none; background: none;">
      <img src="/images/3.jpg" style="width:120px;" alt="Logo sito">
    </button>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
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
          <a class="nav-link {{ request()->routeIs('user.gallery') ? 'active' : '' }}" href="{{ route('user.gallery') }}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('chiSiamo') ? 'active' : '' }}" href="{{ route('chiSiamo') }}">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contatti') ? 'active' : '' }}" href="{{ route('contatti') }}">Contatti</a>
        </li>

       
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="userDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Esci</button>
                </form>
              </li>
            </ul>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Accedi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
      </div>

      <div class="modal-body">
        @if (session()->has('message'))
          <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if(session('errors') && session('errors')->has('email'))
          <div class="alert alert-danger">{{ session('errors')->first('email') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" required>
            @error('password')
              <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary w-100">Accedi</button>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
      </div>
    </div>
  </div>
</div>
