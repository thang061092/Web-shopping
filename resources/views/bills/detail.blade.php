@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{route('bills.index')}}">Danh sách hóa đơn</a></li>
                <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
            </ol>
        </div>
        <div class="card-body table-hover">
            <table class="table table-striped">
                <tr>
                    <th>Người Đặt Hàng:</th>
                    <td>{{$bill->customer->name}}</td>
                </tr>
                <tr>
                    <th>Số điện thoại:</th>
                    <td>{{$bill->customer->phone}}</td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td>{{$bill->customer->email}}</td>
                </tr>
                <tr>
                    <th>Địa chỉ::</th>
                    <td>{{$bill->customer->address}}</td>
                </tr>
                <tr>
                    <th>Ghi chú:</th>
                    <td>{!!$bill->note!!}</td>
                </tr>
            </table>
        </div>
        <div class="card-body pt-5">
            <table class="table">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Sản phẩm</th>
                    <th>Giá gốc</th>
                    <th>Giá mua</th>
                    <th>Mã giảm </th>
                    <th>Đặt mua</th>

                    <th>Hình ảnh</th>
                </tr>
                </thead>
                @foreach($details as $key => $detail)
                    <tr>
                        <td>{{++$key}}</td>
                        <td class="text-success">{{\Illuminate\Support\Str::limit($detail->product->name,30)}}</td>
                        <td><span class="text-danger">{{number_format($detail->product->price).' VND'}}/sản phẩm</span></td>
                        <td><span class="text-danger">{{number_format($detail->price).' VND'}}/sản phẩm</span></td>
                        <td><span class="text-danger">{{$detail->codeSale.' %'}}</span></td>
                        <td>{{$detail->quantityProduct}}</td>
                        <td><img src="{{asset('storage/'.$detail->product->image)}}" style="width: 100px"></td>
                    </tr>
                @endforeach
                <tr>
                    <th>Tổng tiền:</th>
                    <td><span class="text-danger">{{$bill->totalPrice}} VND</span></td>
                </tr>
                <form method="get" action="{{route('bills.update',$bill->id)}}">
                    @csrf
                    <tr>
                        <th>Xác nhận đơn hàng:</th>
                        @if($bill->status == \App\Http\Controllers\Major::FINISH)
                            <td>{{\App\Http\Controllers\Major::FINISH}}</td>
                        @elseif($bill->status == \App\Http\Controllers\Major::CANCEL)
                            <td>{{\App\Http\Controllers\Major::CANCEL}}</td>
                        @else
                            <td><select name="status" class="form-control">
                                    <option @if($bill->status == \App\Http\Controllers\Major::WAITING)
                                            selected
                                        @endif>
                                        {{\App\Http\Controllers\Major::WAITING}}
                                    </option>
                                    <option @if($bill->status == \App\Http\Controllers\Major::SHIPPING )
                                            selected
                                        @endif>
                                        {{\App\Http\Controllers\Major::SHIPPING}}
                                    </option>
                                    <option @if($bill->status == \App\Http\Controllers\Major::CANCEL )
                                            selected
                                        @endif>
                                        {{\App\Http\Controllers\Major::CANCEL}}
                                    </option>
                                    <option @if($bill->status == \App\Http\Controllers\Major::FINISH )
                                            selected
                                        @endif>
                                        {{\App\Http\Controllers\Major::FINISH}}
                                    </option>
                                </select>
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td><a class="btn btn-secondary" href="{{route('bills.index')}}">Quay lại</a></td>
                        <td>
                            <button class="btn btn-primary @if($bill->status == \App\Http\Controllers\Major::FINISH)
                                d-none
                                @elseif($bill->status == \App\Http\Controllers\Major::CANCEL)
                                d-none
                                @else
                                d-inline
                                @endif" type="submit">Xác nhận
                            </button>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
@endsection


