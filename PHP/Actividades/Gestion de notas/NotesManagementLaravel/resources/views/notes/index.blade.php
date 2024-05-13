@extends('layouts.app')

@section('content')
<h1>Notas</h1>
<a href=" {{route('notes.create')}} " class='btn btn-primary'>Nueva nota</a>

<form class="navbar-search" method="GET" action="{{ route('notes.index')}}">
    <div class="row mt-3">
        <div class="col-md-auto">
            <select class="form-select bg-light border-0 small" data-width="100%" value="{{ $data->records_per_page }}"
                name="records_per_page">
                <option {{ $data->records_per_page == 2 ? 'selected' : '' }} value="2">2</option>
                <option {{ $data->records_per_page == 10 ? 'selected' : '' }} value="10">10</option>
                <option {{ $data->records_per_page == 15 ? 'selected' : '' }} value="15">15</option>
                <option {{ $data->records_per_page == 20 ? 'selected ' : '' }} value="20">20</option>
                <option {{ $data->records_per_page == 50 ? 'selected ' : '' }} value="50">50</option>
            </select>
        </div>
        <div class="col-md-11">
            <div class="input-group mb-3">

                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar.."
                    aria-label="Search" name="filter" value="{{ $data->filter }}">

                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Categoria</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

        @foreach ($notes as $note)
            <tr>
                <td>{{ $note->title }}</td>
                <td>{{ $note->content }}</td>
                <td>{{ $note->category->name }}</td>
                <td>
                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('notes.delete', $note->id) }}" style="display:contents" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btnDelete">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        {{ $notes->appends(request()->except('page'))->links('vendor.pagination.custom') }}
    </ul>
</nav>
@endsection

<script type="module">
    $(document).ready(function () {
        $(".btnDelete").click(function (ev) {
            ev.preventDefault();

            const form = $(this).closest('form');

            Swal.fire({
                title: "Desea eliminar el registro?",
                text: "No podra revertirlo",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    })
</script>