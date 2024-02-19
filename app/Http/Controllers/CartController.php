<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('home.cart');
        
    }
    public function add(Product $product, Request $req){
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        // dd($quantity);
        $cus_id = auth('cus')->id();
        $cartExist = Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])->first();
        
        if($cartExist){
            Cart::where(['customer_id'=>$cus_id,'product_id'=>$product->id])->update([
                'quantity' => $cartExist->quantity + $quantity,
            ]);
            return redirect()->back()->with('ok','add to card successfully');

        } else {
            $data = [
                'customer_id' => $cus_id,
                'product_id' => $product->id,
                'price' => $product->sale_price ? $product->sale_price : $product->price,
                'quantity' => $quantity,
            ];
            if(Cart::create($data)){
                return redirect()->back()->with('ok','add to card successfully');
            }
        }
        return redirect()->back()->with('no','something error');
    }
    public function update(Request $req){
        $quantity = $req->quantity ? floor($req->quantity) : 1;
        $cus_id = auth('cus')->id();
        $cartExist = Cart::where(['customer_id'=>$cus_id,'product_id'=>$req->product_id])->first();
        if($cartExist){
            Cart::where(['customer_id'=>$cus_id,'product_id'=>$req->product_id])->update([
                'quantity' => $quantity,
            ]);
            $productPrice = $cartExist->products->sale_price ? $cartExist->products->sale_price : $cartExist->products->price;
            $subtotal = number_format($quantity * $productPrice);
            // $total_price = Cart::where('customer_id',$cus_id)->sum('price');
            return $subtotal;
        } 
        return 'Lỗi cmnr';
        // return redirect()->back()->with('no','something error');
    }
    public function delete(Product $product){
        Cart::where(['customer_id'=>auth('cus')->id(),'product_id'=>$product->id])->delete();
        return redirect()->route('cart.index')->with('ok','delete in cart successfully');
    }
    public function update_quatity_cart_ajax(){

    }
    public function clear(){
        Cart::where(['customer_id'=>auth('cus')->id()])->delete();
        return redirect()->route('cart.index')->with('ok','clear cart successfully');
    }
}
