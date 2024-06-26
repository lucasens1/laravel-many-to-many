@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Inserisci un nuovo Progetto : </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo progetto :</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo progetto :</label>
                <label for="type"> Seleziona tipo progetto </label>
                {{-- Nel name passiamo il nome della colonna --}}
                <select name="type_id" id="type">
                    @foreach ($typeList as $item)
                        {{-- $item è istanza di Type --}}
                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="my-3">
                <h4>Seleziona tecnologia :</h4>
                <ul class="list-group w-50">
                    @foreach ($technologies as $technology)
                        <li class="list-group-item">
                            <input type="checkbox" @checked(in_array($technology->id, old('technologies', []))) name="technologies[]"
                                class="form-check-input me-1" value="{{ $technology->id }}"
                                id="technology-{{ $technology->id }}"> <span class="fw-semibold px-2">{{ $technology->name }}</span> <i class="fw-lighter">{{ $technology->version }}</i>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione progetto :</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
