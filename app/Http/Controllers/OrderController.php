<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('dashboard.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('products'); 
        return view('dashboard.orders.show', compact('order'));
    }
}
