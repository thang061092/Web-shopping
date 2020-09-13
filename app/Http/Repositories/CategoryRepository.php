<?php


namespace App\Http\Repositories;


use App\Category;

class CategoryRepository
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function getAll()
    {
        return $this->categoryModel->paginate(10);
    }

    public function save($category)
    {
        $category->save();
    }

    public function findById($id)
    {
        return $this->categoryModel->findOrFail($id);
    }

    public function destroy($category)
    {
        $category->delete();
    }
}
