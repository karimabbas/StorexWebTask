@extends('layouts.dashboard')

@section('title', 'Edit Movie')

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Movies</li>
<li class="breadcrumb-item active">Edit Movie</li>
@endsection

@section('content')

<form action="{{ route('dashboard.movies.update', $Movie->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')

    @include('dashboard.movies._form', [
        'button_label' => 'Update',
        'color'=> 'btn btn-warning'

    ])
</form>

@endsection
