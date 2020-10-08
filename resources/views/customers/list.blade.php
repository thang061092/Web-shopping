@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Danh sách khách hàng </li>
            </ol>
        </div>
        <div class="card-body">
            <h5>Hiển thị ({{$quantity}}) kết quả.</h5>
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên khách hàng </th>
                    <th scope="col">Số điện thoại </th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers)==0)
                    <tr>
                        <td>
                            Không có dữ liệu
                        </td>
                    </tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            <td>{{$customer->email}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $customers->appends(request()->query())}}
        </div>

    </div>




@endsection
