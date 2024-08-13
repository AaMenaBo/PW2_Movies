@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Movie Details</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <div class="card">
                <div class="card-header">
                    <h1>{{ $movie->title }}</h1>
                </div>
                <div class="card-body">
                    <h2 class="card-title">Movie ID:{{ $movie->id }}</h2>
                    <p class="card-text">{{ $movie->description }}</p>
                    <div class="mb-3">
                        @foreach ($movie->categories as $category)
                            <span class="badge bg-primary">{{ $category->name }}</span>
                        @endforeach
                    </div>
                    <p><strong>Release Date:</strong> {{ $movie->release_date->format('Y-m-d') }}</p>
                    <p><strong>Studio:</strong> {{ $movie->studio->name }}</p>
                    <hr>
                    @if (Gate::allows('update', $movie))
                        <a href="/movies/{{ $movie->id }}/edit" class="btn btn-primary">Editar</a>
                    @endif
                    @if (Gate::allows('delete', $movie))
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
                        </form>
                    @endif
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
