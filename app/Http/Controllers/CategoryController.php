<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllWithParent();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAllRootCategories();
        return view('dashboard.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->categoryRepository->create($request->all());
        return redirect()->route('dashboard.categories.index')->with('success', 'Category created successfully.');
    }

   

    public function destroy(Category $category)
    {
        $this->categoryRepository->delete($category->id);
        return redirect()->route('dashboard.categories.index')->with('success', 'Category deleted successfully.');
    }
}
