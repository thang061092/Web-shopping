<style>
    .price-sale-code {
        text-decoration: line-through;
    }
</style>
@extends('home.master')
@section('description')
    <div class="pt-5 pb-5 container-fluid">
        <section class="single_product_details_area d-flex align-items-center">
            <div class="single_product_thumb clearfix">
                <div class="product_thumbnail_slides owl-carousel">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 75%">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 75%">
                    <img src="{{asset('storage/'.$product->image)}}" alt="" style="width: 75%">
                </div>
            </div>
            <div class="single_product_desc clearfix">
                <h1>{{$product->category->name}}
                    @if($product->codeSale !=0)
                        <img
                            src="{{asset('img/pngtree-big-sale-banner-with-megaphone-and-speech-bubble-png-image_4945616.jpg')}}"
                            alt="" style="width: 10%">
                    @endif
                </h1>
                <h2>{{$product->name}}</h2>
                @if($product->codeSale ==0)
                    <h3 class="product-price">Giá tiền: <h2
                            class="text-danger">{{number_format($product->price)}} VND </h2></h3>
                @else
                    <h3 class="product-price">Giá cũ : <h2
                            class="text-secondary price-sale-code">{{number_format($product->price)}}
                            VND </h2></h3>
                    <h3 class="product-price">Giá khuyến mại:
                        <div class="text-success">SALE({{$product->codeSale.'%'}})</div>
                        <h2
                            class="text-danger">{{number_format(($product->price) - (($product->price/100)*($product->codeSale)))}}
                            VND </h2></h3>
                @endif
                <h3 class="product-desc">{!! $product->desc !!}</h3>

                <div class="cart-fav-box d-flex align-items-center">
                    <button class="btn btn-primary add-cart" data-id="{{$product->id}}">Thêm vào giỏ hàng</button>
                    <a class="btn btn-secondary ml-3" href="{{route('products.shop')}}">Về trang chủ</a>
                </div>
            </div>
        </section>
    </div>
@endsection
