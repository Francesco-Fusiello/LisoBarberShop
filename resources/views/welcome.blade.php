<x-layout>
  <div>
    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="\images\1.jpg" class="d-block w-100 h-100" alt="Image1">
        </div>
        <div class="carousel-item">
          <img src="\images\2.jpg" class="d-block w-100 h-100" alt="Image2">
        </div>
        <div class="carousel-item">
          <img src="\images\4.jpg" class="d-block w-100 h-100" alt="Image3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

  {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
    Registrazione
  </button>
   --}}
  <!-- Login Modal -->
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
            <form method="POST" action="/register">
                @csrf
                <div class="mb-3">
                    <label for="text" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror  
                </div>
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
                <div class="mb-3">
                    <label for="password" class="form-label">Password Confirmation</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="is_admin">Amministratore</label>
                    <input type="checkbox" name="is_admin" value="1"> Seleziona se amministratore
                </div>
               
                <button type="submit" class="btn btn-primary">Registrati</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

<div>
  <h1 class=" d-flex justify-content-center pt-5">
    DEDICATO ALL’UOMO
  </h1>
  <h3 class="d-flex justify-content-center pt-3">INNOVAZIONE, INTERPRETAZIONE E RICERCA</h3>
  <div class="container pt-5">
    <p>
      <b>Per la bellezza e la cura dei capelli degli uomini</b> gli esperti di <strong>Liso Barber Shop propongono nel salone di Andria in viale Pietro Nenni, 324</strong> numerosi <b>tagli classici e moderni maschili</b>, personalizzabili e di tendenza, ideali per sottolineare il fascino naturale di ciascun cliente. I parrucchieri del salone faranno attenzione alle diverse richieste, cercando di interpretare al meglio e con rapidità i desideri di ciascuno.
    </p>
    <p class="pt-3">
      Sono disponibili inoltre numerosi trattamenti studiati per <b>rinvigorire e nutrire</b> la chioma o <b>per contrastare il fenomeno della perdita dei capelli.</b> Gli esperti di <b>Liso Barber Shop</b> sono a completa disposizione per individuare insieme al cliente la soluzione ideale per <b>ritrovare capelli forti e sani in breve tempo.</b> 
    </p>
  </div>
</div>

 










</x-layout>