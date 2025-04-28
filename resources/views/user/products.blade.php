<x-layout>
    <div class="p-6 max-w-6xl mx-auto">
      
       
        <!-- Prodotti -->
        <div class="container pt-5">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-lg rounded border-0 hover:scale-105 transition-transform duration-300" style="width: 100%; height: 100%;">
                            <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 300px; object-fit: cover; border-radius: 10px;">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-dark">{{ $product->name }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text text-dark"><strong>€{{ number_format($product->price, 2) }}</strong></p>
                                    <a href="#" class="btn btn-dark btn-sm" style="border-radius: 50px;">Acquista</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    
</x-layout>

