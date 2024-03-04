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
                <h3>Đánh giá sản phẩm</h3>
                <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Lượt đánh giá</th>
                                <th>Xem các đánh giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_evaluate as $item)
                            <tr>
                                <td><a href="{{route('home.product',$item->slug)}}">{{ $item->name }}</a></td>
                                <td>{{$item->review_count}}</td>
                                <td><a class="btn obrien-button-2 primary-color rounded-0" href="{{route('admin.evaluate_list',$item->slug)}}">Xem chi tiết</a></td>
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