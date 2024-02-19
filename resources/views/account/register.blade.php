@extends('master.main')
@section('title','Register')
@section('main')
            <!-- Breadcrumb Area Start Here -->
            <div class="breadcrumbs-area position-relative">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="breadcrumb-content position-relative section-content">
                                <h3 class="title-3">Login-Register</h3>
                                <ul>
                                    <li><a href="{{route('home.index')}}">Home</a></li>
                                    <li>Login-Register</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb Area End Here -->
            <!-- Login Area Start Here -->
            <div class="login-register-area mt-no-text mb-no-text">
                <div class="container container-default-2 custom-area">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-custom">
                            <div class="login-register-wrapper">
                                <div class="section-content text-center mb-5">
                                    <h2 class="title-4 mb-2">Create Account</h2>
                                    <p class="desc-content">Please Register using account detail bellow.</p>
                                </div>
                                <form action="" method="post">
                                    @csrf
                                    <div class="single-input-item mb-3">
                                        <input name="name" type="text" placeholder="Your Name *" required>
                                        @error('name')
                                            <div class="help-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="single-input-item mb-3">
                                        <input name="email" type="email" placeholder="Your Email *" required>
                                        @error('email')
                                            <div class="help-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="single-input-item mb-3">
                                        <input name="phone" type="text" placeholder="Your phone *" required>
                                        @error('phone')
                                            <div class="help-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="single-input-item mb-3">
                                        <input name="address" type="text" placeholder="Your address *" required>
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
                                        <input name="confirm_password" type="text" placeholder="Your confirm password *" required>
                                        @error('confirm_password')
                                            <div class="help-block">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="single-input-item mb-3">
                                        <button class="btn obrien-button-2 primary-color" type="submit">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Area End Here -->
@endsection