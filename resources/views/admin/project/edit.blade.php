@extends('layouts.admin')

@section('content')
    <div class="container p-2">
        <h1>Modifica il Progetto : </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Tipo progetto :</label>
                <label for="type"> Seleziona tipo progetto </label>
                {{-- Nel name passiamo il nome della colonna --}}
                <select name="type_id" id="type">
                    @foreach ($typeList as $item)
                        {{-- $item è istanza di Type --}}
                        {{-- Seleziono il vecchio ID (da typeList) e lo metto insieme al $project->type_id ed è selezionato solo se è uguale all'item id --}}
                        <option @selected(old('id', $project->type_id) === $item->id) value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $project->description) }}</textarea>
            </div>



            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection
