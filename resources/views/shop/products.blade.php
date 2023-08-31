@extends('layouts.front')

@section('content')
    <section class="hero text-center py-5">
        <div class="container">
            <h1>Welcome to Our Ecommerce Store</h1>
            <p>Discover the latest trends in fashion and technology.</p>
        </div>
    </section>

    <section class="products py-5">
        <div class="container">
            <h2 class="text-center mb-4">Products in {{ $category->name }}</h2>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" alt="{{ $product->name }}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">{{ $product->name }}</h3>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-text">Price: ${{ $product->price }}</p>
                                <form class="add-to-cart-form" data-product-id="{{ $product->id }}" data-product-name="{{$product->name}}">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="quantity" value="1" min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection