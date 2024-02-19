<?php

namespace App\Http\Controllers\Admin\blogs;

use App\Http\Controllers\Controller;
use App\Models\admin\blogs\CategoryPost;
use App\Models\admin\blogs\Post;
use App\Models\admin\blogs\TagPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::orderBy('id','DESC')->paginate(12);
        
        return view('admin.blogs.posts.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = CategoryPost::orderBy('id','DESC')->get();
        $tags = TagPost::orderBy('id','DESC')->get();
        return view('admin.blogs.posts.create',compact('cats','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|min:4|max:150|unique:posts',
            'img' => 'file|mimes:jpg,jpeg,png,gif',
        ]);
        
        $slug = Str::slug($request->name);

        $path_product = 'uploads/filetext/blog_txt/blog_content_txt/'. $slug . '-' . time() . '.txt';
        $result = writeFileText($request->description,$path_product);
        
        $data = $request->only('name','status','short_description','description','cats','tags');
        $image_name = $request->img->hashName();
        $data['image'] = $image_name;
        $data['slug'] = $slug;
        $data['author'] = auth()->user()->name;
        if($result['status'] == true) {
            $data['description'] = $result['name'];
        }
        if($post = Post::create($data)){
            $post->categories()->attach($request->cats);            // Thêm các cats mới từ $request->cats
            $post->tags()->attach($request->tags);            // Thêm các tags mới từ $request->tags
            $request->img->move(public_path('uploads/blog'),$image_name);
            return redirect()->route('post.index')->with('ok','create post successfully');
        }

        return redirect()->back()->with('no','create post error');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        $tags = TagPost::orderBy('id','DESC')->get();
        $cats = CategoryPost::orderBy('id','DESC')->get();
        return view('admin.blogs.posts.edit',compact('cats','post','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        
        $request->validate([
            'name' => 'required|min:4|max:150|unique:posts,name,'.$post->id,
            'img' => 'file|mimes:jpg,jpeg,png,gif',
        ]);
        $data = $request->only('name','status','short_description','description','cats','tags');

        if($request->has('img')){
            $img_name = $post->image;                                                        // lấy tên ảnh đại diện cũ sản phẩm
            $image_path = public_path('uploads/blog').'/'.$img_name;         
            if(file_exists($image_path)){                                                       // kiểm tra nếu tồn tại link ảnh đại diện đó
                unlink($image_path);                                                            // xóa ảnh đại diện đi
            }  
            $image_name = $request->img->hashName();
            $data['image'] = $image_name;
            $request->img->move(public_path('uploads/blog'),$image_name);
        }
        $data['slug'] = Str::slug($request->name);
        $result = writeFileText($request->description,$post->description);
        if($result['status'] == true) {
            $data['description'] = $result['name'];
        }

        if($post->update($data)){
            $post->categories()->detach();            // Xóa các cats cũ từ $post->categories
            $post->categories()->attach($request->cats);            // Thêm các cats mới từ $request->cats
            $post->tags()->detach();            // Xóa các cats cũ từ $post->categories
            $post->tags()->attach($request->tags);            // Thêm các cats mới từ $request->cats
            // $request->img->move(public_path('uploads/blog'),$image_name);
            return redirect()->route('post.index')->with('ok','update post successfully');
        }


        return redirect()->back()->with('no','create post error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $description_link = $post->description;
        $img_link = public_path('uploads/blog/').$post->image;
        if($post->delete()){
            deleteFileText($description_link);
            if(file_exists($img_link)){
                unlink($img_link);
            }
            return redirect()->route('post.index')->with('ok','delete post successfully');
        }
        return redirect()->back()->with('no','delete post eror');
    }
}
