@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Login</h1>
        <hr>
        <form action="/login" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" value ="{{ old('email') }}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="pt-2">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('movies.index') }}" class="btn btn-primary">Regresar</a>
            </div>
        </form>
    @endsection
