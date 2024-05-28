@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="row">
        @foreach ($sections as $section)
            <div class="col-md-5 m-2">
                <a href="{{ route('home.section', $section->id) }}" class="btn btn-outline-primary form-control">{{ $section->name }}</a>
            </div>
        @endforeach
    </div>

</section>

@endsection