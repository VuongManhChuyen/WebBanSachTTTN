@extends('font.layout')
@section('content')
      
    {{-- @if (Auth::user()->id != $check_id && Auth::user()->role_id != 2)
    <div class="alert alert-primary text-left" role="alert">
      <div class="text-left">
      Giỏ hàng của bạn còn trống
    </div> --}}
      <div class="continue__btn text-center">
        <a href="/shop">Continue Shopping</a>
      </div>
    </div>
    {{-- @else --}}
    {{-- @if (Auth::user()->role_id == 2)

    <div class="alert alert-primary text-center" role="alert">
      Bạn đang là ADMIN
    </div>
   @else --}}
     

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <h3 class="text-center">{{ $message }}</h3>
                    </div>
                @endif
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Breadcrumb Section End -->
          @if(Auth::user())
          <!-- Shopping Cart Section Begin -->
          <section class="shopping-cart spad">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="shopping__cart__table">
                    <table>
                      <thead>
                        <tr>
                          <th>Sản Phẩm</th>
                          <th>Số lượng</th>
                          <th>Tổng cộng</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cart->book as $cart)
                            {{-- @php $total += $cart['product_price'] * $cart['product_quantity'] @endphp --}}
                            
                        <tr>
                          <td class="product__cart__item" >
                            <div class="product__cart__item__pic">
                              <img src="{{asset('/storage/images/'.$cart->book->img)}}" alt=""  width="100" height="100"/>
                            </div>
                            <div class="product__cart__item__text">
                              <h6>{{$cart->name_book}}</h6>
                              <h5>$ {{$cart->book_price}}</h5>
                            </div>
                          </td>
                          <form action="{{ route('cart.update',$cart->id)}}"method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="product_price" value="{{$cart->book_price}}">
                            <input type="hidden" name="book_id" value="{{$cart->book_id}}">
                            <input type="hidden" name="cart_id" value="{{$cart->cart_id}}">
                          <td class="quantity__item">
                            <div class="quantity">
                              <div class="pro-qty-2">
                                <input type="number" min="1" name="book_quantity" value="{{$cart->book_quantity}}" />
                              </div>
                            </div>
                          </td>
                          <td class="cart__price">$ {{$cart->book_price*$cart->book_quantity}}</td>
                          <td><button type="submit"><i class="fa fa-spinner"></i> Update Quantity</button></td>
                        </form>
                          <td class="cart__close"><form action="{{route('cart.destroy',$cart->id)}}"method="POST">
                            @csrf
                              @method('DELETE')
                            <button><i class="fa fa-close"></button></i></td>
                            
                          </form>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="continue__btn">
                        <a href="/shop">Continue Shopping</a>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="continue__btn update__btn">
                        {{-- <a href="{{ route('cart.update',$cart->cart_id)}}"><i class="fa fa-spinner"></i> Update cart</a> --}}
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                      <input type="text" placeholder="Coupon code" />
                      <button type="submit">Apply</button>
                    </form>
                  </div>
                  <div class="cart__total">
                    <h6>TỔNG SỐ GIỎ HÀNG</h6>
                    <ul>
                      <li>Tổng thanh toán <span>{{$totalQuantity}} sản phẩm</span></li>
                      <li>Tổng cộng <span>$ {{$totalPrice}}</span></li>
                    </ul>
                    <a href="/checkout" class="primary-btn">MUA NGAY</a>
                  </div>
                </div>
              </div>
            </div>
          </section>
          @endif

    {{-- @endif --}}
   
@endsection
