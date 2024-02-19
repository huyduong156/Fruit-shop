@extends('master.main')
@section('title','Profile')
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
                                        <a href="{{route('cus.order.history')}}"><i class="fa fa-cart-arrow-down"></i>
                                            Orders</a>
                                        <a href=""><i class="fa fa-cloud-download"></i>
                                            Download</a>
                                        <a href=""><i class="fa fa-credit-card"></i>
                                            Payment
                                            Method</a>
                                        <a href=""><i class="fa fa-map-marker"></i>
                                            address</a>
                                        <a href="{{route('account.profile')}}" class="active"><i class="fa fa-user"></i> Account
                                            Details</a>
                                        <a href="{{route('account.logout')}}"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->

                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8 col-custom">
                                    <div class="myaccount-content">
                                        <h3>Account Details</h3>
                                        <div class="account-details-form">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                @csrf
                    
                                                <div class="single-input-item mb-3 avatar-box">
                                                    <div class="input-box">
                                                        <label for="sr-only">Your avatar</label>
                                                        <input type="file" name="avatar" id="" class="form-control" placeholder="Input Field"
                                                        onchange="showImage(this)">
                                                    </div>
                                                    <div class="img-box">
                                                        <img src="uploads/user/customer/{{$auth->avatar}}" id="show_image" width="100%" alt="">
                                                    </div>
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <input name="name" value="{{$auth->name}}" type="text" placeholder="Your Name *" required>
                                                    @error('name')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <input name="email" value="{{$auth->email}}"  type="email" placeholder="Your Email *" required>
                                                    @error('email')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <input name="phone" value="{{$auth->phone}}"  type="text" placeholder="Your phone *" required>
                                                    @error('phone')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <input name="address" value="{{$auth->address}}"  type="text" placeholder="Your address *" required>
                                                    @error('address')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <select name="gender" class="form-control" id="">
                                                        <option value="">Select one</option>
                                                        <option value="1">Male</option>
                                                        <option value="0">Female</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <input name="password" type="text" placeholder="Your password *" required>
                                                    @error('password')
                                                        <div class="help-block">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                <div class="single-input-item mb-3">
                                                    <button class="btn obrien-button-2 primary-color" type="submit">Update</button>
                                                </div>
                                            </form>
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
@push('js')
<script>
    function showImage(input) {
        // console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    };
</script>
@endpush
@push('css')
    <style>
        .avatar-box{
            flex-direction: row !important;
        }
        .avatar-box > .input-box{
            width: 80%;
        }
        .avatar-box img{
            max-width: 80px;
        }
        .img-box{
            display: flex;
            align-items: center;
            padding: 5px;
            border-radius: 4px;
            width: 18%;
            margin-left: 2%
        }
    </style>
@endpush