@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </div>
        <form action="{{route('products.filter')}}" method="post" >
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
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $key => $product)
                    <tr>
                        <th>{{++$key}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{number_format($product->price)}}</td>
                        <td>{!! $product->desc !!}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <img src="{{asset('storage/'.$product->image)}}" style="width: 250px;height: 250px">
                        </td>
                        <td>
                            <a class="btn btn-primary" href=""><i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href=""><i class="fas fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>




@endsection
