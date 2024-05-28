@extends('layouts.app')

@section('content')


<div class="pagetitle">
    <h1>Sección</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Sección</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="row">

        <h1>{{ $section->name }}</h1>

        @foreach ($section->blogs as $blog)
            <div class="col-md-5 m-2">
                <a href="{{ route('home.blog', $blog->id) }}" class="btn btn-outline-success form-control">{{ $blog->title }}</a>
            </div>
        @endforeach

    </div>

</section>

@endsection