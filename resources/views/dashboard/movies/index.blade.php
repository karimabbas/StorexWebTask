@extends('layouts.dashboard')

@section('title', 'Movies')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Movies</li>
@endsection

@section('content')

    <div class="mb-5">
        {{-- @if (Auth::user()->can('Movies.create')) --}}
        <a href="{{ route('dashboard.movies.create') }}" class="btn btn-bg btn-outline-success mr-2">Create</a>
        {{-- @endif --}}
        {{-- <a href="{{ route('dashboard.movies.trash') }}" class="btn btn-sm btn-outline-danger">Trash</a> --}}
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />
    <x-alert type="warning" />
    <x-alert type="info" />

    <form action="{{ URL::current() }}" method="get" class="d-flex justify-content-between mb-4">
        {{-- <x-form.input name="title" placeholder="movie name" class="mx-2" :value="request('title')" /> --}}

        <x-form.select name="category_id" class="form-control form-select" :options="$categories">

        </x-form.select>

        <button class="btn btn-dark mx-2">Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Movie title</th>
                <th>Category</th>
                <th>rating</th>
                <th>Created At</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($Movies as $Movie)
                <tr>
                    <td>{{ $Movie->id }}</td>
                    <td><img src="{{ asset($Movie->image_url) }}" alt="" height="50" width="100"></td>
                    <td><a href="{{ route('dashboard.movies.show', $Movie->id) }}">{{ $Movie->title }}</a></td>
                    <td>{{ $Movie->category->title }}</td>
                    <td>{{ $Movie->rate }}</td>
                    <td>{{ $Movie->created_at }}</td>
                    <td>
                        {{-- @can('Movies.update') --}}
                        <a href="{{ route('dashboard.movies.edit', $Movie->id) }}"
                            class="btn btn-sm btn-outline-warning">Edit</a>
                        {{-- @endcan --}}
                    </td>
                    <td>
                        {{-- @can('Movies.delete') --}}
                        <form action="{{ route('dashboard.movies.destroy', $Movie->id) }}" method="post">
                            @csrf
                            <!-- Form Method Spoofing -->
                            <input type="hidden" name="_method" value="delete">
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No Movies defined.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $Movies->withQueryString()->appends(['search' => 1])->links() }}


@endsection
