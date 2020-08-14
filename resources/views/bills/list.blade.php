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
        <form action="{{route('bills.status')}}" method="get">
            @csrf
            <div class="col-12 col-md-12 pt-3">
                <div class="row">
                    <div class="col-12 col-md-2 ml-2">
                        <select name="status" class="form-control" onchange="this.form.submit()">
                            <option value="">Bộ lọc</option>
                            @foreach($statuses as $key => $status)
                                <option value="{{$status}}">{{$status}}</option>
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

