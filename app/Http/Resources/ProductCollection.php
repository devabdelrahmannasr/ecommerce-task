<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'sku' => $product->sku,
                'barcode' => $product->barcode,
                'is_featured' => $product->is_featured,
                'is_active' => $product->is_active,
                'category' => new CategoryResource($product->category), // Assuming you have a CategoryResource
                'created_at' => $product->created_at,
                'updated_at' => $product->updated_at,
            ];
        });
    }
}