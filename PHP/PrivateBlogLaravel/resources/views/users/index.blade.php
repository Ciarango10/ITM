@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Usuarios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Usuarios</h3>
                    <div class="col-md-1">
                        <a href="{{ route('users.create') }}" class="btn btn-primary"><i
                                class="bi bi-plus-circle"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <form class="navbar-search" method="GET" action="{{ route('users.index')}}" >

                    <div class="row mt-3">
                        <div class="col-md-auto">

                            <select class="form-select bg-light border-0 small" value="{{ $data->records_per_page }}" name="records_per_page">
                                <option {{ $data->records_per_page == 2 ? 'selected' : ''}} value="2">2</option>
                                <option {{ $data->records_per_page == 10 ? 'selected' : ''}} value="10">10</option>
                                <option {{ $data->records_per_page == 15 ? 'selected' : ''}} value="15">15</option>
                                <option {{ $data->records_per_page == 30 ? 'selected' : ''}} value="30">30</option>
                                <option {{ $data->records_per_page == 50 ? 'selected' : ''}} value="50">50</option>
                            </select>

                        </div>

                        <div class="col-md-11">

                            <div class="input-group mb-3">
                                <input type="text"
                                       class="form-control bg-light border-0 small"
                                       placeholder="Buscar..."
                                       aria-label="Search"
                                       name="filter"
                                       value="{{ $data->filter }}" />

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                            </div>

                        </div>
                    </div>

                </form>

                <table class="table table-bordered">
                    <thead>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->document }} </td>
                                <td> {{ $user->full_name }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->role->name }} </td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i
                                            class="bi bi-pencil-fill"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">

                        {{ $users->appends(request()->except('page'))->links('vendor.pagination.custom') }}

                    </ul>
                  </nav>

            </div>

        </div>

    </section>

@endsection