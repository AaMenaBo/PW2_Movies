<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
<div>
    <h4 class="text-success fw-bold">
        @auth
            Bienvenido, {{ auth()->user()->name }}
        @endauth

    </h4>
</div>
<h2 class="display-6 text-center mb-4">Movies</h2>

@if(auth()->check())
    <a href="/movies/create" class="btn btn-outline-primary">Agregar Peliculas</a>
@else
    <div class="alert alert-warning" role="alert">
        Solo los usuarios logueados pueden agregar un película.
    </div>
@endif

@if(!auth()->check())
    <div class="alert alert-danger" role="alert">
        Debes estar logueado para ver editar detalles.
    </div>
@endif

<div class="table-responsive">
    <table class="table text-left">
        <thead>
            <tr>
                <th style="width: 22%;">Nombre</th>
                <th style="width: 22%;">Usuario</th>
                <th style="width: 22%;">Año de publicación</th>
                <th style="width: 22%;">Género</th>
                <th style="width: 22%;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>
                        @if ($movie->user)
                            {{ $movie->user->name }}
                        @else
                            No asignado
                        @endif
                    <td>{{ $movie->release_date }}</td>
                    <td>
                        <ul>
                            @foreach ($movie->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('movies.show') }}" class="btn btn-outline-primary">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection