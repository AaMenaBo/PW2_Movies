@extends('layouts.app')
@section('content')
    {{-- Listado para ver todas las categorías existentes --}}
    <div class="container">
        <h2 class="display-6 text-center mb-4">Categorías</h2>
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
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Regresar</a>
    @endsection
