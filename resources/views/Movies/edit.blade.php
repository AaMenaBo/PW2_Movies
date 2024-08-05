@extends('layouts.app')
@section('content')
    <h1>Editando Movie: {{ $movies->title }}</h1>
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
    <form action="/movies/{{ $movies->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label class="form-label" for="title">Título</label>
            <input class="form-control" type="text" name="title" id="edit-title" value="{{ $movies->title }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="description">Descripción</label>
            <textarea class="form-control" name="description" id="edit-description" cols="30" rows="10">{{ $movies->description }}</textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="release_date">Fecha de lanzamiento</label>
            <input class="form-control" type="date" name="release_date" id="edit-release_date" value="{{ $movies->release_date }}">
            @error('release_date')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="form-label" for="studio_id">Estudio</label>
            <select class="form-select" name="studio_id" id="edit-studio_id">
                @foreach ($studios as $studio)
                    <option value="{{ $studio->id }}" {{ $studio->id == $movies->studio_id ? 'selected' : '' }}>{{ $studio->name }}</option>
                @endforeach
            </select>
            @error('studio_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" id="edit-movie" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
    </form>
@endsection
