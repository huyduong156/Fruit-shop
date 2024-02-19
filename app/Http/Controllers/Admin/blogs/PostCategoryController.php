<?php

namespace App\Http\Controllers\Admin\blogs;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CategoryPost::orderBy('id','DESC')->get();
        return view('admin.blogs.categories-post.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = CategoryPost::orderBy('id','DESC')->get();
        return view('admin.blogs.categories-post.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|min:4|max:50|unique:categories_post',
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
            $path_cate = 'uploads/filetext/blog_txt/blog_category_txt/'.$slug .'-'. time() .'.txt';
            $result = writeFileText($request->description,$path_cate);
            if($result['status'] == true) {
                $data['description'] = $result['name'];
            }
        // }
        $data['slug'] = $slug;
        if(CategoryPost::create($data)){
            
            return redirect()->back()->with('ok', 'create successfully');
        }
        return redirect()->back()->with('no', 'create error');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryPost $categoryPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryPost $categoryPost)
    {
        return view('admin.blogs.categories-post.edit',compact('categoryPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryPost $categoryPost)
    {
        $request->validate([
            'name' => 'required|min:4|max:50|unique:categories_post,name,'.$categoryPost->id,
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
            // dd($categoryPost->description);
            // $path_cate = 'uploads/filetext/blog_txt/blog_category_txt/'.$categoryPost->slug. '.txt';
        
            // if($result['status'] == true) {
            //     $data['description'] = $result['name'];
            // }
        // }
        $data['slug'] = $slug;
        if($categoryPost->update($data)){
            writeFileText($request->description,$categoryPost->description);
            return redirect()->route('category-post.index')->with('ok', 'create successfully');
        }
        return redirect()->back()->with('no', 'create error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryPost $categoryPost)
    {
        $description_path = null;
        if(isset($categoryPost->description)){
            $description_path = $categoryPost->description;
        };
        if($categoryPost->delete()){
            if(isset($description_path)){
                deleteFileText($description_path);
            }
            return redirect()->route('category-post.index')->with('ok', 'delete successfully');
        }
        return redirect()->back()->with('no', 'delete error');
    }
}
