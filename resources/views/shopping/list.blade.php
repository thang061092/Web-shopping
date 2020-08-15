@extends('home.master')
@section('description')
    <div class="top_catagory_area section-padding-80 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                         style="background-image: url({{asset('wew.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Tủ Lạnh</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                         style="background-image: url({{asset('ujju.jpg')}});">
                        <div class="catagory-content">
                            <a href="#">Laptop</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img"
                         style="background-image: url({{asset('adsqw.jpeg')}});">
                        <div class="catagory-content">
                            <a href="#">Điện Thoại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="new_arrivals_area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Sản phẩm phổ biến</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        @foreach($products1 as $key => $product)
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('storage/'.$product->image)}}" alt=""
                                         style="width: 200px; height: 150px">
                                    <img class="hover-img" src="{{asset('storage/'.$product->image)}}" alt=""
                                         style="width: 200px">
                                </div>
                                <div class="product-description">
                                    <span>{{$product->category->name}}</span>
                                    <a href="{{route('products.show',$product->id)}}" class="link">
                                        <h6>{{$product->name}} <p class="text-success">->Xem chi tiết</p></h6>
                                    </a>
                                    <h6 class="product-price">Giá tiền: <p
                                            class="text-danger">{{number_format($product->price)}} VND </p></h6>
                                    <div>
                                        @if($product->quantity == 0)
                                            <h6 class="text-primary">Hết hàng</h6>
                                        @else
                                            <h6 class="text-primary">Còn hàng</h6>
                                        @endif
                                    </div>
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="{{route('carts.add',$product->id)}}"
                                               class="btn essence-btn add-cart">Thêm
                                                vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        @foreach($products2 as $key => $product)
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('storage/'.$product->image)}}" alt=""
                                         style="width: 200px; height: 150px">
                                    <img class="hover-img" src="{{asset('storage/'.$product->image)}}" alt=""
                                         style="width: 200px">
                                </div>
                                <div class="product-description">
                                    <span>{{$product->category->name}}</span>
                                    <a href="{{route('products.show',$product->id)}}" class="link">
                                        <h6>{{$product->name}} <p class="text-success">->Xem chi tiết</p></h6>
                                    </a>
                                    <h6 class="product-price">Giá tiền: <p
                                            class="text-danger">{{number_format($product->price)}} VND </p></h6>
                                    <div>
                                        @if($product->quantity == 0)
                                            <h6 class="text-secondary">Hết hàng</h6>
                                        @else
                                            <h6 class="text-primary">Còn hàng</h6>
                                        @endif
                                    </div>
                                    <div class="hover-content">
                                        <div class="add-to-cart-btn">
                                            <a href="{{route('carts.add',$product->id)}}"
                                               class="btn essence-btn add-cart">Thêm
                                                vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="brands-area d-flex align-items-center justify-content-between">
        @foreach($categories as $category)
            <div class="single-brands-logo ">
                <a href="{{route('categories.show',$category->id)}}" class="btn btn-link "><h4>{{$category->name}}</h4></a>
            </div>
        @endforeach
    </div>
@endsection
