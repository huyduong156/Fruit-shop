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
                        <div class="card">
                            <h3 class="card-header">Danh sách tài khoản khách hàng</h3>
                            <div class="table-responsive text-nowrap">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>

                                <tbody class="table-border-bottom-0">
                                    @foreach ($customer_list as $item)
                                    <tr>
                                      <td>
                                        <img class="avatar pull-up" src="{{asset('uploads/user/customer/'.$item->avatar)}}" alt="" width="60px">
                                      </td>
                                      <td>{{$item->name}}</td>
                                      <td>{{$item->email}}</td>
                                      <td>{{$item->phone}}</td>
                                      <td>
                                            <a href="{{route('admin.delete_account',$item->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('are u sure want to delete it ?')"><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
@endsection