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
            <h5>Hiển thị ({{$quantity}}) kết quả.</h5>
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người đặt hàng</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Ghi chú</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thời gian tạo</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @if(count($bills)==0)
                    <tr>
                        <td>Không có dữ liệu</td>
                    </tr>
                @else

                    @foreach($bills as $key => $bill)
                        <tr class="@if($bill->unread ===1) bg-gradient-warning @else bg-gradient-light @endif"
                            onclick="read({{$bill->id}})">
                            <th>{{++$key}}</th>
                            <td><a href="{{route('bills.show',$bill->id)}}">{{$bill->customer->name}}</a></td>
                            <td>{{$bill->totalPrice}}</td>
                            <td>{!! $bill->note !!}</td>
                            <td>{{$bill->status}}</td>
                            <td>{{$bill->created_at}}</td>
                            <td>@if($bill->unread == 1)
                                    Chưa đọc
                                @else
                                    Đã đọc
                                @endif</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $bills->appends(request()->query())}}
        </div>
    </div>
    <script>
        let origin = location.origin

        function read(id) {
            console.log(id)
            $.ajax({
                url: origin + '/bills/unread/' + id,
                method: "GET",
                dataType: "json",
                success: function () {

                }
            })
        }
    </script>
@endsection


