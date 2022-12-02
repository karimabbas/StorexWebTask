@extends('layouts.dashboard')

@section('title', $category->title)

@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
<li class="breadcrumb-item active">{{ $category->title }}</li>
@endsection

@section('content')

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $category->title }}</td>
            <td>{{ $category->created_at }}</td>
        </tr>
    </tbody>
</table>

@endsection
