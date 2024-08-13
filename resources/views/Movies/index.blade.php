<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('layouts.app')
@section('content')
    <div>
        <h4 class="fw-bold">
            Bienvenido, {{ auth()->check() ? auth()->user()->name : 'Invitado' }}
        </h4>
    </div>
    <h2 class="display-6 text-center mb-4">Movies</h2>

    @if (auth()->check())
        <a href="{{ route('movies.create') }}" class="btn btn-outline-primary">Agregar Peliculas</a>
        {{-- @else
        <div class="alert alert-warning" role="alert">
            Solo los usuarios logueados pueden agregar un película.
        </div> --}}
    @endif

    @if (!auth()->check())
        <div class="alert alert-danger" role="alert">
            Debes estar logueado para poder editar detalles.
        </div>
    @endif

    {{-- listado de todas las categorias de las movies --}}

    {{-- <a href="{{ route('categories.index', $category->id) }}" class="btn btn-outline-primary">Ver Categorías</a> --}}

    {{-- Aqui tengo planeado agregar un select? no lo tengo claro, algo para mostrar la movies de x categoría --}}

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
                        <td>{{ $movie->release_date->format('Y-m-d') }}</td>
                        <td>
                            <ul>
                                @foreach ($movie->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary">Ver
                                detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
