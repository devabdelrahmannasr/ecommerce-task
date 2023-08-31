<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    
    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    public function getAllWithParent()
    {
        return $this->model->with('parent')->get();
    }

    public function getAllRootCategories()
    {
        return $this->model->whereNull('parent_id')->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function delete($id)
    {
        $category = $this->getById($id);
        $category->delete();
    }
}