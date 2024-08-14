@extends('layouts.app')
@section('content')
    <h1>Crear Nueva Categoría</h1>
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
    <form action="/categories" method="POST">
        @csrf
        <div>
            <label class="form-label" for="name">Nombre</label>
            <input class="form-control" type="text" name="name" id="create-name" value="{{ old('name') }}" required>
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>
@endsection