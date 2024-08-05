@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Movie: {{ $movie->id }}</h1>
    <hr>
    <h2>{{ $movie->title }}</h2>
    <p>{{ $movie->description }}</p>
    <div>
        @foreach ($movie->categories as $category)
            <span class="badge bg-primary">{{ $category->name }}</span>
        @endforeach
    </div>
    <p> {{$movie->realease}}</p>
    <p>{{$movie->studio}}</p>
    <hr>
    <a href="/movies/{{ $movie->id }}/edit" class="btn btn-primary">Editar</a>

    <form action="/movies/{{ $movie->id }}" method="POST" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-warning"
            onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection