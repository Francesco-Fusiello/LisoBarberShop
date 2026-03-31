<nav class="navbar navbar-expand-lg bg-white sticky">
    <div class="container-fluid">

        {{-- Bottone logo che apre il modal login --}}
        <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal"
            style="border: none; outline: none; background: none;">
            <img src="{{ asset('images/3.jpg') }}" style="width:120px;" alt="Logo sito">
        </button>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                        href="{{ route('services') }}">Servizi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('priceList') ? 'active' : '' }}"
                        href="{{ route('priceList') }}">Listino</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}"
                        href="{{ route('products') }}">Prodotti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('user.gallery') ? 'active' : '' }}"
                        href="{{ route('user.gallery') }}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('chiSiamo') ? 'active' : '' }}"
                        href="{{ route('chiSiamo') }}">Chi Siamo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contatti') ? 'active' : '' }}"
                        href="{{ route('contatti') }}">Contatti</a>
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

{{-- Modal login --}}
<div class="modal fade zara-modal" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content zara-modal-content">

            <div class="modal-header border-0">
                <h5 class="modal-title zara-title">ACCEDI</h5>
                <button type="button" class="btn-close zara-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="zara-group">
                        <input type="email" name="email" value="{{ old('email') }}" required>
                        <label>Email</label>
                        <span class="zara-line"></span>
                        @error('email')
                            <small class="zara-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="zara-group">
                        <input type="password" name="password" required>
                        <label>Password</label>
                        <span class="zara-line"></span>
                        @error('password')
                            <small class="zara-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="zara-btn">ACCEDI</button>
                </form>

            </div>

        </div>
    </div>
</div>