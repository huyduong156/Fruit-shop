@extends('master.admin')
@section('css')
    <style>
        .obrien-button-2.primary-color {
            color: #ffffff;
            background: #E98C81;
        }
        .obrien-button-2.primary-color:hover {
            color: #000;
            background: #eaeaea;
        }
        .obrien-button-2 {
            display: inline-block;
            font-size: 14px;
            font-weight: 400;
            font-family: "Poppins", sans-serif;
            letter-spacing: 0.025em;
            padding: 8px 25px;
            text-transform: capitalize;
            text-align: center;
            vertical-align: middle;
            width: auto;
            -webkit-transition: all 0.5s ease 0s;
            -o-transition: all 0.5s ease 0s;
            transition: all 0.5s ease 0s;
            border-radius: 25px;
        }
    </style>
@endsection
@section('main')
        <!-- my account wrapper start -->
        <div class="my-account-wrapper mt-no-text mb-no-text">
            <div class="container container-default-2 custom-area">
                <div class="row">
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
                                    @foreach ($orders as $item)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                                        <td style="text-align: left">
                                            @if ($item->status == 0)
                                                Step 0: Đang chờ xác thực email
                                            @elseif ($item->status == 1)
                                                Step 1: Đã xác nhận - Chờ giao hàng
                                            @elseif ($item->status == 2)
                                                Step 2: Đã gửi hàng - Chờ ship
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
                                        <td><a href="{{route('admin.order_detail',$item->id)}}" class="btn obrien-button-2 primary-color rounded-0">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
@endsection