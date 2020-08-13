@extends('home.master')
@section('description')
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Địa chỉ thanh toán</h5>
                        </div>

                        <form action="{{route('carts.payment')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="first_name">Họ và tên:<span>*</span></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="company">Số điên thoại:</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="email_address">Email: <span>*</span></label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Địa chỉ: <span>*</span></label>
                                    <textarea class="form-control" name="address"></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Ghi chú: <span>*</span></label>
                                    <textarea class="form-control" id="editor" name="note"></textarea>
                                </div>
                                <div  class="col-12 mb-3" >
                                    <button type="submit" class="btn btn-primary">Thanh toán</button>
                                    <a href="{{route('products.shop')}}" class="btn btn-secondary">Quay lại</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Đơn hàng của bạn:</h5>
                        </div>

                        <div class="order-details-form mb-4">
                            <li><span>Sản phẩm</span> <span>Tổng</span></li>
                            @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $item)
                                <li>
                                    <span><img src="{{asset('storage/'.$item->options->image)}}"
                                               style="width: 50px"></span>
                                    <span class="text-danger">{{$item->qty}}</span> x <span
                                        class="text-danger">{{\Illuminate\Support\Str::limit($item->name,20)}}</span>
                                    <span>{{number_format($item->qty * $item->price)}} VND</span>
                                </li>
                            @endforeach
                            <li><span>Tổng tiền:</span> <span class="text-danger">{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}} VND</span>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
