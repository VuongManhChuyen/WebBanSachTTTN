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
                <h4 class="text-center">Kết quả tìm thấy {{(count($search))}} Sản Phẩm</h4>
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
                                <form action="/search" method="get">
                                    <input type="text" name="keyword" placeholder="Search...">
                                    <button type="submit"><span class="icon_search"></span></button>
                                </form>

                            </div>
                            <div class="shop__sidebar__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="shop__sidebar__categories">
                                                    <ul class="nice-scroll">
                                                        @foreach ($category as $category)
                                                        <li><a href="#">{{$category->name_category}}</a></li>
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
                        <div class="shop__product__option">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__left">
                                        <p>Showing 1–12 of 126 results</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="shop__product__option__right">
                                        <p>Sort by Price:</p>
                                        <select>
                                            <option value="">Low To High</option>
                                            <option value="">$0 - $55</option>
                                            <option value="">$55 - $100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($search as $sanpham)
                                
                           
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <form action="{{route('cart.store',$sanpham->id)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$sanpham->id}}">
                                        <input class="hidden" type="number" name="product_price" value="{{$sanpham->khuyenmai->price_khuyenmai}}">
                                        <input class="hidden" type="number" name="product_quantity" value="1">
                                        @if (Auth::user())
                                        <input class="hidden" type="text" name="user_id" value="{{Auth::user()->id}}">
                                        @endif
                                    <div class="product__item__pic set-bg" data-setbg="{{asset('/storage/images/'.$sanpham->img)}}">
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="font/img/icon/heart.png" alt=""></a></li>
                                            <li><a href="#"><img src="font/img/icon/compare.png" alt=""> <span>Compare</span></a>
                                            </li>
                                            <li><a href="{{ route('shop.show', $sanpham->id) }}"><img src="font/img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>{{$sanpham->name_product}}</h6>
                                        {{-- <a href="{{route('cart.store',$sanpham->id)}}" class="add-cart">+ Add To Cart</a> --}}


                                        @if (Auth::user() && Auth::user()->role_id==1)
                                            <button class="add-cart">+ Add To Cart</button>
                                        @endif
                                        @if (!Auth::user())
                                            <button class="add-cart">+ Add To Cart</button>
                                        @endif
                                        
                                        <div class="rating">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5><strike>${{$sanpham->price}}</strike>  $ {{$sanpham->khuyenmai->price_khuyenmai}}</h5>
                                        <div class="">
                                            <a href="{{route('shop.show',$sanpham->id)}}">Chi tiết</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            @endforeach

                            {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                                        <span class="label">Sale</span>
                                        <ul class="product__hover">
                                            <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                            <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a>
                                            </li>
                                            <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6>Multi-pocket Chest Bag</h6>
                                        <a href="#" class="add-cart">+ Add To Cart</a>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <h5>$43.48</h5>
                                        <div class="product__color__select">
                                            <label for="pc-7">
                                                <input type="radio" id="pc-7">
                                            </label>
                                            <label class="active black" for="pc-8">
                                                <input type="radio" id="pc-8">
                                            </label>
                                            <label class="grey" for="pc-9">
                                                <input type="radio" id="pc-9">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product__pagination">
                                    <a class="active" href="#">1</a>
                                    <a href="#">2</a>
                                    <a href="#">3</a>
                                    <span>...</span>
                                    <a href="#">21</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
@endsection