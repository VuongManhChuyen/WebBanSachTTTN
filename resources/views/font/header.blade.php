<div id="preloder">
    <div class="loader"></div>
  </div>
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
                <a href="login">Đăng Nhập</a>
                <a href="register">Đăng Kí</a>
                @else
              </div>
              <div class="header__top__hover">
                
                <span>{{Auth::user()->name}} <i class="arrow_carrot-down"></i></span>
                <ul>
                  <li><a href="{{route('logout')}}">Logout</a></li>
                  @if (Auth::user()->role_id==2)
                  <li><a href="/adminn">ADMIN</a></li>
                  @endif
                  <?php 
                  $id = Auth::user()->id
                  ?>
                  <li><a href="{{route('profile.index')}}">Profile</a></li>
                  <li><a href="{{route('ordercl.index')}}">Order</a></li>
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
            <a href="/"><img src="{{asset('font/img/logo.png')}}" alt="" style="height: 100px; width: 100px" /></a>
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
       
       <div class="col-lg-3 col-md-3">
        <div class="header__nav__option">
          <div class="shop__sidebar__search">
            <form action="/search" method="get">
                <input type="text" name="keyword" placeholder="Search...">
                <button type="submit"><span class="icon_search"></span></button>
            </form>

        </div>
          {{-- @if (Auth::user())
          <a href="/cart"
            ><img src="font/img/icon/cart.png" alt="" /> <span>{{$totalQuantity}}</span></a
          >
          <div class="price">${{$totalPrice}}</div>
          @else
          <a href="/cart"
          ><img src="font/img/icon/cart.png" alt="" /> <span></span></a
        >
        <div class="price"></div>
        @endif --}}
        </div>
      </div>  
      </div>
      <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
  </header>
  <!-- Header Section End -->