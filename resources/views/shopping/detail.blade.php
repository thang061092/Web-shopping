@extends('home.master')
@section('description')
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
                <img src="{{asset('storage/'.$product->image)}}" alt="">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>{{$product->category->name}}</span>
            <a href="cart.html">
                <h2>{{$product->name}}</h2>
            </a>
            <p class="product-price"> Giá tiền: {{number_format($product->price)}} VND</p>
            <p class="product-desc">{!! $product->desc !!}</p>

            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <a class="btn btn-primary" href="{{route('carts.add',$product->id)}}">Thêm vào giỏ hàng</a>
                <a class="btn btn-secondary ml-3" href="{{route('products.shop')}}">Quay lại</a>
            </div>

        </div>
    </section>


@endsection
