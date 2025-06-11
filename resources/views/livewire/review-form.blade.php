<div class="p-4 rounded" style="background-color: #fff; max-width: 480px; margin: auto; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #222;">
    @if (session()->has('message'))
        <div class="alert alert-success" style="background-color: #e0e0e0; color: #333; padding: 10px 15px; border-radius: 4px; margin-bottom: 1rem;">
            {{ session('message') }}
        </div>
    @endif

    <h3 class="text-center mb-4" style="font-weight: 500; letter-spacing: 1px;">
        Lascia la tua recensione
    </h3>

    <form wire:submit.prevent="submit" autocomplete="off">
        <div class="mb-3">
            <input type="text" 
                   class="form-control border-0 border-bottom rounded-0" 
                   placeholder="Il tuo nome" 
                   wire:model="name"
                   style="border-color: #ccc; color: #222; font-weight: 400; font-size: 1rem;">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <textarea 
                class="form-control border-0 border-bottom rounded-0" 
                placeholder="Scrivi la tua recensione" 
                wire:model="content"
                rows="4"
                style="border-color: #ccc; color: #222; font-weight: 400; font-size: 1rem; resize: vertical;"></textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <select class="form-select bg-transparent border-0 border-bottom" 
                    wire:model="rating" 
                    style="border-color: #ccc; color: #222; font-weight: 400; font-size: 1rem;">
                <option value="">Voto (1-5)</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} {{ $i > 1 ? 'stelle' : 'stella' }}</option>
                @endfor
            </select>
            @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="d-grid">
            <button type="submit" 
                    class="btn btn-dark text-white" 
                    style="font-weight: 600; letter-spacing: 1px; padding: 10px 0;">
                Invia Recensione
            </button>
        </div>
    </form>
</div>
