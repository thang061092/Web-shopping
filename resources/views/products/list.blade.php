@extends('admin.layout')
@section('content')
    <div class="card container-fluid">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Danh sách sản phẩm</li>
                <li class="breadcrumb-item active">
                    <a href="{{route('products.store')}}">Thêm mới sản phẩm</a>
                </li>
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
        <div class="card-body table-responsive">
            <h5>Hiển thị (<span class="text-danger">{{$quantity}}</span>) kết quả.</h5>
            <table class="table table-striped thedatatabl">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá gốc</th>
                    <th scope="col">Mã giảm giá</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Người tạo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                            <td><a href="{{route('products.logList',$product->id)}}">{{$product->name}}</a></td>
                            <td>{{number_format($product->price)}}</td>
                            <form method="get" action="{{route('products.sale',$product->id)}}">
                                <td><input type="number" value="{{$product->codeSale }}" onchange="this.form.submit()"
                                           name="code" size="5"></td>
                            </form>
                            <td>
                                <div>
                                    {!! \Illuminate\Support\Str::limit($product->desc,150,' ......v.v') !!}
                                </div>
                                <hr>
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModalLong" onclick="show({{$product->id}})">
                                        Xem chi tiet
                                    </button>
                                </div>
                            </td>
                            <td>{{$product->quantity}}</td>
                            <td>{{$product->created_by}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}"><i
                                        class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{route('products.block',$product->id)}}"><i
                                        class="fas fa-trash"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{ $products->appends(request()->query())}}
        </div>

    </div>
    <!-- Modal -->
    <div class="modal fade detail-show-product" id="exampleModalLong" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thông tin mô tả </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="result-detail">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function show(id) {
            let origin = location.origin;
            $.ajax({
                url: origin + '/products/detail/' + id,
                type: "GET",
                dataType: "json",
                success: function (result) {
                    $('#result-detail').empty();
                    $('#result-detail').html(result.desc);

                }
            })
        }
    </script>
@endsection
