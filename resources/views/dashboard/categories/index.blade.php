@extends('layouts.dashboard')

@section('title', 'Categories')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')

    <div class="mb-5">
        {{-- @if (Auth::user()->can('categories.create')) --}}
        <a href="{{ route('dashboard.categories.create') }}" class="btn btn-bg btn-outline-success mr-2">Create</a>
        {{-- @endif --}}
        {{-- <a href="{{ route('dashboard.categories.trash') }}" class="btn btn-sm btn-outline-danger">Trash</a> --}}
    </div>

    <x-alert type="success" />
    <x-alert type="danger" />
    <x-alert type="warning" />
    <x-alert type="info" />

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>category title</th>
                <th>Created At</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td><a href="{{ route('dashboard.categories.show', $category->id) }}">{{ $category->title }}</a></td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        {{-- @can('categories.update') --}}
                        <a href="{{ route('dashboard.categories.edit', $category->id) }}"
                            class="btn btn-sm btn-outline-warning">Edit</a>
                        {{-- @endcan --}}
                    </td>
                    <td>
                        {{-- @can('categories.delete') --}}
                        <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                        {{-- @endcan --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">No categories defined.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $categories->withQueryString()->appends(['search' => 1])->links() }}

@endsection
