<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'address' => 'required',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*' => [
                'array',
                function ($attribute, $value, $fail) {
                    if (!isset($value['product_id']) || !isset($value['quantity'])) {
                        $fail('Invalid product data.');
                    }
                },
                function ($attribute, $value, $fail) {
                    $product = Product::find($value['product_id']);
        
                    if (!$product || $value['quantity'] > $product->quantity) {
                        $fail('Invalid quantity or product not available.');
                    }
                },
            ],
        ]);        
       

        $order = $this->orderService->createOrder(
            $request->input('user_name'),
            $request->input('address'),
            $request->input('products')
        );

        return new OrderResource($order);
    }
}
