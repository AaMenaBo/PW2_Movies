@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Register</h1>
        <hr>
        <form action="/register" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                </div>
            @enderror
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ route('movies.index') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
        </form>
    </div>
@endsection
