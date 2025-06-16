<div>
    <input 
        type="text" 
        class="form-control mb-3" 
        placeholder="Cerca prodotto..." 
        wire:model.debounce.300ms="search"
    >

    @if($products->isEmpty())
        <p>Nessun prodotto trovato.</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                           
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
