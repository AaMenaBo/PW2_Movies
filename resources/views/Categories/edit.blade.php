@extends('layouts.app')
@section('content')
    <h1>Editar Categoría: {{ $categories->name }}</h1>
    <hr>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/categories/{{ $categories->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="edit-name" value="{{ $categories->name }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Regresar</a>
    </form>

@endsection