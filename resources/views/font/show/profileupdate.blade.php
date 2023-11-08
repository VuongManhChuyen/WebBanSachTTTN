@extends('font.layout')
@section('content')

<div class="container mt-12">
    <div class="alert alert-primary">
        <h4 class="text-center">PROFILE</h4>
    </div>
    <div class="contact__form ">
        <form action="{{route('profile.update',(Auth::user()->id))}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-6">
                    <p>Tên Hiển Thị:</p>
                    <input type="text" name="name" value="{{(Auth::user()->name)}}">
                </div>
                
                <div class="col-lg-6">
                    <p>Email:</p>
                    <input type="email" name="email"  value="{{(Auth::user()->email)}}" >
                    @error('email')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-lg-6">
                    <p>Password:</p>
                    <input type="password" name="password"  value="{{(Auth::user()->password)}}" >
                    @error('password')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-lg-6">
                    <p>Họ Và Tên:</p>
                    <input type="text" name="fullname" value="{{(Auth::user()->fullname)}}" >
                    @error('fullname')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                     @enderror
                </div>
               
                <div class="col-lg-6">
                    <p>Địa Chỉ:</p>
                    <input type="text" name="address"  value="{{(Auth::user()->address)}}" >
                    @error('address')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="col-lg-6">
                    <p>Số Điện Thoại:</p>
                    <input type="text" value="{{(Auth::user()->phone)}}" name="phone" >
                    <input type="hidden" name="role_id" value="1">
                    @error('phone')
                   <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                
               
                    <button type="submit" class="btn-outline-secondary">Cập Nhật Tài Khoản</button>
            </div>
        </form>
    </div>
</div>

@endsection