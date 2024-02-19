@extends('master.main')

@section('title','Blogs')
@section('main')
        <!-- Breadcrumb Area Start Here -->
        <div class="breadcrumbs-area position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="breadcrumb-content position-relative section-content">
                            <h3 class="title-3">Blog Sidebar</h3>
                            <ul>
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li>Blog</li>
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
                <div class="row">
                    <div class="col-lg-9 col-12 col-custom widget-mt">
                        <!-- Blog Wrapper Start -->
                        <div class="row">
                            @foreach ($posts as $post)
                                <div class="col-md-4 col-custom mb-4">
                                    <div class="single-blog">
                                        <div class="single-blog-thumb">
                                            <a href="{{route('home.post_detail',$post->slug)}}">
                                                <img src="uploads/blog/{{$post->image}}" alt="Blog Image">
                                            </a>
                                        </div>
                                        <div class="single-blog-content position-relative">
                                            <div class="post-date text-center border rounded d-flex flex-column position-absolute">
                                                <span>{{$post->created_at->format('d')}}</span>
                                                <span>{{$post->created_at->format('m')}}</span>
                                            </div>
                                            <div class="post-meta">
                                                <span class="author">Author: {{$post->author}}</span>
                                            </div>
                                            <h2 class="post-title">
                                                <a href="{{route('home.post_detail',$post->slug)}}">{{$post->name}}</a>
                                            </h2>
                                            <p class="desc-content">{{$post->short_description}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- Blog Wrapper End -->
                        <!-- Bottom Toolbar Start -->
                        @if(isset($posts) && count($posts) > 0 )
                            {{$posts->links('home.blocks.pagination_template')}}
                        @endif
                        <!-- Bottom Toolbar End -->
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
<!-- cart main wrapper end -->
@endsection