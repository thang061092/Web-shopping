@extends('admin.layout')
@section('content')
    @if($errors->all())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error! </strong> Thao tac them moi khong thanh cong!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <ol class="breadcrumb mb-1 mt-1">
                <li class="breadcrumb-item active">
                    <a href="{{route('products.index')}}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Danh sách sản phẩm</a></li>
                <li class="breadcrumb-item active">Thêm mới</li>
            </ol>
        </div>
        <div class="card-body pt-3">
            <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm: </label>
                    <input type="text"  class="form-control @if($errors->has('name'))border border-danger @endif" value="{{old('name')}}" name="name">
                    @if($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm:</label>
                    <input type="number" class="form-control  @if($errors->has('price'))border border-danger @endif" value="{{old('price')}}" name="price">
                    @if($errors->has('price'))
                        <p class="text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Số lượng:</label>
                    <input type="number" class="form-control  @if($errors->has('quantity'))border border-danger @endif" value="{{old('quantity')}}" name="quantity">
                    @if($errors->has('quantity'))
                        <p class="text-danger">{{ $errors->first('quantity') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mô tả:</label>
                    <textarea class="form-control @if($errors->has('desc'))border border-danger @endif"  id="editor" rows="4" name="desc">{{old('desc')}}</textarea>
                    @if($errors->has('desc'))
                        <p class="text-danger">{{ $errors->first('desc') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm:</label>
                    <select class="form-control @if($errors->has('cate'))border border-danger @endif" name="cate" >
                        <option value="">Chọn loại sản phẩm:</option>
                        @foreach($categories as $key => $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('cate'))
                        <p class="text-danger">{{ $errors->first('cate') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Hình ảnh:</label>
                    <input type="file" class="form-control @if($errors->has('image'))border border-danger @endif" name="image">
                    @if($errors->has('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <a class="btn btn-secondary" href="{{route('products.index')}}">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

@endsection
