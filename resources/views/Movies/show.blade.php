@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Movie: {{ $movie->title }}</h1>
    <hr>
    <h2>{{ $movies->title }}</h2>
    <p>{{ $movies->description }}</p>
    <div>
        @foreach ($movies->categories as $category)
            <span class="badge bg-primary">{{ $category->name }}</span>
        @endforeach
    </div>
    <p> {{$movies->realease_date}}</p>
    <p>{{$movies->studio_id}}</p>
    <hr>
    <a href="/movies/{{ $movies->id }}/edit" class="btn btn-primary">Editar</a>

    <form action="/movies/{{ $movies->id }}" method="POST" style="display:inline;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-warning"
            onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
    </form>
    <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
</div>
@endsection