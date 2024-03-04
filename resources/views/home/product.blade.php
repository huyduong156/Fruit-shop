@extends('master.main')

@section('title',$product->name)
@section('main')
    <div class="shop-wrapper">
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Product Details</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Product Details</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Single Product Main Area Start -->
        <div class="single-product-main-area">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 col-custom">
                        <div class="product-details-img horizontal-tab">
                            <div class="product-slider popup-gallery product-details_slider" data-slick-options='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".pd-slider-nav"
                        }'>
                                <div class="single-image border">
                                    <a href="uploads/product/{{$product->image}}">
                                        <img src="uploads/product/{{$product->image}}" alt="Product">
                                    </a>
                                </div>
                                @foreach ($product->images as $img)
                                    <div class="single-image border">
                                        <a href="uploads/product/{{$img->image}}">
                                            <img src="uploads/product/{{$img->image}}" alt="Product">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                            <div class="pd-slider-nav product-slider" data-slick-options='{
                        "slidesToShow": 4,
                        "asNavFor": ".product-details_slider",
                        "focusOnSelect": true,
                        "arrows" : false,
                        "spaceBetween": 30,
                        "vertical" : false
                        }' data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 4}},
                            {"breakpoint":1200, "settings": {"slidesToShow": 4}},
                            {"breakpoint":992, "settings": {"slidesToShow": 4}},
                            {"breakpoint":575, "settings": {"slidesToShow": 3}}
                        ]'>
                                <div class="single-thumb border">
                                    <img src="uploads/product/{{$product->image}}" alt="Product Thumnail">
                                </div>
                                @foreach ($product->images as $img)
                                    <div class="single-thumb border">
                                        <img src="uploads/product/{{$img->image}}" alt="Product Thumnail">
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-custom">
                        <div class="product-summery position-relative">
                            <div class="product-head mb-3">
                                <h2 class="product-title">{{$product->name}}</h2>
                            </div>
                            <div class="price-box mb-2">
                                @if ($product->sale_price > 0)
                                <span class="regular-price ">{{number_format($product->sale_price)}}VND</span>
                                <span class="old-price"><del>{{number_format($product->price)}}VND</del></span>
                            @else
                                <span class="regular-price ">{{number_format($product->price)}}VND</span>
                            @endif
                            </div>
                            <div class="product-rating mb-3">
                                <div class="rateit" data-rateit-value="{{$product->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                            </div>
                            <div class="sku mb-3">
                                <span>SKU: 12345</span>
                            </div>
                            <p class="desc-content mb-5">{{$product->short_description}}</p>
                            <form action="{{route('cart.add',$product->id)}}" method="GET">
                                <div class="quantity-with_btn mb-4">
                                        @csrf
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" name="quantity" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                        <button class="btn obrien-button primary-btn" type="submit">Add to cart</button>
                                        
                                        @if ($product->favorited)
                                            <a class="btn obrien-button-2 treansparent-color pt-0 pb-0" href="{{route('home.favorite',$product->id)}}">Remove from wishlist</a>
                                        @else  
                                            <a class="btn obrien-button-2 treansparent-color pt-0 pb-0" href="{{route('home.favorite',$product->id)}}">Add to wishlist</a>
                                        @endif
                                </div>
                            </form>
                            <div class="buy-button mb-5">
                                <a href="#" class="btn obrien-button-3 black-button">Buy it now</a>
                            </div>
                            <div class="social-share mb-4">
                                <span>Share :</span>
                                <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                                <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                                <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                                <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                            </div>
                            <div class="payment">
                                <a href="#"><img class="border" src="uploads/payment/img-payment.png" alt="Payment"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-no-text">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link text-uppercase" id="review-tab" data-bs-toggle="tab" href="#connect-4" role="tab" aria-selected="false">Size Chart</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content mb-text" id="myTabContent">
                            <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="desc-content">
                                    <p class="mb-3">{!!readFileText($product->description)['content']!!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                                <!-- Start Single Content -->
                                <div class="product_tab_content  border p-3">
                                    <div class="review_address_inner">
                                        
                                        <!-- Start Single Review -->
                                        @if ($rating_data)

                                            @foreach ($rating_data as $item)
                                            <div class="pro_review mb-5">
                                                <div class="review_thumb">
                                                    <img width="65px" alt="review images" src="uploads/user/customer/{{$item->order->customer->avatar}}">
                                                </div>
                                                <div class="review_details" style="flex-grow: 1;">
                                                    <div class="review_info mb-2">
                                                        <div class="product-rating mb-2">
                                                            <div class="rateit" data-rateit-value="{{$item->rate}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                        </div>
                                                        <h5>{{$item->order->customer->name}} - <span> {{ \Carbon\Carbon::parse($item->rate_time)->format('d-m-Y H:i') }}</span></h5>
                                                    </div>
                                                    <p>{{$item->rate_content}}</p>
                                                </div>
                                            </div>

                                            @endforeach
                                        @endif
                                        <!-- End Single Review -->
                                    </div>
                                    <!-- Start RAting Area -->
                                    {{-- <div class="rating_wrap">
                                        <h5 class="rating-title-1 mb-2">Add a review </h5>
                                        <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                        <h6 class="rating-title-2 mb-2">Your Rating</h6>
                                        <div class="rating_list mb-4">
                                            <div class="review_info">
                                                <div class="product-rating mb-3">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- End RAting Area -->
                                    {{-- <div class="comments-area comments-reply-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-custom">
                                                <form action="#" class="comment-form-area">
                                                    <div class="row comment-input">
                                                        <div class="col-md-6 col-custom comment-form-author mb-3">
                                                            <label>Name <span class="required">*</span></label>
                                                            <input type="text" required="required" name="Name">
                                                        </div>
                                                        <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                            <label>Email <span class="required">*</span></label>
                                                            <input type="text" required="required" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="comment-form-comment mb-3">
                                                        <label>Comment</label>
                                                        <textarea class="comment-notes" required="required"></textarea>
                                                    </div>
                                                    <div class="comment-form-submit">
                                                        <input type="submit" value="Submit" class="comment-submit btn obrien-button primary-btn">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- End Single Content -->
                            </div>
                            <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="shipping-policy">
                                    <h4 class="title-3 mb-4">Shipping policy for our store</h4>
                                    <p class="desc-content mb-2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                                    <ul class="policy-list mb-2">
                                        <li>1-2 business days (Typically by end of day)</li>
                                        <li><a href="#">30 days money back guaranty</a></li>
                                        <li>24/7 live support</li>
                                        <li>odio dignissim qui blandit praesent</li>
                                        <li>luptatum zzril delenit augue duis dolore</li>
                                        <li>te feugait nulla facilisi.</li>
                                    </ul>
                                    <p class="desc-content mb-2">Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                                    <p class="desc-content mb-2">claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                                    <p class="desc-content mb-2">seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                                </div>
                            </div>
                            {{-- <div class="tab-pane fade" id="connect-4" role="tabpanel" aria-labelledby="review-tab">
                                <div class="size-tab table-responsive-lg">
                                    <h4 class="title-3 mb-4">Size Chart</h4>
                                    <table class="table border">
                                        <tbody>
                                            <tr>
                                                <td class="cun-name"><span>UK</span></td>
                                                <td>18</td>
                                                <td>20</td>
                                                <td>22</td>
                                                <td>24</td>
                                                <td>26</td>
                                            </tr>
                                            <tr>
                                                <td class="cun-name"><span>European</span></td>
                                                <td>46</td>
                                                <td>48</td>
                                                <td>50</td>
                                                <td>52</td>
                                                <td>54</td>
                                            </tr>
                                            <tr>
                                                <td class="cun-name"><span>usa</span></td>
                                                <td>14</td>
                                                <td>16</td>
                                                <td>18</td>
                                                <td>20</td>
                                                <td>22</td>
                                            </tr>
                                            <tr>
                                                <td class="cun-name"><span>Australia</span></td>
                                                <td>28</td>
                                                <td>10</td>
                                                <td>12</td>
                                                <td>14</td>
                                                <td>16</td>
                                            </tr>
                                            <tr>
                                                <td class="cun-name"><span>Canada</span></td>
                                                <td>24</td>
                                                <td>18</td>
                                                <td>14</td>
                                                <td>42</td>
                                                <td>36</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product Main Area End -->
        <!-- Product Area Related Start Here -->
        <div class="product-area mb-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">Related Product</h2>
                            <div class="desc-content">
                                <p>You can check the related product for your shopping collection.</p>
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
                        @foreach ($related_products as $item)
                            <div class="single-item">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="{{route('home.product',['product' => $item->id, 'slug' => $item->slug])}}">
                                            <img src="uploads/product/{{$item->image}}" alt="" class="product-image-1 w-100">
                                            @if ($item->images->first())
                                                <img src="uploads/product/{{$item->images->first()->image}}" alt="" class="product-image-2 position-absolute w-100">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <div class="rateit" data-rateit-value="{{$item->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('home.product',['product' => $item->id, 'slug' => $item->slug])}}">{{$item->name}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            @if ($item->sale_price > 0)
                                                <span class="regular-price ">{{number_format($item->sale_price)}}VND</span>
                                                <span class="old-price"><del>{{number_format($item->price)}}VND</del></span>
                                            @else
                                                <span class="regular-price ">{{number_format($item->price)}}VND</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="{{route('home.compare_product',$item->id)}}" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        @if (auth('cus')->check())
                                            <a href="{{route('cart.add',$item->id)}}" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            @if ($item->favorited)
                                                <a href="{{route('home.favorite',$item->id)}}" title="remove To Wishlist">
                                                    <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                                </a>
                                            @else  
                                                <a href="{{route('home.favorite',$item->id)}}" title="Add To Wishlist">
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
        <!-- Product Area Like Start Here -->
        <div class="product-area mb-no-text">
            <div class="container container-default custom-area">
                <div class="row">
                    <div class="col-lg-5 m-auto text-center col-custom">
                        <div class="section-content">
                            <h2 class="title-1 text-uppercase">You May Also Like</h2>
                            <div class="desc-content">
                                <p>Most of the customers choose our products. You may also like our product.</p>
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
                        @foreach ($products_like as $item)
                        <div class="single-item">
                            <div class="single-product position-relative">
                                <div class="product-image">
                                    <a class="d-block" href="{{route('home.product',['product' => $item->id, 'slug' => $item->slug])}}">
                                        <img src="uploads/product/{{$item->image}}" alt="" class="product-image-1 w-100">
                                        @if ($item->images->first())
                                            <img src="uploads/product/{{$item->images->first()->image}}" alt="" class="product-image-2 position-absolute w-100">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-content">
                                    <div class="product-rating">
                                        <div class="rateit" data-rateit-value="{{$item->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                    </div>
                                    <div class="product-title">
                                        <h4 class="title-2"> <a href="{{route('home.product',['product' => $item->id, 'slug' => $item->slug])}}">{{$item->name}}</a></h4>
                                    </div>
                                    <div class="price-box">
                                        @if ($item->sale_price > 0)
                                            <span class="regular-price ">{{number_format($item->sale_price)}}VND</span>
                                            <span class="old-price"><del>{{number_format($item->price)}}VND</del></span>
                                        @else
                                            <span class="regular-price ">{{number_format($item->price)}}VND</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="add-action d-flex position-absolute">
                                    <a href="{{route('home.compare_product',$item->id)}}" title="Compare">
                                        <i class="ion-ios-loop-strong"></i>
                                    </a>
                                    @if (auth('cus')->check())
                                        <a href="{{route('cart.add',$item->id)}}" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        @if ($item->favorited)
                                            <a href="{{route('home.favorite',$item->id)}}" title="remove To Wishlist">
                                                <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                            </a>
                                        @else  
                                            <a href="{{route('home.favorite',$item->id)}}" title="Add To Wishlist">
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

    </div>

    <!-- Modal Area Start Here -->
    <div class="modal fade obrien-modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 text-center">
                                <div class="product-image">
                                    <img src="assets/images/product/1.jpg" alt="Product Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame bel...</p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with_btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                </div>
                                            </div>
                                            <div class="add-to_cart">
                                                <a class="btn obrien-button primary-btn" href="cart.html">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Area End Here -->

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="ion-chevron-up"></i>
    </a>
    <!-- Scroll to Top End -->


@endsection