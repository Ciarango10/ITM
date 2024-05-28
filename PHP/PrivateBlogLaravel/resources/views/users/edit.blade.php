@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Editar Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuarios</a></li>
                <li class="breadcrumb-item active">Editar Usuario</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Editar Usuario</h3>

                <form class="row g-3" action="{{ route('users.update')}}" method="POST" id="frmEdit">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{ $user->id }}" />

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input class="form-control" value="{{ $user->email }}" readonly>
                            <label>Email</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="first_name" class="form-control" placeholder="Nombre..." value="{{ $user->first_name }}">
                            <label>Nombres</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="last_name" class="form-control" placeholder="Apellido..." value="{{ $user->last_name }}">
                            <label>Apellidos</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="document" class="form-control" placeholder="Documento..." value="{{ $user->document }}">
                            <label>Documento</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">

                            <select class="form-control" name="role_id">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                            {{ $role->id == $user->role_id ? 'selected' : '' }} >
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
            <button type="submit" class="btn btn-primary" form="frmEdit" id="btnSave">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </section>

@endsection