<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isNull;

class OrderController extends Controller
{

    public function order(){
        $status = request('status');
        if($status == 'all'){
            $orders = Order::orderBy('id','DESC')->paginate();
        }elseif($status == 'now'){

            $orders = Order::orderBy('id','DESC')
                ->where('status',0)
                ->orWhere('status',1)
                ->orWhere('status',2)
                ->orWhere('status',3)
                ->paginate();
        
        }else{
            $orders = Order::orderBy('id','DESC')->where('status',$status)->paginate();
        }
        return view('admin.orders.order',compact('orders'));
    }
    public function order_detail(Order $order){
        $auth = $order->customer;
        return view('admin.orders.order-detail',compact('auth','order'));
    }
    public function update_status(Order $order){

        $status = request('status');
        // $status = 2;
        $status = (int)$status;
        // dd($order->status);

        if($order->status !=4){
            if($order->status == 3 && $status == 5){
                return redirect()->route('admin.order_detail',$order->id)->with('no','không thể cập nhập đơn hàng đã giao');
            }
            $order->update(['status'=> $status]);
            return redirect()->route('admin.order_detail',$order->id)->with('ok','Cập nhập trạng thái thành công');
        }
        return redirect()->route('admin.order_detail',$order->id)->with('no','không thể cập nhập đơn hàng đã giao');
    }


}
