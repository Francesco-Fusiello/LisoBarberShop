<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="text-center w-100">
            <h1 class="mb-3">Pannello di Amministrazione</h1>

            @php
                $section = request('section', 'prodotti');
            @endphp

            <div class="btn-group" role="group">
                <a href="{{ route('admin.dashboard', ['section' => 'prodotti']) }}"
                    class="btn btn-outline-primary {{ $section === 'prodotti' ? 'active' : '' }}">
                    Gestione Prodotti
                </a>
                <a href="{{ route('admin.dashboard', ['section' => 'galleria']) }}"
                    class="btn btn-outline-secondary {{ $section === 'galleria' ? 'active' : '' }}">
                    Gestione Galleria
                </a>
                <a href="{{ route('admin.dashboard', ['section' => 'recensioni']) }}"
                    class="btn btn-outline-success {{ $section === 'recensioni' ? 'active' : '' }}">
                    Gestione Recensioni
                </a>
            </div>
        </div>
    </div>

    <hr class="my-4">

    @if ($section === 'galleria')
        <h2 class="mb-3">Gestione Galleria Immagini</h2>
        <livewire:gallery-manager />
    @else
        <h2 class="mb-3">Gestione Prodotti</h2>
        <livewire:product-crud />
    @endif
</div>