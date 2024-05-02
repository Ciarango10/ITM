@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Blogs</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">Blogs</a></li>
                <li class="breadcrumb-item active">Editar blog</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Blog</h5>

                <form class="row g-3" action="{{ route('blogs.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="title" class="form-control" placeholder="Titulo" value="{{ $blog->title }}">
                            <label>Titulo</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" name="section_id">
                                @foreach ($sections as $section)
                                    <option value="{{ $section->id }}" {{ $section->id == $blog->section_id ? 'selected' : '' }}>{{ $section->name }}</option>
                                @endforeach
                            </select>
                            <label>Sección</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Descripción</label>
                        <textarea name="description" class="form-control">{{ $blog->description }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('blogs.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>

            </div>

        </div>

    </section>

@endsection