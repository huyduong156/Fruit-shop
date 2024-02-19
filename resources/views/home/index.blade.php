@extends('master.main')

@section('title','Fruit Shop')
@section('main')
            <!-- Begin Slider Area One -->
            <div class="slider-area">
                <div class="obrien-slider arrow-style" data-slick-options='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "infinite": true,
            "arrows": true,
            "dots": true,
            "autoplay" : true,
            "fade" : true,
            "autoplaySpeed" : 7000,
            "pauseOnHover" : false,
            "pauseOnFocus" : false
            }' data-slick-responsive='[
            {"breakpoint":992, "settings": {
            "slidesToShow": 1,
            "arrows": false,
            "dots": true
            }}
            ]'>
                    <div class="slide-item slide-1 bg-position slide-bg-1 animation-style-01">
                        <div class="slider-content">
                            <h4 class="slider-small-title">Cold processed organic fruit</h4>
                            <h2 class="slider-large-title">Fresh Avocado</h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide-item slide-2 bg-position slide-bg-1 animation-style-01">
                        <div class="slider-content">
                            <h4 class="slider-small-title">Healthy life with</h4>
                            <h2 class="slider-large-title">Natural Organic</h2>
                            <div class="slider-btn">
                                <a class="obrien-button black-btn" href="shop.html">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider Area One End Here -->
            <!-- Feature Area Start Here -->
            <div class="feature-area">
                <div class="container container-default custom-wrapper">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 col-md-12 col-custom">
                            <div class="feature-content-wrapper">
                                <h2 class="title">Important to eat fruit</h2>
                                <p class="desc-content">Eating fruit provides health benefits — people who eat more fruits and vegetables as part of an overall healthy diet are likely to have a reduced risk of some chronic diseases. Fruits provide nutrients vital for health and maintenance of your body.</p>
                                <p class="desc-content"> Fruits are sources of many essential nutrients that are underconsumed, including potassium, dietary fiber, vitamin C, and folate (folic acid).</p>
                                <p class="desc-content"> Most fruits are naturally low in fat, sodium, and calories. None have cholesterol.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-12 col-custom">
                            <div class="feature-image">
                                <img src="uploads/feature/feature-1.jpg" alt="Obrien Feature">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature Area End Here -->
            <!-- Product Area Start Here -->
            <div class="product-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-5 m-auto text-center col-custom">
                            <div class="section-content">
                                <h2 class="title-1 text-uppercase">New Products</h2>
                                <div class="desc-content">
                                    <p>All best seller product are now available for you and your can buy this product from here any time any where so sop now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 product-wrapper col-custom">
                            <div class="product-slider" data-slick-options='{
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "infinite": true,
                            "arrows": false,
                            "dots": false
                            }' data-slick-responsive='[
                            {"breakpoint": 1200, "settings": {
                            "slidesToShow": 3
                            }},
                            {"breakpoint": 992, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint": 576, "settings": {
                            "slidesToShow": 1
                            }}
                            ]'>
                            @foreach ($new_products as $np)
                                <div class="single-item">
                                    <div class="single-product position-relative">
                                        <div class="product-image">
                                            <a class="d-block" href="{{route('home.product',$np->slug)}}">

                                                <img src="uploads/product/{{$np->image}}" alt="" class="product-image-1 w-100">
                                                @if ($np->images->first())
                                                    <img src="uploads/product/{{$np->images->first()->image}}" alt="" class="product-image-2 position-absolute w-100">
                                                @endif
                                            
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-rating">
                                                <div class="rateit" data-rateit-value="{{$np->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                            </div>
                                            <div class="product-title">
                                                <h4 class="title-2"> <a href="{{route('home.product',$np->slug)}}">{{$np->name}}</a></h4>
                                            </div>
                                            <div class="price-box">
                                                @if ($np->sale_price > 0)
                                                    <span class="regular-price ">{{number_format($np->sale_price)}}VND</span>
                                                    <span class="old-price"><del>{{number_format($np->price)}}VND</del></span>
                                                @else
                                                    <span class="regular-price ">{{number_format($np->price)}}VND</span>
                                                    <span class="regular-price ">$80.00</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-action d-flex position-absolute">

                                            <a href="{{route('home.compare_product',$np->id)}}" title="Compare">
                                                <i class="ion-ios-loop-strong"></i>
                                            </a>
                                             @if (auth('cus')->check())                                                        {{--  nếu đăng nhập thì hiện nút yêu thích và giỏ hàng --}}
                                                <a href="{{route('cart.add',$np->id)}}" title="Add To cart">
                                                    <i class="ion-bag"></i>
                                                </a>
                                                @if ($np->favorited)
                                                    <a href="{{route('home.favorite',$np->id)}}" title="remove To Wishlist">
                                                        <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                                    </a>
                                                @else  
                                                    <a href="{{route('home.favorite',$np->id)}}" title="Add To Wishlist">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                @endif
                                            @else                                                                         {{--    Nếu chưa đăng nhập thì hiện giỏ hàng nhưng link đến login --}}
                                                <a href="{{route('account.login')}}" title="Add To cart">
                                                    <i class="ion-bag"></i>
                                                </a>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Banner Fullwidth Area Start Here -->
            <div class="banner-fullwidth-area">
                <div class="container custom-wrapper">
                    <div class="row">
                        <div class="col-md-5 col-lg-6 text-center col-custom">
                            <div class="banner-thumb h-100 d-flex justify-content-center align-items-center">
                                <img src="uploads/banner/thumb/1.png" alt="Banner Thumb">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-6 text-center justify-content-center col-custom">
                            <div class="banner-flash-content d-flex flex-column align-items-center justify-content-center h-100">
                                <h2 class="deal-head text-uppercase">Flash Deals</h2>
                                <h3 class="deal-title text-uppercase">Hurry up and Get 25% Discount</h3>
                                <a href="shop.html" class="obrien-button primary-btn">Shop Now</a>
                                <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Fullwidth Area End Here -->
            <!-- Banner Area Start Here -->
            <div class="banner-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-custom">
                            <div class="banner-image hover-style">
                                <a class="d-block" href="shop.html">
                                    <img class="w-100" src="uploads/banner/small-banner/1-1.png" alt="Banner Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-custom">
                            <div class="banner-image hover-style">
                                <a class="d-block" href="shop.html">
                                    <img class="w-100" src="uploads/banner/small-banner/1-2.png" alt="Banner Image">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-custom">
                            <div class="banner-image hover-style mb-0">
                                <a class="d-block" href="shop.html">
                                    <img class="w-100" src="uploads/banner/small-banner/1-3.png" alt="Banner Image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Banner Area End Here -->
            <!-- Product Area Start Here -->
            <div class="product-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-5 m-auto text-center col-custom">
                            <div class="section-content">
                                <h2 class="title-1 text-uppercase">Featured Products</h2>
                                <div class="desc-content">
                                    <p>All best seller product are now available for you and your can buy this product from here any time any where so sop now</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-wrapper col-lg-12 col-custom">
                            <div class="product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "infinite": true,
                        "arrows": false,
                        "dots": false
                        }' data-slick-responsive='[
                        {"breakpoint": 1200, "settings": {
                        "slidesToShow": 3
                        }},
                        {"breakpoint": 992, "settings": {
                        "slidesToShow": 2
                        }},
                        {"breakpoint": 576, "settings": {
                        "slidesToShow": 1
                        }}
                        ]'>
                        @foreach ($best_sale_products as $sp)
                            <div class="single-item">
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="{{route('home.product',$sp->slug)}}">
                                            <img src="uploads/product/{{$sp->image}}" alt="" class="product-image-1 w-100">
                                            @if ($sp->images->first())
                                                <img src="uploads/product/{{$sp->images->first()->image}}" alt="" class="product-image-2 position-absolute w-100">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <div class="rateit" data-rateit-value="{{$sp->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('home.product',['product' => $sp->id, 'slug' => $sp->slug])}}">{{$sp->name}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            @if ($sp->sale_price > 0)
                                                <span class="regular-price ">{{number_format($sp->sale_price)}}VND</span>
                                                <span class="old-price"><del>{{number_format($sp->price)}}VND</del></span>
                                            @else
                                                <span class="regular-price ">{{number_format($sp->price)}}VND</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="{{route('home.product',$sp->slug)}}" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        @if (auth('cus')->check())
                                            <a href="{{route('cart.add',$sp->id)}}" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            @if ($sp->favorited)
                                                <a href="{{route('home.favorite',$sp->id)}}" title="remove To Wishlist">
                                                    <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                                </a>
                                            @else  
                                                <a href="{{route('home.favorite',$sp->id)}}" title="Add To Wishlist">
                                                    <i class="ion-ios-heart-outline"></i>
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{route('account.login')}}" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Area End Here -->
            <!-- Newslatter Area Start Here -->
            <div class="newsletter-area">
                <div class="container container-default h-100 custom-area">
                    <div class="row h-100">
                        <div class="col-lg-8 col-xl-5 offset-xl-6 offset-lg-3 col-custom">
                            <div class="newsletter-content text-center d-flex flex-column align-items-center justify-content-center h-100">
                                <div class="section-content">
                                    <h4 class="title-4 text-uppercase">Special <span>Offer</span> for subscription</h4>
                                    <h2 class="title-3 text-uppercase">Get instant discount for membership</h2>
                                    <p class="desc-content">Subscribe our newsletter and all latest news of our <br>latest product, promotion and offers</p>
                                </div>
                                <div class="newsletter-form-wrap ml-auto mr-auto">
                                    <form id="mc-form" class="mc-form d-flex position-relative">
                                        <input type="email" id="mc-email" class="form-control email-box" placeholder="email@example.com" name="EMAIL">
                                        <button id="mc-submit" class="btn primary-btn obrien-button newsletter-btn position-absolute" type="submit">Subscribe</button>
                                    </form>
                                    <!-- mailchimp-alerts Start -->
                                    <div class="mailchimp-alerts text-centre">
                                        <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                        <div class="mailchimp-success text-success"></div><!-- mailchimp-success end -->
                                        <div class="mailchimp-error text-danger"></div><!-- mailchimp-error end -->
                                    </div>
                                    <!-- mailchimp-alerts end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Newslatter Area End Here -->
            <!-- Latest Blog Area Start Here -->
            <div class="latest-blog-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-5 m-auto text-center col-custom">
                            <div class="section-content">
                                <h2 class="title-1 text-uppercase">Latest Blog</h2>
                                <div class="desc-content">
                                    <p>If you want to know about the organic product then keep an eye on our blog.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-custom">
                            <div class="obrien-slider" data-slick-options='{
                            "slidesToShow": 3,
                            "slidesToScroll": 1,
                            "infinite": true,
                            "arrows": false,
                            "dots": false
                            }' data-slick-responsive='[
                            {"breakpoint": 1200, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint": 992, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint": 768, "settings": {
                            "slidesToShow": 1
                            }},
                            {"breakpoint": 576, "settings": {
                            "slidesToShow": 1
                            }}
                            ]'>
                            @foreach ($new_post as $item)
                                <div class="single-blog">
                                    <div class="single-blog-thumb">
                                        <a href="{{route('home.post_detail',$item->slug)}}">
                                            <img src="uploads/blog/{{$item->image}}" alt="Blog Image">
                                        </a>
                                    </div>
                                    <div class="single-blog-content position-relative">
                                        <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                            <span>{{$item->created_at->format('m')}}</span>
                                            <span>{{$item->created_at->format('d')}}</span>
                                        </div>
                                        <div class="post-meta">
                                            <span class="author">Author: {{$item->author}}</span>
                                        </div>
                                        <h2 class="post-title">
                                            <a href="{{route('home.post_detail',$item->slug)}}">{{$item->name}}</a>
                                        </h2>
                                        <p class="desc-content">{{Str::words($item->short_description,30)}}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{-- @dd($new_post) --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Latest Blog Area End Here -->
            <!-- Support Area Start Here -->
            <div class="support-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="support-wrapper d-flex">
                                <div class="support-content">
                                    <h1 class="title">Need Help ?</h1>
                                    <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                                </div>
                                <div class="support-button d-flex align-items-center">
                                    <a class="obrien-button primary-btn" href="contact-us.html">Contact now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Support Area End Here -->
@endsection