@extends('layouts.dashboard')

@section('title', $Movie->title)

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
<li class="breadcrumb-item active">{{ $Movie->title }}</li>
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img src="{{ asset('storage/' . $Movie->image) }}" alt="" height="50"></td>
            <td>{{ $Movie->title }}</td>
            <td>{{ $Movie->created_at }}</td>
        </tr>
    </tbody>
</table>


@endsection
