@extends('font.layout')
@section('content')
        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-option">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-light">
                        <h4 class="text-center">{{ $message }}</h4>
                    </div>
                @endif
                @if (Auth::user() && Auth::user()->role_id==1)
                    <button class="add-cart">+ Add To Cart</button>
                @endif
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Breadcrumb Section End -->
        <!-- Shop Section Begin -->
        <section class="shop spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop__sidebar">
                            <div class="shop__sidebar__search">
                                <form action="shop/search" method="get">
                                    <input type="text" name="keyword" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>

                            </div>
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="text-xl text-black-50 card-heading">
                                            <a>Danh Mục</a>
                                        </div>
                                        <div>
                                            <div class="card-body">
                                                <div class="shop__sidebar__categories">
                                                    <ul>
                                                        @foreach ($category as $category)
                                                        <li><a href="{{ route('showCate.show', $category->id) }}">{{$category->name_category}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a>Tác Giả</a>
                                        </div>
                                        <div>
                                            <div class="card-body">
                                                <div class="shop__sidebar__brand">
                                                    <ul>
                                                        @foreach ($author as $author)
                                                        <li><a href="showAuthor/{{$author->id}}">{{$author->name_author}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            @foreach ($book as $book)
                            
                           
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <form action="{{route('cart.store',$book->id)}}" method="POST">
                                        @csrf
                                        @if (Auth::user())
                                        <input type="hidden" name="cart_id" value="{{$cart_id}}">
                                        <input type="hidden" name="book_id" value="{{$book->id}}">
                                        <input class="hidden" type="number" name="book_price" value="{{$book->promotion->price_promotion}}">
                                        <input class="hidden" type="number" name="book_quantity" value="1">
                                        <input class="hidden" type="number" name="user_id" value="{{Auth::user()->id}}">
                                        @endif
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('/storage/images/'.$book->img)}}">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="font/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="#"><img src="font/img/icon/compare.png" alt=""> <span>Compare</span></a>
                                            </li>
                                            <li><a href="{{ route('shopp.show', $book->id) }}"><img src="font/img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$book->name_book}}</h6>
                                        {{-- <a href="{{route('cart.store',$sanpham->id)}}" class="add-cart">+ Add To Cart</a> --}}


                                        @if (Auth::user() && Auth::user()->role_id==1)
                                            <button class="add-cart">+ Add To Cart</button>
                                        @endif
                                        {{-- @if (!Auth::user())
                                            <button class="add-cart">+ Add To Cart</button>
                                        @endif --}}
                                        
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5><strike>${{$book->price}}</strike>  $ {{$book->promotion->price_promotion}}</h5>
                                        
                                        <div class="">
                                            <a href="{{route('shopp.show',$book->id)}}">Chi tiết</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
@endsection