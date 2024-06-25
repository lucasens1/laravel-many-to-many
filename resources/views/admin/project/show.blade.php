@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Dettagli Progetto : {{$project->title}}</h1>
    <div class="d-flex align-items-start">
        <div class="mx-2">
            <h6>{{ $project->description}}</h6>
            {{-- Aggiungo l'attributo tipo che viene visualizzato se presente --}}
            <h6 class="fs-2">{{ $project->type?->name}}</h6>
        </div>
    </div>
</div>
@endsection