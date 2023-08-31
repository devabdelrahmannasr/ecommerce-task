@extends('layouts.dashboard') <!-- Assuming you have a layout file -->

@section('page-content')
    <div class="container">
        <h1>Create Product</h1>
        <form action="{{ route('dashboard.products.store') }}" method="POST">
            @csrf
            <div class="row">
            <div class="form-group col-md-3 mt-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="sku">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku">
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="barcode">Barcode</label>
                <input type="text" class="form-control" id="barcode" name="barcode">
            </div>
            <div class="form-check col-md-3 mt-3">
                <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured">
                <label class="form-check-label" for="is_featured">Featured Product</label>
            </div>
            <div class="form-check col-md-3 mt-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" checked value="1">
                <label class="form-check-label" for="is_active">Active Product</label>
            </div>
            <div class="form-group col-md-3 mt-3">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="">Select a category</option>
                     @include('dashboard.categories.tree', ['categories' => $categories, 'level' => 0])
                </select>
            </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Create Product</button>
        </form>
    </div>
@endsection