@extends('layouts.app')
@section('content')
    <h1>Eliminar Movie: {{ $movies->title }}</h1>
    <hr>
    <form action="/movies/{{ $movies->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
    </form>

@endsection