@extends('layouts.dashboard')

@section('page-content')
<div class="container">
    <h2>Categories</h2>
    <a class="btn btn-primary" href="{{route('dashboard.categories.create')}}">Create Category</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent Category</th>
                <th>Full Path</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if($category->parent)
                        {{ $category->parent->name }}
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $category->full_path }}</td>
                <td>
                  
                    <form action="{{ route('dashboard.categories.destroy', $category) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
