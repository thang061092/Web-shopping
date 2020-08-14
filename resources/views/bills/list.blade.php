@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Danh sách hóa đơn</li>
            </ol>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                @if(count($bills)==0)
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                @else

                    @foreach($bills as $key => $bill)
                        <tr>
                            <th>{{++$key}}</th>
                            <td><a href="{{route('bills.show',$bill->id)}}">{{$bill->customer->name}}</a></td>
                            <td>{{$bill->totalPrice}}</td>
                            <td>{!! $bill->note !!}</td>
                            <td>{{$bill->status}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $bills->appends(request()->query())}}
        </div>
    </div>
@endsection

