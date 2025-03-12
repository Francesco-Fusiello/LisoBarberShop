<x-layout>
    <header class="container-fluid p-3 bg-dark text-center text-white">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">
                   Crea Categoria
                </h1>
            </div>
        </div>
    </header>


    @if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
      </div>
    @endif

    <form method="POST" action="{{route('shops.store')}}">
        @csrf
        <div class="mb-3 mt-5 ">
          <label class="form-label">Immagine del Prodotto</label>
          <input type="file" class="form-control" name="image">
          @error('image')
              {{$message}}
          @enderror
        </div>
       
        <div class="form-floating mt-2">
            <textarea class="form-control" name="title" style="height:150px"></textarea>
            <label for="floatingTextarea">Titolo</label>
            @error('title')
                {{$message}}
            @enderror
          </div>

          <div class="form-floating mt-2">
            <textarea class="form-control" name="price" style="height:150px"></textarea>
            <label for="floatingTextarea">Prezzo</label>
            @error('price')
                {{$message}}
            @enderror
          </div>
     
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>







</x-layout>