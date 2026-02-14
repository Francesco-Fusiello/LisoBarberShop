<form wire:submit.prevent="save">
    @if (session()->has('message'))
           <div class="toast-elegant alert alert-success d-flex align-items-center justify-content-between px-3 py-2 mb-4">
               <span>✅</span>
               <div class="mx-2" style="flex-grow:1;">{{ session('message') }}</div>
           </div>
       @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Servizio</th>
                <th>Prezzo</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
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
                            {{ $service->price }}
                        @endif
                    </td>
                    <td>
                        @if($editingServiceId === $service->id)
                            <button type="submit" class="btn btn-success btn-sm">Salva</button>
                            <button type="button" wire:click="resetForm" class="btn btn-secondary btn-sm">Annulla</button>
                        @else
                            <button type="button" wire:click="edit({{ $service->id }})" class="btn btn-primary btn-sm">Modifica</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</form>
