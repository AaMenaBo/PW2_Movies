@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Movie</h1>
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
            <label class="form-label" for="name">Usuario</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
            </select>
            @error('user_id')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" id="title">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="release_date">Fecha de lanzamiento</label>
            <input type="date" class="form-control" name="release_date" id="release_date">
            @error('release_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="form-label" for="category_id">Categorías</label>
            <div>
                @foreach ($categories as $category)
                    <input class="form-check-input" type="checkbox" value="{{ $category->id }}"
                        id="checkbox-{{ $category->id }}" name="categories[]">
                    <label class="form-check-label" for="checkbox-{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                @endforeach
                @error('categories')
                <p>{{ $message }}</p>
            </div>
        </div>
        <div>
            <label class="form-label" for="studio">Estudio</label>
            <div>
                @foreach ($studios as $studio)
                    <input class="form-check-input" type="radio" value="{{ $studio->id }}" id="studio-{{ $studio->id }}"
                        name="studios[]">
                    <label class="form-check-label" for="studio-{{ $studio->id }}">
                        {{ $studio->name }}
                    </label>
                @endforeach
                @error('studios')
                <p>{{ $message }}</p>
            </div>
        </div>

        <div class="button-group">
            <button type="submit" id="create-movies" class="btn btn-primary">Crear</button>
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
        </div>
    </form>
</div>
@endsection