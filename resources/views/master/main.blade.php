<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/obrien/obrien/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Dec 2023 08:42:59 GMT -->

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="uploads/favicon.ico">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/vendor/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel=" stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/style.min.css"> -->
    
    <!-- Rate Yo star -->
    <link rel="stylesheet" href="assets/css/vendor/rate-master/scripts/rateit.css">
    {{-- link doc https://gjunge.github.io/rateit.js/examples/ --}}
    @stack('css')

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>


</head>

<body>

    <div class="home-wrapper home-1">
        <!-- Header Area Start Here -->
        <header class="main-header-area">
            <!-- Header Top Area Start Here -->
            {{-- <div class="header-top-area">
                <div class="container container-default-2 custom-area">
                    <div class="row">
                        <div class="col-12 col-custom header-top-wrapper text-center">
                            <div class="short-desc text-white">
                                <p>Get 35% off for new product </p>
                            </div>
                            <div class="header-top-button">
                                <a href="shop-fullwidth.html">Shop Now</a>
                            </div>
                            <span class="top-close-button">X</span>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Header Top Area End Here -->
            <!-- Main Header Area Start -->
            <div class="main-header">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                                    <div class="header-logo d-flex align-items-center">
                                        <a href="{{route('home.index')}}">
                                            <img class="img-full" src="uploads/logo/logo.png" alt="Header Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-xl-6 position-static d-none d-lg-block col-custom">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul class="nav">
                                            <li>
                                                <a class="active" href="{{route('home.index')}}">
                                                    <span class="menu-text"> Home</span>
                                                    {{-- <i class="fa fa-angle-down"></i> --}}
                                                </a>
                                                {{-- <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a class="active" href="index.html">Home Page - 1</a></li>
                                                    <li><a href="index-2.html">Home Page - 2</a></li>
                                                    <li><a href="index-3.html">Home Page - 3</a></li>
                                                    <li><a href="index-4.html">Home Page - 4</a></li>
                                                </ul> --}}
                                            </li>
                                            <li>
                                                <a href="{{route('home.store')}}">
                                                    <span class="menu-text">Products</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    @foreach ($cats_home as $item)
                                                        <li><a href="{{route('home.category', $item->slug)}}">{{$item->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{route('home.post')}}">
                                                    <span class="menu-text"> News</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    @foreach ($cats_post as $item)
                                                        <li><a href="{{route('home.post-category', $item->slug)}}">{{$item->name}}</a></li>
                                                    @endforeach

                                                </ul>
                                            </li>
                                            <li>
                                                <a href="{{route('home.about')}}">
                                                    <span class="menu-text"> About</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('home.contact')}}">
                                                    <span class="menu-text">Contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-3 col-xl-4 col-sm-6 col-6 col-custom">
                                    <div class="header-right-area main-nav">
                                        <ul class="nav">
                                            @if (auth('cus')->check())
                                                <li class="sidemenu-wrap d-none d-lg-flex">
                                                    <a href="{{route('account.profile')}}">Hi {{auth('cus')->user()->name}} <i class="fa fa-caret-down"></i> </a>
                                                    <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-language">
                                                        <li><a href="{{route('account.profile')}}">Profile {{auth('cus')->user()->name}}</a></li>
                                                        <li><a href="{{route('account.favorite')}}">Favorite</a></li>
                                                        <li><a href="{{route('account.compare_list')}}">Compare</a></li>
                                                        <li><a href="{{route('account.change_password')}}">Change password</a></li>
                                                        <li><a href="{{route('account.logout')}}">Logout</a></li>
                                                    </ul>
                                                </li>
                                            @else
                                                <li class="login-register-wrap d-none d-xl-flex">
                                                    <span><a href="{{route('account.login')}}">Login</a></span>
                                                    <span><a href="{{route('account.register')}}">Register</a></span>
                                                </li> 
                                            @endif
                                            <li class="sidemenu-wrap d-none d-lg-flex">
                                                 <i class="fa fa-search"></i>
                                                <ul class="dropdown-sidemenu dropdown-sidemenu-search-header dropdown-hover-2 dropdown-language">
                                                    <form class="form-inline">
                                                        <div class="form-group">
                                                            <input type="text" name="" id="" class="form-control search-form-product" placeholder="search . . ." aria-describedby="helpId">
                                                        </div>
                                                        <div class="search-ajax-result">

                                                        </div>
                                                    </form>
                                                </ul>
                                            </li>
                                            <li class="minicart-wrap">
                                                <a href="{{route('cart.index')}}" class="minicart-btn toolbar-btn">
                                                    <i class="ion-bag"></i>
                                                    <span class="cart-item_count">{{$carts->count()}}</span>
                                                </a>

                                                <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                                    @if ($carts->count() > 0)
                                                        @foreach ($carts as $item)
                                                            <div class="single-cart-item">
                                                                <div class="cart-img">
                                                                    <a href="{{route('home.product',['product' => $item->product_id, 'slug' => $item->products->slug])}}"><img src="uploads/product/{{$item->products->image}}"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="cart-text">
                                                                    <h5 class="title"><a href="{{route('home.product',['product' => $item->product_id, 'slug' => $item->products->slug])}}">{{$item->products->name}}</a></h5>
                                                                    <div class="cart-text-btn">
                                                                        <div class="cart-qty">
                                                                            <span>{{$item->quantity}}×</span>
                                                                            <span class="cart-price">{{number_format($item->price)}}VND</span>
                                                                        </div>
                                                                        <button type="button"><i class="ion-trash-b"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        <div class="cart-price-total d-flex justify-content-between">
                                                            <h5>Total :</h5>
                                                            <h5>
                                                                <?php $total = 0; ?>
                                                                @foreach ($carts as $item)
                                                                <?php $total += $item->price * $item->quantity ?>
                                                                @endforeach
                                                                {{number_format($total)}} VND
                                                            </h5>
                                                        </div>
                                                        <div class="cart-links d-flex justify-content-center">
                                                            <a class="obrien-button white-btn" href="{{route('cart.index')}}">View
                                                                cart</a>
                                                            <a class="obrien-button white-btn" href="{{route('cus.order.checkout')}}">Checkout</a>
                                                        </div>
                                                    @else
                                                        @if (auth('cus')->check())
                                                            <h3>Giỏ hàng của bạn chưa có gì cả =))</h3>
                                                        @else
                                                            <h3>Vui lòng đăng nhập để xem giỏ hàng !!!</h3>
                                                            
                                                        @endif
                                                        
                                                    @endif
                                                </div>
                                            </li>
                                            <li class="mobile-menu-btn d-lg-none">
                                                <a class="off-canvas-btn" href="#">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header Area End -->
            <!-- Sticky Header Start Here-->
            {{-- <div class="main-header header-sticky">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-lg-12 col-custom">
                            <div class="row align-items-center">
                                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                                    <div class="header-logo">
                                        <a href="{{route('home.index')}}">
                                            <img class="img-full" src="uploads/logo/logo.png" alt="Header Logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-xl-6 position-static d-none d-lg-block col-custom">
                                    <nav class="main-nav d-flex justify-content-center">
                                        <ul class="nav">
                                            <li>
                                                <a class="active" href="index.html">
                                                    <span class="menu-text"> Home</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a class="active" href="index.html">Home Page - 1</a></li>
                                                    <li><a href="index-2.html">Home Page - 2</a></li>
                                                    <li><a href="index-3.html">Home Page - 3</a></li>
                                                    <li><a href="index-4.html">Home Page - 4</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="shop.html">
                                                    <span class="menu-text">Shop</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <div class="mega-menu dropdown-hover">
                                                    <div class="menu-colum">
                                                        <ul>
                                                            <li><span class="mega-menu-text">Shop</span></li>
                                                            <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                            </li>
                                                            <li><a href="shop-list-left.html">Shop List Left Sidebar</a>
                                                            </li>
                                                            <li><a href="shop-list-right.html">Shop List Right
                                                                    Sidebar</a></li>
                                                            <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu-colum">
                                                        <ul>
                                                            <li><span class="mega-menu-text">Product</span></li>
                                                            <li><a href="product-details.html">Single Product</a></li>
                                                            <li><a href="variable-product-details.html">Variable
                                                                    Product</a></li>
                                                            <li><a href="external-product-details.html">External
                                                                    Product</a></li>
                                                            <li><a href="gallery-product-details.html">Gallery
                                                                    Product</a></li>
                                                            <li><a href="countdown-product-details.html">Countdown
                                                                    Product</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="menu-colum">
                                                        <ul>
                                                            <li><span class="mega-menu-text">Others</span></li>
                                                            <li><a href="error-404.html">Error 404</a></li>
                                                            <li><a href="compare.html">Compare Page</a></li>
                                                            <li><a href="cart.html">Cart Page</a></li>
                                                            <li><a href="checkout.html">Checkout Page</a></li>
                                                            <li><a href="wishlist.html">Wishlist Page</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="blog-details-fullwidth.html">
                                                    <span class="menu-text"> Blog</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a href="blog.html">Blog Left Sidebar</a></li>
                                                    <li><a href="blog-list-right-sidebar.html">Blog List Right
                                                            Sidebar</a></li>
                                                    <li><a href="blog-list-fullwidth.html">Blog List Fullwidth</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                                    <li><a href="blog-grid-right-sidebar.html">Blog Grid Right
                                                            Sidebar</a></li>
                                                    <li><a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a></li>
                                                    <li><a href="blog-details-sidebar.html">Blog Details Sidebar</a>
                                                    </li>
                                                    <li><a href="blog-details-fullwidth.html">Blog Details Fullwidth</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span class="menu-text"> Pages</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                                <ul class="dropdown-submenu dropdown-hover">
                                                    <li><a href="frequently-questions.html">FAQ</a></li>
                                                    <li><a href="my-account.html">My Account</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="about-us.html">
                                                    <span class="menu-text"> About</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="contact-us.html">
                                                    <span class="menu-text">Contact</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="col-lg-3 col-xl-4 col-sm-6 col-6 col-custom">
                                    <div class="header-right-area main-nav">
                                        <ul class="nav">
                                            @if (auth('cus')->check())
                                                <li class="login-register-wrap d-none d-xl-flex">
                                                    <span><a href="{{route('account.profile')}}">Hi {{auth('cus')->user()->name}}</a></span>
                                                    <span><a href="{{route('account.favorite')}}">Favorite</a></span>
                                                    <span><a href="{{route('account.change_password')}}">Change password</a></span>
                                                    <span><a href="{{route('account.logout')}}">Logout</a></span>
                                                </li> 
                                            @else
                                                <li class="login-register-wrap d-none d-xl-flex">
                                                    <span><a href="{{route('account.login')}}">Login</a></span>
                                                    <span><a href="{{route('account.register')}}">Register</a></span>
                                                </li> 
                                            @endif
                                            <li class="sidemenu-wrap d-none d-lg-flex">
                                                <a href="#">USD <i class="fa fa-caret-down"></i> </a>
                                                <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-language">
                                                    <li><a href="#">USD - US Dollar</a></li>
                                                    <li><a href="#">EUR - Euro</a></li>
                                                    <li><a href="#">GBP - British Pound</a></li>
                                                    <li><a href="#">INR - Indian Rupee</a></li>
                                                    <li><a href="#">BDT - Bangladesh Taka</a></li>
                                                    <li><a href="#">JPY - Japan Yen</a></li>
                                                    <li><a href="#">CAD - Canada Dollar</a></li>
                                                    <li><a href="#">AUD - Australian Dollar</a></li>
                                                </ul>
                                            </li>
                                            <li class="minicart-wrap">
                                                <a href="#" class="minicart-btn toolbar-btn">
                                                    <i class="ion-bag"></i>
                                                    <span class="cart-item_count">3</span>
                                                </a>
                                                <div class="cart-item-wrapper dropdown-sidemenu dropdown-hover-2">
                                                    <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/1.jpg"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title"><a href="cart.html">11. Product with video
                                                                    - navy</a></h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/2.jpg"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title"><a href="cart.html"
                                                                    title="10. This is the large title for testing large title and there is an image for testing - white">10.
                                                                    This is the large title for testing...</a></h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-cart-item">
                                                        <div class="cart-img">
                                                            <a href="cart.html"><img src="uploads/cart/3.jpg"
                                                                    alt=""></a>
                                                        </div>
                                                        <div class="cart-text">
                                                            <h5 class="title"><a href="cart.html">1. New and sale badge
                                                                    product - s / red</a></h5>
                                                            <div class="cart-text-btn">
                                                                <div class="cart-qty">
                                                                    <span>1×</span>
                                                                    <span class="cart-price">$98.00</span>
                                                                </div>
                                                                <button type="button"><i
                                                                        class="ion-trash-b"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="cart-price-total d-flex justify-content-between">
                                                        <h5>Total :</h5>
                                                        <h5>$166.00</h5>
                                                    </div>
                                                    <div class="cart-links d-flex justify-content-center">
                                                        <a class="obrien-button white-btn" href="cart.html">View
                                                            cart</a>
                                                        <a class="obrien-button white-btn"
                                                            href="checkout.html">Checkout</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mobile-menu-btn d-lg-none">
                                                <a class="off-canvas-btn" href="#mobileMenu">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- Sticky Header End Here -->
            <!-- off-canvas menu start -->
            <aside class="off-canvas-wrapper" id="mobileMenu">
                <div class="off-canvas-overlay"></div>
                <div class="off-canvas-inner-content">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="off-canvas-inner">

                        <div class="search-box-offcanvas">
                            <form>
                                <input type="text" placeholder="Search product...">
                                <button class="search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!-- mobile menu start -->
                        <div class="mobile-navigation">

                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">Home</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home Page 1</a></li>
                                            <li><a href="index-2.html">Home Page 2</a></li>
                                            <li><a href="index-3.html">Home Page 3</a></li>
                                            <li><a href="index-4.html">Home Page 4</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Shop</a>
                                        <ul class="megamenu dropdown">
                                            <li class="mega-title has-children"><a href="#">Shop Layouts</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop.html">Shop Left Sidebar</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                    <li><a href="shop-list-left.html">Shop List Left Sidebar</a></li>
                                                    <li><a href="shop-list-right.html">Shop List Right Sidebar</a></li>
                                                    <li><a href="shop-fullwidth.html">Shop Full Width</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Product Details</a>
                                                <ul class="dropdown">
                                                    <li><a href="product-details.html">Single Product Details</a></li>
                                                    <li><a href="variable-product-details.html">Variable Product
                                                            Details</a></li>
                                                    <li><a href="external-product-details.html">External Product
                                                            Details</a></li>
                                                    <li><a href="gallery-product-details.html">Gallery Product
                                                            Details</a></li>
                                                    <li><a href="countdown-product-details.html">Countdown Product
                                                            Details</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega-title has-children"><a href="#">Others</a>
                                                <ul class="dropdown">
                                                    <li><a href="error404.html">Error 404</a></li>
                                                    <li><a href="compare.html">Compare Page</a></li>
                                                    <li><a href="cart.html">Cart Page</a></li>
                                                    <li><a href="checkout.html">Checkout Page</a></li>
                                                    <li><a href="wishlist.html">Wish List Page</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                            <li><a href="blog-list-fullwidth.html">Blog List Fullwidth</a></li>
                                            <li><a href="blog-grid.html">Blog Grid Page</a></li>
                                            <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                            <li><a href="blog-grid-fullwidth.html">Blog Grid Fullwidth</a></li>
                                            <li><a href="blog-details-sidebar.html">Blog Details Sidebar Page</a></li>
                                            <li><a href="blog-details-fullwidth.html">Blog Details Fullwidth Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children "><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="frequently-questions.html">FAQ</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="login-register.html">login &amp; register</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- mobile menu end -->
                        <div class="header-top-settings offcanvas-curreny-lang-support">
                            <!-- mobile menu navigation start -->
                            <nav>
                                <ul class="mobile-menu">
                                    <li class="menu-item-has-children"><a href="#">My Account</a>
                                        <ul class="dropdown">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="Register-2.html">Register</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><a href="#">Currency:USD</a>
                                        <ul class="dropdown">
                                            <li><a href="#">USD - US Dollar</a></li>
                                            <li><a href="#">EUR - Euro</a></li>
                                            <li><a href="#">GBP - British Pound</a></li>
                                            <li><a href="#">INR - Indian Rupee</a></li>
                                            <li><a href="#">BDT - Bangladesh Taka</a></li>
                                            <li><a href="#">JPY - Japan Yen</a></li>
                                            <li><a href="#">CAD - Canada Dollar</a></li>
                                            <li><a href="#">AUD - Australian Dollar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <!-- mobile menu navigation end -->
                        </div>
                        <!-- offcanvas widget area start -->
                        <div class="offcanvas-widget-area">
                            <div class="top-info-wrap text-left text-black">
                                <ul>
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="info%40yourdomain.html">(1245) 2456 012</a>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope"></i>
                                        <a href="info%40yourdomain.html">info@yourdomain.com</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="off-canvas-widget-social">
                                <a title="Facebook-f" href="#"><i class="fa fa-facebook-f"></i></a>
                                <a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                                <a title="Vimeo" href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                        </div>
                        <!-- offcanvas widget area end -->
                    </div>
                </div>
            </aside>
            <!-- off-canvas menu end -->
        </header>
        <!-- Header Area End Here -->
        @yield('main')
        <!-- Footer Area Start Here -->
        <footer class="footer-area">
            <div class="footer-widget-area">
                <div class="container container-default custom-area">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-custom">
                            <div class="single-footer-widget m-0">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="uploads/logo/footer.png" alt="Logo Image">
                                    </a>
                                </div>
                                <p class="desc-content">Obrien is the best parts shop of your daily nutritions. What
                                    kind of nutrition do you need you can get here soluta nobis</p>
                                <div class="social-links">
                                    <ul class="d-flex">
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Facebook">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Linkedin">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="border rounded-circle" href="#" title="Vimeo">
                                                <i class="fa fa-vimeo"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Information</h2>
                                <ul class="widget-list">
                                    <li><a href="about-us.html">Our Company</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="about-us.html">Our Services</a></li>
                                    <li><a href="about-us.html">Why We?</a></li>
                                    <li><a href="about-us.html">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Quicklink</h2>
                                <ul class="widget-list">
                                    <li><a href="about-us.html">About</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">Support</h2>
                                <ul class="widget-list">
                                    <li><a href="contact-us.html">Online Support</a></li>
                                    <li><a href="contact-us.html">Shipping Policy</a></li>
                                    <li><a href="contact-us.html">Return Policy</a></li>
                                    <li><a href="contact-us.html">Privacy Policy</a></li>
                                    <li><a href="contact-us.html">Terms of Service</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-custom">
                            <div class="single-footer-widget">
                                <h2 class="widget-title">See Information</h2>
                                <div class="widget-body">
                                    <address>123, H2, Road #21, Main City, Your address goes here.<br>Phone: 01254 698
                                        785, 36598 254 987<br>Email: https://example.com</address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright-area">
                <div class="container custom-area">
                    <div class="row">
                        <div class="col-12 text-center col-custom">
                            <div class="copyright-content">
                                <p>Copyright © 2020 <a href=""
                                        title="">Huy Dương</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End Here -->
    </div>

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->
    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- Ajax JS -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Nice Select JS -->
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Jquery Ui JS -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
    integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    
    <!-- Rate Yo star -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> --}}
    <script src="assets/css/vendor/rate-master/scripts/jquery.rateit.js"></script>
    {{-- <script src="assets/css/vendor/rate-master/scripts/jquery.rateit.min.js.map"></script> --}}
    {{-- <script src="assets/css/vendor/rate-master/scripts/jquery.rateit.min.js"></script> --}}

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
        @if (Session::has('ok'))
        <script>
            $.toast({
                heading: 'Success',
                text: "{{Session::get('ok')}}",
                showHideTransition: 'slide',
                position: 'top-center',
                icon: 'success'
            })
        </script>  
    @endif
    <script src="assets/js/main.js"></script>
        @if (Session::has('no'))
        <script>
            $.toast({
                heading: 'Notification',
                text: "{{Session::get('no')}}",
                showHideTransition: 'slide',
                position: 'top-center',
                icon: 'warning'
            })
        </script>  
    @endif
    <script>
        $('.search-form-product').keyup(function(){
            var _text = $(this).val();
            var _url = "{{url('uploads/product')}}";
            if(_text !=''){

                $.ajax({
                    url:"{{route('ajax-search-product')}}?key=" + _text,
                    type:'GET',
                    success: function(res){
                        var _html = '';
                        for (var pro of res) {
                            _html += '<div class="search-ajax-result-box">';
                            _html += '<div class="box-img">';
                            _html += '<a href="{{ route('home.product', ['product' => ' + pro.id + ', 'slug' =>' + pro.slug + ' ]) }}"><img src="'+_url+'/'+pro.image+'"></a>';
                            // _html += '<a href="{{ route('home.product', '') }}/' + pro.id + '-' + pro.slug '"><img src="'+_url+'/'+pro.image+'"></a>';
                            _html += '</div>';
                            _html += '<div class="box-text">';
                            _html += '<a href="{{ route('home.product', ['product' => ' + pro.id + ', 'slug' =>' + pro.slug + ' ]) }}">'+pro.name+'</a>';
                            _html += '<p>'+pro.sale_price+' VND</p>';
                            _html += '</div>';
                            _html += '</div>';
                        }
    
                        $('.search-ajax-result').html(_html)
                    }
                })
            } else {
                var _html = '';
                $('.search-ajax-result').html(_html)
            }


        })

    </script>
    @stack('js')
</body>


<!-- Mirrored from htmldemo.net/obrien/obrien/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Dec 2023 08:43:24 GMT -->

</html>