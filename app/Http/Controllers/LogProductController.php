<?php

namespace App\Http\Controllers;

use App\Http\Services\BillService;
use App\Http\Services\LogProductService;
use Illuminate\Http\Request;

class LogProductController extends Controller
{
    protected $logProductService;
    protected $billService;

    public function __construct(LogProductService $logProductService,
                                BillService $billService)
    {
        $this->logProductService = $logProductService;
        $this->billService = $billService;
    }

    public function detailProduct($id)
    {
        $logProducts = $this->logProductService->detailProduct($id);
        $quantity = $this->logProductService->countDetailProduct($id);
        $billss = $this->billService->billWaiting();
        $countBill = $this->billService->countBillWaiting();
        return view('products.logList', compact('logProducts', 'quantity', 'billss', 'countBill'));
    }
}
