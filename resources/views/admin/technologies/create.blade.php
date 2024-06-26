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

        <form action="{{ route('admin.technologies.store') }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Nome tecnologia :</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="version" class="form-label">Versione tecnologia :</label>
                <input class="form-control" id="version" name="version" value="{{ old('version') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione  tecnologia :</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="docs" class="form-label">Documentazione tecnologia :</label>
                <input class="form-control" id="docs" name="docs" value="{{ old('docs') }}">
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection