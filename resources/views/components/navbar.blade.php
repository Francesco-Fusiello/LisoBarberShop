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
          <a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{  route('user.gallery') }}">Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('chi-siamo') ? 'active' : '' }}" href="{{  route('chiSiamo') }}">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('contatti') ? 'active' : '' }}" href="#">Contatti</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Registrazione</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
      <div class="modal-body">
        <form method="POST" action="{{ route('login') }}">
              @csrf
              
              <div class="mb-3">
                  <label for="email" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                  @error('email')
                  <span>{{$message}}</span>
                  @enderror  
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" required>
                  @error('password')
                  <span>{{$message}}</span>
                  @enderror
              </div>
             
              <button type="submit" class="btn btn-primary">Accedi</button>
          </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
  </div>
</div>
</div>