@extends('font.layout')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
          <div class="hero__items set-bg" data-setbg="{{asset('/storage/images/'.$banner[0]->img)}}">
            <div class="container">
              <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8">
                  <div class="hero__text">
                    <h6>Summer Collection</h6>
                    <h2>Book collection 2030</h2>
                    <p>
                      A specialist label creating luxury essentials. Ethically
                      crafted with an unwavering commitment to exceptional
                      quality.
                    </p>
                    <a href="#" class="primary-btn"
                      >Shop now <span class="arrow_right"></span
                    ></a>
                    <div class="hero__social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="hero__items set-bg" data-setbg="{{asset('/storage/images/'.$banner[1]->img)}}">
            <div class="container">
              <div class="row">
                <div class="col-xl-5 col-lg-7 col-md-8">
                  <div class="hero__text">
                    <h6>Summer Collection</h6>
                    <h2>Fall - Winter Collections 2030</h2>
                    <p>
                      A specialist label creating luxury essentials. Ethically
                      crafted with an unwavering commitment to exceptional
                      quality.
                    </p>
                    <a href="#" class="primary-btn"
                      >Shop now <span class="arrow_right"></span
                    ></a>
                    <div class="hero__social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Hero Section End -->
  
      <!-- Banner Section Begin -->
      <section class="banner spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-7 offset-lg-4">
              <div class="banner__item">
                <div class="banner__item__pic">
                  <img src="font/img/banner/anh1.jpg" alt="" />
                </div>
                <div class="banner__item__text">
                  <h2>Book collection</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="banner__item banner__item--middle">
                <div class="banner__item__pic">
                  <img src="font/img/banner/anh2.jpg" alt="" />
                </div>
                <div class="banner__item__text">
                  <h2>Book collection</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="banner__item banner__item--last">
                <div class="banner__item__pic">
                  <img src="font/img/banner/anh3.jpg" alt="" />
                </div>
                <div class="banner__item__text">
                  <h2>Book collection 2030</h2>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner Section End -->
  
      <!-- Product Section Begin -->
      <section class="product spad">
        <div class="container">
              <h2 class="text-center mb-10">SẢN PHẨM NỔI BẬT</h2>
          <div class="row product__filter mt-10">
            
            @foreach ($book as $book)
                
            
            <div
              class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix {{$book->category->name_category}}"
            >
              <div class="product__item">
                
                <div
                  class="product__item__pic set-bg"
                  data-setbg="{{asset('/storage/images/'.$book->img)}}"
                >
                  {{-- <span class="label">New</span> --}}
                  <ul class="product__hover">
                    <li>
                      <a href="#"><img src="font/img/icon/heart.png" alt="" /></a>
                    </li>
                    <li>
                      <a href="#"
                        ><img src="font/img/icon/compare.png" alt="" />
                        {{-- <span>Compare</span></a --}}
                      >
                    </li>
                    <li>
                      <a href="#"><img src="font/img/icon/search.png" alt="" /></a>
                    </li>
                  </ul>
                </div>
                <div class="product__item__text">
                  <h6>{{$book->name_book}}</h6>
                  <a href="#" class="add-cart">+ Add To Cart</a>
                  <div class="rating">
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                  </div>
                  <h5><strike>${{$book->price}}</strike>  $ {{$book->promotion->price_promotion}}</h5>
                  <div class="product__color__select">
                    <label for="pc-1">
                      <input type="radio" id="pc-1" />
                    </label>
                    <label class="active black" for="pc-2">
                      <input type="radio" id="pc-2" />
                    </label>
                    <label class="grey" for="pc-3">
                      <input type="radio" id="pc-3" />
                    </label>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- Product Section End -->
  
  
      <!-- Instagram Section Begin -->
      <section class="instagram spad">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="instagram__pic">
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh4.jpg"
                ></div>
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh5.jpg"
                ></div>
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh6.jpg"
                ></div>
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh7.jpg"
                ></div>
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh8.jpg"
                ></div>
                <div
                  class="instagram__pic__item set-bg"
                  data-setbg="font/img/instagram/anh9.jpg"
                ></div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="instagram__text">
                <h2>Instagram</h2>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                  eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <h3>#Male_Fashion</h3>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Instagram Section End -->
@endsection