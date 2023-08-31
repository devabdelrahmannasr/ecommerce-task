<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Product;

class OrderService
{
    public function createOrder($userName,$address, $products)
    {
        
        $order = Order::create([
            'user_name' => $userName,
            'address' => $address,
            'total_amount' => 0,
        ]);

        
        foreach ($products as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $order->products()->attach($product->id, ['quantity' => $item['quantity'],'subtotal'=>$product->price]);
             
                $order->total_amount += $product->price * $item['quantity'];
                $product->quantity -= $item['quantity'];
                $product->save();
            }
        }

        $order->save();

        return $order->load('products');
    }
}