<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
    private $productRepository;
    private $categoriesRepository;
    public function __construct(ProductRepository $productRepository,CategoryRepository $categoriesRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getOneProductPerCategory()
    {
        $products = $this->productRepository->getOneProductPerCategory();

        return new ProductCollection($products);

    }
}
