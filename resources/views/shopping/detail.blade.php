@extends('home.master')
@section('description')
    <div class="pt-5 pb-5 container-fluid">
        <section class="single_product_details_area d-flex align-items-center">
            <div class="single_product_thumb clearfix">
                <div class="product_thumbnail_slides owl-carousel">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 85%">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 85%">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 85%">
                </div>
            </div>
            <div class="single_product_desc clearfix">
               <h1>{{$product->category->name}}</h1>
                <h2>{{$product->name}}</h2>
                <p class="product-price"> Giá tiền: {{number_format($product->price)}} VND</p>
                <p class="product-desc">{!! $product->desc !!}</p>

                <div class="cart-fav-box d-flex align-items-center">
                    <a class="btn btn-primary" href="{{route('carts.add',$product->id)}}">Thêm vào giỏ hàng</a>
                    <a class="btn btn-secondary ml-3" href="{{route('products.shop')}}">Về trang chủ</a>
                </div>
            </div>
        </section>
    </div>
@endsection
