<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Requests\FormBillRequest;
use App\Http\Services\BillService;
use App\Http\Services\CustomerService;
use App\Http\Services\DetailService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $customerService;
    protected $billService;
    protected $detailService;

    public function __construct(CustomerService $customerService,
                                BillService $billService,
                                DetailService $detailService)
    {
        $this->customerService = $customerService;
        $this->billService = $billService;
        $this->detailService = $detailService;
    }

    public function payment(FormBillRequest $request)
    {
        $this->customerService->create($request);
        toastr()->success('Đơn hàng của bạn đang được xử lý ');
        Cart::destroy();
        return redirect()->route('products.shop');
    }

    public function index()
    {
        $statuses = Major::STATUSES;
        $bills = $this->billService->getAll();
        return view('bills.list', compact('bills', 'statuses'));
    }

    public function show($id)
    {
        $bill = $this->billService->findById($id);
        $details = $this->detailService->find($id);
        return view('bills.detail', compact('bill', 'details'));
    }

    public function update(Request $request, $id)
    {
        return $this->billService->update($request, $id);
    }

    public function fitterStatus(Request $request)
    {
        $statuses = Major::STATUSES;
        $bills = $this->billService->fitterStatus($request);
        return view('bills.list', compact('bills', 'statuses'));
    }
}
