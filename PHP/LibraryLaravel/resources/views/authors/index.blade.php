@extends('layouts.app')

@section('content')

<h1>Autores</h1>

<a href=" {{route('authors.create')}} " class='btn btn-primary'>Nuevo Autor</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($authors as $author)

            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->last_name }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('authors.delete', $author->id) }}" style="display:contents" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btnDelete">Eliminar</button>
                    </form>
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

@endsection
<script type="module">
    $(document).ready(function() {
        $(".btnDelete").click(function(ev) {
            ev.preventDefault();

            const form = $(this).closest('form');

            Swal.fire({
                title: "Desea eliminar el registro?",
                text: "No podra revertirlo",
                icon: "question",
                showCancelButton:true,
                confirmButtonColor:"#3085d6",
                cancelButtonColor:"#d33",
                confirmButtonText:"Si"
                }).then((result) => {
                    if(result.isConfirmed) {
                        form.submit();
                    }
                });
        });
    })
</script>