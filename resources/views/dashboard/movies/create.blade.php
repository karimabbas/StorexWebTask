@extends('layouts.dashboard')

@section('title', 'Movies')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Movies</li>
@endsection

@section('content')

<form action="{{ route('dashboard.movies.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    @include('dashboard.movies._form')
</form>

@endsection
