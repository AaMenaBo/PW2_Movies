@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Movie</h1>
    <hr>
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
        <div class="form-group">
            <label for="studio_id">Estudio</label>
            <select class="form-control" name="studio_id" id="studio_id">
                @foreach ($movies as $studio)
                    <option value="{{ $studio->id }}">{{ $studio->name }}</option>
                @endforeach
            </select>
            @error('studio_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" id="create-movies" class="btn btn-primary">Crear</button>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
@endsection