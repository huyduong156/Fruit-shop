@extends('master.main')
@section('title','Order History')
@section('main')
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">My Account</h3>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End Here -->
        <!-- my account wrapper start -->
        <div class="my-account-wrapper mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
                    <div class="col-lg-12 col-custom">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-custom">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="" ><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="{{route('cus.order.history')}}" class="active"><i class="fa fa-cart-arrow-down"></i>
                                            Orders</a>
                                        <a href=""><i class="fa fa-cloud-download"></i>
                                            Download</a>
                                        <a href=""><i class="fa fa-credit-card"></i>
                                            Payment
                                            Method</a>
                                        <a href=""><i class="fa fa-map-marker"></i>
                                            address</a>
                                        <a href="{{route('account.profile')}}"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <a href="{{route('account.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8 col-custom">
                                    <div class="myaccount-content">
                                        <h3>Orders</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Product</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($auth->orders as $item)
                                                    <tr>
                                                        <td>{{$loop->index+1}}</td>
                                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                                        <td>
                                                            @if ($item->status == 0)
                                                                Step 0: Đang chờ xác thực email
                                                            @elseif ($item->status == 1)
                                                                Step 1: Đã xác nhận - Chờ giao hàng
                                                            @elseif ($item->status == 2)
                                                                Step 2: Đang gửi hàng
                                                            @elseif ($item->status == 3)
                                                                Step 3: Đang giao hàng
                                                            @elseif ($item->status == 4)
                                                                Step 4: Đã giao hàng
                                                            @else
                                                                <strong>Đã hủy</strong>
                                                            @endif
                                                        </td>
                                                        <td>{{number_format($item->total_price)}}</td>
                                                        <td>{{$item->details->sum('quantity')}}</td>
                                                        <td><a href="{{route('cus.order.history-orderdetail',$item->id)}}" class="btn obrien-button-2 primary-color rounded-0">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
@endsection