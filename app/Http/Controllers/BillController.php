<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Http\Requests\FormBillRequest;
use App\Http\Services\BillService;
use App\Http\Services\CustomerService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $payment;
    protected $billService;

    public function __construct(CustomerService $customerService,
                                BillService $billService)
    {
        $this->payment = $customerService;
        $this->billService = $billService;
    }

    public function payment(FormBillRequest $request)
    {
        $this->payment->create($request);
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
        $details = Detail::where('bill_id', $id)->get();
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
