<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Gloudemans\Shoppingcart\Facades\Cart;
use http\Env\Response;
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
            Cart::add(['id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->price - (($product->price / 100) * ($product->codeSale)),
                'weight' => 0,
                'options' => ['image' => $product->image,
                    'desc' => $product->desc,
                    'quantityProduct' => $product->quantity,
                    'codeSale' => $product->codeSale
                ],
            ]);
            $data = [
                'status' => 'thanh cong',
                'type' => 1,
                'message' => 'Thêm sản phẩm vào giỏ hàng thành công ',
                'total' => Cart::content()->count()
            ];
            return \response()->json($data);
        } else {
            $data = [
                'type' => 2,
                'message' => 'Tạm thời hết hàng',
                'total' => Cart::content()->count()
            ];
            return \response()->json($data);
        }
    }

    public function destroyIdCart($id)
    {
        Cart::remove($id);
        $data = [
            'cart' => Cart::content(),
            'total' => Cart::content()->count(),
            'result' => Cart::subtotal(),
            'status' => 'thanh cong',
            'message' => 'Xóa sản phẩm thành công ',
        ];
        return \response()->json($data);
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
            $data = [
                'type' => 1,
                'item' => Cart::get($rowId),
                'total' => Cart::subtotal(),
                'totalProduct' => (Cart::get($rowId)->qty) * (Cart::get($rowId)->price),
                'quantityProduct' => Cart::get($rowId)->options->quantityProduct,
                'message' => "Cập nhật thành công"
            ];
            return response()->json($data);
        } else {
            $data = [
                'type' => 2,
                'message' => "Vượt số lượng kho hàng, bạn nhập <= $product->quantity"
            ];
            return response()->json($data);
        }
    }
}
