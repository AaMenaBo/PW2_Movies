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

    {{-- @if (!auth()->check())
        <div class="alert alert-danger" role="alert">
            Debes estar logueado para poder editar detalles.
        </div>
    @endif --}}
    <div class="table-responsive">
        <table class="table text-left">
            <thead>
                <tr>
                    <th style="width: 22%;">Nombre</th>
                    <th style="width: 22%;">Año de publicación</th>
                    <th style="width: 22%;">Género</th>
                    <th style="width: 22%;">Estudio</th>
                    <th style="width: 22%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>

                        <td>{{ $movie->release_date->format('Y-m-d') }}</td>
                        <td>
                            <ul>
                                @foreach ($movie->categories as $category)
                                    <li>
                                        <a href="{{ route('categories.list', $category->id) }}"
                                            class="me-3 py-2 link-body-emphasis text-decoration-none">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('movies.studio', $movie->studio_id) }}"
                                class="me-3 py-2 link-body-emphasis text-decoration-none">{{ $movie->studio->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-outline-primary">Ver
                                detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <div>
                {{ $movies->links() }}
            </div>
        </table>
    </div>
@endsection
