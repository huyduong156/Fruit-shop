<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use App\Models\admin\products\TagsProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // xử lý logic sắp xếp
        $sortBy = $request->input('sort-by');
        $sortType = $request->input('sort-type');
        $allowSort = ['desc','asc'];
        if(empty($sortBy)){
            $sortBy = 'name';
        }
        if(!empty($sortType) && in_array($sortType,$allowSort)){
            if($sortType == 'asc'){
                $sortType = 'desc';
            } else {
                $sortType = 'asc';
            }
        } else{
            $sortType = 'asc';
        }
        // dd($sortType);
        // dd($sortType);


        $data = Product::orderBy($sortBy,$sortType)->paginate(15);
        return view('admin.product.index',compact('data','sortType'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::orderBy('name','DESC')->select('id','name')->get();
        $tags = TagsProduct::orderBy('name','DESC')->select('id','name')->get();
        // dd($cats);
        return view('admin.product.create',compact('cats','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:4|max:150|unique:products',
        //     'price' => 'required|numeric',
        //     'description' => 'required',
        //     'sale_price' => 'numeric|lte:price',
        //     'img' => 'file|mimes:jpg,jpeg,png,gif',
        //     'category' => 'required|exists:category,id'
        // ]);
        
        $slug = Str::slug($request->name);
        $path_product = 'uploads/filetext/product_txt/'.$slug. '.txt';
        $result = writeFileText($request->description,$path_product);

        $data = $request->only('name','price','sale_price','status','description','category_id');
        $image_name = $request->img->hashName();
        $data['image'] = $image_name;
        $data['slug'] = $slug;
        if($result['status'] == true) {
            $data['description'] = $result['name'];
        }
        if($product = Product::create($data)){
            $product->tags()->attach($request->tags);
            if($request->has('other_img')){
                foreach($request->other_img as $img){
                    $other_name = $img->hashName();
                    $img->move(public_path('uploads/product'),$other_name);
                    ProductImage::create([
                        'image' =>  $other_name,
                        'product_id' => $product->id
                    ]);
                }
            }
            $request->img->move(public_path('uploads/product'),$image_name);
            return redirect()->route('product.index')->with('ok','create product successfully');
        }


        return redirect()->back()->with('no','create product error');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $tags = TagsProduct::orderBy('name','DESC')->select('id','name')->get();
        $cats = Category::orderBy('name','DESC')->select('id','name')->get();
        return view('admin.product.edit',compact('cats','product','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // $request->validate([
        //     'name' => 'required|min:4|max:150|unique:products|name,'.$product->id,
        //     'price' => 'required|numeric',
        //     'sale_price' => 'numeric|lte:price',
            // 'description' => 'required',
        //     'img' => 'file|mimes:jpg,jpeg,png,gif',
        //     'category' => 'required|exists:category,id'
        // ]);
        // deleteFileText($request->description);                                                  // Xóa file text mô tả
        $slug = Str::slug($request->name);
        $data = $request->only('name','price','sale_price','status','category_id');
        $data['slug'] = $slug;
        if($request->has('img')){
            $img_name = $product->image;                                                        // lấy tên ảnh đại diện cũ sản phẩm
            $image_path = public_path('uploads/product').'/'.$img_name;
            // dd($image_path);         
            if(file_exists($image_path)){                                                       // kiểm tra nếu tồn tại link ảnh đại diện đó
                unlink($image_path);                                                            // xóa ảnh đại diện đi
            }  
            $image_name = $request->img->hashName();
            $data['image'] = $image_name;
            $request->img->move(public_path('uploads/product'),$image_name);
        }
        // if($result['status'] == true) {
        //     $data['description'] = $result['name'];
        // }
        // if(Product::where('id',$product->id)->update($data)){

        if($product->update($data)){
            $result = writeFileText($request->description,$product->description);                   // Tạo file mô tả mới
            // Xóa các tags hiện tại
            $product->tags()->detach();
            $product->tags()->attach($request->tags);                                       // Thêm các tags mới từ $request->tags
            if($request->has('other_img')){
                if($product->images->count()>0){
                    foreach($product->images as $img){
                        $img_other_name = $img->image;
                        $image_other_path = public_path('uploads/product').'/'.$img_other_name;                         //lấy đường dẫn tới ảnh với tên đã lấy ở trên
                        if(file_exists($image_other_path)){                                                       // kiểm tra nếu tồn tại link đó
                            unlink($image_other_path);                                                            // xóa nó đi
                        }
                    }
                    ProductImage::where('product_id',$product->id)->delete();
                }
                foreach($request->other_img as $img){
                    $other_name = $img->hashName();
                    $img->move(public_path('uploads/product'),$other_name);
                    ProductImage::create([
                        'image' =>  $other_name,
                        'product_id' => $product->id
                    ]);
                }
            }
            return redirect()->route('product.index')->with('ok','update product successfully');
        }
        return redirect()->back()->with('no','update product error');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {

        $img_name = $product->image;
        $image_path = public_path('uploads/product').'/'.$img_name;                         //lấy đường dẫn tới ảnh với tên đã lấy ở trên
        $description_path = $product->description;
        if($product->images->count()>0){

            foreach($product->images as $img){
                $img_other_name = $img->image;
                $image_other_path = public_path('uploads/product').'/'.$img_other_name;                         //lấy đường dẫn tới ảnh với tên đã lấy ở trên
                if(file_exists($image_other_path)){                                                       // kiểm tra nếu tồn tại link đó
                    unlink($image_other_path);                                                            // xóa nó đi
                }
            }
            ProductImage::where('product_id',$product->id)->delete();
            if($product->delete()){
                
                deleteFileText($description_path);                                                  // Xóa file text mô tả
                if(file_exists($image_path)){                                                       // kiểm tra nếu tồn tại link đó
                    unlink($image_path);                                                            // xóa nó đi
                }
                return redirect()->route('product.index')->with('ok','delete product successfully');
            }
        } else {
            if($product->delete()){
                deleteFileText($description_path);                                                  // Xóa file text mô tả
                if(file_exists($image_path)){                                                       // kiểm tra nếu tồn tại link đó
                    unlink($image_path);                                                            // xóa nó đi
                }
                return redirect()->route('product.index')->with('ok','delete product successfully');
            }

        }
        return redirect()->route('product.index')->with('ok','delete error');
    }

    public function destroyImage(ProductImage $image)                                           //truyền vào ảnh cần xóa và models
    {
        $img_name = $image->image;                                                              //lấy tên ảnh cần xóa
        if($image->delete()){                                                                   //nếu hình đã xóa
            $image_path = public_path('uploads/product').'/'.$img_name;                         //lấy đường dẫn tới ảnh với tên đã lấy ở trên
            if(file_exists($image_path)){                                                       // kiểm tra nếu tồn tại link đó
                unlink($image_path);                                                            // xóa nó đi
            }
            return redirect()->back()->with('ok','delete image successfully');                  // trả về thành công
        }   
        return redirect()->back()->with('no','something error');                                // trả về không thành công
    }
}
