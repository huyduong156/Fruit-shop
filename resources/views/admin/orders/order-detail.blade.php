@extends('master.admin')
@section('css')
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .btn-custom{
            padding:10px 20px;
            color:#000;
            border: 1px solid rgb(219, 219, 219);
            margin-right: 5px;

        }
    </style>
@endsection
@section('main')
@if ($order->status == 0)
    <p><strong>Trạng thái đơn hàng: </strong>Step 0: Đang chờ xác thực email</p>
    {{-- <a href="{{route('admin.order.update_status',$order->id)}}?status=1" class="btn btn-warning" onclick="return confirm('bạn có chắc thực hiện hành động này')" >Xác nhận đơn</a> --}}
    {{-- <a href="{{route('admin.order.update_status',$order->id)}}?status=5" class="btn btn-danger" onclick="return confirm('bạn có chắc thực hiện hành động này')">Hủy đơn</a> --}}
@elseif($order->status == 1)
    <p><strong>Trạng thái đơn hàng: </strong>Step 1: Đã xác nhận - Chờ giao hàng</p>
    <br>
    <p><strong>Thao tác</strong></p>
    <a href="{{route('admin.order.update_status',$order->id)}}?status=2" class="btn btn-warning btn-custom" onclick="return confirm('bạn có chắc thực hiện hành động này')" >Step 2: Đã gửi hàng</a>
    <a href="{{route('admin.order.update_status',$order->id)}}?status=5" class="btn btn-danger btn-custom" onclick="return confirm('bạn có chắc thực hiện hành động này')">Hủy đơn</a>
@elseif($order->status == 2)
    <p><strong>Trạng thái đơn hàng: </strong>Step 2: Đang gửi hàng</p>
    <br>
    <p><strong>Thao tác</strong></p>
    <a href="{{route('admin.order.update_status',$order->id)}}?status=3" class="btn btn-warning btn-custom"  onclick="return confirm('bạn có chắc thực hiện hành động này')" >Step 3: Đang giao hàng</a>
    <a href="{{route('admin.order.update_status',$order->id)}}?status=5" class="btn btn-danger btn-custom" onclick="return confirm('bạn có chắc thực hiện hành động này')">Hủy đơn</a>
@elseif($order->status == 3)
    <p><strong>Trạng thái đơn hàng: </strong>Step 3: Đang giao hàng</p>
    <br>
    <p><strong>Thao tác</strong></p>
    <a href="{{route('admin.order.update_status',$order->id)}}?status=4" class="btn btn-warning btn-custom"  onclick="return confirm('bạn có chắc thực hiện hành động này')" >Step 4: Đã giao hàng</a>
@elseif($order->status == 4)
    <p><strong>Trạng thái đơn hàng: </strong>Step 4: Đã giao hàng</p>
@elseif($order->status != 0 || $order->status != 1 || $order->status != 2 || $order->status != 3 || $order->status != 4)
    <a href="{{route('admin.order.update_status',$order->id)}}?status=1" class="btn btn-warning btn-custom"  onclick="return confirm('bạn có chắc thực hiện hành động này')" >Khôi phục</a>
@endif
<!-- Checkout Area Start Here -->
<div class="checkout-area">
    <div class="container container-default-2 custom-container">
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        <h3>Orderer</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Full Name </label>
                                    <input name="name" value="{{$auth->name}}" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address </label>
                                    <input name="address" value="{{$auth->address}}" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address </label>
                                    <input name="email" value="{{$auth->email}}" type="email" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone </label>
                                    <input  name="phone" value="{{$auth->phone}}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        <h3>Receiver</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Full Name </label>
                                    <input name="name" value="{{$order->name}}" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address </label>
                                    <input name="address" value="{{$order->address}}" type="text" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address </label>
                                    <input name="email" value="{{$order->email}}" type="email" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone </label>
                                    <input  name="phone" value="{{$order->phone}}" type="text" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </form>
        <h3>Product</h3>
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->details as $item)
                            <tr>
                                <td class="pro-thumbnail"><a
                                        href="{{route('home.product',$item->product_id)}}"><img class="img-fluid"
                                            src="uploads/product/{{$item->product->image}}" alt="Product" /></a>
                                </td>
                                <td class="pro-title"><a href="#">{{$item->product->name}}</a></td>
                                <td class="pro-price"><span>{{$item->price}}</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        {{-- <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" value="{{$item_cart->quantity}}"
                                                type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                        </div> --}}
                                        {{$item->quantity}}
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>{{$item->price * $item->quantity}}</span></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Shipping</td>
                                    <td>free</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">{{number_format($order->total_price)}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Order Status</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        @if ($order->status == 0)
                                            Step 0: Đang chờ xác thực email
                                        @elseif ($order->status == 1)
                                            Step 1: Đã xác nhận - Chờ giao hàng
                                        @elseif ($order->status == 2)
                                            Step 2: Đã gửi hàng - Chờ ship
                                        @elseif ($order->status == 3)
                                            Step 3: Đang giao hàng
                                        @elseif ($order->status == 4)
                                            Step 4: Đã giao hàng
                                        @else
                                            <strong>Đã hủy</strong>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End Here -->

@endsection