<div class="container py-5">
  <h3 class="mb-4 text-center" style="font-weight: 600; font-size: 1.8rem; color: #d4af37; font-family: 'Playfair Display', serif;">
    Recensioni dei clienti
  </h3>

  <div class="reviews-grid">
    @forelse ($reviews as $index => $review)
      <div class="review-card" style="animation-delay: {{ $index * 0.4 }}s;">
        <div class="d-flex justify-content-between align-items-start flex-wrap">
          <div>
            <h5 class="mb-1">{{ $review->name }}</h5>
            <small>{{ $review->created_at->format('d M Y') }}</small>
          </div>
          <div class="stars">
            {!! str_repeat('&#9733;', $review->rating) !!}
            {!! str_repeat('&#9734;', 5 - $review->rating) !!}
          </div>
        </div>
        <p class="review-content">{{ $review->content }}</p>
      </div>
    @empty
      <p class="text-center" style="color: #666;">Nessuna recensione disponibile.</p>
    @endforelse
  </div>
</div>
