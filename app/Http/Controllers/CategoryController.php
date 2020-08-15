<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('home.master', compact('categories'));
    }

    public function show($id)
    {
        $category = $this->categoryService->findById($id);
        $products= $category->products;
        return view('shopping.category-show-product', compact('products'));
    }
}
