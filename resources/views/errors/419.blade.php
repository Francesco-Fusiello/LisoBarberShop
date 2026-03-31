<x-layout>


@section('content')
<div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center">

    <h1 style="font-size: 80px;">419</h1>

    <p class="mb-3">Sessione scaduta</p>

    <p class="text-muted mb-4">
        La pagina è rimasta inattiva troppo a lungo.
    </p>

    <a href="{{ url()->current() }}" class="btn btn-dark">
        Ricarica pagina
    </a>

</div>
@endsection
</x-layout>