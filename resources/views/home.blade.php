@extends('layouts.front')

@section('content')

    <section class="hero text-center py-5">
        <div class="container">
            <h1>Welcome to Our Ecommerce Store</h1>
            <p>Discover the latest trends in fashion and technology.</p>
        </div>
    </section>

    <section class="categories py-5">
        <div class="container">
            <h2 class="text-center mb-4">Popular Categories</h2>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" alt="{{ $category->name }}" class="card-img-top">
                            <div class="card-body">
                                <h3 class="card-title">{{ $category->name }}</h3>
                                <p class="card-text">Discover amazing products in this category.</p>
                                <a href="{{route('products.category',['category'=>$category->id])}}" class="btn btn-primary">Explore</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection