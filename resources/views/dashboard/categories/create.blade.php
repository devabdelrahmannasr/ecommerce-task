@extends('layouts.dashboard')

@section('page-content')

<div class="container">
    <h2>Create Category</h2>
    <form action="{{ route('dashboard.categories.store') }}" method="POST">
        @csrf
        <div class="form-group col-md-4 mt-3">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group col-md-4 mt-3 select2">
            <label for="parent_id">Parent Category:</label>
            <select name="parent_id" class="form-control">
                <option value="">No Parent</option>
                @include('dashboard.categories.tree', ['categories' => $categories, 'level' => 0])
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</div>
@endsection
