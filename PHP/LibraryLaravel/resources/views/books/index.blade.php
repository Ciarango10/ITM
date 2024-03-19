@extends('layouts.app')

@section('content')

<h1>Libros</h1>

<a href=" {{route('books.create')}} " class='btn btn-primary'>Nuevo Libro</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Autor</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($books as $book)

            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->description }}</td>
                @foreach ($authors as $author)
                    @if($author->id == $book->author_id) 
                        <td>{{ $author->first_name }} {{ $author->last_name }}</td>
                    @endif
                @endforeach

                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('books.delete', $book->id) }}" style="display:contents" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btnDeleteBook">Eliminar</button>
                    </form> 
                </td>
            </tr>

        @endforeach
    </tbody>
</table>

@endsection
<script type="module">
    $(document).ready(function() {
        $(".btnDeleteBook").click(function(ev) {
            ev.preventDefault();

            const form = $(this).closest('form');

            Swal.fire({
                title: "Desea eliminar el libro?",
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