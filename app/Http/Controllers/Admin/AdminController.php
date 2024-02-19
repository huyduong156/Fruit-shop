<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs\Post;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PostComment;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        // --------order----------
        // $order_today = Order::where('created_at',date('Y-m-d'))->count();
        $order_today = Order::whereDate('created_at', Carbon::today()->toDateString())->count();
        $doanh_thu_ngay = Order::whereDate('created_at', Carbon::today()->toDateString())->where('status',4)->sum('total_price');
        $total_order = Order::where('status','<>',5)->count();
        $doanh_thu = Order::where('status','<>',5)->sum('total_price');
        $da_huy = Order::where('status',5)->count();
        $order_dang_thuc_hien = Order::where('status','<>',5)->where('status','<>',4)->count();
        $order_da_hoan_thanh = Order::where('status',4)->count();
        $product_da_dang = Product::where('status',1)->count();
        $product_dang_an = Product::where('status',0)->count();
        $product_dang__giam_gia = Product::whereNotNull('sale_price')->count();
        // --------product-------
        $info_order_da_hoan_thanh = Order::where('status',4)->get();
        $product_moi_nhat = Product::orderBy('created_at')->first();
        $number_product_da_ban = 0;
        foreach($info_order_da_hoan_thanh as $item){
            foreach($item->details as $item_detail){
                $number_product_da_ban += $item_detail->quantity;
            }
        }
        $list_quantity = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->orderByDesc('total_quantity')
        ->limit(5)
        ->get();



        // ----------post-------------
        $number_total_post = Post::count();
        $number_publish_post = Post::where('status',1)->count();
        $number_hidden_post = Post::where('status',0)->count();
        $latest_post = Post::where('status',1)->orderBy('created_at','DESC')->first();
        $list_comment_blogs = PostComment::select('blog_id', DB::raw('COUNT(blog_id) as count_comment'))
        ->groupBy('blog_id')
        ->orderByDesc('count_comment')
        ->limit(4)
        ->get();


        return view('admin.index', compact('order_today', 'total_order',
         'order_dang_thuc_hien', 'order_da_hoan_thanh', 'doanh_thu_ngay', 'da_huy', 'number_product_da_ban','product_da_dang',
        'product_dang_an','product_dang__giam_gia','product_moi_nhat','list_quantity','number_total_post','number_publish_post','number_hidden_post',
    'latest_post','list_comment_blogs'));
    }

    public function login(){
        // User::create([
        //     'name' => 'Admin Manage',
        //     'email' => 'duongquochuy1566@gmail.com',
        //     'password' => bcrypt(123456)
        // ]);
        return view('admin.login');
    }
    public function check_login(Request $req){
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $data = $req->only('email','password');
        $check = auth()->attempt($data);
        if($check){
            return redirect()->route('admin.index')->with('ok','welcome');
        }
        return redirect()->back()->with('no','Your email or password is wrong');
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login')->with('no','Logouted');
    }
}
