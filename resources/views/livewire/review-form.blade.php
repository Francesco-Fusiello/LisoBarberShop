<div>
    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Il tuo nome" wire:model="name">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <textarea class="form-control" placeholder="Scrivi la tua recensione" wire:model="content"></textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <select class="form-select" wire:model="rating">
                <option value="">Voto (1-5)</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} stella{{ $i > 1 ? 'e' : '' }}</option>
                @endfor
            </select>
            @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Invia Recensione</button>
    </form>
</div>
