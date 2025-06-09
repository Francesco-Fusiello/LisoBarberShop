<div>
  <div class="container">
    <h3 class="mb-4">Recensioni dei clienti</h3>

    @forelse ($reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $review->name }} — 
                    <small>{!! str_repeat('⭐', $review->rating) !!}</small>
                </h5>
                <p>{{ $review->content }}</p>
            </div>
        </div>
    @empty
        <p>Nessuna recensione disponibile.</p>
    @endforelse
</div>


</div>
