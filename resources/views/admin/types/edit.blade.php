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

        <form action="{{ route('admin.types.update', ['type' => $type->id]) }}" method="POST">
            {{-- Cookie per far riconoscere il form al server --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome Tipo</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $type->name) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Colore etichetta tipo :</label>
                <input type="text" id="color" name="color" value ="{{ old('color', $type->color) }}">
            </div>



            <button class="btn btn-success" type="submit">Salva</button>
        </form>
    </div>
@endsection