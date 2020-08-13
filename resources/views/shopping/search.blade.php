@extends('home.master')
@section('description')
    <div class="card container-fluid pt-5 pb-5">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Hình ảnh</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <th>{{++$key}}</th>
                        <td><a href="{{route('products.show',$product->id)}}"><span class="text-danger">{{$product->name}}</span> <span class="text-success">->Xem chi tiết</span></a></td>
                        <td class="text-danger">{{number_format($product->price)}}</td>
                        <td>{!! \Illuminate\Support\Str::limit($product->desc,300,' ......') !!}</td>
                        <td><span class="text-primary">{{$product->quantity}}</span></td>
                        <td>
                            <img src="{{asset('storage/'.$product->image)}}" style="width: 200px;height: 150px">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->appends(request()->query())}}
        </div>

    </div>

@endsection
