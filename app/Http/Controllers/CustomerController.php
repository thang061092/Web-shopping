<?php

namespace App\Http\Controllers;

use App\Http\Services\BillService;
use App\Http\Services\CategoryService;
use App\Http\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    protected $billService;

    public function __construct(CustomerService $customerService,
                                BillService $billService)
    {
        $this->customerService = $customerService;
        $this->billService = $billService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        $quantity = $this->customerService->countGetAll();
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('customers.list', compact('customers', 'quantity', 'billss', 'countBill'));
    }
}
