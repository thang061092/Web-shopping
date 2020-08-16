<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CategoryService $categoryService)
    {
        $this->customerService = $categoryService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customers.list', compact('customers'));
    }
}
