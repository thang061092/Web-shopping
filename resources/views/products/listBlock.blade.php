@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Danh sách sản phẩm Block</li>
            </ol>
        </div>
        <form action="{{route('products.filter')}}" method="get">
            @csrf
            <div class="col-12 col-md-12 pt-3">
                <div class="row">
                    <div class="col-12 col-md-2 ml-2">
                        <select name="category" class="form-control" onchange="this.form.submit()">
                            <option value="">Bộ lọc</option>
                            @foreach($categories as $key => $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Khôi phục</th>
                </tr>
                </thead>
                <tbody>
                @if(count($products)==0)
                    <tr>
                        <td>
                            Không có dữ liệu
                        </td>
                    </tr>
                @else
                    @foreach($products as $key => $product)
                        <tr>
                            <th>{{++$key}}</th>
                            <td>
                                <img src="{{asset('storage/'.$product->image)}}" style="width: 100px">
                            </td>
                            <td>{{$product->name}}</td>
                            <td>{{number_format($product->price)}}</td>
                            <td>{!! \Illuminate\Support\Str::limit($product->desc,300,' ......') !!}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a class="btn btn-success" href="{{route('products.active',$product->id)}}"><i
                                        class="fas fa-window-restore"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $products->appends(request()->query())}}
        </div>

    </div>




@endsection
