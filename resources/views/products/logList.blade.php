@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Danh sách sản phẩm </a>
                </li>
                <li class="breadcrumb-item active">Chi tiết cập nhật sản phẩm</li>
            </ol>
        </div>
        <div class="card-body">
            <h5>Hiển thị (<span class="text-danger">{{$quantity}}</span>) kết quả.</h5>
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Mã giảm giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Trạng thái </th>
                    <th scope="col">Người cập nhật</th>
                    <th scope="col">Thời gian cập nhật</th>
                </tr>
                </thead>
                <tbody>
                @if(count($logProducts)==0)
                    <tr>
                        <td>
                            Không có dữ liệu
                        </td>
                    </tr>
                @else
                    @foreach($logProducts as $key => $logProduct)
                        <tr>
                            <th>{{++$key}}</th>
                            <td>
                                <img src="{{asset('storage/'.$logProduct->image)}}" style="width: 100px">
                            </td>
                            <td>{{$logProduct->name}}</td>
                            <td>{{$logProduct->price ? number_format($logProduct->price) : ''}}</td>
                            <td>{{$logProduct->codeSale ? $logProduct->codeSale : ''}}</td>
                            <td>{!! $logProduct->desc ? \Illuminate\Support\Str::limit($logProduct->desc,200,' ......v.v') : ''!!}</td>
                            <td>{{$logProduct->quantity ? $logProduct->quantity : ''}}</td>
                            <td>{{$logProduct->status ? $logProduct->status : ''}}</td>
                            <td>{{$logProduct->updated_by}}</td>
                            <td>{{$logProduct->created_at}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $logProducts->appends(request()->query())}}
        </div>

    </div>
@endsection
