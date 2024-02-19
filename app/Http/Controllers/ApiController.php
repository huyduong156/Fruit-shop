<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Validator;
use App\Models\admin\blogs\Post;
use App\Models\PostComment;

// use Validator;

class ApiController extends Controller
{
    public function ajaxSearch(){
        $data = Product::search()->get();
        return $data;
    }
    public function check_login(Request $req){
        // $req->validate([
        //     'email' => 'required|exists:customers',
        //     'password' => 'required'
        // ], [
        //     'email.exists' => 'Email không tồn tại trong hệ thống',
        //     'password.required' => 'Sai mật khẩu',
        // ]);
        // $validator = Validator::make($req->all(),[
        //     'email' => 'required|exists:customers',
        //     'password' => 'required'
        // ]);
        // if($validator->passes()){
        //     $data = $req->only('email', 'password');
        //     $check = auth('cus')->attempt($data);
        //     if ($check) {
        //         if (auth('cus')->user()->email_verified_at == null) {
        //             auth('cus')->logout();
        //             return response()->json(['error'=>['You account is not verify, please check email again']]);
        //         }
        //         return response()->json(['data'=>auth('cus')->user()]);
        //     }
        //     return response()->json(['error'=>['You account or password invalid']]);
            
        // }
        // return response()->json(['error'=>$validator->errors()->all()]);
        // -------------------------------------not validator-------------------------------------------------------
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
                return response()->json(['error'=>['You account is not verify, please check email again']]);
                return redirect()->back()->with('no', 'You account is not verify, please check email again');
            }
            return response()->json(['data'=>auth('cus')->user()]);
            return redirect()->route('home.index')->with('ok', 'Welcome back');
        }
        return response()->json(['error'=>['You account or password invalid']]);
        // return response()->json(['error'=>$validator->errors()->all()]);
        // return redirect()->back()->with('no', 'You account or password invalid');

    }

    public function comment(Request $req,Post $post_id){
        $customer_id = auth('cus')->id();
        $req->validate([
            'content' => 'required',
        ]);
        $data = [
            'customer_id' =>$customer_id,
            'blog_id' => $post_id->id,
            'content' => filterText($req->content),
            'reply_id' => $req->reply_id ? $req->reply_id : 0,
        ];
        if ($comment = PostComment::create($data)) {
            $comments = PostComment::where('blog_id',$post_id->id)->where('reply_id',0)->orderBy('id','DESC')->get();

            $number_comment = PostComment::where('blog_id',$post_id->id)->count();
            return view('home.blocks.list-comment-post',compact('comments','number_comment'));
            // return response()->json(['data'=>$comment]);
            // return redirect()->route('home.index')->with('ok', 'Welcome back');
        }
        return response()->json(['error'=>['You account or password invalid']]);
    }
}
