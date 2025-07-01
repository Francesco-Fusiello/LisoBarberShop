<div class="p-4 rounded shadow"
     style="background-color: #0b2e1d; max-width: 500px; margin: auto; font-family: 'Playfair Display', serif; color: white;">

    @if (session()->has('message'))
        <div class="alert alert-success text-center"
             style="background-color: #d4af37; color: #0b2e1d; border-radius: 8px; font-weight: 600;">
            {{ session('message') }}
        </div>
    @endif

    <h3 class="text-center mb-4" style="color: #d4af37; font-weight: 700;">
        Lascia la tua recensione
    </h3>

    <form wire:submit.prevent="submit" autocomplete="off">
        {{-- Nome --}}
        <div class="mb-3">
            <input type="text"
                   class="form-control border-0 border-bottom bg-transparent text-white"
                   placeholder="Il tuo nome"
                   wire:model="name"
                   style="border-color: #d4af37; font-weight: 400; font-size: 1rem;"
                   onfocus="this.style.color='white'"
                   onblur="this.style.color='white'">
            <style>
                ::placeholder {
                    color: #e0c97a !important;
                    opacity: 1 !important;
                }
                :-ms-input-placeholder {
                    color: #e0c97a !important;
                }
                ::-ms-input-placeholder {
                    color: #e0c97a !important;
                }
            </style>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Recensione --}}
        <div class="mb-3">
            <textarea class="form-control border-0 border-bottom bg-transparent text-white"
                      placeholder="Scrivi la tua recensione"
                      wire:model="content"
                      rows="4"
                      style="border-color: #d4af37; font-weight: 400; font-size: 1rem; resize: vertical;"
                      onfocus="this.style.color='white'"
                      onblur="this.style.color='white'"></textarea>
            @error('content') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Voto --}}
        <div class="mb-4">
            <select class="form-select bg-transparent border-0 border-bottom text-white"
                    wire:model="rating"
                    style="border-color: #d4af37; font-weight: 400; font-size: 1rem;">
                <option value="" disabled selected style="color: #999;">Voto (1-5)</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" style="color: #0b2e1d;">
                        {{ $i }} {{ $i > 1 ? 'stelle' : 'stella' }}
                    </option>
                @endfor
            </select>
            @error('rating') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        {{-- Submit --}}
        <div class="d-grid">
            <button type="submit"
                    class="btn btn-outline-warning"
                    style="font-weight: 700; border-radius: 50px; letter-spacing: 1px; padding: 10px 0;">
                Invia Recensione
            </button>
        </div>
    </form>
</div>
 