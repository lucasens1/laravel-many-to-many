@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Tabella Tipi : </h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('admin.types.create') }}" class="btn btn-primary my-2"> + Tipo</a>
        <table class="table table-dark table-striped text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome tipo</th>
                    <th scope="col">Colore</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="fw-lighter">
                @foreach ($typeList as $type)
                    <tr>
                        <th scope="row"> {{ $type->id }}</td>
                        <td> {{ $type->name }} </td>
                        <td> <span class="btn" style="color: white; background-color : {{ $type->color}}">{{ $type->color }}</span></td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.types.show', ['type' => $type->id]) }}"
                                class="btn btn-warning text-light fs-6"><i class="fa-solid fa-info px-1"></i> Details </a>
                            <a href="{{ route('admin.types.edit', ['type' => $type->id]) }}"
                                class="btn btn-warning text-light fs-6"><i class="fa-solid fa-gears px-1"></i> Modify </a>
                            <form action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-regular fa-trash-can px-1"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
