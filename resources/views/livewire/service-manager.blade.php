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
                        <tr>
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
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.3);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Conferma eliminazione</h5>
                        <button type="button" class="btn-close btn-close-white" wire:click="$set('showDeleteModal', false)"></button>
                    </div>
                    <div class="modal-body text-center">
                        Sei sicuro di voler eliminare questo servizio?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('showDeleteModal', false)">Annulla</button>
                        <button type="button" class="btn btn-danger" wire:click="deleteService">
                            <i class="fas fa-trash"></i> Elimina
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div> 
