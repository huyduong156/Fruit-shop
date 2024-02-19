<?php

namespace App\Providers;

use App\Models\admin\blogs\CategoryPost;
use App\Models\admin\blogs\Post;
use App\Models\admin\products\TagsProduct;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view){
            $new_products = Product::orderBy('created_at','DESC')->limit(4)->get(); 
            $cats_home = Category::orderBy('name','ASC')->where('status',1)->get();
            $cats_post = CategoryPost::orderBy('name','DESC')->where('status',1)->get();
            $tags_product_home = TagsProduct::orderBy('name','ASC')->where('status',1)->get();
            // $carts = Cart::where('customer_id',auth('cus')->id())->get();
            $carts = Cart::where(['customer_id'=>auth('cus')->id()])->get();
            $new_post = Post::where('status',1)->orderBy('id')->get();
            $view->with(compact('cats_home','carts','new_products','tags_product_home','new_post','cats_post'));
        });
    }
}
