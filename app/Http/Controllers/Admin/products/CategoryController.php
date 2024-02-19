<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use App\Models\admin\products\TagsProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::orderBy('created_at','DESC')->get();
        return view('admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('created_at','DESC')->get();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:50|unique:categories',
            'status' => 'required',
        ],[
            'name.required' => 'vui lòng nhập tên danh mục',
            'name.min' => 'vui lòng nhập tên danh mục trên 4 kí tự',
            'name.max' => 'vui lòng nhập tên danh mục dưới 50 kí tự',
            'name.unique' => 'Danh mục này đã có',
            'status.required' => 'vui lòng chọn trạng thái'
        ]);
        $slug = Str::slug($request->name);
        
        $data = [
            'name' => $request->name,
            'status' => $request->status
        ];
        // if(!empty($request->description)){
            // dd($request->description);
        $path_cate = 'uploads/filetext/product_txt/product_category_txt/'.$slug. time() .'.txt';
        $result = writeFileText($request->description,$path_cate);
        if($result['status'] == true) {
            $data['description'] = $result['name'];
        }
        // }
        $data['slug'] = $slug;
        if(Category::create($data)){
            
            return redirect()->back()->with('ok', 'create successfully');
        }
        return redirect()->back()->with('no', 'create error');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**x`
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            // 'name' => 'required|min:4|max:50|unique:categories|name,'.$category->id,
            'status' => 'required',
        ],[
            // 'name.required' => 'vui lòng nhập tên danh mục',
            // 'name.min' => 'vui lòng nhập tên danh mục trên 4 kí tự',
            // 'name.max' => 'vui lòng nhập tên danh mục dưới 50 kí tự',
            // 'name.unique' => 'Danh mục này đã có',
            'status.required' => 'vui lòng chọn trạng thái'
        ]);
        $data = [
            'name' => $request->name,
            'status' => $request->status
        ];
        $data['slug'] = Str::slug($request->name);
        if($category->update($data)){
            writeFileText($request->description,$category->description);
            return redirect()->route('category.index')->with('ok', 'update successfully');
        }
        return redirect()->back()->with('no', 'update error');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $description_path = null;
        if(isset($category->description)){
            $description_path = $category->description;
        };
        if($category->delete()){
            if(isset($description_path)){
                deleteFileText($description_path);
            }
            return redirect()->route('category.index')->with('ok', 'delete successfully');
        }
        return redirect()->back()->with('no', 'delete error');
    }
}
