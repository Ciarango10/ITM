@extends('layouts.app')

@section('content')

<h1>Editar autor</h1>

<form action="{{ route('authors.update') }}" method="POST">
    @csrf   
    @method('PUT')
    <input type="hidden" name="author_id" value="{{ $author->id }}">

    <div class="mb-3">
        <label for="first_name">Nombres</label>
        <input type="text" class="form-control" name="first_name" value="{{ $author->first_name }}">
    </div>

    <div class="mb-3">
        <label for="last_name">Apellidos</label>
        <input type="text" class="form-control" name="last_name" value="{{ $author->last_name }}">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection