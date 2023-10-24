@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa Sản Phẩm </h6>
        <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name Product</label>
                <input type="text" name="name_product" value="{{$product->name_product}}" class="form-control" 
                   >
                   @error('name_product')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Img</label>
                <img src="{{asset('storage/images/'.$product->img)}}" alt=""style="height: 100px;width:100px;">
                <input type="file" name="img" class="form-control" 
                   >
                   @error('img')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea name="description" class="form-control" cols="30" rows="10" value="{{$product->description}}">{{$product->description}}</textarea> 
                {{-- <input type="text" name="description" value="{{$product->description}}" class="form-control" > --}}
                   @error('description')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" name="price" value="{{$product->price}}" class="form-control" 
                   >
                   @error('price')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số Lượng</label>
                <input type="number" name="soluong" value="{{$product->soluong}}" class="form-control" 
                   >
                   @error('soluong')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
           
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
                <option value="{{$product->category->id}}" selected>{{$product->category->name_category}}</option>
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->name_category}}</option>
                @endforeach
            </select>
            @error('category_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
           
            <label for="exampleInputEmail1" class="form-label">Khuyến Mại</label> 
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" value="{{$product->khuyenmai_id}}" name="khuyenmai_id">
                <option value="{{$product->khuyenmai->id}}" selected>{{$product->khuyenmai->price_khuyenmai}}</option>
                @foreach ($khuyenmai as $khuyenmai)
                <option value="{{$khuyenmai->id}}">{{$khuyenmai->price_khuyenmai}}</option>
                @endforeach
            </select>
            @error('khuyenmai_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection