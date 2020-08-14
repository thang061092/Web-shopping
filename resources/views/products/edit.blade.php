@extends('admin.layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Cập nhật thông tin sản phẩm</li>
            </ol>
        </div>
        <div class="card-body pt-3">
            <form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm: </label>
                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm:</label>
                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label>Số lượng:</label>
                    <input type="number" class="form-control" name="quantity" value="{{$product->quantity}}">
                </div>
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control" id="editor" rows="4" name="desc">{!!$product->desc!!}</textarea>
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm:</label>
                    <select class="form-control" name="cate">
                        <option value="">Chọn loại sản phẩm:</option>
                        @foreach($categories as $key => $category)
                            <option @if($category->id=== $product->category_id) selected
                                    @endif value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a class="btn btn-secondary" href="{{route('products.index')}}">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

@endsection

