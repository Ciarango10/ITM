@extends('layouts.app')

@section('content')
    <h1>Crear Nota</h1>
    <form method="POST" action="{{ route('notes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        
        <div class="mb-3">
            <label for="content">Contenido:</label>
            <textarea id="content" name="content" class="form-control"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="category_id">Categoría:</label>
            <select id="category_id" name="category_id" class="form-select">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Guardar Nota</button>
    </form>
@endsection
