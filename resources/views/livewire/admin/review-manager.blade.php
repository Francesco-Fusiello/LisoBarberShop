<div>
    <h3 class="mb-4">Gestione Recensioni</h3>

    @foreach ($reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $review->name }} — 
                    <small>{!! str_repeat('⭐', $review->rating) !!}</small>
                </h5>
                <p>{{ $review->content }}</p>

                <div class="d-flex justify-content-between">
                    <button wire:click="toggleApproval({{ $review->id }})" 
                            class="btn btn-sm {{ $review->is_approved ? 'btn-success' : 'btn-outline-secondary' }}">
                        {{ $review->is_approved ? 'Approvata' : 'Non approvata' }}
                    </button>

                    <button wire:click="deleteReview({{ $review->id }})" 
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Sei sicuro di voler eliminare questa recensione?')">
                        Elimina
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>
