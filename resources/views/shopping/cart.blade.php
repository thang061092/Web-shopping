@extends('home.master')
@section('description')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if (count(Cart::content()))
                        <table class="table table-striped cart-show">
                            <thead class="table-dark">
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-right">Giá tiền</th>
                                <th scope="col" class="text-right">Tổng tiền</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach (Cart::content() as $item)
                                <tr id="content-cart-{{$item->rowId}}">
                                    <td><img src="{{asset('storage/'.$item->options->image)}}"
                                             style="width: 100px;height: 70px"/></td>
                                    <td>{{$item->name}}</td>
                                    <td><input min="1" class="form-control update-product-cart" type="number" name="qty"
                                               data-rowId="{{ $item->rowId }}"
                                               data-id="{{$item->id}}" value="{{number_format($item->qty)}}"/></td>
                                    <td class="text-right">{{number_format($item->price)}} VND</td>
                                    <td class="text-right"
                                        id="product-subtotal-{{$item->id}}">{{number_format($item->price * $item->qty)}}
                                        VND
                                    </td>
                                    <td><button class="btn btn-danger remove-product-cart" data-id="{{$item->rowId}}"><i
                                                class="fa fa-trash-alt"></i> </button></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Tổng : </strong></td>
                                <td class="text-right " id="total-price-cart">
                                    <strong>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}
                                        VND</strong></td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-center pb-3 pt-3 empty-cart" role="alert">
                            Giỏ hàng của bạn <b>đang trống</b>.
                        </div>
                    @endif
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a class="btn btn-block btn-primary" href="{{route('products.shop')}}">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-sm-12 col-md-6 ">
                        <a class="btn btn-block btn-success" href="{{route('carts.checkout')}}">Thủ tục thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
