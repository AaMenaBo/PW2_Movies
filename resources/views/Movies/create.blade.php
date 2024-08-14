@extends('layouts.app')

@section('content')
    <h1>Crear Nueva Película</h1>
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
    <form action="/movies" method="POST">
        @csrf
        <div>
            <label class="form-label" for="title">Título</label>
            <input class="form-control" type="text" name="title" id="create-title" value="{{ old('title') }}"required>
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="description">Descripción</label>
            <textarea class="form-control" name="description" id="create-description" cols="30" rows="10"required>{{ old('description') }}</textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="release_date">Fecha de lanzamiento</label>
            <input class="form-control" type="date" name="release_date" id="create-release_date"
                value="{{ old('release_date') }}" required>
            @error('release_date')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="studio_id">Estudio</label>
            <select class="form-select" name="studio_id" id="create-studio_id">
                @foreach ($studios as $studio)
                    <option value="{{ $studio->id }}" {{ old('studio_id') == $studio->id ? 'selected' : '' }}>
                        {{ $studio->name }}</option>
                @endforeach
            </select>
            @error('studio_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="categories">Categorías</label>
            <select class="form-select" name="categories[]" id="create-categories" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('categories')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class='pt-4'>
            <button type="submit" id="create-movie" class="btn btn-primary">Crear</button>
            <a href="{{ route('movies.index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </form>
@endsection
