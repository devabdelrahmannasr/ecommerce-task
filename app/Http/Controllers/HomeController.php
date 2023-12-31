<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        return view('home', compact('categories'));
    }

    public function productsByCategory(Category $category)
    {
        $products = $category->products;
        return view('shop.products', compact('category', 'products'));
    }
    
    public function cart()
    {
        return view('shop.cart');
    }
}
