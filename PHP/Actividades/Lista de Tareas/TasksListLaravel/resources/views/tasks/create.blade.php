@extends('layouts.app')

@section('content')

<h1>Nueva Tarea</h1>

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf   

    <div class="mb-3">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label for="completed">Completado</label>
        <input type="checkbox" name="completed" class="form-check-input">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>


@endsection