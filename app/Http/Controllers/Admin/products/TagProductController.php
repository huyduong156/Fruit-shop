<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use App\Models\admin\products\TagsProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $product = 14;
        // $tagIds = TagsProduct::find(3);
        // $product = Product::find(14);
        // $tagIds = 2;
        // $product->tags()->attach($tagIds);
        // $tagIds->products()->attach($product);
        // $tagIds->products()->syncWithoutDetaching($product);
        // $tag = $product->tags;
        // dd($tag);
        $data = TagsProduct::orderBy('created_at','DESC')->get();
        return view('admin.product.tags.index',compact('data'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = TagsProduct::orderBy('created_at','DESC')->get();
        return view('admin.product.tags.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:tags_product',
            'status' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Vui lòng nhập ít nhất 4 kí tự',
            'name.max' => 'Vui lòng nhập ít lại',
            'name.unique' => 'Tag này đã có',
            'status.unique' => 'Vui lòng chọn trạng thái',
        ]);
        $slug = Str::slug($request->name);
        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'slug' => $slug,
        ];
        if(TagsProduct::create($data)){
            return redirect()->route('tag-product.create')->with('ok','create tag product successfully');
        }
        return redirect()->back()->with('no','create tag product error');
    }

    /**
     * Display the specified resource.
     */
    public function show(TagsProduct $tagsProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(TagsProduct $tags)
    public function edit(TagsProduct $tag_product)
    {
        // $tagsProduct = TagsProduct::findOrFail($tags);
        $tagsProduct = $tag_product;
        return view('admin.product.tags.edit',compact('tagsProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tagsProduct)
    {
        $slug = Str::slug($request->name);
        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'slug' => $slug,
        ];
        if(TagsProduct::where('id',$tagsProduct)->update($data)){
            return redirect()->route('tag-product.index')->with('ok','update tag product successfully');
        }
        return redirect()->back()->with('no','update tag product error');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tagsProduct)
    {

        if(TagsProduct::where('id',$tagsProduct)->delete()){
            return redirect()->route('tag-product.index')->with('ok','delete tag product successfully');
        }
        return redirect()->back()->with('no','delete tag product error');
    }
    // $tagsProduct = TagsProduct::findOrFail($tags);
    // // dd($tagsProduct);
    // return view('admin.product.tags.edit',compact('tagsProduct'));
}
