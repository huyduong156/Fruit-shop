<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Models\Customer;
use App\Models\CustomerResetTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use App\Models\CompareModel;
use App\Models\OrderDetail;
use App\Models\Product;

class AccountController extends Controller
{
    public function login()
    {
        return (view('account.login'));
    }
    public function logout()
    {
        auth('cus')->logout();
        return redirect()->route('home.index')->with('ok', 'You was logout');
    }
    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers',
            'password' => 'required'
        ], [
            'email.exists' => 'Email không tồn tại trong hệ thống',
            'password.required' => 'Nhập mật khẩu',
        ]);
        $data = $req->only('email', 'password');
        $check = auth('cus')->attempt($data);
        if ($check) {
            if (auth('cus')->user()->email_verified_at == null) {
                auth('cus')->logout();
                return redirect()->back()->with('no', 'You account is not verify, please check email again');
            }
            return redirect()->route('home.index')->with('ok', 'Welcome back');
        }
        return redirect()->back()->with('no', 'You account or password invalid');
    }
    public function register()
    {
        return (view('account.register'));
    }
    public function verify($email)
    {
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d')]);                                   // update verify cho user khi ngời dùng nhấn link từ mail, truyền mail vào và so đk đúng mail và verify null thì update
        return redirect()->route('account.login')->with('ok', 'Verify successfully, Now you can login');                    // trở về trang login
    }
    public function check_register(Request $req)
    {
        // dd($req);
        $req->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers',
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ], [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên tối thiểu là 6 kí tự'
        ]);
        $data = $req->only('name', 'email', 'phone', 'address', 'gender');
        $data['password'] = bcrypt($req->password);
        $data['avatar'] = 'avatar.avif';
        if ($acc = Customer::create($data)) {
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok', 'Register successfully, please check your email');
        }
        return redirect()->back()->with('no', 'Something error, please try again');
    }
    public function profile()
    {
        $auth = auth('cus')->user();
        return (view('account.profile', compact('auth')));
    }
    public function check_profile(Request $req)
    {

        // dd($req);
        $auth = auth('cus')->user();
        $req->validate([
            'name' => 'required|min:6|max:100',
            'email' => 'required|email|min:6|max:100|unique:customers,email,' . $auth->id,
            'password' => [
                'required', function ($attr, $value, $fail) {
                    $auth = auth('cus')->user();
                    if (!Hash::check($value, $auth->password)) {
                        return $fail('Your password is not true');
                    };
                }
            ],
        ], [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên tối thiểu là 6 kí tự'
        ]);
        $data = $req->only('name', 'email', 'phone', 'address', 'gender');
        $check = $auth->update($data);
        if ($check) {
            return redirect()->back()->with('ok', 'update successful');
        }
        return redirect()->back()->with('no', 'something error');
    }
    public function change_password()
    {
        return (view('account.change-password'));
    }
    public function check_change_password(Request $req)
    {
        $auth = auth('cus')->user();
        $req->validate([
            'old_password' => ['required', function ($attr, $value, $fail) use ($auth) {

                // dd($auth);
                if (!Hash::check($value, $auth->password)) {
                    $fail('Your password is not match');
                }
            }],
            'password' => 'required|min:4',
            'conffirm_password' => 'required|same:password'
        ]);
        try {
            $data['password'] = bcrypt($req->password);
            Customer::findOrFail(auth('cus')->id())->update($data['password']);
            auth('cus')->logout();
            return redirect()->route('account.login')->with('ok', 'change password successful');
        } catch (\Throwable $th) {
            return redirect()->back()->with('no', 'something error');
        }
    }
    public function forgot_password()
    {

        return (view('account.forgot-password'));
    }
    public function check_forgot_password(Request $req)
    {
        $req->validate([
            'email' => 'required|exists:customers',
        ]);
        $customer = Customer::where('email', $req->email)->first();
        $token = Str::random(50);
        // dd($req->email);
        $tokenData = [
            'token' => $token,
            'email' => $req->email,
        ];
        if (CustomerResetTokens::create($tokenData)) {
            Mail::to($req->email)->send(new ForgotPassword($customer, $token));
            return redirect()->route('account.login')->with('ok', 'Send email successfully, please check mail');
        }
        return redirect()->back()->with('no', 'Something error, please check again');






        return (view('account.login'));
    }
    public function reset_password($token)
    {
        return (view('account.reset_password'));
    }
    public function check_reset_password(Request $req, $token)
    {
        // return view('account.login');
        request()->validate([
            'password' => 'required|min:4',
            'confirm_password' => 'required|same:password'
        ]);
        $tokenData = CustomerResetTokens::checkToken($token)->first();
        if (!isset($tokenData)) {
            return redirect()->route('account.login')->with('no', 'something error');
        }
        $customer = $tokenData->customer;
        // dd($customer->email);
        $data = ['password' => bcrypt(request('password'))];
        $check = $customer->update($data);
        if ($check) {
            CustomerResetTokens::where('email', $customer->email)->delete();
            return redirect()->route('account.login')->with('ok', 'update password successful');
        }
        return redirect()->route('account.login')->with('no', 'something error');
    }
    public function favorite()
    {
        $favorites = auth('cus')->user()->favorites;
        $new_products = Product::orderBy('created_at', 'DESC')->limit(4)->get();
        return view('home.favorite', compact('new_products', 'favorites'));
    }
    public function compare_list(){
        $compare = CompareModel::where('customer_id',auth('cus')->id())->orderBy('id','DESC')->limit(3)->get();
        return view('home.compare_list',compact('compare'));
        // dd($compare);
    }
    public function post_rate(Request $req){
        $data = [
            // 'order_id' => $req->order_detail_id,
            'rate' => $req->rate,
            'rate_content' => $req->rate_content,
            'rate_status' => 1,
            'rate_time' => date('Y-m-d H:i:s'),
        ];
        // dd($req);
        // -------$check lấy id sản phẩm truyền vào có trong đơn id order truyền vào hay không ------
        $order_detail = OrderDetail::Where('product_id',$req->product_id)->where('order_id',$req->order_detail_id)->first();
        // dd($order_detail->order->status);
        // ------nếu có sản phẩm trong đơn-----
        if($order_detail){


            if($order_detail->order->customer->id != auth('cus')->id()){   // kiểm tra đơn hàng này có trùng với khách hàng đang đăng nhập không
                // Nếu id khách truyền vào từ đơn hàng không trùng với khách hàng đang đăng nhập hiện tại thì false
                return redirect()->route('cus.order.history')->with('no','Đây không phải đơn đặt hàng của bạn');
            }

            if($order_detail->order->status !=4 ){   // kiểm tra đơn hàng này đã hoàn thành hay chưa
                // Nếu đơn hàng truyền vào trạng thái khác 4(đã giao hàng) tức là chưa hoàn thành
                return redirect()->route('cus.order.history')->with('no','Đơn hàng này chưa hoàn thành');
            }
            

            if($order_detail->rate == null){
                OrderDetail::Where('product_id',$req->product_id)->where('order_id',$req->order_detail_id)->update($data);
                // dd($order_detail);
                return redirect()->route('cus.order.history')->with('ok','Đánh giá sản phẩm thành công');
            } else {
                return redirect()->route('cus.order.history')->with('no','Bạn đã đánh giá sản phẩm này');
            }
        } else {
            // Nếu $req->product_id hoặc $req->order_detail_id truyền vào sai
            return redirect()->route('cus.order.history')->with('no','Bạn chưa mua sản phẩm này');
        }
        // dd($order->details->contains('product_id', $product));
    }
    public function delete_account(Customer $account_id){
        $account_id->delete();
        return redirect()->back()->with('Xóa thành công');
        // dd($account_id);
    }
}
