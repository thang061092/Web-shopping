<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        return view('products.list', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productService->store($request);
        toastr()->success('Thêm mới thành công ');
        return redirect()->route('products.index');
    }

    public function filterCategory(Request $request)
    {
        $category = $request->category;
        $products = Product::where('category_id', $category)->get();
        $categories = $this->categoryService->getAll();
        return view('products.list', compact('products', 'categories'));
    }


}
