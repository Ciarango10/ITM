<!-- resources/views/notes/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Editar Nota</h1>
    <form method="POST" action="{{ route('notes.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="note_id" value="{{ $note->id }}">

        <div class="mb-3">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="content">Contenido:</label>
            <textarea id="content" name="content" class="form-control">{{ $note->content }}</textarea>
        </div>  
        
        <div class="mb-3">
            <label for="category_id">Categoría:</label>
            <select id="category_id" name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $note->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>      
        
        <button type="submit" class="btn btn-primary">Actualizar Nota</button>
    </form>
@endsection
