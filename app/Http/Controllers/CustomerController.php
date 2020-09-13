<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customers.list', compact('customers'));
    }
}
