<div>
 <div>
  <div class="container py-5">
    <h3 class="mb-4 text-center" style="font-weight: 600; font-size: 1.8rem; color: #222;">
      Recensioni dei clienti
    </h3>

    <div class="reviews-grid">
      @forelse ($reviews as $index => $review)
        <div class="review-card" style="animation-delay: {{ $index * 0.5 }}s;">
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
</div>


 <style>
  .reviews-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.5rem;
    max-width: 1140px;
    margin: auto;
  }

  .review-card {
    background-color: #f9f9f9;
    border-left: 4px solid #333;
    padding: 1rem;
    border-radius: 0.5rem;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease forwards;
  }

  @keyframes fadeInUp {
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Responsive: 1 col on small screens */
  @media (max-width: 768px) {
    .reviews-grid {
      grid-template-columns: 1fr;
      max-width: 100%;
      padding: 0 1rem;
    }
  }
</style>

</div>

