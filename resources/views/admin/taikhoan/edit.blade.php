@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa Roles</h6>
        <form action="{{route('taikhoan.update',$taikhoan->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" value="{{$taikhoan->name}}" class="form-control" 
                   >
                   @error('name')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" value="{{$taikhoan->email}}" class="form-control" 
                   >
                   @error('email')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                {{-- <label for="exampleInputEmail1" class="form-label">Password</label> --}}
                <input type="hidden" name="password" value="{{$taikhoan->password}}" class="form-control" 
                   >
                   @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <label for="exampleInputEmail1" class="form-label">Role</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example"value="{{$taikhoan->role_id}}" name="role_id">
                <option value="{{$taikhoan->role->id}}" selected>{{$taikhoan->role->display_name}}</option>
                @foreach ($role as $role)
                <option value="{{$role->id}}">{{$role->display_name}}</option>
                @endforeach
            </select>
            @error('role_id')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection