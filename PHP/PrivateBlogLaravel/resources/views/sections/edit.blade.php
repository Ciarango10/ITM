@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Secciones</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Secciones</a></li>
                <li class="breadcrumb-item active">Editar sección</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Sección</h5>

                <form class="row g-3" action="{{ route('sections.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="section_id" value="{{ $section->id }}">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Sección" value="{{ $section->name }}">
                            <label>Sección</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('sections.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>

        </div>

    </section>

@endsection