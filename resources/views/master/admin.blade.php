<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
  data-assets-path="admin_assets/" data-template="vertical-menu-template-free">

<head>
  <base href="/">
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>@yield('title')</title>

  <meta name="description" content="" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="admin_assets/img/favicon/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="admin_assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="admin_assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="admin_assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="admin_assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="admin_assets/vendor/libs/apex-charts/apex-charts.css" />

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="admin_assets/vendor/js/helpers.js"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="admin_assets/js/config.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  @yield('css')
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{route('admin.index')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold ms-2">Home page</span>
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboards -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Dashboards</div>
              {{-- <div class="badge bg-danger rounded-pill ms-auto">5</div> --}}
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="" target="_blank" class="menu-link">
                  <div data-i18n="CRM">Home Page</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="menu-link">
                  <div data-i18n="Analytics">Setting Shop</div>
                </a>
              </li>

            </ul>
          </li>
          {{-- -------------------Display Settings---------------- --}}
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">Display Setting</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('display_setting_home')}}" class="menu-link">
                  <div data-i18n="CRM">Home Page Setting</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="index.html" class="menu-link">
                  <div data-i18n="Analytics">About Page Setting</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="" target="_blank" class="menu-link">
                  <div data-i18n="Academy">Contact Page Setting</div>
                  {{-- <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto">Pro</div> --}}
                </a>

              </li>
            </ul>
          </li>



          {{-- -------------------Product---------------- --}}
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Product</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Product</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('product.index')}}" class="menu-link">
                  <div data-i18n="Landing">All product</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('product.create')}}" class="menu-link">
                  <div data-i18n="Pricing">Add new product</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Category</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('category.index')}}" class="menu-link" >
                  <div data-i18n="Landing">All Category</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('category.create')}}" class="menu-link">
                  <div data-i18n="Pricing">Add new Category</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Tags</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('tag-product.index')}}" class="menu-link">
                  <div data-i18n="Landing">All Tags</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('tag-product.create')}}" class="menu-link">
                  <div data-i18n="Pricing">Add new Tags</div>
                </a>
              </li>
            </ul>
          </li>
          {{-- -------------------Order---------------- --}}
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Shop</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Orders</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=all" class="menu-link">
                  <div data-i18n="Landing">All Order</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=now" class="menu-link">
                  <div data-i18n="Landing">Đang thực hiện</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=0" class="menu-link">
                  <div data-i18n="Pricing">Chờ xác thực email</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=1" class="menu-link">
                  <div data-i18n="Pricing">Đã xác nhận - Chờ giao hàng</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=2" class="menu-link">
                  <div data-i18n="Pricing">Đang gửi hàng</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=3" class="menu-link">
                  <div data-i18n="Pricing">Đang giao hàng</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=4" class="menu-link">
                  <div data-i18n="Pricing">Đã giao hàng</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('admin.order')}}?status=5" class="menu-link">
                  <div data-i18n="Pricing">Đã hủy</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Đánh giá sản phẩm</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.evaluate')}}?status=all" class="menu-link">
                  <div data-i18n="Landing">Tất cả</div>
                </a>
              </li>
            </ul>
          </li>
          {{-- -------------------Post---------------- --}}
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Post</span>
          </li>
          <li class="menu-item">              
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Post</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('post.index')}}" class="menu-link">
                  <div data-i18n="Landing">All Post</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('post.create')}}" class="menu-link">
                  <div data-i18n="Pricing">Add new Post</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Category Post</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('category-post.index')}}" class="menu-link">
                  <div data-i18n="Landing">All Category Post</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('category-post.create')}}" class="menu-link">
                  <div data-i18n="Pricing">Add New Category Post</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Tags Post</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('tag-post.index')}}" class="menu-link">
                  <div data-i18n="Landing">All Tags Post</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route('tag-post.create')}}" class="menu-link" >
                  <div data-i18n="Pricing">Add New Tags Post</div>
                </a>
              </li>
            </ul>
          </li>

          {{-- -------------------account---------------- --}}
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Account</span>
          </li>
          <!-- sub menu -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-store"></i>
              <div>Account Setting</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route('admin.user_manage')}}" class="menu-link" target="_blank">
                  <div data-i18n="Landing">Tài khoản người dùng</div>
                </a>
              </li>

            </ul>
          </li>



        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">



        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..."
                  aria-label="Search..." />
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="admin_assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="admin_assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <span class="d-flex align-items-center align-middle">
                        <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                        <span class="flex-grow-1 align-middle ms-1">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('admin.logout')}}">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / End Navbar -->
        <div class="main-admin-page container" style="margin: 20px 0">
          @if (Session::has('ok'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            {{ Session::get('ok')}}
          </div>
          @endif
          @if (Session::has('no'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            {{ Session::get('no')}}
          </div>
          @endif

          @yield('main')
        </div>



      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>
  <!-- / Layout wrapper -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  {{-- <script src="admin_assets/vendor/libs/jquery/jquery.js"></script> --}}
  <script src="admin_assets/vendor/libs/popper/popper.js"></script>
  <script src="admin_assets/vendor/js/bootstrap.js"></script>
  <script src="admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="admin_assets/vendor/js/menu.js"></script>

  <!-- endbuild -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Vendors JS -->
  {{-- <script src="admin_assets/vendor/libs/apex-charts/apexcharts.js"></script> --}}

  <!-- Main JS -->
  <script src="admin_assets/js/main.js"></script>
  <!-- Bootstrap JS -->
  <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
  <!-- Page JS -->
  <script src="admin_assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  @stack('js')
</body>

</html>




