@extends('layouts.app')

@section('content')

<h1>Editar Tarea</h1>

<form action="{{ route('tasks.update') }}" method="POST">
    @csrf   
    @method('PUT')
    <input type="hidden" name="task_id" value="{{ $task->id }}">

    <div class="mb-3">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" value="{{ $task->title }}">
    </div>

    <div class="mb-3">
        <label for="completed">Completado</label>
        <input type="checkbox" class="form-check-input" name="completed" {{ $task->completed ? 'checked' : '' }}>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection