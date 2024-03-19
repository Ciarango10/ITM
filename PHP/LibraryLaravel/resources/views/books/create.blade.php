@extends('layouts.app')

@section('content')

<h1>Nuevo Libro</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf   

    <div class="mb-3">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" name="description">
    </div>

    <div class="mb-3">
        <label for="author_id">Autor</label>
        <select name="author_id" class="form-select">
        <option selected>Seleccione...</option>
        @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
        @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>


@endsection