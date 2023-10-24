@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Thêm Sản Phẩm Mới</h6>
        <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name Product</label>
                <input type="text" name="name_product" class="form-control" 
                   >
                   @error('name_product')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Img</label>
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
                <textarea name="description" class="form-control" cols="30" rows="10"></textarea> 
                   @error('description')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" name="price" class="form-control" 
                   >
                   @error('price')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số Lượng</label>
                <input type="number" name="soluong" class="form-control" 
                   >
                   @error('soluong')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
           
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
                <option selected>Chọn danh mục</option>
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->name_category}}</option>
                @endforeach
            </select>
            @error('category_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
           
            <label for="exampleInputEmail1" class="form-label">Chọn Giá Khuyến Mại</label> 
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="khuyenmai_id">
                <option selected>Chọn danh mục</option>
                @foreach ($khuyenmai as $khuyenmai)
                <option value="{{$khuyenmai->id}}">{{$khuyenmai->price_khuyenmai}}</option>
                @endforeach
            </select>
            @error('khuyenmai_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection