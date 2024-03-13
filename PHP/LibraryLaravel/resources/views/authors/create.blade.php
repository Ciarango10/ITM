@extends('layouts.app')

@section('content')

<h1>Nuevo autor</h1>

<form action="{{ route('authors.store') }}" method="POST">
    @csrf   

    <div class="mb-3">
        <label for="first_name">Nombres</label>
        <input type="text" class="form-control" name="first_name">
    </div>

    <div class="mb-3">
        <label for="last_name">Apellidos</label>
        <input type="text" class="form-control" name="last_name">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection