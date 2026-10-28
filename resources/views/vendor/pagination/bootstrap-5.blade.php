
@if ($paginator->hasPages())
    <nav class="liso-pagination" aria-label="Navigazione prodotti">
        <a
            href="{{ $paginator->previousPageUrl() ?? '#' }}"
            class="liso-pagination-arrow {{ $paginator->onFirstPage() ? 'is-disabled' : '' }}"
            @if ($paginator->onFirstPage()) aria-disabled="true" tabindex="-1"
            @else rel="prev" @endif
            aria-label="Pagina precedente"
        >&larr;</a>

        <div class="liso-pagination-pages">
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="liso-pagination-dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="liso-pagination-number is-active" aria-current="page">
                                {{ sprintf('%02d', $page) }}
                            </span>
                        @else
                            <a class="liso-pagination-number" href="{{ $url }}">
                                {{ sprintf('%02d', $page) }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        <a
            href="{{ $paginator->nextPageUrl() ?? '#' }}"
            class="liso-pagination-arrow {{ !$paginator->hasMorePages() ? 'is-disabled' : '' }}"
            @if (!$paginator->hasMorePages()) aria-disabled="true" tabindex="-1"
            @else rel="next" @endif
            aria-label="Pagina successiva"
        >&rarr;</a>
    </nav>
@endif

