@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center my-5">Dettagli Tipo : {{$type->name}}</h1>
    <div class="d-flex align-items-start">
        <div class="mx-2 align-middle">
            <h4>Nome del tipo : <i>{{ $type->name}}</i></h4>
            {{-- Aggiungo l'attributo tipo che viene visualizzato se presente --}}
            <h5><u>Colore etichetta del tipo</u> :  <span class="btn fs-6" style="color: white; background-color : {{$type->color}}">{{ $type->color}}</span></h5>
        </div>
    </div>
</div>
@endsection