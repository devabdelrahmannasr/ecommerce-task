@extends('layouts.dashboard')

@section('page-content')
    <h1 class="h2">Dashboard</h1>
    <p>This is the homepage </p>
    <div class="row my-4">
        <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="card">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <h5 class="card-title">{{App\Models\Category::count()}}</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Products</h5>
                <div class="card-body">
                    <h5 class="card-title">{{App\Models\Product::count()}}</h5>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Orders</h5>
                <div class="card-body">
                    <h5 class="card-title">{{App\Models\Order::count()}}</h5>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
                <h5 class="card-header">Users</h5>
                <div class="card-body">
                    <h5 class="card-title">{{App\Models\User::count()}}</h5>
               
                </div>
            </div>
        </div>
    </div>
   
@endsection
