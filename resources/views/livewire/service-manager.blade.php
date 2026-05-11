<div> {{-- RADICE UNICA Livewire --}}

    @if (session()->has('message'))
        <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
            <span>✅</span>
            <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
        </div>
    @endif

    <button wire:click="create" class="btn btn-success mb-3">+ Nuovo Servizio</button>

    <div class="table-responsive">
        <form wire:submit.prevent="save">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Servizio</th>
                        <th>Prezzo</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- RIGA CREAZIONE --}}
                    @if($creating)
                        <tr>
                            <td><input wire:model.defer="name" class="form-control" placeholder="Nome servizio"></td>
                            <td><input wire:model.defer="price" type="number" class="form-control" placeholder="Prezzo">€</td>
                            <td class="d-flex gap-2 flex-wrap">
                                <button type="submit" class="btn btn-success btn-sm flex-grow-1">Salva</button>
                                <button type="button" wire:click="resetForm" class="btn btn-secondary btn-sm flex-grow-1">Annulla</button>
                            </td>
                        </tr>
                    @endif

                    @foreach($services as $service)
                        <tr wire:key="service-{{ $service->id }}">
                            <td>
                                @if($editingServiceId === $service->id)
                                    <input wire:model.defer="name" class="form-control">
                                @else
                                    {{ $service->name }}
                                @endif
                            </td>
                            <td>
                                @if($editingServiceId === $service->id)
                                    <input wire:model.defer="price" class="form-control">
                                @else
                                    {{ $service->price }}€
                                @endif
                            </td>
                            <td class="d-flex gap-2 flex-wrap">
                                @if($editingServiceId === $service->id)
                                    <button type="submit" class="btn btn-success btn-sm flex-grow-1">Salva</button>
                                @else
                                    <button type="button" wire:click="edit({{ $service->id }})" class="btn btn-primary btn-sm flex-grow-1">Modifica</button>
                                    <button type="button" wire:click="confirmDelete({{ $service->id }})" class="btn btn-danger btn-sm flex-grow-1">Elimina</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>

    {{-- MODALE ELIMINAZIONE --}}
 @if ($showDeleteModal)
    <div class="modal-admin-wrapper">
        <!-- Cliccando sullo sfondo chiude il modale -->
        <div class="modal-admin-backdrop" wire:click="$set('showDeleteModal', false)"></div>

        <div class="modal-admin-content">
            <div class="modal-admin-header">
                <h5 class="m-0 fw-bold">
                    <i class="fas fa-exclamation-triangle me-2"></i> Conferma eliminazione
                </h5>
                <button type="button" class="btn-close btn-close-white" wire:click="$set('showDeleteModal', false)" style="box-shadow: none;"></button>
            </div>

            <div class="modal-admin-body">
                <p class="fs-5 fw-bold mb-1">Sei sicuro?</p>
                <p class="text-muted mb-0">Vuoi davvero eliminare questo servizio? L'azione è irreversibile.</p>
            </div>

            <div class="modal-admin-footer">
                <button type="button" class="btn btn-light border" wire:click="$set('showDeleteModal', false)">
                    Annulla
                </button>
                <button type="button" class="btn btn-danger px-4" wire:click="deleteService">
                    <i class="fas fa-trash-alt me-2"></i> Elimina
                </button>
            </div>
        </div>
    </div>
@endif

</div> 
