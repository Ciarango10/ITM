@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Nuevo Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Nuevo Usuario</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Nuevo Usuario</h3>

                <form class="row g-3" action="{{ route('users.store')}}" method="POST" id="frmCreate">
                    @csrf

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="email" class="form-control" placeholder="Email..." >
                            <label>Email</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="first_name" class="form-control" placeholder="Nombre..." >
                            <label>Nombres</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="last_name" class="form-control" placeholder="Apellido..." >
                            <label>Apellidos</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="document" class="form-control" placeholder="Documento..." >
                            <label>Documento</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" >
                                            {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label>Rol</label>

                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" form="frmCreate" id="btnSave">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </section>

@endsection