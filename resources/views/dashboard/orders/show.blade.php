@extends('layouts.dashboard')

@section('page-content')
    <div class="container">
        <h2>Order Details</h2>
        <div class="card">
            <div class="card-header">
                Order ID: {{ $order->id }}
            </div>
            <div class="card-body">
                <h4>User Information</h4>
                <p><strong>Name:</strong> {{ $order->user_name }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
                
                <h4>Products</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->price * $product->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <h4>Order Total: {{ $order->total_amount }}</h4>
            </div>
        </div>
    </div>
@endsection
