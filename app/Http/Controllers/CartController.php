<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function showCart()
    {
        return view('shopping.cart');
    }

    public function addCart($id)
    {
        $product = $this->productService->findById($id);
        if ($product->quantity !== 0) {
            Cart::add(['id' => $product->id, 'name' => $product->name, 'qty' => 1, 'price' => $product->price, 'weight' => 0, 'options' => ['image' => $product->image, 'desc' => $product->desc]]);
            toastr()->success('Thêm sản phẩm vào giỏ hàng thành công ');
            return back();
        } else {
            toastr()->success('Quý khách thông cảm, Sản phẩm hiện đang hết hàng');
            return back();
        }

    }

    public function destroyIdCart($id)
    {
        Cart::remove($id);
        toastr()->success('Xóa sản phẩm thành công ');
        return redirect()->route('carts.show');
    }

    public function checkoutCart()
    {
        return view('shopping.checkout');
    }

    public function updateCart(Request $request, $rowId, $id)
    {
        $product = $this->productService->findById($id);
        $quantity = $request->qty;

        if ($quantity <= $product->quantity) {
            Cart::update($rowId, $quantity);
            toastr()->success('Thay đổi số lượng sản phẩm thành công ');
            return redirect()->route('carts.show');
        } else {
            toastr()->success("Sản phẩm còn tồn $product->quantity , quý khách thông cảm");
            return redirect()->route('carts.show');
        }

    }

}
