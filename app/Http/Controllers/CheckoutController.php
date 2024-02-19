<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\admin\products\EvaluateProduct;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class CheckoutController extends Controller
{
    public function checkout(){
        $auth = auth('cus')->user();
        return view('home.checkout',compact('auth'));
    }
    public function history(){
        $auth = auth('cus')->user();
        return view('account.order-history',compact('auth'));
    }
    public function history_orderdetail(Order $order){
        $auth = auth('cus')->user();
        // dd($order);
        return view('account.order-detail',compact('auth','order'));
    }
    public function post_checkout(Request $req){
        $auth = auth('cus')->user();
        // dd($req);
        $data = $req->only('name','email','address','phone');
        $data['customer_id'] = $auth->id;
        // dd($data);
        if($order = Order::create($data)){
            $total = 0;
            foreach($auth->carts as $cart){
                $dataDetail = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                ];
                $total += $cart->price * $cart->quantity;
                OrderDetail::create($dataDetail);
            }
            $token = Str::random(40);
            $order->token = $token;
            $order->status = 0;
            $order->total_price = $total;
            $order->save();
            
            Mail::to($auth->email)->send(new OrderMail($order,$token));
            // $auth->carts()->delete();
            return redirect()->route('home.index')->with('ok','Order checkout successfully. Please check your mail to verify');
        }
       
        return redirect()->route('home.index')->with('no','Something error');
    }
    public function verify($token){
        $order = Order::where('token',$token)->first();
        if($order){
            $order->status = 1;
            $order->token = null;
            $order->save();
            return redirect()->route('home.index')->with('ok','Order verify successfully. Check email to verify order.');
        }
        return redirect()->route('home.index')->with('no','Order verify error.');
    }





}
