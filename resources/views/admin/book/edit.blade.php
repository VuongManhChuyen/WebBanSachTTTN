@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa Sản Phẩm </h6>
        <form action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name book</label>
                <input type="text" name="name_book" value="{{$book->name_book}}" class="form-control" 
                   >
                   @error('name_book')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Img</label>
                <img src="{{asset('storage/images/'.$book->img)}}" alt=""style="height: 100px;width:100px;">
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
                <textarea name="description" class="form-control" cols="30" rows="10" value="{{$book->description}}">{{$book->description}}</textarea> 
                {{-- <input type="text" name="description" value="{{$book->description}}" class="form-control" > --}}
                   @error('description')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" name="price" value="{{$book->price}}" class="form-control" 
                   >
                   @error('price')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
           
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="category_id">
                <option value="{{$book->category->id}}" selected>{{$book->category->name_category}}</option>
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->name_category}}</option>
                @endforeach
            </select>
            @error('category_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
           
            <label for="exampleInputEmail1" class="form-label">Khuyến Mại</label> 
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" value="{{$book->promotion_id}}" name="promotion_id">
                <option value="{{$book->promotion->id}}" selected>{{$book->promotion->price_promotion}}</option>
                @foreach ($promotion as $promotion)
                <option value="{{$promotion->id}}">{{$promotion->price_promotion}}</option>
                @endforeach
            </select>
            @error('promotion-id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror

                    <label for="exampleInputEmail1" class="form-label">Tác Giả</label> 
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" value="{{$book->author_id}}" name="author_id">
                <option value="{{$book->author->id}}" selected>{{$book->author->name_author}}</option>
                @foreach ($author as $author)
                <option value="{{$author->id}}">{{$author->name_author}}</option>
                @endforeach
            </select>
            @error('author_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection