<?php

namespace App\Http\Controllers;

use App\Http\Services\CustomerService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $payment;

    public function __construct(CustomerService $customerService)
    {
        $this->payment = $customerService;
    }

    public function payment(Request $request)
    {
        $this->payment->create($request);
        toastr()->success('Đặt hàng thành công ');
        Cart::destroy();
        return redirect()->route('products.shop');
    }
}
