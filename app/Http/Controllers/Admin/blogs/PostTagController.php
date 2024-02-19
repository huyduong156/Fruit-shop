<?php

namespace App\Http\Controllers\Admin\blogs;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs\TagPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = TagPost::orderBy('id','DESC')->paginate(20);
        return view('admin.blogs.tags-post.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = TagPost::orderBy('id','DESC')->paginate(20);
        return view('admin.blogs.tags-post.create',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        $data = $request->only('name','status');
        $data['slug'] = $slug;
        if(TagPost::create($data)){
            return redirect()->back()->with('ok', 'create tag successfully');
        }
        return redirect()->back()->with('no', 'create tag error');
    }

    /**
     * Display the specified resource.
     */
    public function show(TagPost $tagPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TagPost $tagPost)
    {
        return view('admin.blogs.tags-post.edit',compact('tagPost'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TagPost $tagPost)
    {
        $request->validate([
            'name' => 'required|min:4|max:50|unique:categories_post,name,'.$tagPost->id,
        ],[
            'name.required' => 'vui lòng nhập tên danh mục',
            'name.min' => 'vui lòng nhập tên danh mục trên 4 kí tự',
            'name.max' => 'vui lòng nhập tên danh mục dưới 50 kí tự',
            'name.unique' => 'Danh mục này đã có',
        ]);
        $data = $request->only('name','status');
        $data['slug'] = Str::slug($request->name);
        if($tagPost->update($data)){
            return redirect()->route('tag-post.index')->with('ok', 'create tag successfully');
        }
        return redirect()->back()->with('no', 'create tag error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TagPost $tagPost)
    {
        if($tagPost->delete()){
            return redirect()->back()->with('ok', 'create tag successfully');
        }
        return redirect()->back()->with('no', 'create tag error');
    }
}
