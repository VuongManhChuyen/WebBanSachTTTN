@extends('font.layout')
@section('content')
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="breadcrumb__text">
                    <h4>Orders</h4>
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
                <div class="">
                  <div class="shopping__cart__table">
                    <table>
                      <thead>
                        <tr>
                          <th>Sản Phẩm</th>
                          <th>Số lượng</th>
                          <th>Tổng cộng</th>
                          <th>Họ tên người nhận</th>
                          <th>Địa chỉ</th>
                          <th>Email</th>
                          <th>Trạng thái</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($order as $order)
                            {{-- @php $total += $cart['product_price'] * $cart['product_quantity'] @endphp --}}
                            
                        <tr>
                          <td class="product__cart__item" >
                            <div class="product__cart__item__pic">
                              <img src="{{asset('/storage/images/'.$order->img)}}" alt=""  width="100" height="100"/>
                            </div>
                            <div class="product__cart__item__text">
                              <h6>{{$order->name_book}}</h6>
                              <h5>$ {{$order->book_price}}</h5>
                            </div>
                          </td>
                          <td class="product__cart__item">
                            <h6>{{$order->book_quantity}}</h6>
                          </td>
                          <td class="product__cart__item">
                            <h6>${{$order->book_price*$order->book_quantity}}</h6>
                          </td>
                          <td class="product__cart__item">
                            <h6>{{$order->name_kh}}</h6>
                          </td>
                          <td class="product__cart__item">
                            <h6>{{$order->address}}</h6>
                          </td>
                          <td class="product__cart__item">
                            <h6>{{$order->email}}</h6>
                          </td>
                          <td class="product__cart__item">
                            <h6>{{$order->name_status}}</h6>
                          </td>  
                          <td class="cart__close">
                            <form action="{{route('ordercl.destroy',$order->id)}}"method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-primary"><i class="fa fa-close"></button></i>
                          </form></td>
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
              </div>
            </div>
          </section>
          @endif

    {{-- @endif --}}
   
@endsection
