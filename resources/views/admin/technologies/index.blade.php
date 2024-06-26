@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Tabella Tipi : </h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('admin.technologies.create') }}" class="btn btn-primary my-2"> + Tecnologia</a>
        <table class="table table-primary table-striped text-center align-middle">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Versione</th>
                    <th scope="col">Docs</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="fw-lighter">
                @foreach ($techList as $technology)
                    <tr>
                        <th scope="row"> {{ $technology->id }}</td>
                        <td><span class="fw-semibold">{{ $technology->name }}</span>  </td>
                        <td> <i>{{ $technology->version }}</i></td>
                        <td> <a href="#"><u>{{ $technology->docs }}</u></a></td>
                        <td class="d-flex gap-2 justify-content-center">
                            <a href="{{ route('admin.technologies.show', ['technology' => $technology->id]) }}"
                                class="btn btn-warning text-light fs-6"><i class="fa-solid fa-info px-1"></i> Details </a>
                            <a href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}"
                                class="btn btn-warning text-light fs-6"><i class="fa-solid fa-gears px-1"></i> Modify </a>
                            <form action="{{ route('admin.technologies.destroy', ['technology' => $technology->id]) }}"
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
