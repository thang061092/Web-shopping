<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormAddRequest;
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

    public function store(FormAddRequest $request)
    {
        $this->productService->store($request);
        toastr()->success('Thêm mới thành công ');
        return redirect()->route('products.index');
    }

    public function filterCategory(Request $request)
    {
        $products = $this->productService->filterCategory($request);
        $categories = $this->categoryService->getAll();
        return view('products.list', compact('products', 'categories'));
    }

    public function shop()
    {
        $products1 = $this->productService->allDesc();
        $products2 = $this->productService->allAsc();
        $categories = $this->categoryService->getAll();
        return view('shopping.list', compact('products1', 'categories', 'products2'));
    }

    public function show($id)
    {
        $product = $this->productService->findById($id);
        return view('shopping.detail', compact('product'));
    }

    public function searchHome(Request $request)
    {
        $products = $this->productService->searchHome($request);
        return view('shopping.search', compact('products'));
    }

    public function searchProduct(Request $request)
    {
        $categories = $this->categoryService->getAll();
        $products = $this->productService->searchProduct($request);
        return view('products.list', compact('products', 'categories'));
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->getAll();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->findById($id);
        $this->productService->update($product, $request);
        toastr()->success('Cập nhật thành công ');
        return redirect()->route('products.index');
    }

}
