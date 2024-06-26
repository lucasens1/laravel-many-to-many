@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Dettagli Tecnologia : {{$technology->name}}</h1>
    <div class="d-flex align-items-start">
        <div class="mx-2 align-middle">
            <h4>Nome tech : <i>{{ $technology->name}}</i></h4>
            <h4>Versione tech : <i>{{ $technology->version }}</i></h4>
            <h4>Descrizione : {{ $technology->description }}</h4>
            {{-- Aggiungo l'attributo tipo che viene visualizzato se presente --}}
            <h5>Link Docs : <a href="#">{{ $technology->docs }}</a></h5>
        </div>
    </div>
</div>
@endsection