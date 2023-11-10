@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa Trạng Thái</h6>
        <form action="{{route('status.update',$status->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" name="name_status" value="{{$status->name_status}}" class="form-control" 
                   >
                   @error('name_status')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection