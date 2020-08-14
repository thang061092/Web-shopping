<?php

namespace App\Http\Controllers;

use App\Detail;
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

    public function payment(Request $request)
    {
        $this->payment->create($request);
        toastr()->success('Đặt hàng thành công ');
        Cart::destroy();
        return redirect()->route('products.shop');
    }

    public function index()
    {
        $bills = $this->billService->getAll();
        return view('bills.list', compact('bills'));
    }

    public function show($id)
    {
        $bill = $this->billService->findById($id);
        $details = Detail::where('bill_id', $id)->get();
        return view('bills.detail', compact('bill', 'details'));
    }

    public function update(Request $request, $id)
    {
        $bill = $this->billService->findById($id);
        $bill->status = $request->status;
        $bill->save();

        if ($bill->status == Major::FINISH) {
            $details = Detail::where('bill_id', $id)->get();
            foreach ($details as $detail) {
                $detail->product->quantity = ($detail->product->quantity) - ($detail->quantityProduct);
                $detail->product->save();
            }
        }
        toastr()->success('Xác nhận giao dịch thành công ');
        return back();

    }
}
