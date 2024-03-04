<!-- Button trigger modal -->
<button type="button " class="btn btn-primary model-footer-btn" data-bs-toggle="modal"
    data-bs-target="#model-footer"> Chức năng web </button> 
    
    <!-- Modal -->
<div class="modal fade model-footer-content" id="model-footer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Các chức năng web fruitsop.top</h5> <button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        {{-- --page-- --}}
                      <tr>
                        <th>Các trang</th>
                        <td>Trang chủ, danh mục sản phẩm, tag sản phẩm, danh mục bài viết, tag bài viết, danh sách yêu thích, danh sách so sánh,
                            chi tiết sản phẩm, chi tiết bài viết, trang about, trang contact,đăng nhập, đăng ký, quên mật khẩu, giỏ hàng, trang thanh toán,
                            profile user, danh sách đơn hàng, chi tiết đơn hàng, <strong>trang giao diện admin quản lý các sản phẩm đơn hàng, bài viết</strong>
                        </td>
                      </tr>
                      <tr>
                        <th>Một số chức năng</th>
                        <td>
                            Phân trang bài viết - sản phẩm, tìm kiếm, đặt hàng, giỏ hàng, yêu thích, so sánh, đánh giá sao, bình luận bài viết, . . .
                        </td>
                      </tr>
                        {{-- --user-- --}}
                      <tr>
                        <th>User</th>
                        <td>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><a href="{{route('account.register')}}">Đăng ký tài khoản (xác thực mail)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('account.login')}}">Đăng nhập</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('account.forgot_password')}}">Quên mật khẩu</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="">Thay đổi mật khẩu</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('account.compare_list')}}">Chức năng so sánh sản phẩm (thêm, xóa, sản phẩm)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('account.favorite')}}">Chức năng yêu thích sản phẩm (thêm, xóa, sản phẩm)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cart.index')}}">Chức năng giỏ hàng (thêm, xóa, tăng số lượng)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cus.order.checkout')}}">Chức năng đặt hàng</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cus.order.history')}}">Danh sách các đơn hàng đã đặt</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cus.order.history')}}">Kiểm tra tình trạng các đơn hàng đã đặt (chi tiết đơn hàng)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="">Tìm kiếm sản phẩm theo tên (header, sidebar)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cus.order.history')}}">Đánh giá sao các sản phẩm đã đặt hàng thành công ( step 4 )</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('cus.order.history')}}">Xem chi tiết các đánh giá</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('home.post')}}">Đăng nhập ajax khi muốn bình luận bài viết</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('home.post')}}">Bình luận, trả lời bình luận các bài viết</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                      </tr>
                      {{-- --admin-- --}}
                      <tr>
                        <th>Admin</th>
                        <td>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><a href="{{route('admin.index')}}" target="_blank">Giao diện dashboards thông tin các đơn hàng, sản phẩm, bài viết . . . </a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('product.index')}}" target="_blank">Quản lý sản phẩm(thêm xóa sửa sản phẩm)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('category.index')}}" target="_blank">Quản lý danh mục sản phẩm(thêm xóa sửa)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('tag-product.index')}}" target="_blank">Quản lý tag sản phẩm(thêm xóa sửa)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('post.index')}}" target="_blank">Quản lý bài viết(thêm xóa sửa)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('category-post.index')}}" target="_blank">Quản lý danh mục bài viết(thêm xóa sửa)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('tag-post.index')}}" target="_blank">Quản lý tag bài viết(thêm xóa sửa)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('admin.order')}}" target="_blank">Quản lý các đơn hàng</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('admin.order')}}" target="_blank">Xem chi tiết, thay đổi trạng thái các đơn hàng(các step, hủy, khôi phục)</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="" target="_blank">Quản lý người dùng</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
            <div class="modal-footer"> 
                <table class="table table-bordered" >
                    <thead>
                      <tr>
                        <th>tài khoản admin</th>
                        <th>mật khẩu admin</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>duongquochuy1566@gmail.com</td>
                        <td>123456</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
<style>
    .model-footer-btn.btn{
        position: fixed;
        bottom: 20px;
        left: 20px;
        background: #ffffffad;
        color: #000;
        border: 1px solid;
        border-radius: 4px;
        transition: 0.5s ease-in-out;
        padding: 10px 10px
    }
    .model-footer-btn.btn:hover{
        background: #000;
        color: #ffffff;
        transition: 0.5s ease-in-out;
        border-color: #000;
    }
    @media (min-width: 576px){
        .modal-dialog {
            max-width: 800px;
            margin: 1.75rem auto;
        }
    }
</style>