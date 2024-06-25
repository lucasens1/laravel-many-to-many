@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Inserisci un nuovo Tipo : </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.types.store') }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome tipo :</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Colore etichetta :</label>
                <input class="form-control" id="color" name="color" value="{{ old('color') }}">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection