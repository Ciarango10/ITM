@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Nuevo Rol</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Nuevo Rol</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        {{-- Role --}}
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Nuevo Rol</h3>

                <form class="row g-3" action="{{ route('roles.store')}}" method="POST" id="frmCreate">
                    @csrf

                    <input type="hidden" id="permissions" name="permissions" />
                    <input type="hidden" id="sections" name="sections" />

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Nombre...">
                            <label>Nombre</label>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        {{-- Sections --}}
        <div class="card shadow mb-4">
            <div class="card-body">

                <h3 class="card-title">Secciones</h3>

                <div class="row">
                    @foreach ($sectionGroups as $key => $group)

                        <div class="col-md-3 mt-3">

                            @foreach ($group as $item)

                                <div class="form-check form-switch">
                                    <input class="form-check-input section"
                                           type="checkbox"
                                           data-section-id="{{ $item->id }}"
                                           id="section_{{ $item->id }}">

                                    <label class="form-check-label" for="section_{{ $item->id }}">{{ $item->name }}</label>
                                </div>

                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Permissions --}}
        <div class="card shadow mb-4">
            <div class="card-body">

                <h3 class="card-title">Permisos</h3>

                <div class="row">
                    @foreach ($modules as $key => $module)

                        <div class="col-md-3 mt-3">
                            <h5>{{ $key }}</h5>

                            @foreach ($module as $item)

                                <div class="form-check form-switch">
                                    <input class="form-check-input permission"
                                           type="checkbox"
                                           data-permission-id="{{ $item->id }}"
                                           id="permission_{{ $item->id }}">

                                    <label class="form-check-label" for="permission_{{ $item->id }}">{{ $item->description }}</label>
                                </div>

                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary" form="frmCreate" id="btnSave">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>

    </section>

@endsection

<script type="module">

    $(document).ready(function () {

        $("#btnSave").click(function (event) {

            // Permissions
            const permissions = $('.permission:checked');

            let permissionIds = [];

            permissions.each(function () {

                const permissionId = $(this).data('permission-id');
                permissionIds.push(permissionId);
            });

            $('#permissions').val(JSON.stringify(permissionIds));

            // Sections
            const section = $('.section:checked');

            let sectionIds = [];

            section.each(function () {

                const sectionId = $(this).data('section-id');
                sectionIds.push(sectionId);
            });

            $('#sections').val(JSON.stringify(sectionIds));
        });

    });

</script>