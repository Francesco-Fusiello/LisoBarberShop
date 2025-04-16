<x-layout>
   
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
        Area riservata
    </button>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6>Attenzione! Quetsa sezione è riservata solo agli amministratori!</h6>
                <h5 class="modal-title" id="loginModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" value="{{old('email')}}" required>
                        @error('email')
                        <span>{{$message}}</span>
                        @enderror  
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                        @error('password')
                        <span>{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
 
    {{-- <div class="container mt-3">
        @if(Auth::check() && Auth::user()->is_admin)
            <!-- Mostra il pulsante di accesso alla dashboard se l'utente è autenticato come admin -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary position-absolute top-0 end-0 m-3">Dashboard Admin</a>
        @elseif(!Auth::check())
            <!-- Mostra il pulsante di login solo se l'utente non è autenticato -->
            <a href="{{ route('admin.login') }}" class="btn btn-primary debug-btn position-absolute top-0 end-0 m-3">Accedi come Admin</a>
        @endif
        <p>{{ Auth::check() ? 'Utente autenticato' : 'Utente non autenticato' }}</p>
    </div> --}}
    <header>
        <img src="\images\11.jpg" alt="services" class="header-img py-5">
   </header>

<div class="container pt-5">
    <div class="row">
        @foreach($products as $product) 
            <div class="col-md-4 mb-4">
                <div class="card shadow rounded" style="width: 100%; height: 100%; transition: transform 0.3s ease;">
                    <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p> 
                        <p class="card-text"><strong>Prezzo:</strong> €{{ number_format($product->price, 2) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-layout>