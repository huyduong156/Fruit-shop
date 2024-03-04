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
                <h3>Sản phẩm</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên</th>
                                <th>Lượt đánh giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{route('home.product',$product->slug)}}"><img width="70px" src="{{asset('uploads/product/'.$product->image)}}" alt=""></a></td>
                                <td><a href="{{route('home.product',$product->slug)}}">{{$product->name}}</a></td>
                                <td>{{$list_evaluate->count()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="myaccount-content">
                <h3>Đánh giá sản phẩm</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Khách hàng</th>
                                <th>Sao</th>
                                <th>Nội dung</th>
                                <th>thời gian</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_evaluate as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$item->order->customer->name}}</td>
                                <td>{{$item->rate}}</td>
                                <td>{{$item->rate_content}}</td>
                                <td>{{$item->rate_time}}</td>
                                <td>{{$item->rate_status == 1 ? 'Hiện' : 'Ẩn'}}</td>
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