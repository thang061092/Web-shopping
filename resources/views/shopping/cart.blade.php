@extends('home.master')
@section('description')
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    @if (count(Cart::content()))
                    <table class="table table-striped">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm </th>
                            <th scope="col" class="text-center">Số lượng </th>
                            <th scope="col" class="text-right">Giá tiền </th>
                            <th scope="col" class="text-right">Tổng tiền </th>
                            <th> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td><img src="{{asset('storage/'.$item->options->image)}}" style="width: 200px;height: 150px" /> </td>
                                <td>{{$item->name}}</td>
                                <td><input class="form-control" type="number"  value="{{number_format($item->qty)}}"/></td>
                                <td class="text-right">{{number_format($item->price)}} VND</td>
                                <td class="text-right">{{number_format($item->price * $item->qty)}} VND</td>
                                <td><a class="btn btn-danger" href="{{route('carts.destroy',$item->rowId)}}"><i class="fa fa-trash-alt"></i> </a> </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Tổng : </strong></td>
                            <td class="text-right"><strong>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}} VND</strong></td>
                        </tr>
                        </tbody>
                    </table>
                    @else
                        <div class="alert alert-info text-center pb-3 pt-3" role="alert">
                            Giỏ hàng của bạn <b>đang trống</b>.
                        </div>
                    @endif
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a class="btn btn-block btn-primary" href="{{route('products.shop')}}">Continue Shopping</a>
                    </div>
                    <div class="col-sm-12 col-md-6 ">
                        <a class="btn btn-block btn-success">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
