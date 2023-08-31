<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    private $categoriesRepository;
    public function __construct(ProductRepository $productRepository,CategoryRepository $categoriesRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoriesRepository = $categoriesRepository;
    }
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoriesRepository->getAllRootCategories();
        return view('dashboard.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productRepository->createProduct($request->all());
        return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully.');
    }

    
    public function destroy($id)
    {
        $product = $this->productRepository->getProductById($id);
        $this->productRepository->deleteProduct($product);
        return redirect()->route('dashboard.products.index')->with('success', 'Product deleted successfully.');
    }
}
