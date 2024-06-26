@extends('layouts.admin')

@section('content')
    <div class="container p-2">
        <h1>Modifica il tipo : </h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tecnologia</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $technology->name) }}">
            </div>

            <div class="mb-3">
                <label for="version" class="form-label">Versione Tech :</label>
                <input type="text" id="version" name="version" value ="{{ old('version', $technology->version) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description Tech :</label>
                <textarea type="text" id="description" name="description" class="form-control"> 
                    {{ old('description', $technology->description) }}
                </textarea>
            </div>

            <div class="mb-3">
                <label for="docs" class="form-label">Documentazione tecnologia :</label>
                <input class="form-control" id="docs" name="docs" value="{{ old('docs', $technology->docs) }}">
            </div>



            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection