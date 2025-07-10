<div>
    {{-- Messaggio con auto-hide grazie a Alpine.js --}}
    @if ($message)
        <div 
            class="alert alert-info" 
            x-data="{ show: true }" 
            x-init="setTimeout(() => show = false, 3000)" 
            x-show="show"
        >
            {{ $message }}
        </div>
    @endif

    {{-- Filtro --}}
    <div class="mb-3">
        <button wire:click="setFilter('all')" class="btn btn-outline-primary btn-sm {{ $filter === 'all' ? 'active' : '' }}">
            Tutte
        </button>
        <button wire:click="setFilter('approved')" class="btn btn-outline-success btn-sm {{ $filter === 'approved' ? 'active' : '' }}">
            Pubblicate
        </button>
        <button wire:click="setFilter('unapproved')" class="btn btn-outline-warning btn-sm {{ $filter === 'unapproved' ? 'active' : '' }}">
            Non pubblicate
        </button>
    </div>

    {{-- Lista recensioni --}}
    @foreach ($reviews as $review)
        <div class="card mb-3" wire:key="review-{{ $review->id }}">
            <div class="card-body">
                <h5>
                    {{ $review->name }} —
                    <small>{!! str_repeat('⭐', $review->rating) !!}</small>
                </h5>
                <p>{{ $review->content }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    @if (!$review->is_approved)
                        <button wire:click="toggleApproval({{ $review->id }})" class="btn btn-sm btn-primary">
                            Pubblica
                        </button>
                    @else
                        <span class="badge bg-success">Pubblicata</span>
                    @endif

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
