@extends('layouts.app')
@section('content')
    <h1>Editar Categoría: {{ $category->name }}</h1>
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
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="edit-name" value="{{ $category->name }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>

@endsection
