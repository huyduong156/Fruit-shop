<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\blogs\PostCategoryController;
use App\Http\Controllers\Admin\blogs\PostsController;
use App\Http\Controllers\Admin\blogs\PostTagController;
use App\Http\Controllers\admin\DisplayController;
use App\Http\Controllers\Admin\products\TagProductController;
use App\Http\Controllers\Admin\products\ProductController;

use App\Http\Controllers\Admin\products\CategoryController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomerMiddleware;
use App\Models\admin\blogs\CategoryPost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/profile-test',function(){
    $auth = auth('cus')->user();
    return view('account.profile_test',compact('auth'));
});


Route::get('/category/{slug}',[HomeController::class,'category'])->name('home.category');
Route::get('/store',[HomeController::class,'store'])->name('home.store');
Route::get('/tags-product/{slug}',[HomeController::class,'tags_product'])->name('home.tags_product');
Route::get('/post',[HomeController::class,'post_show'])->name('home.post');
Route::get('/post-category/{slug}',[HomeController::class,'post_category_show'])->name('home.post-category');
Route::get('/post_detail/{slug}',[HomeController::class,'post_detail'])->name('home.post_detail');
Route::get('/contact',[HomeController::class,'contact'])->name('home.contact');
Route::get('/about',[HomeController::class,'about'])->name('home.about');
Route::get('/product/{slug}',[HomeController::class,'product'])->name('home.product');
Route::get('/favorite/{product}',[HomeController::class,'favorite'])->name('home.favorite')->middleware('customer');


Route::group(['prefix'=>'account'],function(){
    Route::get('/login',[AccountController::class,'login'])->name('account.login');
    Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
    Route::post('/login',[AccountController::class,'check_login'])->name('account.check_login');
    Route::get('/favorite',[AccountController::class,'favorite'])->name('account.favorite');


    Route::get('/register',[AccountController::class,'register'])->name('account.register');
    Route::get('/verify/{email}',[AccountController::class,'verify'])->name('account.verify');
    Route::post('/register',[AccountController::class,'check_register'])->name('account.check_register');

    Route::get('/profile',[AccountController::class,'profile'])->name('account.profile')->middleware('customer');
    Route::post('/profile',[AccountController::class,'check_profile'])->name('account.check_profile')->middleware('customer');

    Route::get('/change-password',[AccountController::class,'change_password'])->name('account.change_password')->middleware('customer');
    Route::post('/change-password',[AccountController::class,'check_change_password'])->name('account.check_change_password')->middleware('customer');
    
    Route::get('/forgot-password',[AccountController::class,'forgot_password'])->name('account.forgot_password');
    Route::post('/forgot-password',[AccountController::class,'check_forgot_password'])->name('account.check_forgot_password');
    
    Route::get('/reset-password/{token}',[AccountController::class,'reset_password'])->name('account.reset_password');
    Route::post('/reset-password/{token}',[AccountController::class,'check_reset_password'])->name('account.check_reset_password');
    
    Route::post('/rate-order',[AccountController::class,'post_rate'])->name('account.product.rate_order');
    Route::get('/compare_product/{product}',[HomeController::class,'compare_product'])->name('home.compare_product');
    Route::get('/compare',[AccountController::class,'compare_list'])->name('account.compare_list');
});

Route::group(['prefix'=>'ajax'],function(){
    // Route::get('/logout',[ApiController::class,'logout'])->name('ajax.logout');
    Route::post('/login',[ApiController::class,'check_login'])->name('ajax.check_login');
    Route::post('/comment/{post_id}',[ApiController::class,'comment'])->name('ajax.comment');
});

Route::group(['prefix'=>'cart','middleware' => 'customer'],function(){
    Route::get('/',[CartController::class,'index'])->name('cart.index');
    Route::get('/add/{product}',[CartController::class,'add'])->name('cart.add');
    Route::post('/update',[CartController::class,'update'])->name('cart.update');
    // Route::post('/update/{product}',[CartController::class,'update'])->name('cart.update');
    Route::get('/delete/{product}',[CartController::class,'delete'])->name('cart.delete');
    Route::get('/clear',[CartController::class,'clear'])->name('cart.clear');
});



Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'check_login'])->name('admin.login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/order',[OrderController::class,'order'])->name('admin.order');
    Route::get('/order/detail/{order}',[OrderController::class,'order_detail'])->name('admin.order_detail');
    Route::get('/order/update-status/{order}',[OrderController::class,'update_status'])->name('admin.order.update_status');

    Route::resource('tag-product', TagProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('post', PostsController::class);
    Route::resource('category-post', PostCategoryController::class);
    Route::resource('tag-post', PostTagController::class);
    // Route::resource('product', ProductController::class);
    Route::get('product-delete-image/{image}', [ProductController::class,'destroyImage'])->name('product.destroyImage');


    Route::group(['prefix'=>'display'],function(){
        Route::get('/home',[DisplayController::class,'get_display_home'])->name('display_setting_home');
        Route::post('/home',[DisplayController::class,'post_display_home'])->name('post_setting_home');
    });
});




Route::group(['prefix'=>'order','middleware' => 'customer'],function(){
    Route::get('/checkout',[CheckoutController::class,'checkout'])->name('cus.order.checkout');
    Route::get('/history-order',[CheckoutController::class,'history'])->name('cus.order.history');
    // Route::get('/evaluate/{product}/{order}',[CheckoutController::class,'evaluate'])->name('cus.order.evaluate');
    // Route::get('/evaluate',[CheckoutController::class,'post_evaluate']);
    Route::get('/history-orderdetail/{order}',[CheckoutController::class,'history_orderdetail'])->name('cus.order.history-orderdetail');
    Route::post('/checkout',[CheckoutController::class,'post_checkout']);
    Route::get('/verify/{token}',[CheckoutController::class,'verify'])->name('cus.order.verify');
});










