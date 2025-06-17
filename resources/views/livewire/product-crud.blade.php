<x-layout>

    <h2 class="text-center mb-5 display-4">I Nostri Prodotti</h2>

    <div class="p-6 max-w-6xl mx-auto">
        <div class="container pt-5">

            {{-- Componente filtro --}}
            <div class="row mb-4">
                <div class="col-12">
                    <livewire:product-filter />
                </div>
            </div>

            {{-- Componente lista prodotti --}}
            <livewire:product-list />
            
        </div>
    </div>

</x-layout>
