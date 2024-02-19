@extends('master.main')

@section('title',$post->name)
{{-- @push('css')
<link rel="stylesheet" href="admin_assets/vendor/libs/summernote/summernote.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endpush --}}
@section('main')
<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">{{$post->name}}</h3>
                    <ul>
                        <li><a href="{{route('home.index')}}">Home</a></li>
                        <li>{{$post->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- Blog Main Area Start Here -->
<div class="blog-main-area">
    <div class="container container-default custom-area">
        <div class="row flex-row-reverse">
            <div class="col-lg-9 col-12 col-custom widget-mt">
                <!-- Blog Details wrapper Area Start -->
                <div class="blog-post-details">
                    <figure class="blog-post-thumb mb-5">
                        <img src="uploads/blog/{{$post->image}}" alt="Blog Image" width="100%">
                    </figure>
                    <section class="blog-post-wrapper product-summery">
                        <div class="section-content">
                            <h2 class="title-1 mb-3">{{$post->name}}</h2>
                            <blockquote class="blockquote mb-4">
                                {{$post->short_description}}
                            </blockquote>
                            <div class="content-post">
                                {!!readFileText($post->description)['content']!!}
                            </div>
                        </div>
                        <div class="share-article">
                            <span class="left-side">
                                <a href="#"> <i class="fa fa-long-arrow-left"></i> Older Post</a>
                            </span>
                            <h6 class="text-uppercase">Share this article</h6>
                            <span class="right-side">
                                <a href="#">Newer Post <i class="fa fa-long-arrow-right"></i></a>
                            </span>
                        </div>
                        <div class="social-share">
                            <a href="#"><i class="fa fa-facebook-square facebook-color"></i></a>
                            <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                        </div>
                        <div class="comment-area-wrapper mt-5" id="comment-block">
                            {{-- -----------------------------------------------comment-------------------------------
                            --}}
                            @include('home.blocks.list-comment-post',['comments'=>$post->comments])

                            {{-- ----------------------------------------end comment--------------- --}}
                        </div>
                    </section>
                </div>
                <!-- Blog Details Wrapper Area End -->
                <!-- Blog Comments Area Start -->
                {{-- Customer comment --}}
                @if (auth('cus')->check())
                <form action="#">
                    <div class="comment-box">
                        <h3>Leave A Comment</h3>
                        <input type="hidden" value="{{$post->id}}" name="post_id">
                        <div class="row">
                            <div class="col-12 col-custom">
                                <div class="input-item mt-4 mb-4">
                                    <textarea id="content-comment" cols="30" rows="5" name="comment"
                                        class="border rounded-0 w-100 custom-textarea input-area"
                                        placeholder="Message"></textarea>
                                    <div id="content-comment-error" class="help-block"></div>
                                </div>
                            </div>
                            <div class="col-12 col-custom mt-40">
                                <button type="button" id="btn-comment-submit"
                                    class="btn obrien-button primary-btn rounded-0 w-100">Post comment</button>
                            </div>
                        </div>
                    </div>
                </form>

                @else
                <button type="button" class="obrien-button primary-btn" data-bs-toggle="modal"
                    data-bs-target="#exampleModal"> Login to comment</button>
                @endif
                {{-- Guest comment --}}
                {{-- <form action="#">
                    <div class="comment-box">
                        <h3>Leave A Comment</h3>
                        <div class="row">
                            <div class="col-12 col-custom">
                                <div class="input-item mt-4 mb-4">
                                    <textarea cols="30" rows="5" name="comment"
                                        class="border rounded-0 w-100 custom-textarea input-area"
                                        placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="input-item mb-4">
                                    <input class="border rounded-0 w-100 input-area name" type="text"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="input-item mb-4">
                                    <input class="border rounded-0 w-100 input-area email" type="text"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12 col-custom mt-40">
                                <button type="submit" class="btn obrien-button primary-btn rounded-0 w-100">Post
                                    comment</button>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <!-- Blog Comments Area End -->
            </div>
            <div class="col-lg-3 col-12 col-custom">
                <!-- Sidebar Widget Start -->
                @include('home.blocks.sidebar')
                <!-- Sidebar Widget End -->
            </div>
        </div>
    </div>
</div>
<!-- Blog Main Area End Here -->
<!-- Support Area Start Here -->
<div class="support-area">
    <div class="container container-default custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <div class="support-wrapper d-flex">
                    <div class="support-content">
                        <h1 class="title">Need Help ?</h1>
                        <p class="desc-content">Call our support 24/7 at 01234-567-890</p>
                    </div>
                    <div class="support-button d-flex align-items-center">
                        <a class="obrien-button primary-btn" href="contact-us.html">Contact now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Support Area End Here -->
<!-- Button trigger modal -->
{{-- <button type="button" class="obrien-button primary-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button> --}}
<!-- Modal login-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="login-register-wrapper">
                <div class="section-content text-center mb-5">
                    <h2 class="title-4 mb-2">Login your account</h2>
                </div>
                <form action="" method="post">
                    {{-- @csrf --}}
                    <div id="error-block" style="color: red"></div>
                    <div class="single-input-item mb-3">
                        <input id="email" type="email" placeholder="Your Email *" required>
                        {{-- @error('email')
                        <div class="help-block">{{$message}}</div>
                        @enderror --}}
                        <div id="email_error" class="help-block"></div>
                    </div>
                    <div class="single-input-item mb-3">
                        <input id="password" type="text" placeholder="Your password *" required>
                        {{-- @error('password')
                        <div class="help-block">{{$message}}</div>
                        @enderror --}}
                        <div id="password_error" class="help-block"></div>
                    </div>
                    <div class="single-input-item mb-3">
                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                            <div class="remember-meta mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                    <label class="custom-control-label">Remember Me</label>
                                </div>
                            </div>
                            <a href="{{route('account.forgot_password')}}" class="forget-pwd mb-3">Forget Password?</a>
                        </div>
                    </div>
                    <div class="single-input-item mb-3">
                        <button class="btn obrien-button-2 primary-color" type="button"
                            id="btn-login-modal">Login</button>
                    </div>
                    <div class="single-input-item">
                        <a href="{{route('account.register')}}">Create Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script>
    $('#btn-login-modal').click(function(ev){
            ev.preventDefault();
            var _csrf = '{{csrf_token()}}';
            var _loginUrl = '{{route("ajax.check_login")}}';
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
</script>
<script>
    var _csrf = '{{csrf_token()}}';
    let _commentUrl = '{{route("ajax.comment",$post->id)}}';
    $('#btn-comment-submit').off().click(function(){
            let content = $('#content-comment').val();
            $.ajax({
                url:_commentUrl,
                type: 'POST',
                data:{
                    content: content,
                    _token: _csrf
                },
                success: function(res){
                    if(res.error){
                        let _html_error = '';
                        for(let error of res.error){
                            _html_error += `<p>${error}</p>`;
                        }
                        $('#content-comment-error').html(_html_error);
                    } else {
                        // console.log(res);
                        $('#comment-block').html(res);
                        $('#content-comment').val('');
                    }
                },
                error: function (reject) {
                  
                }
            });
    });
    $(document).on('click','.btn-show-reply',function(ev){
        console.log(1111111111);
        ev.preventDefault();
        var id = $(this).data('id');
        // alert(id);
        // var comment_reply_id = "#content-reply-" + id ;
        // let content_reply = $(comment_reply_id).val();
        var from_reply = '.comment-reply-box-' + id;
        $('.comment-reply').slideUp();
        $(from_reply).slideDown();
    });
    $(document).on('click','.btn-send-comment-reply',function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_reply_id = "#content-reply-" + id ;
        let content_reply = $(comment_reply_id).val();
        // var from_reply = '.comment-reply-box-' + id;
       try {
        $.ajax({
                url:_commentUrl,
                type: 'POST',
                data:{
                    reply_id: id,
                    content: content_reply,
                    _token: _csrf,
                },
                success: function(res){
                    if(res.error){
                        let _html_error = '';
                        for(let error of res.error){
                            _html_error += `<p>${error}</p>`;
                        }
                        $('#content-comment-error').html(_html_error);
                    } else {
                        console.log(res);
                        $('#comment-block').html(res);
                        $('#content-comment').val('');
                    }
                },
                error: function (reject) {
                  
                }
            });
       } catch (error) {
        alert('oc cho ne')
       }
        
    });
</script>

@endpush