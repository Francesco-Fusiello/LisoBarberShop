<x-layout>
    <div class="container py-5">

        <div class="text-center mb-4">
            <h1 class="mb-3">Pannello di Amministrazione</h1>

            <div class="btn-group" role="group">
                <a href="{{ route('admin.dashboard', ['section' => 'prodotti']) }}"
                   class="btn btn-outline-primary {{ request('section') !== 'galleria' ? 'active' : '' }}">
                    Gestione Prodotti
                </a>
                <a href="{{ route('admin.dashboard', ['section' => 'galleria']) }}"
                   class="btn btn-outline-secondary {{ request('section') === 'galleria' ? 'active' : '' }}">
                    Gestione Galleria
                </a>
            </div>
        </div>

        <hr class="my-4">

        @if(request('section') === 'galleria')
            <h2 class="mb-3">Gestione Galleria Immagini</h2>
            <livewire:gallery-manager />
        @else
            <h2 class="mb-3">Gestione Prodotti</h2>
            <livewire:product-crud />
        @endif

    </div>
</x-layout>
