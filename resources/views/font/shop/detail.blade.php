<!DOCTYPE html>
<html lang="zxx">
  <!-- Mirrored from themewagon.github.io/malefashion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jul 2023 14:54:17 GMT -->
  <!-- Added by HTTrack --><meta
    http-equiv="content-type"
    content="text/html;charset=utf-8"
  /><!-- /Added by HTTrack -->
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="Male_Fashion Template" />
    <meta name="keywords" content="Male_Fashion, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TigerShop</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
      rel="stylesheet"
    />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('font/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/elegant-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/nice-select.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/slicknav.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('font/css/style.css')}}" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
  </head>

  <!-- Offcanvas Menu Begin -->
  <div class="offcanvas-menu-overlay"></div>
  <div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
      <div class="offcanvas__links">
        <a href="#">Sign in</a>
        <a href="#">Register</a>
        {{-- <a style="color: blue">{{Auth::user()->name}} 1</a> --}}
      </div>
      <div class="offcanvas__top__hover">
        <span>Usd <i class="arrow_carrot-down"></i></span>
        <ul>
          <li>USD</li>        
          <li>EUR</li>
          <li>USD</li>
        </ul>
      </div>
    </div>
    <div class="offcanvas__nav__option">
      <a href="#" class="search-switch"font/
        ><img src="font/img/icon/search.png" alt=""
      /></a>
      <a href="#"><img src="font/img/icon/heart.png" alt="" /></a>
      <a href="#"><img src="font/img/icon/cart.png" alt="" /> <span>0</span></a>
      <div class="price">$0.00</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
      <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
  </div>
  <!-- Offcanvas Menu End -->

  <!-- Header Section Begin -->
  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-7">
            <div class="header__top__left">
              <p>Free shipping, 30-day return or refund guarantee.</p>
            </div>
          </div>
          <div class="col-lg-6 col-md-5">
            <div class="header__top__right">
              <div class="header__top__links">
                @if (!Auth::user())
                <a href="login">Sign in</a>
                <a href="register">Register</a>
                @else
              </div>
              <div class="header__top__hover">
                
                <span>{{Auth::user()->name}} <i class="arrow_carrot-down"></i></span>
                <ul>
                  <li><a href="{{route('logout')}}">Logout</a></li>
                  @if (Auth::user()->role_id==2)
                  <li><a href="/adminn">ADMIN</a></li>
                  @endif
                  <li><a href="#">Profile</a></li>
                </ul>
                @endif
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <div class="header__logo">
            <a href="/"><img src="{{asset('font/img/logo.png')}}" alt="" style="width: 100px;height: 100px;"/></a>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <nav class="header__menu mobile-menu">
            <ul>
              <li><a href="/">Home</a></li>
              <li><a href="/shop">Shop</a></li>
              <li>
                <a href="/cart">Shopping Cart</a>
              </li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contacts</a></li>
            </ul>
          </nav>
        </div>
       @if (Auth::user())
       <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <a href="#" class="search-switch"
            ><img src="{{asset('font/img/icon/search.png')}}" alt=""
          /></a>
          {{-- <a href="#"><img src="font/img/icon/heart.png" alt="" /></a> --}}
          <a href="/cart"
            ><img src="{{asset('font/img/icon/cart.png')}}" alt="" /> <span>{{$totalQuantity}}</span></a
          >
          <div class="price">${{$totalPrice}}</div>
        </div>
      </div>
       @else
       <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <a href="#" class="search-switch"
            ><img src="font/img/icon/search.png')}}" alt=""
          /></a>
          {{-- <a href="#"><img src="font/img/icon/heart.png" alt="" /></a> --}}
          <a href="/cart"
            ><img src="{{asset('font/img/icon/cart.png')}}" alt="" /> <span></span></a
          >
          <div class="price"></div>
        </div>
      </div>
       @endif
        
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>
  <!-- Header Section End -->
    <!-- Shop Details Section Begin -->
    <section class="shop-details">
       
            
       
        <div class="product__details__pic">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__breadcrumb">
                            <a href="/">Home</a>
                            <a href="/shop">Shop</a>
                            <span>Product Details</span>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__pic__item">
                                    <img src="{{asset('/storage/images/'.$sanpham->img)}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="product__details__text">
                            <h4>{{$sanpham->name_product}}</h4>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h3>${{$sanpham->khuyenmai->price_khuyenmai}} <span>{{$sanpham->price}}</span></h3>
                            <p>{{$sanpham->description}}</p>
                            <div class="product__details__cart__option">
                                <form action="{{route('cart.store',$sanpham->id)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="product_id" value="{{$sanpham->id}}">
                                        <input class="hidden" type="number" name="product_price" value="{{$sanpham->khuyenmai->price_khuyenmai}}">
                                        @if (Auth::user())
                                        <input class="hidden" type="text" name="user_id" value="{{Auth::user()->id}}">
                                        @endif
                                <div class="quantity">
                                    Số lượng:
                                    <div class="pro-qty">
                                       <input type="number" name="product_quantity" min="1" placeholder="1" required>
                                    </div>
                                </div>
                                {{-- <a href="#" class="primary-btn">add to cart</a> --}}
                                @if (Auth::user() && Auth::user()->role_id==1)
                                            <button class="add-cart primary-btn">+ Add To Cart</button>
                                @endif
                                @if (!Auth::user())
                                            <button class="add-cart primary-btn">+ Add To Cart</button>
                                @endif
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
   
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="related-title">SẢN PHẨM LIÊN QUAN</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $sp)
                <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                    <div class="product__item">
                        <a href="{{route('shop.show',$sp->id)}}">
                            <img src="{{asset('/storage/images/'.$sp->img)}}" alt="" style="height: 200px;width: 300px;">
                        </a>
                        <div class="product__item__text">
                            <h6>{{$sp->name_product}}</h6>
                            <div class="rating">
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <h5><strike>${{$sp->price}}</strike>  $ {{$sp->khuyenmai->price_khuyenmai}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Section End -->
<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__logo">
              <a href="#"><img src="font/img/footer-logo.png" alt="" /></a>
            </div>
            <p>
              The customer is at the heart of our unique business model, which
              includes design.
            </p>
            <a href="#"><img src="font/img/payment.png" alt="" /></a>
          </div>
        </div>
        <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Clothing Store</a></li>
              <li><a href="#">Trending Shoes</a></li>
              <li><a href="#">Accessories</a></li>
              <li><a href="#">Sale</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-6">
          <div class="footer__widget">
            <h6>Shopping</h6>
            <ul>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Payment Methods</a></li>
              <li><a href="#">Delivary</a></li>
              <li><a href="#">Return & Exchanges</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
          <div class="footer__widget">
            <h6>NewLetter</h6>
            <div class="footer__newslatter">
              <p>
                Be the first to know about new arrivals, look books, sales &
                promos!
              </p>
              <form action="#">
                <input type="text" placeholder="Your email" />
                <button type="submit">
                  <span class="icon_mail_alt"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="footer__copyright__text">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            <p>
              Copyright ©
              <script>
                document.write(new Date().getFullYear());
              </script>
              2023 All rights reserved | This template is made with
              <i class="fa fa-heart-o" aria-hidden="true"></i> by
              <a href="#" target="_blank">TigerShop_VMC</a>
            </p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here....." />
      </form>
    </div>
  </div>