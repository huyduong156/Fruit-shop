<?php

namespace App\Http\Controllers;

use App\Models\admin\blogs\CategoryPost;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\admin\blogs\Post;
use App\Models\admin\products\TagsProduct;
use App\Models\CompareModel;
use App\Models\OrderDetail;
use App\Models\PostComment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function contact(){
        return view('home.contact-us');
    }
    public function about(){
        return view('home.about-us');
    }
    public function index(){
        $data_slider = readDataText('admin_assets/setting/layout_main_slider.txt');
        $best_sale_products = Product::orderBy('id','DESC')->limit(8)->get();
        $new_products = Product::orderBy('created_at','ASC')->limit(4)->get();
        return view('home.index',compact('new_products','best_sale_products','data_slider'));
    }
    public function admin(){
        
    }
    public function category($slug){
        // dd($cat);
        // $products = Product::where('category_id',$cat->id)->get();              // tìm sản phẩm có category là id truyền vào
        $cat = Category::where('slug',$slug)->first();
        $product_cat = $cat->products()->paginate(5);
        return view('home.category',compact('product_cat','cat'));
    }
    public function store(){
        // dd($cat);
        $product = Product::where('status',1)->orderBy('created_at','DESC')->paginate(12);              // tìm sản phẩm có category là id truyền vào 
        return view('home.store',compact('product'));
    }
    public function tags_product($slug){
        // $products = Product::where('category_id',$cat->id)->get();              // tìm sản phẩm có category là id truyền vào
        $tag = TagsProduct::where('slug',$slug)->first();
        // dd($tag);

        $product_tag = $tag->products()->paginate(12);
        return view('home.tag_list',compact('product_tag','tag'));
    }
    public function product($slug){
        // $new_products = Product::orderBy('created_at','DESC')->limit(4)->get(); 
        // $product_cat = $cat->products()->paginate(12);
        $product = Product::where('slug',$slug)->first();
        $rating_data = OrderDetail::where('product_id',$product->id)->whereNotNull('rate')->orderBy('rate_time','DESC')->get();
        $related_products = Product::where('category_id',$product->category_id)->limit(8)->get();
        $products_like = Product::orderBy('created_at','DESC')->limit(8)->get();

        return view('home.product',compact('product','related_products','products_like','rating_data'));
    }
    public function favorite($product_id){
        // dd(1);
        $data = [
            'product_id' => $product_id,
            'customer_id' => auth('cus')->id(),
        ];
        $favorited = Favorite::where(['product_id'=>$product_id,'customer_id'=>auth('cus')->id()])->first();
        if($favorited){
            $favorited->delete();
            return redirect()->back()->with('ok','Bạn đã bỏ yêu thích sản phẩm');
        } else {
            Favorite::create($data);
            return redirect()->back()->with('ok','Bạn đã yêu thích sản phẩm');

        }
    }
    public function compare_product(Product $product){
        $data = [
            'product_id' => $product->id,
            'customer_id' => auth('cus')->id(),
        ];
        $compare = CompareModel::where($data)->first();
        $compare_count = CompareModel::where('customer_id',auth('cus')->id())->count();
        if($compare){
            // dd($compare_count);
            $compare->delete();
            return redirect()->back()->with('ok','Bạn đã bỏ sản phẩm khỏi danh sách so sánh');
        }elseif($compare_count > 2){
            return redirect()->back()->with('no','Bạn chỉ có thể so sánh tối đa 5 sản phẩm một lần. Vui lòng xóa bớt sản phẩm trong danh sách so sánh');
        }else{
            CompareModel::create($data);
            return redirect()->back()->with('ok','Bạn đã thêm sản phẩm vào danh sách so sánh');
        }
        return redirect()->back()->with('no','Lỗi dữ liệu');
    }

    // ----------post--------
    public function post_show(){
        $posts = Post::where('status',1)->orderBy('id','DESC')->paginate(12);
        return view('home.blog',compact('posts'));
    }
    public function post_category_show($slug){
        // dd($category->posts);
        $category = CategoryPost::where('slug',$slug)->first();
        // dd($category);
        // $posts = Post::where('status',1)->orderBy('id','DESC')->paginate(12);
        return view('home.blog_category',compact('category'));
    }
    public function post_detail($slug){
        $post = Post::where('slug',$slug)->first();
        $number_comment = PostComment::where('blog_id',$post->id)->count();
        // dd($post);
        // $posts = Post::where('status',1)->orderBy('id','DESC')->paginate(20);
        return view('home.blog-details',compact('post','number_comment'));
    }
}
