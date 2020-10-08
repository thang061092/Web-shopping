<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Http\Requests\FormAddRequest;
use App\Http\Services\BillService;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $billService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                BillService $billService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->billService = $billService;
    }

    public function index()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->getAll();
        $quantity = $this->productService->countGetAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.list', compact('products', 'categories', 'quantity', 'billss', 'countBill'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.create', compact('categories', 'billss', 'countBill'));
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
        $quantity = $this->productService->countFilterCategory($request);
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.list', compact('products', 'categories', 'quantity', 'billss', 'countBill'));
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
        $quantity = $this->productService->countSearchHome($request);
        return view('shopping.search', compact('products', 'quantity'));
    }

    public function searchProduct(Request $request)
    {
        $categories = $this->categoryService->getAll();
        $products = $this->productService->searchProduct($request);
        $quantity = $this->productService->countSearch($request);
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.list', compact('products', 'categories', 'quantity', 'billss', 'countBill'));
    }

    public function edit($id)
    {
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->getAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.edit', compact('product', 'categories', 'billss', 'countBill'));
    }

    public function update(Request $request, $id)
    {
        $product = $this->productService->findById($id);
        $this->productService->update($product, $request);
        toastr()->success('Cập nhật thành công ');
        return redirect()->route('products.index');
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function blockProduct($id)
    {
        $product = $this->productService->findById($id);
        $this->productService->blockProduct($product);
        toastr()->success('Cập nhật thành công ');
        return redirect()->route('products.index');
    }

    public function getProductBlock()
    {
        $products = $this->productService->getProductBlock();
        $categories = $this->categoryService->getAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.listBlock', compact('products', 'categories', 'billss', 'countBill'));
    }

    public function activeProduct($id)
    {
        $product = $this->productService->findById($id);
        $this->productService->activeProduct($product);
        $data = [
            'status' => 'thanh cong',
            'message' => 'Cập nhật thành công '
        ];
        return response()->json($data);
    }

    public function changeSale(Request $request, $id)
    {
        $product = $this->productService->findById($id);
        $this->productService->changeSale($product, $request);
        toastr()->success('Cập nhật thành công ');
        return redirect()->route('products.index');
    }

    public function detail($id)
    {
        $product = $this->productService->findById($id);
        return response()->json($product);
    }
}
