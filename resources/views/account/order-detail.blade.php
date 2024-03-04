@extends('master.main')
@section('title','Order Detail')
@section('main')

<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Your Order Detail</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Your Order Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
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
                                @if ($order->status == 4)
                                    <th class="pro-evaluate">Evaluate</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($order->details) --}}
                            @foreach ($order->details as $item)
                            <tr>
                                <td class="pro-thumbnail"><a
                                        href="{{route('home.product',$item->product->slug)}}"><img class="img-fluid"
                                            src="uploads/product/{{$item->product->image}}" alt="Product" /></a>
                                </td>
                                <td class="pro-title"><a href="{{route('home.product',$item->product->slug)}}">{{$item->product->name}}</a></td>
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
                                {{-- -----------------------đánh giá---------------------- --}}
                                @if ($order->status == 4)
                                    {{-- <td class="pro-evaluate"><a href="{{ route('cus.order.evaluate', ['product' => $item->product_id, 'order' => $order->id]) }}" class="btn obrien-button-2 primary-color rounded-0"><i class="fa fa-star"></i>  evaluate now</a></td> --}}
                                    <td class="pro-evaluate"><button type="button" id="btn-modal-form-rate" class="btn obrien-button-2 primary-color rounded-0" data-bs-toggle="modal" data-bs-target="#myModal-{{$item->product_id}}"><i class="fa fa-star"></i> {{$item->rate ? 'See reviews' : 'evaluate now'}} </button> </td>
                                    <!-- Button to Open the Modal -->

                                    <div class="modal fade" id="myModal-{{$item->product_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{route('account.product.rate_order')}}" method="POST">
                                                    @csrf
                                                    <div class="box-from-evaluate p-5">
                                                        <div class="checkbox-form">
                                                            <h3>Rate For Product "{{$item->product->name}}"</h3>
                                                            @if(!is_null($item->rate))
                                                                <span>You rated at: {{$item->rate_time}}</span>
                                                            @endif
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="checkout-form-list">
                                                                        <label>Rate <span class="required">*</span></label>
                                                                        <input name="rate" type="hidden" id="rate-value-{{$item->product_id}}">
                                                                        <input name="product_id" type="hidden" value="{{$item->product_id}}">
                                                                        <input name="order_detail_id" type="hidden" value="{{$item->order_id}}">
                                                                            <div class="rateit" id="rate-{{$item->product_id}}"
                                                                            data-rateit-ispreset="true" {{ !is_null($item->rate) ? 'data-rateit-readonly="true" data-rateit-value='.$item->rate
                                                                            : ''}}></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="checkout-form-list">
                                                                        <label>{{$item->rate ? 'Your comment' : 'Leave a comment about this product'}}</label>
                                                                        <textarea id="content" cols="30" rows="5" name="rate_content"
                                                                        class="border rounded-0 w-100 custom-textarea input-area"
                                                                        placeholder="Your comment" {{!is_null($item->rate) ? 'disabled' : ''}} >{{$item->rate_content}}</textarea>
                                                                    </div>
                                                                </div>
                                                                    @push('js')
                                                                        <script type="text/javascript">
                                                                            $("#rate-{{$item->product_id}}").bind('rated', function (event, value) { $('#rate-value-{{$item->product_id}}').val(value); });
                                                                        </script>
                                                                    @endpush
                                                                @if (is_null($item->rate))
                                                                    <span>You can only rate a product once in this order</span>
                                                                    <button class="btn obrien-button primary-btn">Rate Now</button>
                                                                @endif
                                                                {{-- <a class="btn obrien-button primary-btn" href="{{route('cart.add',$product->id)}}">Add to cart</a> --}}
                                                            </div>
                                                        </div>
                                    
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                    
                                @endif
                                {{-- --------------------end đánh giá--------------------- --}}
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
                                            Step 2: Đang gửi hàng
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
@push('js')
<script type="text/javascript">
    $("#rate-10").bind('rated', function (event, value) { $('#rate-value-10').val(value); });
</script> 
{{-- <script>
    $('#btn-modal-form-rate').click(function(ev){
            ev.preventDefault();
            var _csrf = '{{csrf_token()}}';
            var _getform_rateUrl = '{{route("ajax.check_login")}}';
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url:_loginUrl,
                type: 'POST',
                data:{
                    email:email,
                    password:password,
                    _token: _csrf
                },
                success: function(res){
                    console.log(111111111);
                    if(res.error){
                        let _html_error = '';
                        for(let error of res.error){
                            _html_error += `<p>${error}</p>`;
                        }
                        $('#error-block').html(_html_error);
                    } else {
                        alert('login successfully')
                        location.reload();
                    }
                },
                error: function (reject) {
                    if( reject.status === 422 ) {
                        var errors = $.parseJSON(reject.responseText).errors;
                        $.each(errors, function (key, val) {
                        console.log('key: '+key);
                        console.log('mess: '+ val[0]);
                        console.log('----------');
                        
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            }
                

            })
        })
</script> --}}
@endpush