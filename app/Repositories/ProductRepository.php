<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::findOrFail($id);
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
    }

    public function getOneProductPerCategory()
    {
        $products = Product::whereIn('id', function ($subquery) {
            $subquery->selectRaw('MIN(id)')
                ->from('products')
                ->groupBy('category_id');
        })->get();
      
        return $products;
    }
}