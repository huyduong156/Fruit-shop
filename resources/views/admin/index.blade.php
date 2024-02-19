@extends('master.admin')

@section('title','Dashbroad')
@section('main')
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Xin chào {{auth()->user()->name}}! 🎉</h5>
                          <p class="mb-4" style="font-size: 17px">
                            Bạn có <span class="fw-medium" style="color: rgb(255, 81, 0);font-size: 30px">{{$order_today}}</span> đơn hàng mới ngày hôm nay. 
                            Kiểm tra đơn hàng ngay nào!!!
                          </p>
                          <a href="{{route('admin.order')}}?status=all" class="btn btn-sm btn-outline-primary">Xem các đơn hàng</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="admin_assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="admin_assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded" />
                            </div>
                            <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('admin.order')}}?status=now">
                              <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                            </a>
                          </div>
                          <span class="fw-medium d-block mb-1">Đơn hàng đang thực hiện</span>
                          <h3 class="card-title mb-2">{{$order_dang_thuc_hien}}</h3>
                          {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="admin_assets/img/icons/unicons/chart.png"
                                alt="Credit Card"
                                class="rounded" />
                            </div>
                            <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('admin.order')}}?status=4">
                              <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                            </a>
                          </div>
                          <span>Đơn hàng đã hoàn thành</span>
                          <h3 class="card-title text-nowrap mb-1">{{$order_da_hoan_thanh}}</h3>
                          {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3" style="font-size: 20px;margin:0;font-weight:700">Doanh thu</h5>
                        <h5 class="card-title text-primary" style="padding-left: 25px;padding-top: 10px">Doanh thu tháng:  <span style="color: black">1000000tr</span></h5>
                        <h5 class="card-title text-primary" style="padding-left: 25px;padding-top: 10px">Doanh thu năm:  <span style="color: black">1000000tr</span></h5>
                        <h5 class="card-title text-primary" style="padding-left: 25px;padding-top: 10px">Tổng Doanh thu:  <span style="color: black">1000000tr</span></h5>
                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="growthReportId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                                2022
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="text-center fw-medium pt-3 mb-2">62% Company Growth</div>

                        <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>2022</small>
                              <h6 class="mb-0">$32.5k</h6>
                            </div>
                          </div>
                          <div class="d-flex">
                            <div class="me-2">
                              <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                              <small>2021</small>
                              <h6 class="mb-0">$41.2k</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="admin_assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                            {{-- <a class="btn p-0 mt-2" type="button" id="cardOpt3">
                              <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                            </a> --}}
                          </div>
                          <span class="d-block mb-1">Doanh thu hôm nay</span>
                          <h3 class="card-title text-nowrap mb-2">{{number_format($doanh_thu_ngay)}} VND</h3>
                          {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> --}}
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="admin_assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                              <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('admin.order')}}?status=5">
                                <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                              </a>
                          </div>
                          <span class="fw-medium d-block mb-1">Đã hủy</span>
                          <h3 class="card-title mb-2">{{$da_huy}}</h3>
                          {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> --}}
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->

                    </div>
                  </div>
                </div>
              </div>
              {{-- ----------------------------------------product----------------------------------------- --}}
              <hr>
              <div class="row mb-4">
                <!-- Order Statistics -->
                <div class="col-md-7 col-lg-7 col-xl-7 order-0 mb-7">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2" style="font-size: 24px; color:rgb(255, 95, 167)">Sản phẩm</h5>
                        <small class="text-muted">{{$number_product_da_ban}} sản phẩm đã bán</small>
                      </div>
                      <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('product.index')}}">
                        <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">{{$total_order}}</h2>
                          <span>Tổng đơn hàng</span>
                        </div>
                      </div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary">
                              <i class="fa-solid fa-list-ul"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sản phẩm đã đăng</h6>
                              <small class="text-muted">Các sản phẩm đang bán</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$product_da_dang}}</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="fa-regular fa-eye-slash"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sản phẩm đang ẩn</h6>
                              <small class="text-muted">Sản phẩm tạm thời chưa công bố</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$product_dang_an}}</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="fa-solid fa-tag"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sản phẩm đang giảm giá</h6>
                              <small class="text-muted">Tăng số lượng sản phẩm giảm giá để thu hút khách hàng</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$product_dang__giam_gia}}</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><img src="uploads/product/{{$product_moi_nhat->image}}" alt=""></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sản phẩm mới nhất</h6>
                              <small class="text-muted">{{$product_moi_nhat->name}}</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$product_moi_nhat->created_at}}</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->
                <!-- Transactions -->
                <div class="col-md-5 col-lg-5 order-2 mb-5">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Sản phẩm bán chạy</h5>
                      <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('product.index')}}">
                        <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                      </a>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        @foreach ($list_quantity as $item)
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="uploads/product/{{$item->product->image}}" class="rounded" />
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1"><a href="{{route('home.product',$item->product->slug)}}" target="_blank">{{$item->product->name}}</a></small>
                                <h6 class="mb-0">
                                  @if (isset($item->product->sale_price))
                                    <span class="label label-success">{{$item->product->sale_price}} VND</span> 
                                  @else
                                    <span class="label label-success">{{$item->product->price}} VND</span> 
                                  @endif 
                                </h6>
                              </div>
                              <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{$item->total_quantity}} lượt bán</h6>
                              </div>
                            </div>
                          </li>
                        @endforeach

                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
              {{-- ----------------------------------------post----------------------------------------- --}}
              <hr>
              <div class="row mb-4">
                <!-- Order Statistics -->
                <div class="col-md-7 col-lg-7 col-xl-7 order-0 mb-7">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2"  style="font-size: 24px; color:rgb(255, 95, 167)">Bài viết</h5>
                        <small class="text-muted">{{$number_total_post}} bài viết </small>
                      </div>
                      <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('post.index')}}">
                        <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                      </a>
                    </div>
                    <div class="card-body">
                      {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">{{$total_order}}</h2>
                          <span>Tổng đơn hàng</span>
                        </div>
                      </div> --}}
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary">
                              <i class="fa-solid fa-list-ul"></i>
                            </span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Bài viết đã đăng</h6>
                              <small class="text-muted">Các bài viết đã công khai trên trang web</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$number_publish_post}}</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="fa-regular fa-eye-slash"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Bài viết đang ẩn</h6>
                              <small class="text-muted">Các bài viết đã ẩn trên trang web</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$number_hidden_post}}</small>
                            </div>
                          </div>
                        </li>
                        {{-- <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="fa-solid fa-tag"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sản phẩm đang giảm giá</h6>
                              <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$product_dang__giam_gia}}</small>
                            </div>
                          </div>
                        </li> --}}
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><a href="{{route('home.post_detail',$latest_post->slug)}}" target="_blank" ><img style="border-radius: 5px" src="uploads/blog/{{$latest_post->image}}" alt=""></a></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0"><a href="{{route('home.post_detail',$latest_post->slug)}}" target="_blank" >Bài viết nhiều bình luận</a></h6>
                              <small class="text-muted">{{$latest_post->name}}</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-medium">{{$latest_post->created_at}}</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->
                <!-- Transactions -->
                <div class="col-md-5 col-lg-5 order-2 mb-5">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Bài viết comment nhiều</h5>
                      <a class="btn p-0 mt-2" type="button" id="cardOpt3" href="{{route('post.index')}}">
                        <i class="fa-solid fa-square-caret-right" style="font-size: 20px; color:rgb(255, 95, 167)"></i>
                      </a>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        @foreach ($list_comment_blogs as $item)
                          <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="uploads/blog/{{$item->post->image}}" class="rounded" style="border-radius: 4px"/>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                <small class="text-muted d-block mb-1"><a href="{{route('home.post_detail',$item->post->slug)}}" target="_blank">{{$item->post->name}}</a></small>
                                <h6 class="mb-0">
                                  {{$item->count_comment}} lượt bình luận
                                </h6>
                              </div>
                              {{-- <div class="user-progress d-flex align-items-center gap-1">
                                <h6 class="mb-0">{{$item->count_comment}} lượt bình luận</h6>
                              </div> --}}
                            </div>
                          </li>
                        @endforeach

                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Thiết kế web ❤️ bởi Huy Dương
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
@endsection