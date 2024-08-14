@extends('layouts.app')
@section('content')
    <h1>Eliminar Categoría: {{ $categories->name }}</h1>
    <hr>
    <form action="/categories/{{ $categories->id }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Regresar</a>
    </form>

@endsection