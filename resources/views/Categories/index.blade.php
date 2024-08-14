@extends('layouts.app')
@section('content')
    {{-- Listado para ver todas las categorías existentes --}}
    <div class="container">
        <h2 class="display-6 text-center mb-4">Categorías</h2>
        @if (auth()->check())
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary">Agregar Categoría</a>
        @endif
        <div class="table-responsive">
            <table class="table text-left">
                <thead>
                    <tr>
                        <th style="width: 22%;">Nombre</th>
                        <th style="width: 1%;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.list', $category->id) }}" class="btn btn-outline-primary">Ver
                                    películas</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-outline-primary">Editar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
                                </form>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Regresar</a>
    @endsection
