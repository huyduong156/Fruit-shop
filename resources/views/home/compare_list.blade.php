@extends('master.main')

@section('title','Your Compare List')
@section('main')
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Your Compare List</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>Compare</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- Compare Area Start Here -->
        <div class="compare-area mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Compare Page Content Start -->
                        <div class="compare-page-content-wrap">
                            <div class="compare-table table-responsive">
                                <table class="table table-bordered mb-0">
                                    @if (isset($compare))
                                        <h3 style="text-align: center">Danh sách so sánh của bạn đang trống</h3>
                                        <br>
                                        <a href="{{route('home.index')}}" class="btn obrien-button primary-btn d-block">Tiếp tục mua sắm</a>
                                        <br>

                                    @endif
                                    <tbody>
                                        <tr>
                                            <td class="first-column">Product</td>
                                            @foreach ($compare as $item)
                                                <td class="product-image-title">
                                                    <a href="{{route('home.product',$item->product->slug)}}"  target="_blank" class="image">
                                                        <img class="img-fluid" src="uploads/product/{{$item->product->image}}" alt="Compare Product">
                                                    </a>
                                                    {{-- <a href="#" class="category">White</a> --}}
                                                    <a href="{{route('home.product',$item->product->slug)}}"  target="_blank" class="title">{{$item->product->name}}</a>
                                                </td>
                                            @endforeach
                                        </tr>

                                        <tr>
                                            <td class="first-column">Price</td>
                                            @foreach ($compare as $item)
                                                <td>
                                                    @if ($item->product->sale_price > 0)
                                                        <span class="">{{number_format($item->product->sale_price)}}VND</span>
                                                        <span class=""><del>{{number_format($item->product->price)}}VND</del></span>
                                                    @else
                                                        <span class="">{{number_format($item->product->price)}}VND</span>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Add to cart</td>
                                            @foreach ($compare as $item)
                                                <td><a href="{{route('cart.add',$item->product->id)}}" class="btn btn__bg btn__sqr">Add to Cart</a></td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Rating</td>

                                            @foreach ($compare as $item)
                                                <td class="product-rating">
                                                    <div class="rateit" data-rateit-value="{{$item->product->AverageRating()}}" data-rateit-ispreset="true" data-rateit-readonly="true"></div>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Remove</td>
                                            @foreach ($compare as $item)
                                                <td class="pro-remove">
                                                    <a href="{{route('home.compare_product',$item->product->id)}}"><button><i class="fa fa-trash-o"></i></button></a>
                                                </td>
                                            @endforeach

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Compare Page Content End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Compare Area End Here -->
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