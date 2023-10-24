@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Thêm Banner Mới</h6>
        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="text" name="name" class="form-control" 
                   >
                   @error('name')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên</label>
                <input type="file" name="img" class="form-control" 
                   >
                   @error('img')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection