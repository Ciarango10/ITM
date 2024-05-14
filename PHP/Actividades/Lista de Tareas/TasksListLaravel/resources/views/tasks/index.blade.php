@extends('layouts.app')

@section('content')

<h1>Tareas</h1>

<a href=" {{route('tasks.create')}} " class='btn btn-primary'>Nuevo Tarea</a>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Completado</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($tasks as $task)

            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->completed ? "Sí" : "No"}}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('tasks.delete', $task->id) }}" style="display:contents" method="POST">
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
                title: "Desea eliminar la tarea?",
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