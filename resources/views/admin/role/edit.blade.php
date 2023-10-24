@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa Roles</h6>
        <form action="{{route('role.update',$role->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name </label>
                <input type="text" name="name" value="{{$role->name}}" class="form-control" 
                   >
                   @error('name')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Display Name </label>
                <input type="text" name="display_name" value="{{$role->display_name}}" class="form-control" 
                   >
                   @error('display_name')
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