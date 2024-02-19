@extends('master.main')
@section('title','Reset Your Password')
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
                                <h2 class="title-4 mb-2">Login</h2>
                                <p class="desc-content">Please login using account detail bellow.</p>
                            </div>
                            <form action="" method="post">
                                @csrf
                                <div class="single-input-item mb-3">
                                    <input name="password" type="text" placeholder="Your password *" required>
                                    @error('password')
                                        <div class="help-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="single-input-item mb-3">
                                    <input name="confirm_password" type="text" placeholder="Your password *" required>
                                    @error('confirm_password')
                                        <div class="help-block">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="single-input-item mb-3">
                                </div>
                                <div class="single-input-item mb-3">
                                    <button class="btn obrien-button-2 primary-color" type="submit">Create New Password</button>
                                </div>
                                <div class="single-input-item">
                                    <a href="{{route('account.register')}}">Creat Account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login Area End Here -->
@endsection