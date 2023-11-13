@extends('admin.index')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-6">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Sửa hóa đơn </h6>
        <form action="{{route('order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên khách hàng</label>
                <input type="text" name="name_kh" value="{{$order->name_kh}}" class="form-control" 
                   >
                   @error('name_book')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số Điện Thoại</label>
                <input type="text" name="phone" value="{{$order->phone}}" class="form-control" 
                   >
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                <input type="text" name="address" value="{{$order->address}}" class="form-control" 
                   >
                <div class="form-text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" name="email" value="{{$order->email}}" class="form-control" 
                   >
                   @error('name_book')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>
            <input type="hidden" name="cart_id"value="{{$order->cart_id}}">
            <input type="hidden" name="user_id"value="{{$order->user_id}}">   
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Note</label>
                <textarea name="description" class="form-control" cols="30" rows="10" value="{{$order->description}}">{{$order->description}}</textarea> 
                {{-- <input type="text" name="description" value="{{$book->description}}" class="form-control" > --}}
                   @error('description')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                <div class="form-text">
                </div>
            </div>    
            <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
            <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="status_id">
                <option value="{{$order->status->id}}" selected>{{$order->status->name_status}}</option>
                @foreach ($status as $status)
                <option value="{{$status->id}}">{{$status->name_status}}</option>
                @endforeach
            </select>
           
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection