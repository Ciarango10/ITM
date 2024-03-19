@extends('layouts.app')

@section('content')

<h1>Editar Libro</h1>

<form action="{{ route('books.update') }}" method="POST">
    @csrf   
    @method('PUT')
    <input type="hidden" name="book_id" value="{{ $book->id }}">

    <div class="mb-3">
        <label for="title">Titulo</label>
        <input type="text" class="form-control" name="title" value="{{ $book->title }}">
    </div>

    <div class="mb-3">
        <label for="description">Descripcion</label>
        <input type="text" class="form-control" name="description" value="{{ $book->description }}">
    </div>

    <div class="mb-3">
        <label for="author_id">Autor</label>
        <select name="author_id" class="form-select">
            <option value="{{ $authorSelected->id }}" selected>{{ $authorSelected->first_name }} {{ $authorSelected->last_name }}</option>
            @foreach ($authors as $author)
                @if($authorSelected->id != $author->id)
                    <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection