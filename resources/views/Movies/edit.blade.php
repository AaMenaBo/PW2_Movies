@extends('layouts.app')
@section('content')
    <h1>Editando Movie: {{ $movie->title }}</h1>
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
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="form-label" for="title">Título</label>
            <input class="form-control" type="text" name="title" id="edit-title" value="{{ $movie->title }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="description">Descripción</label>
            <textarea class="form-control" name="description" id="edit-description" cols="30" rows="10">{{ $movie->description }}</textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="release_date">Fecha de lanzamiento</label>
            <input class="form-control" type="date" name="release_date" id="edit-release_date"
                value="{{ $movie->release_date->format('Y-m-d') }}">
            @error('release_date')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="studio_id">Estudio</label>
            <select class="form-select" name="studio_id" id="edit-studio_id">
                @foreach ($studios as $studio)
                    <option value="{{ $studio->id }}" {{ $studio->id == $movie->studio->id ? 'selected' : '' }}>
                        {{ $studio->name }}</option>
                @endforeach
            </select>
            @error('studio_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="categories">Categorías</label>
            <select class="form-select" name="categories[]" id="edit-categories" multiple>
                @foreach ($categories as $category)
                    <option value = "{{ $category->id }}"
                        {{ in_array($category->id, $movie->categories->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" id="edit-movie" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
    </form>
@endsection
