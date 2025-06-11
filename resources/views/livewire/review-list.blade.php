<div>
  <div class="container py-5" style="max-width: 720px;">

    <h3 class="mb-4 text-center" style="font-weight: 600; font-size: 1.8rem; color: #222;">
      Recensioni dei clienti
    </h3>

    @forelse ($reviews as $review)
      <div class="mb-4 p-4 rounded shadow-sm" style="background-color: #f9f9f9; border-left: 4px solid #333;">
        <div class="d-flex justify-content-between align-items-start flex-wrap">
          <div>
            <h5 class="mb-1" style="font-weight: 600; color: #111; font-size: 1.1rem; min-width: 150px;">
              {{ $review->name }}
            </h5>
            <small style="color: #888; font-size: 0.85rem;">
              {{ $review->created_at->format('d M Y') }}
            </small>
          </div>
          <div style="color: #ffb400; font-size: 1.2rem;">
            {!! str_repeat('&#9733;', $review->rating) !!}
            {!! str_repeat('&#9734;', 5 - $review->rating) !!}
          </div>
        </div>
        <p style="color: #444; font-size: 1rem; line-height: 1.4; margin-top: 0.5rem;">
          {{ $review->content }}
        </p>
      </div>
    @empty
      <p class="text-center" style="color: #666;">Nessuna recensione disponibile.</p>
    @endforelse

  </div>
</div>
