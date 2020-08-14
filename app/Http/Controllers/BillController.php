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
        if ($bill->status == Major::FINISH) {
            $details = Detail::where('bill_id', $id)->get();
            $sumProductBill = 0;
            $sumProduct = 0;
            foreach ($details as $detail) {
                $sumProductBill += $detail->quantityProduct;
                $sumProduct += $detail->product->quantity;
            }
            foreach ($details as $detail) {
                if ($sumProductBill <= $sumProduct) {
                    $detail->product->quantity = ($detail->product->quantity) - ($detail->quantityProduct);
                    $detail->product->save();
                    $bill->save();
                } else {
                    toastr()->error('Số lượng sản phẩm đặt hàng và số lượng tồn kho không khớp, vui lòng kiểm tra lại ');
                    return back();
                }
            }
        } else {
            $bill->save();
            toastr()->success('Xác nhận giao dịch thành công ');
            return back();
        }


    }
}
