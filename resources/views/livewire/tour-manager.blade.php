<div>

    <form wire:submit.prevent="save" class="mb-5">

        <div class="mb-3">
            <input type="file" wire:model="image" class="form-control">
        </div>

        <div class="mb-3">
            <input type="text"
                   wire:model="city"
                   class="form-control"
                   placeholder="City">
        </div>

        <div class="mb-3">
            <input type="text"
                   wire:model="country"
                   class="form-control"
                   placeholder="Country">
        </div>

        <div class="mb-3">
            <input type="text"
                   wire:model="year"
                   class="form-control"
                   placeholder="Year">
        </div>

        <button class="btn btn-dark">
            Add Tour Item
        </button>

    </form>

    <div class="row">

        @foreach($tourItems as $item)

            <div class="col-md-4 mb-4">

                <div class="border p-3">

                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="img-fluid mb-3">

                    <h5>
                        {{ $item->city }}
                    </h5>

                    <p>
                        {{ $item->country }}
                    </p>

                    <small>
                        {{ $item->year }}
                    </small>

                    <div class="mt-3">

                        <button
                            wire:click="delete({{ $item->id }})"
                            class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>
