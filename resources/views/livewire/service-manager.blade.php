
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
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
                            <input wire:model="name" class="form-control">
                        @else
                            {{ $service->name }}
                        @endif
                    </td>
                    <td>
                        @if($editingServiceId === $service->id)
                            <input wire:model="price" class="form-control">
                        @else
                            {{ $service->price }}
                        @endif
                    </td>
                    <td>
                        @if($editingServiceId === $service->id)
                            <button wire:click="save" class="btn btn-success btn-sm">Salva</button>
                            <button wire:click="resetForm" class="btn btn-secondary btn-sm">Annulla</button>
                        @else
                            <button wire:click="edit({{ $service->id }})" class="btn btn-primary btn-sm">Modifica</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
