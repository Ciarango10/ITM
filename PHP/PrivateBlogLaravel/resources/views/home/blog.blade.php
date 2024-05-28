@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Blog</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home.section', $blog->section_id) }}">Section</a></li>
            <li class="breadcrumb-item active">Blog</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="card">
        <div class="card-header">{{ $blog->title }}</div>
            <div class="card-body">
                {{ $blog->description }}
            </div>
    </div>

</section>

@endsection