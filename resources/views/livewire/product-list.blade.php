<div class="row">
    @foreach($products as $product)
        <div class="col-md-4 mb-4 d-flex">
            <div class="card shadow-lg rounded border-0 w-100 d-flex flex-column" style="height: 100%;">
                <img src="{{ Storage::url($product->image_path) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 300px; object-fit: cover; border-radius: 10px 10px 0 0;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title font-weight-bold text-dark">{{ $product->name }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($product->description, 100) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <p class="card-text text-dark mb-0"><strong>€{{ number_format($product->price, 2) }}</strong></p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-dark btn-sm" style="border-radius: 50px;">Visualizza</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- Paginazione --}}
<div class="container pt-5">
    <div class="pagination-custom">
        {{ $products->links() }}
    </div>
</div>
