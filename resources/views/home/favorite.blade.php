@extends('master.main')

@section('title','Your favorite')
@section('main')
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Favorite</h3>
                            <ul>
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li>Favorite</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Shop Main Area Start Here -->
        <div class="shop-main-area">
            <div class="container container-default custom-area">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-12 col-custom widget-mt">
                        <!--shop toolbar start-->
                        <div class="shop_toolbar_wrapper">
                            <div class="shop_toolbar_btn">
                                <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip" title="3"><i class="fa fa-th"></i></button>
                                <!-- <button data-role="grid_4" type="button"  class=" btn-grid-4" data-bs-toggle="tooltip" title="4"></button> -->
                                <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                            </div>
                            <div class="shop-select">
                                <form class="d-flex flex-column w-100" action="#">
                                    <div class="form-group">
                                        <select class="form-control nice-select w-100">
                                            <option selected value="1">Alphabetically, A-Z</option>
                                            <option value="2">Sort by popularity</option>
                                            <option value="3">Sort by newness</option>
                                            <option value="4">Sort by price: low to high</option>
                                            <option value="5">Sort by price: high to low</option>
                                            <option value="6">Product Name: Z</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--shop toolbar end-->
                        <!-- Shop Wrapper Start -->
                        <div class="row shop_wrapper grid_3">
                            @foreach ($favorites as $item)
                            <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                                <div class="single-product position-relative">
                                    <div class="product-image">
                                        <a class="d-block" href="{{route('home.product',$item->prod->slug)}}">
                                            <img src="uploads/product/{{$item->prod->image}}" alt="" class="product-image-1 w-100">
                                            @if ($item->prod->images->first())
                                                <img src="uploads/product/{{$item->prod->images->first()->image}}" alt="" class="product-image-2 position-absolute w-100">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <div class="rateit" data-rateit-value="{{$item->prod->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('home.product',$item->prod->slug)}}">{{$item->prod->name}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            @if ($item->prod->sale_price > 0)
                                                <span class="regular-price ">{{number_format($item->prod->sale_price)}}VND</span>
                                                <span class="old-price"><del>{{number_format($item->prod->price)}}VND</del></span>
                                            @else
                                                <span class="regular-price ">{{number_format($item->prod->price)}}VND</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="add-action d-flex position-absolute">
                                        <a href="cart.html" title="Add To cart">
                                            <i class="ion-bag"></i>
                                        </a>
                                        <a href="{{route('home.compare_product',$item->prod->id)}}" title="Compare">
                                            <i class="ion-ios-loop-strong"></i>
                                        </a>
                                        @if (auth('cus')->check())
                                            @if ($item->prod->favorited)
                                                <a href="{{route('home.favorite',$item->prod->id)}}" title="remove To Wishlist">
                                                    <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                                </a>
                                            @else  
                                                <a href="{{route('home.favorite',$item->prod->id)}}" title="Add To Wishlist">
                                                    <i class="ion-ios-heart-outline"></i>
                                                </a>
                                            @endif
                                        @endif

                                    </div>
                                    <div class="product-content-listview">
                                        <div class="product-rating">
                                            <div class="rateit" data-rateit-value="{{$item->prod->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="{{route('home.product',$item->prod->slug)}}">{{$item->prod->name}}</a></h4>
                                        </div>
                                        <div class="price-box">
                                            @if ($item->prod->sale_price > 0)
                                                <span class="regular-price ">{{number_format($item->prod->sale_price)}}VND</span>
                                                <span class="old-price"><del>{{number_format($item->prod->price)}}VND</del></span>
                                            @else
                                                <span class="regular-price ">{{number_format($item->prod->price)}}VND</span>
                                            @endif
                                        </div>
                                        <div class="add-action-listview d-flex">
                                            <a href="{{route('cart.add',$item->prod->id)}}" title="Add To cart">
                                                <i class="ion-bag"></i>
                                            </a>
                                            <a href="{{route('home.compare_product',$item->prod->id)}}" title="Compare">
                                                <i class="ion-ios-loop-strong"></i>
                                            </a>
                                            @if (auth('cus')->check())
                                                @if ($item->prod->favorited)
                                                    <a href="{{route('home.favorite',$item->prod->id)}}" title="remove To Wishlist">
                                                        <i class="ion-ios-heart" style="color: rgb(229, 0, 0)"></i>
                                                    </a>
                                                @else  
                                                    <a href="{{route('home.favorite',$item->prod->id)}}" title="Add To Wishlist">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                        <p class="desc-content">
                                            {{-- {!!readFileText($item->prod->description)['content']!!} --}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <!-- Shop Wrapper End -->
                        <!-- Bottom Toolbar Start -->
                        {{-- @if(isset($favorites) && count($favorites) > 0 )
                            {{$favorites->links('home.blocks.pagination_template')}}
                        @endif --}}
                        <!-- Bottom Toolbar End -->
                    </div>
                    <div class="col-lg-3 col-12 col-custom">
                        <!-- Sidebar Widget Start -->
                        @include('home.blocks.sidebar')
                        <!-- Sidebar Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Main Area End Here -->
        @endsection
@push('css')
    {{-- <style>
        .desc-content{
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style> --}}
@endpush    
