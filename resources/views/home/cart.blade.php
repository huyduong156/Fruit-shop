@extends('master.main')

@section('title','Cart')
@section('main')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text mb-no-text">
    <div class="container container-default-2 custom-area">
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="select-item">Chọn</th>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="title-pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $item_cart)
                                <tr>
                                    <td><input type="checkbox" name="cart_select[]" value="{{$item_cart->product_id}}" style="display:block"></td>
                                    <td class="pro-thumbnail"><a href="{{route('home.product',$item_cart->products->slug)}}"><img class="img-fluid"
                                                src="uploads/product/{{$item_cart->products->image}}" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="{{route('home.product',$item_cart->products->slug)}}">{{$item_cart->products->name}}</a></td>
                                    <td class="pro-price"><span>{{number_format($item_cart->price)}}</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            {{-- <form action="{{route('cart.update',$item_cart->product_id)}}" method="get"> --}}
                                                <div class="quantity">
                                                    <div class="cart-plus-minus" >
                                                        <input class="cart-plus-minus-box" data-id="{{$item_cart->product_id}}" name="quantity" value="{{$item_cart->quantity}}" type="text">
                                                        <div class="dec qtybutton">-</div>
                                                        <div class="inc qtybutton">+</div>
                                                    </div>
                                                </div>
                                            {{-- </form> --}}
                                        </div>
                                    </td>
                                    <td class="pro-amount" id="pro-subtotal-{{$item_cart->product_id}}"><span class="pro-subtotal">{{number_format($item_cart->price * $item_cart->quantity)}}</span></td>
                                    <td class="pro-remove"><a href="{{route('cart.delete',$item_cart->product_id)}}"><i class="ion-trash-b"></i></a></td>
                                </tr>
                            @endforeach
                            {{-- @dd($carts->first()) --}}
                        </tbody>
                    </table>
                </div>
                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="apply-coupon-wrapper">
                        <form action="#" method="post" class=" d-block d-md-flex">
                            <input type="text" placeholder="Enter Your Coupon Code" required />
                            <button class="btn obrien-button primary-btn">Apply Coupon</button>
                        </form>
                    </div>
                    <div class="mt-sm-16">
                        <a href="{{route('cart.clear')}}" class="btn obrien-button primary-btn" style="{{ empty($carts->toArray()) ? 'pointer-events: none' : ''}}" >Clear Cart</a>
                    </div>
                    {{-- <div class="cart-update mt-sm-16">
                        <a href="#" class="btn obrien-button primary-btn">Update Cart</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <td>Sub Total</td>
                                    {{-- @foreach ($carts as $item)
                                        <td>{{}}</td>
                                    @endforeach --}}
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td>free</td>
                                </tr>
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount" id="total-amount-cart">
                                        <?php $total = 0; ?>
                                        @foreach ($carts as $item)
                                            <?php $total += $item->price * $item->quantity ?>
                                        @endforeach
                                        {{number_format($total)}} VND
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="{{route('cus.order.checkout')}}" class="btn obrien-button primary-btn d-block">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart main wrapper end -->
@endsection
@push('js')
    {{-- <script>
        $('.cart-plus-minus-box').on('input', function (ev) {
            var id_cart = $(this).data('id');
            console.log(id_cart);
            alert(id_cart);
        });
    </script> --}}
    <script>
            var _csrf = '{{csrf_token()}}';
            $('.qtybutton').on('click', function() {
                var id_product = $(this).siblings('.cart-plus-minus-box').data('id');
                var _updateUrl = '{{route("cart.update")}}';
                // alert('#pro-subtotal-' + id_product);
                $.ajax({
                    url:_updateUrl,
                    type: 'POST',
                    data:{
                        _token: _csrf,
                        product_id: id_product,
                        quantity: $(this).siblings('.cart-plus-minus-box').val(),
                    },
                    success: function(res){                 // res trả về tổng của sản phẩm từ controller
                        $('#pro-subtotal-' + id_product).html(res);         //đổi tổng giá tiền
                        var total = 0;
                        var count = 0;
                        let y = document.getElementsByClassName("pro-amount");
                        if (y && y.length >= 0){
                            for (let i = 0; i < y.length; i++){
                                total += Number(($(y[i]).text()).replace(/,/g, ""));
                            }
                        }
                        // .each(function() {
                        //     var totalNumber = parseFloat($(this).text().replace(',', ''));
                        //     total += totalNumber;
                        //     count += 1;
                        //     console.log(totalNumber);
                        //     console.log(count);
                        // });
                        // var total = total.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                        $('#total-amount-cart').html(total + ' VND');    // thay đổi tổng mới

                    },
                    error: function (reject) {
                        console.log('cập nhập bị lỗi ');
                    }
                    
                })
            });
    </script>
@endpush
