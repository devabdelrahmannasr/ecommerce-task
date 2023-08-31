@extends('layouts.dashboard') <!-- Assuming you have a layout file -->

@section('page-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Orders</h1>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold ">Order List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                             <th>Address</th>
                            <th>Total Amount</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Order ID</th>
                            <th>User</th>
                            <th>Address</th>
                            <th>Total Amount</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ $order->address }}</td>

                                <td>{{ $order->total_amount }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <a href="{{ route('dashboard.orders.show', $order->id) }}" class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection