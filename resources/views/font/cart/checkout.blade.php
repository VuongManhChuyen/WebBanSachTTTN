@extends('font.layout')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('checkout.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="checkout__title">CHI TIẾT THANH TOÁN</h6>
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="checkout__input">
                                <div class="checkout__input">
                                    <p>Họ tên<span>*</span></p>
                                    <input type="text" name="name_kh">
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
                            @error('address')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Điện thoại<span>*</span></p>
                                    <input type="number" name="phone">
                                    @error('phone')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" name="email">
                                    @error('email')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                     @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú đơn hàng<span>*</span></p>
                            <input type="text" name="note"
                            placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">ĐƠN ĐẶT HÀNG CỦA BẠN</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng cộng</span></div>
                            <ul class="checkout__total__products">
                              
                                <input type="hidden" name="cart_id" value="{{$cart_id}}">
                                @foreach ($cart->cartuser as $cart)
                                
                                    <input type="hidden" name="status_id" value="1">
                                <li>{{$key++}}. {{$cart->book->name_book}} <span>$ {{$cart->book_quantity*$cart->book_price}}</span></li>
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                <li>tổng phụ <span>${{$totalPrice}}</span></li>
                                <li>Tổng cộng <span>${{$totalPrice}}</span></li>
                            </ul>
                            <p>Phương thức thanh toán</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán khi nhận hàng
                                    {{-- <input type="checkbox" id="payment"> --}}
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn bg-dark">ĐẶT HÀNG</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
    
@endsection