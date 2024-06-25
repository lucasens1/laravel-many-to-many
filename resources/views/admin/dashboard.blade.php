@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                {{-- Card --}}
                {{-- <div class="card">
                    <div class="card-header">Dashboard Admin</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div> --}}
                {{-- /Card --}}
            </div>
            <div class="col-12 col-md-6 mt-3 p-4">
                <h1 class="text-center fw-bold">Cosa vuoi fare?</h1>
                <div class="container d-flex justify-content-center">
                    <div class="row w-75 align-items-center mt-5">
                        {{-- Qui va collegata la view dell'index con la tabella dei Progetti --}}
                        <a href="{{ route('admin.projects.index')}}" class="btn btn-secondary fs-4 mt-4" role="button">Visiona la lista dei Progetti</a>
                        {{-- Qui va collegata la view del create --}}
                        <a href="{{ route('admin.projects.create')}}" class="btn btn-secondary fs-4 mt-4" role="button">Crea un nuovo Progetto</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
