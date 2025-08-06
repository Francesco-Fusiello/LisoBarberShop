<div>
    {{-- Messaggio con auto-hide grazie a Alpine.js --}}
    @if ($message)
        <div class="alert alert-info" x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show">
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

    {{-- Tabella recensioni --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Valutazione</th>
                    <th>Recensione</th>
                    <th>Stato</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                    <tr wire:key="review-{{ $review->id }}">
                        <td>{{ $review->name }}</td>
                        <td>{!! str_repeat('⭐', $review->rating) !!}</td>
                        <td>
                            <span 
                                class="d-inline-block text-truncate" 
                                style="max-width: 250px;" 
                                data-bs-toggle="tooltip" 
                                data-bs-placement="top" 
                                title="{{ $review->content }}">
                                {{ Str::limit($review->content, 60) }}
                            </span>
                        </td>
                        <td>
                            @if ($review->is_approved)
                                <span class="badge bg-success">Pubblicata</span>
                            @else
                                <span class="badge bg-warning text-dark">Non pubblicata</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if (!$review->is_approved)
                                    <button wire:click="toggleApproval({{ $review->id }})" class="btn btn-sm btn-success">
                                        Pubblica
                                    </button>
                                @endif

                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                                    wire:click="$set('reviewToDelete', {{ $review->id }})">
                                    Elimina
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Nessuna recensione trovata.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modale conferma eliminazione --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmDeleteLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare questa recensione?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmDelete" data-bs-dismiss="modal">
                        Elimina
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
