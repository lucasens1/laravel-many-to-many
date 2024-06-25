@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h1 class="text-center">Tabella Progetti</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary"> + Progetto</a>
        <table class="table align-middle text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody class="fw-lighter">
                @foreach ($projectsList as $project)
                    <tr>
                        <th scope="row"> {{ $project->id }}</td>
                        <td> {{ $project->title }} </td>
                        <td> <span class="btn" style="color: white; background-color: {{ $project->type?->color }}">{{ $project->type?->name }}</span></td>
                        <td> {{ $project->description }} </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}"
                                    class="btn btn-info text-light fs-6">Dettagli </a>
                                <a href="{{ route('admin.projects.edit', ['project' => $project->id]) }}"
                                    class="btn btn-warning text-light fs-6">Modifica </a>
                                <form action="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                </form>
                            </div>                     
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
